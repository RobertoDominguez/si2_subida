<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_nurse',
        'id_service'
    ];

    public function scopeNurse($query,$id_nurse)
    {
        return $query->where('id_nurse',$id_nurse)->get();
    }

    public function scopeNurseWithServicesWithCategory($query,$id_nurse)
    {
        return $query->join('services','services.id','offers.id_service')
        ->join('categories','categories.id','services.id_category')
        ->where('services.removed', false)
        ->where('offers.id_nurse',$id_nurse)
        ->select('offers.*','services.name',
        'services.price','services.duration','categories.name as name_category')->get();
    }

    public function scopeNurseWithInvoice($query,$id_invoice){
        return $query->join('users','users.id','offers.id_nurse')
        ->join('invoices','invoices.id_offer','offers.id')
        ->where('invoices.id',$id_invoice)->first();
    }

    public function scopeNursesWithInvoice($query,$id_service){
        return $query->join('users','users.id','offers.id_nurse')
        ->where('offers.id_service',$id_service)
        ->select('offers.*','users.name','users.last_name')->get();
    }
}

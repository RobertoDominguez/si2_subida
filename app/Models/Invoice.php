<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_user',
        'id_service',
        'id_offer',
        'id_payment_method',
        'check_in',
        'check_out',
        'date',
        'lat',
        'long',
        'time',
        'total',
        'ubication',
    ];

    public function scopeInvoices($query,$id_user){
        return $query->where('id_user', $id_user)->orderBy('id','desc')->get();
    }

    public function scopeInvoicesServicesPatients($query){
        return $query->join('services','invoices.id_service','services.id')
        ->join('users','users.id','invoices.id_user')
        ->join('payment_methods','payment_methods.id','invoices.id_payment_method')
        ->where('services.removed',false)
        ->select('payment_methods.name as name_payment_method', 'users.name','users.last_name','services.name as name_service','services.price','services.duration','invoices.*')
        ->orderBy('invoices.id','desc')->get();
    }

    public function scopeInvoicesServices($query,$id_user){
        return $query->join('services','invoices.id_service','services.id')
        ->where('services.removed',false)->where('invoices.id_user',$id_user)
        ->select('services.name','services.price','services.duration','invoices.*')
        ->orderBy('invoices.id','desc')->get();
    }

    
    public function scopeInvoicesPendientes($query,$id_nurse){
        return $query->join('offers','invoices.id_offer','offers.id')
        ->where('offers.id_nurse', $id_nurse)->where('invoices.check_out',null)
        ->select('invoices.*')->get();
    }

    public function scopeInvoicesFinalizados($query,$id_nurse){
        return $query->join('offers','invoices.id_offer','offers.id')
        ->select('invoices.*')->where('offers.id_nurse', $id_nurse)->whereNotNull('invoices.check_out')->get();
    }

}

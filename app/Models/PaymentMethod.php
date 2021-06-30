<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'removed',
    ];

    public function scopePayments($query){
        return $query->where('removed',false)->get();
    }
}

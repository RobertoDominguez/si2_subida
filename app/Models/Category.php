<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'removed',
    ];

    public function scopeCategories($query){
       return $query->where('removed',false)->get();
    }
    
    public function services(){
        return $this->hasMany(Service::class,'id_category');
    }
}

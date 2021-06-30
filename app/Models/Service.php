<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_category',
        'name',
        'price',
        'duration', //minutes
        'removed',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function scopeServices($query)
    {
        return $query->where('removed', false)->get();
    }

    public function scopeServicesWithCategory($query)
    {
        return $query->join('categories','categories.id','services.id_category')
        ->where('services.removed', false)
        ->select('categories.id as id_category','services.id','services.name',
        'services.price','services.duration','categories.name as name_category')->get();
    }


}

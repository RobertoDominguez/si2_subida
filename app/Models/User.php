<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'name',
            'last_name',
            'phone',
            'email',
            'email_verified_at',
            'password',
            'credential',
            'type_nurse',
            'type_patient',
            'removed',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeNurses($query){
        return $query->where('type_nurse',true)->where('removed',false)->get();
    }

    public function scopePatients($query){
        return $query->where('type_patient',true)->where('removed',false)->get();
    }

    public function scopeOffers($query,$id_service){
        return $query->join('offers','users.id','offers.id_nurse')->where('offers.id_service',$id_service)->get();
    }



}

<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
use HasFactory, Notifiable, HasRoles,SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $guard = 'web';


    protected $hidden = [

        'password', 'remember_token',
    ];


    protected $casts = [

        'email_verified_at' => 'datetime',

    ];



    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
=======

class User extends Authenticatable
{
    use HasFactory, Notifiable;
>>>>>>> master

    /**
     * The attributes that are mass assignable.
     *
<<<<<<< HEAD
     * @var array<int, string>
=======
     * @var array
>>>>>>> master
     */
    protected $fillable = [
        'name',
        'email',
        'password',
<<<<<<< HEAD
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
=======
        'level',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
>>>>>>> master
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
<<<<<<< HEAD
     * The attributes that should be cast.
     *
     * @var array<string, string>
=======
     * The attributes that should be cast to native types.
     *
     * @var array
>>>>>>> master
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

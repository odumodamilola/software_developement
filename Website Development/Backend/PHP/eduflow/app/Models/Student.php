<?php

namespace App\Models;
use Spatie\Permission\Traits\HasRoles;

class Student extends User
{
    use HasRoles;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'pasacsword', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
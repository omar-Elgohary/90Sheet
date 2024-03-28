<?php

namespace App\Models;

class User extends AuthBaseModel
{
    const IMAGEPATH = 'users';

    const searchAttributes = ['name', 'phone', 'email'];

    protected $casts = [
        'lat'         => 'decimal:8',
        'lng'         => 'decimal:8',
        'is_notify'   => 'boolean',
        'is_blocked'  => 'boolean',
        'is_approved' => 'boolean',
        'active'      => 'boolean',
    ];

    protected $fillable = [
        'name',
        'country_code',
        'phone',
        'email',
        'password',
        'image',
        'active',
        'is_blocked',
        'is_approved',
        'lang',
        'is_notify',
        'code',
        'code_expire',
        'lat',
        'lng',
        'map_desc',
        'wallet_balance',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

}

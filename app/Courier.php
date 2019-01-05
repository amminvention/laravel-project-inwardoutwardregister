<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    protected $fillable = [
        'name', 'address', 'mobile', 'email', 'website', 'remarks'
    ];

    protected $table = 'couriers';
}

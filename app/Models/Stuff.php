<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    protected $fillable = [
        'name',
        'position',
        'phone',
        'image'
    ];
}

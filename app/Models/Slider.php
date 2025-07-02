<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /** @use HasFactory<\Database\Factories\SliderFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image', // store image path
        'link', // optional link for the slider
    ];
}

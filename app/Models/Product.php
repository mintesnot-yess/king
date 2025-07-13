<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected  $fillable = [
        'title',
        'description',
        'images',
        'category_id',
        'is_active',
    ];
    // catagories relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

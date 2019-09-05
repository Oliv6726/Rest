<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'product_id',
        'product_name',
        'product_ingredients',
        'product_desc',
        'product_picture'
    ];
}

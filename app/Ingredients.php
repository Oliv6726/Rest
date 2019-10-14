<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    protected $tabel = 'ingredient_name';
    protected $fillable = [
        'ingredient_id',
        'ingredient_name',
    ];
}

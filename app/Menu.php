<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'menu_id',
        'menu_name',
        'menu_items',
        'menu_picture',
        'menu_desc',
    ];
}

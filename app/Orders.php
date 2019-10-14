<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'order_id',
        'table_num',
        'products',
        'status',
    ];
}

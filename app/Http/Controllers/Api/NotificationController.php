<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders;

class NotificationController extends Controller
{
    function get(){
        $order = Orders::orderby('created_at', 'asc')->get();
        
        return response($order, 200)->header('Content-Type', 'application/json');

    }
}

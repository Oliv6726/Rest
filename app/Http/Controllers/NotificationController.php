<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications;

class NotificationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function save(string $message, string $for){
        Notifications::create([
            'message' => $message,
            'for' => $for,
            'read' => false,
        ]);
        event(new NotificationEvent("TEST", "Test af notifications"));
    }
}

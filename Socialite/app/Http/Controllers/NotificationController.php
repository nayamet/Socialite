<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
{
    public function notificationShow()
    {
        $notifications = Notification::where('fk_users_id', Session::get('id'))->get();
        return view('notification')->with('notifications', $notifications);
    }
}

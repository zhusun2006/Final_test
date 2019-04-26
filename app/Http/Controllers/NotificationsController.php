<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\User;
use Auth;


class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // 获取登录用户的所有通知
        $notifications = Notifications::where('achiever', Auth::id())->paginate(5);
        // var_dump($notifications);
        // 标记为已读，未读数量清零

        $update = User::find(Auth::id());
        $update->notification_count = 0;
        $update->save();
        
        return view('notifications.index', compact('notifications'));
    }
}
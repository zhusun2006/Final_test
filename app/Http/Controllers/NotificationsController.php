<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;
use App\Models\Admin;
use App\Models\Reply;
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
        $notifications = Notification::where('achiever', Auth::id())->paginate(10);
        // var_dump($notifications);
        // 标记为已读，未读数量清零
        $update = User::find(Auth::id());
        $update->notification_count = 0;
        $update->save();
        
        return view('notifications.index', compact('notifications'));
    }

    public function watch()
    {
        // 获取登录用户所有发起的审核
        $user_name = User::where('id', Auth::id())->value('name');
        $replies = Reply::where('sender_id', $user_name)->paginate(10);
        return view('notifications.thread', compact('replies'));
    }

    public function check(Request $request, User $user)
    {
        //通过消息获取回复的Id
        //获取数组下标，传入的值迷之变成下标，所以这么解决了
        $this->authorize('check',$user);
        $notice = array_keys($request->all());
        $notice_id = $notice[0];
        $reply_id = Notification::where('id', $notice_id)->value('reply_id');

        $reply = Reply::where('id' , $reply_id)->get();

        return view('replies.index', compact('reply'));
    }

    public function resultofnotice(Request $request)
    {
        //通过消息获取回复的Id
        //获取数组下标，传入的值迷之变成下标，所以这么解决了
        $notice = array_keys($request->all());
        $notice_id = $notice[0];
        $reply_id = Notification::where('id', $notice_id)->value('reply_id');

        $reply = Reply::where('id' , $reply_id)->get();

        return view('replies.result', compact('reply'));
    }

    public function resultofreply(Request $request)
    {
        //通过消息获取回复的Id
        //获取数组下标，传入的值迷之变成下标，所以这么解决了
        $reply = array_keys($request->all());
        $reply_id = $reply[0];
        $reply = Reply::where('id' , $reply_id)->get();

        return view('replies.result', compact('reply'));
    }

    public function resultofedit(Request $request)
    {
        //通过消息获取回复的Id
        //获取数组下标，传入的值迷之变成下标，所以这么解决了
        $reply = array_keys($request->all());
        $reply_id = $reply[0];
        $reply = Reply::where('id' , $reply_id)->get();

        $user_access = User::where('id', Auth::id())->value('is_admin');
        $user_department = User::where('id', Auth::id())->value('department');
        if($user_access == 1)
        {
            $admin_list = Admin::all();
        }
        if($user_access == 0)
        {
            $admin_list = Admin::where('department', $user_department)->get();
        }
        return view('replies.edit', compact('reply','admin_list'));
    }

    public function adminnotice(Request $request)
    {
        //通过消息获取回复的Id
        //获取数组下标，传入的值迷之变成下标，所以这么解决了
        $notice = array_keys($request->all());
        $notice_id = $notice[0];
        $reply_id = Notification::where('id', $notice_id)->value('reply_id');

        $reply = Reply::where('id' , $reply_id)->get();
        //这里是审核结果页面
        return view('replies.noticeresult', compact('reply'));
    }
}
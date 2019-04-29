<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class RepliesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

	public function store(Request $request, Reply $reply, User $user)
	{
        //获取日期
		$today = date('Y-m-d');
        //获取提交者的用户Id
		$id = $request->user_id;
        $file = $request->file('file');
        $is_check = $request->is_check;
        //若果是提交申请
        if($is_check == 0)
        {
            $dir = public_path().'/uploads/'.$today;
            if(!is_dir($dir))
            {
                mkdir($dir);
            }
            if($file != null)
            {
                if($file->isValid())          
                {
                    //获取文件的扩展名 
                    $ext = $file->getClientOriginalExtension();
                    //获取文件缓存的绝对路径
                    $path = $file->getRealPath();
                    //定义文件名
                    $filename = date('Y-m-d-h-i-s').'.'.$ext;
                }
            }

            if($request->user_id == Auth::id())
            {
                session()->flash('danger','不允许将申请发送给自身！');
                return view('users.apply', compact('user'));
            }

            $user_access = User::where('id', Auth::id())->value('is_admin');
            $user_department = User::where('id', Auth::id())->value('department');

            // var_dump($user_department);
            //如果权限是管理员级别的用户，则允许给任何人发回复
            if($user_access == 1)
            {
                //将申请或者回复的记录保存至数据库
                $reply->content = $request->content;
                $reply->title = $request->title;
                $reply->user_id = $request->user_id;
                $reply->sender_id = Auth::id();
                $reply->kind = $request->category_id;
                $reply->filename = $filename;
                $reply->route = 'uploads/'.$today.'/'.$filename;
                $reply->admin_reply = $request->adminreply;
                $reply->save();
                Storage::disk('upload')->put($today.'/'.$filename, file_get_contents($path));
                //获取保存记录的id
                $reply_id = Reply::where(['user_id' => $request->user_id, 'title' => $request->title, 'content' => $request->content])->value('id');
                //将申请或者回复提交至消息通知中
                $notice = Notification::create([
                    'reply_id' => $reply_id,
                    'sender' => Auth::id(),
                    'achiever' => $request->user_id,
                    'title' => $request->title,
                    'content' => $request->content,
                    'kind' => $request->category_id,
                    'admin_reply' => $request->adminreply,
                    'datetime' => $today
                ]);
                //用户的消息记录+1
                $count = User::where('id', $id)->value('notification_count')+1;
                $update = User::find($id);
                $update->notification_count = $count;
                $update->save();
                //返回提交消息
                $fallback = route('users.show', Auth::user());
                return redirect()->intended($fallback)->with('success', '发送成功，现转至个人主页面！');;
            }
            //如果权限是普通用户，则只允许给管理员级别的用户发送申请。
            if($user_access == 0 )
            {
                $tag = User::where('id', $request->user_id)->value('is_admin');
                if($tag == 0)
                {
                    session()->flash('warning','只允许将申请提交给管理员或者部门管理！');
                    return view('users.apply', compact('user'));
                }
                else
                {
                    $tag_department = User::where('id', $request->user_id)->value('department');
                    // var_dump($tag_department);
                    // var_dump($user_department);
                    // exit;
                    if($tag_department != $user_department)
                    {
                        session()->flash('warning','只允许将申请提交给本部门管理员或部门管理！');
                        return view('users.apply', compact('user'));
                    }
                    else
                    {
                        //将申请或者回复的记录保存至数据库
                        $reply->content = $request->content;
                        $reply->title = $request->title;
                        $reply->user_id = $request->user_id;
                        $reply->sender_id = Auth::id();
                        $reply->kind = $request->category_id;
                        $reply->admin_reply = $request->adminreply;
                        $reply->filename = $filename;
                        $reply->route = 'uploads/'.$today.'/'.$filename;
                        $reply->save();
                        Storage::disk('upload')->put($today.'/'.$filename, file_get_contents($path));
                        //获取保存记录的id
                        $reply_id = Reply::where(['user_id' => $request->user_id, 'title' => $request->title, 'content' => $request->content])->value('id');
                        //将申请或者回复提交至消息通知中

                        $notice = Notification::create([
                            'reply_id' => $reply_id,
                            'sender' => Auth::id(),
                            'achiever' => $request->user_id,
                            'title' => $request->title,
                            'content' => $request->content,
                            'kind' => $request->category_id,
                            'datetime' => $today
                        ]);
                        //用户的消息记录+1
                        $count = User::where('id', $id)->value('notification_count')+1;
                        $update = User::find($id);
                        $update->notification_count = $count;
                        $update->save();
                        //返回提交消息
                        $fallback = route('users.show', Auth::user());
                        return redirect()->intended($fallback)->with('success', '发送成功，现转至个人主页面！');;
                    }
                }
            }
        }
        //如果是回复申请
        else
        {
            //获取日期
            $today = date('Y-m-d');
            //获取提交者的用户Id
            $id = $request->user_id;

            if($request->user_id == Auth::id()){
                session()->flash('danger','不允许将申请发送给自身！');
                return view('users.apply', compact('user'));
            }

            $user_access = User::where('id', Auth::id())->value('is_admin');
            $user_department = User::where('id', Auth::id())->value('department');

            //如果权限是管理员级别的用户，则允许回复
            if($user_access == 1){
                //将申请或者回复的记录保存至数据库
                $reply_id = Reply::where('title' , $request->title)->value('id');
                $reply = Reply::find($reply_id);
                $reply->admin_reply = $request->adminreply;
                $reply->save();
                //获取保存记录的id
                //将回复提交至消息通知中
                $notice = Notification::create([
                    'reply_id' => $reply_id,
                    'sender' => Auth::id(),
                    'achiever' => $request->user_id,
                    'title' => $request->title,
                    'content' => $request->content,
                    'kind' => $request->category_id,
                    'admin_reply' => $request->adminreply,
                    'datetime' => $today
                ]);
                //用户的消息记录+1
                $count = User::where('id', $id)->value('notification_count')+1;
                $update = User::find($id);
                $update->notification_count = $count;
                $update->save();
                //返回提交消息
                $fallback = route('users.show', Auth::user());
                return redirect()->intended($fallback)->with('success', '发送成功，现转至个人主页面！');;
            }
            //如果权限是普通用户，则阻拦。
            if($user_access == 0 ){
                return false;
            }
        }
	}

	public function destroy(Reply $reply)
	{
		// $this->authorize('destroy', $reply);
        // $reply->delete();
        // return redirect()->route('replies.index')->with('success', '删除成功！');
	}
}
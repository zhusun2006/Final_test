<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\User;
use App\Models\Admin;
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
		$username = $request->user_name;
        $comfirm = $request->comfirm;

        $user_id = User::where('name', $username)->value('id');
        $sender_name =  User::where('id', Auth::id())->value('name');

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

            if($user_id == Auth::id())
            {
                session()->flash('danger','不允许将申请发送给自身！');
                return view('users.apply', compact('user','admin_list'));
            }

            //如果权限是管理员级别的用户，则只能给同为管理员的人发送申请
            if($user_access == 1)
            {
                $tag = User::where('id', $user_id)->value('is_admin');
                if($tag == 0)
                {
                    session()->flash('warning','管理员只允许将申请提交给其他管理员或者部门管理！');
                    return view('users.apply', compact('user','admin_list'));
                }
                //将申请或者回复的记录保存至数据库
                try
                {
                    $reply->content = $request->content;
                    $reply->title = $request->title;
                    $reply->user_id = $user_id;
                    $reply->sender_id = $sender_name;
                    $reply->kind = $request->category_id;
                    $reply->admin_reply = $request->adminreply;
                    $reply->status = $comfirm;
                    if($file != null)
                    {
                        $reply->filename = $filename;
                        $reply->route = 'uploads/'.$today.'/'.$filename;
                    }
                    $reply->save();
                    if($file != null)
                    {
                        Storage::disk('upload')->put($today.'/'.$filename, file_get_contents($path));
                    }
                }catch (\Illuminate\Database\QueryException $ex) 
                {  
                    session()->flash('warning','申请失败，你的标题或者内容不合法，请重试！');
                    return view('users.apply', compact('user','admin_list')); 
                }  
                //获取保存记录的id
                $reply_id = Reply::where(['user_id' => $user_id, 'title' => $request->title, 'content' => $request->content])->value('id');
                //将申请或者回复提交至消息通知中
                $notice = Notification::create([
                    'reply_id' => $reply_id,
                    'sender' => $sender_name,
                    'achiever' => $user_id,
                    'title' => $request->title,
                    'content' => $request->content,
                    'kind' => $request->category_id,
                    'admin_reply' => $request->adminreply,
                    'datetime' => $today
                ]);
                //用户的消息记录+1
                $count = User::where('id', $user_id)->value('notification_count')+1;
                $update = User::find($user_id);
                $update->notification_count = $count;
                $update->save();
                //返回提交消息
                $fallback = route('users.show', Auth::user());
                return redirect()->intended($fallback)->with('success', '发送成功，现转至个人主页面！');;
            }
            //如果权限是普通用户，则只允许给管理员级别的用户发送申请。
            if($user_access == 0 )
            {
                $tag = User::where('id', $user_id)->value('is_admin');
                if($tag == 0)
                {
                    session()->flash('warning','用户只允许将申请提交给管理员或者部门管理！');
                    return view('users.apply', compact('user','admin_list'));
                }
                else
                {
                    $tag_department = User::where('id', $user_id)->value('department');
                    if($tag_department != $user_department)
                    {
                        session()->flash('warning','用户只允许将申请提交给本部门管理员或部门管理！');
                        return view('users.apply', compact('user','admin_list'));
                    }
                    else
                    {
                        try
                        {
                            $reply->content = $request->content;
                            $reply->title = $request->title;
                            $reply->user_id = $user_id;
                            $reply->sender_id = $sender_name;
                            $reply->kind = $request->category_id;
                            $reply->admin_reply = $request->adminreply;
                            $reply->status = $comfirm;
                            if($file != null)
                            {
                                $reply->filename = $filename;
                                $reply->route = 'uploads/'.$today.'/'.$filename;
                            }
                            $reply->save();
                            if($file != null)
                            {
                                Storage::disk('upload')->put($today.'/'.$filename, file_get_contents($path));
                            }
                        }catch (\Illuminate\Database\QueryException $ex) 
                        {  
                            session()->flash('warning','申请失败，你的标题或者内容不合法，请重试！');
                            return view('users.apply', compact('user','admin_list')); 
                        }  
                        //获取保存记录的id
                        $reply_id = Reply::where(['user_id' => $user_id, 'title' => $request->title, 'content' => $request->content])->value('id');
                        //将申请或者回复提交至消息通知中

                        $notice = Notification::create([
                            'reply_id' => $reply_id,
                            'sender' => $sender_name,
                            'achiever' => $user_id,
                            'title' => $request->title,
                            'content' => $request->content,
                            'kind' => $request->category_id,
                            'datetime' => $today
                        ]);
                        //用户的消息记录+1
                        $count = User::where('id', $user_id)->value('notification_count')+1;
                        $update = User::find($user_id);
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
        if($is_check == 1)
        {
            if($user_id == Auth::id()){
                session()->flash('danger','不允许将回复发送给自身！');
                return view('users.apply', compact('user','admin_list'));
            }

            $user_access = User::where('id', Auth::id())->value('is_admin');
            $user_department = User::where('id', Auth::id())->value('department');

            //如果权限是管理员级别的用户，则允许回复
            if($user_access == 1){
                //将申请或者回复的记录保存至数据库
                $reply_id = Reply::where('title' , $request->title)->value('id');
                $reply = Reply::find($reply_id);
                $reply->admin_reply = $request->adminreply;
                $reply->status = $comfirm;
                $reply->save();
                //获取保存记录的id
                //将回复提交至消息通知中
                $notice = Notification::create([
                    'reply_id' => $reply_id,
                    'sender' => $sender_name,
                    'achiever' => $user_id,
                    'title' => $request->title,
                    'content' => $request->content,
                    'kind' => $request->category_id,
                    'admin_reply' => $request->adminreply,
                    'datetime' => $today
                ]);
                //回复时删除原有的管理员消息提示
                try
                {
                    $notice_id = Notification::where('title', $request->title)->where('achiever', Auth::id())->value('id');
                    Notification::find($notice_id)->delete();
                }catch (\Illuminate\Database\QueryException $ex) 
                {  
                    $fallback = route('users.show', Auth::user());
                    return redirect()->intended($fallback)->with('warning','请勿重复操作！');
                }
                //用户的消息记录+1
                $count = User::where('id', $user_id)->value('notification_count')+1;
                $update = User::find($user_id);
                $update->notification_count = $count;
                $update->save();

                //返回提交消息
                $fallback = route('users.show', Auth::user());
                return redirect()->intended($fallback)->with('success', '回复成功，现转至个人主页面！');;
            }
            //如果权限是普通用户，则阻拦。
            if($user_access == 0 )
            {
                return back();
            }
        }
        if($is_check == 2 )
        //复审
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

            if($user_id == Auth::id()){
            session()->flash('danger','不允许将回复发送给自身！');
            return view('users.apply', compact('user','admin_list'));
            }

            //将申请或者回复的记录保存至数据库
            $reply_id = Reply::where('title' , $request->title)->value('id');
            $reply = Reply::find($reply_id);
            $reply->content = $request->content;
            $reply->title = $request->title;
            $reply->admin_reply = $request->adminreply;
            $reply->status = $comfirm;
            if($file != null)
            {
                $reply->filename = $filename;
                $reply->route = 'uploads/'.$today.'/'.$filename;
            }
            $reply->save();
            if($file != null)
            {
                Storage::disk('upload')->put($today.'/'.$filename, file_get_contents($path));
            }
            //获取保存记录的id
            //将回复提交至消息通知中
            $notice = Notification::create([
                'reply_id' => $reply_id,
                'sender' => $sender_name,
                'achiever' => $user_id,
                'title' => $request->title,
                'content' => $request->content,
                'kind' => $request->category_id,
                'admin_reply' => $request->adminreply,
                'datetime' => $today
            ]);
            try
            {
                $notice_id = Notification::where('title', $request->title)->where('achiever', Auth::id())->value('id');
                Notification::find($notice_id)->delete();
            }catch (\Illuminate\Database\QueryException $ex) 
            {  
                $fallback = route('users.show', Auth::user());
                return redirect()->intended($fallback)->with('warning','请勿重复操作！');
            }
            //用户的消息记录+1
            $count = User::where('id', $user_id)->value('notification_count')+1;
            $update = User::find($user_id);
            $update->notification_count = $count;
            $update->save();

            //返回提交消息
            $fallback = route('users.show', Auth::user());
            return redirect()->intended($fallback)->with('success', '回复成功，现转至个人主页面！');
        }
        //特权通告
        if($is_check == 99)
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

            if($user_id == Auth::id())
            {
                session()->flash('danger','不允许将通告发送给自身！');
                return view('users.apply', compact('user','admin_list'));
            }

            $user_access = User::where('id', Auth::id())->value('is_admin');
            $user_department = User::where('id', Auth::id())->value('department');
            

            //如果权限是管理员级别的用户，则允许给任何人发回复
            if($user_access == 1)
            {
                //将申请或者回复的记录保存至数据库             
                try
                {

                    $reply->content = $request->content;
                    $reply->title = $request->title;
                    $reply->user_id = $user_id;
                    $reply->sender_id = $sender_name;
                    $reply->kind = $request->category_id;
                    $reply->admin_reply = $request->adminreply;
                    $reply->status = $comfirm;
                    if($file != null)
                    {
                        $reply->filename = $filename;
                        $reply->route = 'uploads/'.$today.'/'.$filename;
                    }
                    $reply->save();
                    if($file != null)
                    {
                        Storage::disk('upload')->put($today.'/'.$filename, file_get_contents($path));
                    }
                }catch (\Illuminate\Database\QueryException $ex) 
                {  
                    session()->flash('warning','发送失败，发生未知错误，请重试！');
                    return view('users.adminnotice', compact('user')); 
                }  
                //获取保存记录的id
                $reply_id = Reply::where(['user_id' => $user_id, 'title' => $request->title, 'content' => $request->content])->value('id');
                //将申请或者回复提交至消息通知中
                $notice = Notification::create([
                    'reply_id' => $reply_id,
                    'sender' => $sender_name,
                    'achiever' => $user_id,
                    'title' => $request->title,
                    'content' => $request->content,
                    'kind' => $request->category_id,
                    'admin_reply' => $request->adminreply,
                    'datetime' => $today
                ]);
                //用户的消息记录+1
                $count = User::where('id', $user_id)->value('notification_count')+1;
                $update = User::find($user_id);
                $update->notification_count = $count;
                $update->save();
                //返回提交消息
                $fallback = route('users.show', Auth::user());
                return redirect()->intended($fallback)->with('success', '发送成功，现转至个人主页面！');
            }
            else
            {
                return back();
            }
        }
	}
 
	public function destroy(Request $request)
	{ 
        //这次通过url来获取id
        $url = $request->url();
        $array=explode('/', $url);
        //url固定规律获取最后/后的id
        $reply_id = $array[4];
        $notice_id = Notification::where('reply_id', $reply_id)->value('id');
        if(Notification::find($notice_id)->delete())
        {
            try
            {
                //通过reply表来获取发送对象的id
                $tag_id = Reply::where('id', $reply_id)->value('user_id');
                $count_res = User::where('id', $tag_id)->value('notification_count');
                $count = $count_res-1;
                $update = User::find($tag_id);
                //更新对象的消息数量
                $update->notification_count = $count;
                $update->save();
                Reply::find($reply_id)->delete();
            }catch(\Illuminate\Database\QueryException $ex)
            {   
                $user_name = User::where('id', Auth::id())->value('name');
                $replies = Reply::where('sender_id', $user_name)->paginate(10);
                session()->flash('warning', '发生未知错误！撤销失败。');
                return view('notifications.thread', compact('replies'));
            }
        }
        else
        {
            $user_name = User::where('id', Auth::id())->value('name');
            $replies = Reply::where('sender_id', $user_name)->paginate(10);
            session()->flash('warning', '发生未知错误！撤销失败。');
            return view('notifications.thread', compact('replies'));
        }
        $user_name = User::where('id', Auth::id())->value('name');
        $replies = Reply::where('sender_id', $user_name)->paginate(10);
        session()->flash('success', '成功撤销该申请！');
        return view('notifications.thread', compact('replies'));  
    }
}
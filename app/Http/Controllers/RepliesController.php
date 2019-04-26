<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\User;
use App\Models\Notifications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyRequest;
use Auth;

class RepliesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

	public function store(ReplyRequest $request, Reply $reply, User $user)
	{
		$today = date('Y-m-d');
		$id = $request->user_id;

		$reply->content = $request->content;
		$reply->antopic_id = $request->antopic_id;
        $reply->user_id = $request->user_id;
        $reply->save();

        $notice = Notifications::create([
            'name' => $request->name,
            'sender' => Auth::id(),
            'achiever' => $request->user_id,
            'content' => $request->content,
            'kind' => $request->category_id,
            'datetime' => $today
        ]);

        $count = User::where('id', $id)->value('notification_count')+1;
        $update = User::find($id);
        $update->notification_count = $count;
        $update->save();

        $fallback = route('users.show', Auth::user());
		return redirect()->intended($fallback)->with('success', '申请提交成功，现转至个人主页面！');;
	}

	public function destroy(Reply $reply)
	{
		// $this->authorize('destroy', $reply);
        // $reply->delete();
        // return redirect()->route('replies.index')->with('success', '评论删除成功！');
	}
}
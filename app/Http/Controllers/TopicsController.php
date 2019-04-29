<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Topic;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }   

	public function index(Request $request, Topic $topic)
	{
		$topics = $topic->withOrder($request->order)->paginate(10);
        return view('topics.index', compact('topics'));
	}

    public function show(Topic $topic, User $user)
    {
        return view('topics.show', compact('topic','user'));
    }

	public function create(Request $request, Topic $topic, User $user)
	{
		$admin = $request->input('is_admin');
		if($admin == 1){
			$this->authorize('create', $user);
			$categories = Category::all();
			return view('topics.create_and_edit', compact('topic', 'categories'));
		}
		else
		{
			session()->flash('warning','您不是部门管理员无法发布公告！');
			$topics = $topic->withOrder($request->order)->paginate(10);
        	return view('topics.index', compact('topics'));
		}
		
	}

	public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = Auth::id();
        $topic->save();
        return redirect()->route('topics.show', $topic->id)->with('success', '发布成功！');
    }

	public function edit(Topic $topic)
	{
        $this->authorize('update', $topic);
        $categories = Category::all();
		return view('topics.create_and_edit', compact('topic', 'categories'));
	}

	public function update(TopicRequest $request, Topic $topic)
	{
		$this->authorize('update', $topic);
		$topic->update($request->all());

		return redirect()->route('topics.show', $topic->id)->with('message', '更新公告成功！');
	}

	public function destroy(Topic $topic)
	{
		$this->authorize('destroy', $topic);
		$topic->delete();

		return redirect()->route('topics.index')->with('message', '删除公告成功！');
	}

}
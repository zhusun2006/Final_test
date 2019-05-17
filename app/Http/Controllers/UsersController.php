<?php
namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use Auth;

class UsersController extends Controller
{
    // public function create()
    // {
    //     return view('users.create');
    // }

    public function newuser()
    {
        return view('users.create');
    }

	public function show(User $user)
    {
    	$this->authorize('update', $user);
        return view('users.show', compact('user'));
    }

	public function apply(User $user)
    {
    	$this->authorize('update', $user);
    	$is_admin = $user->is_admin;
    	if($is_admin == 1)
    	{
    		$admin_list = Admin::all();
    	}
    	if($is_admin == 0)
    	{
    		$department = $user->department;
    		$admin_list = Admin::where('department', $department)->get();
    	}
        return view('users.apply', compact('user','admin_list'));
    }

    public function inform(User $user)
    {
    	$this->authorize('admin', $user);
        return view('users.adminnotice', compact('user'));
    }
	
	public function edit(User $user)
	{
		$this->authorize('update',$user);
		return view('users.edit', compact('user'));
	}
	
	public function index(User $user)
	{
		$users = User::paginate(10);
		return view('users.showall', compact('users'));
	}
	
	public function destroy(User $user)
	{
		$this->authorize('destroy',$user);
		$user->delete();
		session()->flash('success','删除用户成功！');
		return back();
	}
	
	public function update(User $user, UserRequest $request, ImageUploadHandler $uploader)
	{
		//根据check来决定更新的内容，1为用户普通更新，2和3为用户日程安排、备忘录更新，admin为管理员更新
		$check = $request->is_check;
		$this->validate($request,[
			'name' => 'nullable|unique:users|max:50',
			'email' => 'nullable|email|unique:users|max:255',		
		]);
		if($check == 1)
		{
			$this->authorize('update',$user);
			$data = [];
			//执行头像数据上传
	        if ($request->avatar) {
	            $result = $uploader->saveimage($request->avatar, 'avatars', $user->id);
	            if ($result) {
	                $data['avatar'] = $result['path'];
	            }
	        }
	        $data['tel'] = $request->tel;
	        //判断用户的密码是否需要更新
	        if ($request->password) {
	            $data['password'] = bcrypt($request->password);
	        }
	        $user->update($data);
			session()->flash('success','更新成功！');
			return redirect()->route('users.show',$user->id);
		}
		if($check == 2)
		{
			$this->authorize('update',$user);
			$data = [];
	        $data['arrangement'] = $request->content_arr;
	        $user->update($data);
	        session()->flash('success','日常安排更新成功！');
			return redirect()->route('users.show',$user->id);
		}
		if($check == 3)
		{
			$this->authorize('update',$user);
			$data = [];
	        $data['remember_thing'] = $request->remember_thing;
	        $user->update($data);
	        session()->flash('success','备忘录更新成功！');
			return redirect()->route('users.show',$user->id);
		}
		if($check == 'admin')
		{
			$this->authorize('check',$user);

			$data = [];
			//执行头像数据上传
	        if ($request->avatar) {
	            $result = $uploader->saveimage($request->avatar, 'avatars', $user->id);
	            if ($result) {
	                $data['avatar'] = $result['path'];
	            }
	        }
	        if ($request->name) {
	            $data['name'] = $request->name;
	        }
	        if ($request->name) {
	            $data['email'] = $request->email;
	        }
	        if ($request->tel) {
	            $data['tel'] = $request->tel;
	        }
	        if ($request->department) {
	            $data['department'] = $request->department;
	        }
	        if ($request->position) {
	            $data['position'] = $request->position;
	        }	        	        	       	     
	        //判断用户的密码是否需要更新
	        if ($request->password) {
	            $data['password'] = bcrypt($request->password);
	        }
	        $user->update($data);
			session()->flash('success','特权更新成功！');
			return back();
		}
	}

	public function store(Request $request)
	{
		$this->validate($request,[
			'name' => 'required|unique:users|max:50',
			'email' => 'required|email|unique:users|max:255',
			'password' => 'required|min:6',
			'department' => 'required',
			'position' => 'required',
			'tel' => 'required|min:11'			
		]);
		
		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password),
			'department' => $request->department,
			'position' => $request->position,
			'tel' => $request->tel,
			'is_admin' => 0,
		]);
		session()->flash('success','添加用户成功！');
		return back();
	}
	
	public function __construct()//过滤操作
	{
		$this->middleware('auth',[
			'except' => ['show','create','store','index']
		]);
		
		$this->middleware('guest',[
			'only' => ['create']
		]);
	}
	
}
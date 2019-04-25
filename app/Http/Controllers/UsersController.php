<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers;
use App\Models\User;
use App\Models\Thingkind;
use Auth;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }
	
	public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
	public function apply(User $user, Thingkind $kinder)
    {
    	$kind = Thingkind::all();
        return view('users.apply', compact('user', 'kind', 'kinder'));
    }
	
	public function edit(User $user)
	{
		$this->authorize('update',$user);
		return view('users.edit', compact('user'));
	}
	
	public function index()
	{
		$users = User::paginate(5);
		return view('users.ShowAll', compact('users'));
	}
	
	public function destroy(User $user)
	{
		$this->authorize('destroy',$user);
		$user->delete();
		session()->flash('success','删除用户成功！');
		return back();
	}
	
	public function update(User $user, Request $request)
	{
		$this->authorize('update',$user);
		$this->validate($request,[
			'name' => 'required|max:80',
			'password' => 'required|confirmed|min:6'
		]);
		
		$user->update([
			'name' => $request->name,
			'password' => bcrypt($request->password),
		]);
		
		session()->flash('success','更新成功！');
		
		return redirect()->route('users.show',$user->id);
	}
	
	public function store(Request $request)
	{
		$this->validate($request,[
			'name' => 'required|max:50',
			'email' => 'required|email|unique:users|max:255',
			'password' => 'required|confirmed|min:6'			
		]);
		
		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password),
		]);
		
		Auth::login($user);
		session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
		return redirect()->route('users.show', [$user]);
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
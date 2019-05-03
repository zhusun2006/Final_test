<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class SessionsController extends Controller
{
    //
	public function create()
	{
		return view('sessions.create');
	}
	
	public function destroy()
	{
		Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
	}
	
	public function store(Request $request)
	{	
		$credentials = $this->validate($request,[
			'email' => 'required | email | max:255',
			'password' => 'required'
		]);		
		
		$this->validate($request,[
            'captcha' => 'required|captcha'
        ], [
            'captcha.required' => '验证码不能为空',
            'captcha.captcha' => '请输入正确的验证码',
        ]);
		
		if(Auth::attempt($credentials,$request->has('remember'))){
			//登录成功
			session()->flash('success','登陆成功！');
			$fallback = route('users.show', Auth::user());
			return redirect()->intended($fallback);
		}else{
			//登录失败
			session()->flash('danger','登录失败！');
			return redirect()->back();
		}
	}

	
	public function __construct()
	{
		$this->middleware('guest',[
			'only' => ['create']
		]);
	}
}

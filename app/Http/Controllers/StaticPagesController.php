<?php
namespace App\Http\Controllers;

use Auth;
use App\Models\Topic;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;

class StaticPagesController extends Controller
{
     public function home()
    {
    	//检测当前用户session是否存在
    	if(Auth::check())
    	{
    		$user_id = Auth::id();
        	return redirect()->route('users.show',$user_id);
    	}
    	else
    	{
    		return view('sessions/create');
    	}
        
    }

    public function help()
    {
        return view('static_pages/help');
    }

    public function about()
    {
        return view('static_pages/about');
    }
}



















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
     public function home(Request $request, Topic $topic)
    {
        $topics = $topic->withOrder($request->order)->take(5)->get();
        return view('static_pages/home', compact('topics'));
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



















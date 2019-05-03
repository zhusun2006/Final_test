<?php
namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers;
use App\Models\User;
use Auth;

class AdminController extends Controller
{
	
	public function setadmin(User $user, Request $request)
	{
		$this->authorize('check',$user);
		$user_id_res = array_keys($request->all());
        $user_id = $user_id_res[0];
        $user = User::find($user_id);     
		return view('users.adminedit', compact('user'));
	}
	
}
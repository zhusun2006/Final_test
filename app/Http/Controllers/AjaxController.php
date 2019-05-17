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

class AjaxController extends Controller
{
	public function updaterem(UserRequest $request)
	{
		$content = $request->content;			
		$user = User::where('id', Auth::id())->update(['remember_thing' => $content]);
        return response()->json(array(
	        'status' => 1,
	        'msg' => 'ok',		                        	            
	    ));
    }

    public function updatearr(UserRequest $request)
	{
		$content = $request->content;			
		$user = User::where('id', Auth::id())->update(['arrangement' => $content]);
        return response()->json(array(
	        'status' => 1,
	        'msg' => 'ok',		                        	            
	    ));
    }

    public function getadmin(UserRequest $request)
	{
		$content = $request->content;
		if($content == "请假申请")
		{
			$admin_name = Admin::where('department', 'Human Resources')->value('name');
		}
		if($content == "报销申请")
		{
			$admin_name = Admin::where('department', 'Finance Department')->value('name');
		}
		if($content == "物资申请")
		{
			$admin_name = Admin::where('department', 'Product department')->value('name');
		}			
        return json_encode(array('msg'=>'success','data'=>$admin_name));
    }
}

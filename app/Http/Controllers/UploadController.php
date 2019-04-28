<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Upload;
use Auth;

class UploadController extends Controller
{
    //
	public function load(Request $request, User $user){
    	if ($request->isMethod('POST')) { //判断是否是POST上传
 
    		//在源生的php代码中是使用$_FILE来查看上传文件的属性
    		//但是在laravel里面有更好的封装好的方法，就是下面这个
    		//显示的属性更多
    		$fileCharater = $request->file('source');
    		// $content = $request->only(['content']);

			// if($fileCharater == "" || $content == "")
			// {
			// 	session()->flash('danger', '上传文件或者内容不得为空！');
			// 	return view('users.apply', compact('user'));
			// }
    		if ($fileCharater->isValid()) { //判断是否为空

				 $today = date('Y-m-d');
				//storage_path().'/app/uploads/' 这里根据 /config/filesystems.php 文件里面的配置而定
				//$dir = str_replace('\\','/',storage_path().'/app/uploads/'.$today);
				$dir = storage_path().'/app/upload/'.$today;
				if(!is_dir($dir)){
					mkdir($dir);
				}				
    			//获取文件的扩展名 
    			$ext = $fileCharater->getClientOriginalExtension();
 
    			//获取文件的绝对路径
    			$path = $fileCharater->getRealPath();

    			//定义文件名
    			$filename = date('Y-m-d-h-i-s').'.'.$ext;
    			$textname = date('Y-m-d-h-i-s').'.'.'txt';

    			//将文件内容上传至服务器
    			Storage::disk('upload')->put($today.'/'.$textname, $content);

    			$upload = new Upload();
    				$upload->title = $user->name;
    				$upload->user_id = $user->id;
    				$upload->content = $content['content'];
                    $upload->route = 'upload/'.$today.'/'.$textname;
    				$upload->datetime = $today;
    			$upload->save();
    			//存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
    			if(Storage::disk('upload')->put($today.'/'.$filename, file_get_contents($path)) )
				{
                    return true；	
				}else{
					return false；
				}
    		}else{
				return false；
			}
    	}

    }
}

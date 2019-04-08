<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
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
    		$content = $request->only(['content']);
			if($fileCharater == "" || $content == "")
			{
				session()->flash('danger', '上传文件或者内容不得为空！');
				return view('users.apply', compact('user'));
			}
    		if ($fileCharater->isValid()) { //括号里面的是必须加的哦
    			//如果括号里面的不加上的话，下面的方法也无法调用的
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
 
    			//存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
    			if(Storage::disk('upload')->put($today.'/'.$filename, file_get_contents($path)))
				{
					session()->flash('success', '上传成功！现将转至个人页面等待审核......');
					return redirect()->route('users.show', [$user]);
				}else{
					session()->flash('warning', '上传失败！请查看是否有违规内容.');
					return view('users.apply', compact('user'));
				}
    		}else{
				session()->flash('danger', '请选择上传的文件！');
				return view('users.apply', compact('user'));
			}
    	}

    }
}

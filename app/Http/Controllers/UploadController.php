<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Auth;

class UploadController extends Controller
{
    //管理文件下载
	public function download(Request $request){
        $re_file = array_keys($request->all());
        if($re_file != null)
        {
            $file = $re_file[0];
            //将文件名称中_替换成正常的.后缀
            $rel_file = str_replace("_",".",$file);
            //basename()函数返回路径中的文件名部分。
            $name = basename($rel_file);       
            return response()->download(public_path($rel_file), $name ,$headers = ['Content-Type'=>'application/zip;charset=utf-8']);	
        }
        else{
            session()->flash('warning','文件不存在或文件已经过期！');
            return back();
        }

    }
}

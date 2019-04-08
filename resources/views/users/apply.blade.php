@extends('layouts.default')
@section('title','提交审计')

@section('content')
<div class="offset-md-2 col-md-8">
  <div class="card ">
    <div class="card-header">
      <h5>提交审计</h5>
    </div>
      <div class="card-body">
		@include('shared._errors')	
        <div class="panel-heading">申请表</div>
			<form class="form-horizontal" method="POST" action="{{ route('application' ,Auth::user()) }}" enctype="multipart/form-data">
				{{ csrf_field() }} 
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			    <input type="text" name="user_id" value="{{ $user->id }}">
			    <div class="form-group">
			      <textarea class="form-control" rows="3" placeholder="请输入想提交的内容！" name="content"></textarea>
			    </div>			      			
				<label for="file">选择附加文件</label>
				<input id="file" type="file" class="form-control" name="source">				
				<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-share mr-1"></i> 提交</button>
			</form>
		</div>
	</div>
</div>
@stop
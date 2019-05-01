@extends('layouts.default')
@section('title','申请审批')

@section('content')

 <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">

        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            申请审批
          </h2>
          <hr>
            <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="is_check" value="0"/>
              @include('shared._errors')
              <div class="form-group">           
              	<input class="form-control" type="text" name="user_name" value="" placeholder="请输入提交者"/>
              	<br>
                <input class="form-control" type="text" name="title" value="" placeholder="请填入标题"/>
              </div>

              <div class="form-group">
                <select class="form-control" name="category_id" required>
                  <option value="" name="kind" hidden disabled selected>分类</option>
                  <option value="报销申请">报销申请</option>
	              <option value="请假申请">请假申请</option>
	              <option value="物资申请">物资申请</option>
                </select>
              </div>
              
              <div class="form-group">
                <textarea name="content" class="form-control" id="editor" rows="6" placeholder="请填入内容" required></textarea>
              </div>
      			  <div class="form-group">
      			    <label class="sr-only" for="inputfile">添加附件</label>
      			    <input type="file" id="file" name="file" required>
      			  </div>

              <div class="well well-sm">
                <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i>提交</button>          
              </div>
            </form>           
        </div>
      </div>
    </div>
  </div>

@endsection
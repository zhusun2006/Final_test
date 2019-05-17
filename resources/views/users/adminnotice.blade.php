@extends('layouts.default')
@section('title','个人私信')

@section('content')

 <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">
        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            个人私信
          </h2>
          <hr>
            <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="is_check" value="99"/>
              @include('shared._errors')
              <div class="form-group" > 
                <label class="input-group-addon" style="font-size: 17px;">接收用户：</label>
                <input class="form-control" type="text" name="title" value="" style="display: inline;width:85.5%;" placeholder="请填入申请标题"/>
              </div>

              <div class="form-group" > 
                <label class="input-group-addon" style="font-size: 17px;">申请标题：</label>
                <input class="form-control" type="text" name="title" value="" style="display: inline;width:85.5%;" placeholder="请填入申请标题"/>
              </div>

              <div class="form-group">
                <label class="input-group-addon" style="font-size: 17px;">申请类型：</label>
                <select class="form-control" name="category_id" style="display: inline;width:85.5%;" required>
                  <option value="" name="kind" hidden disabled selected>下拉显示分类</option>
                  <option value="部门个人事务通告">部门个人事务通告</option>
                </select>
              </div>
              
              <div class="form-group">
                <textarea name="content" class="form-control" id="editor" rows="15" style="width:99.5%;" placeholder="请填入内容" required></textarea>
              </div>
      			  <div class="form-group">
      			    <label class="sr-only" for="inputfile">添加附件</label>
      			    <input type="file" id="file" name="file" >
      			  </div>

              <div class="well well-sm">
                <button type="submit" name="comfirm" value="私人消息" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i>发送</button>          
              </div>
            </form>           
        </div>
      </div>
    </div>
  </div>

@endsection
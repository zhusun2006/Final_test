@extends('layouts.default')
@section('title','事务申请')

@section('content')

 <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">
        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            事物申请
          </h2>
          <hr>
            <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="is_check" value="2"/>
              @include('shared._errors')
              
                <div class="form-group">           
                  <label class="input-group-addon" style="font-size: 17px;">接收用户：</label>
                  <select class="form-control" name="user_name" required style="display: inline;width:85%;">
                    <option value="" hidden disabled selected>下拉显示部门管理员</option>
                    @foreach ($admin_list as $value)
                        <option value="{{ $value->name }}">
                          {{ $value->name }}
                        </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                <label class="input-group-addon" style="font-size: 17px;">申请标题：</label>
                <input class="form-control" type="text" name="title" style="display: inline;width:85%;" value="{{ $reply[0]->title }} " />
                </div>

                <div class="form-group">
                <label class="input-group-addon" style="font-size: 17px;">申请种类：</label>
                <input class="form-control" type="hidden" name="category_id" value="{{ $reply[0]->kind }}" />
                <input class="form-control" type="text" name="category_id"  style="display: inline;width:85%;" value="{{ $reply[0]->kind }} " disabled/>
                </div>

              <div class="form-group">
                <label style="font-size: 17px;">申请内容：</label>
                <textarea name="content" class="form-control" id="editor" rows="6" style="width:98.5%;" required >{{ $reply[0]->content }}</textarea>
              </div>

              <div class="form-group">
                <label class="sr-only" for="inputfile">添加附件</label>
                <input type="file" id="file" name="file" >
              </div>

              <div class="well well-sm">
                <div class="form-group">
                  <label style="font-size: 17px;">部门管理的意见：</label>
                  <textarea name="adminreply" class="form-control" id="editor" rows="6" style="width:98.5%;" disabled>{{ $reply[0]->admin_reply }}</textarea>
                </div>        
              </div>

              <div class="well well-sm">
                <button type="submit" name="comfirm" value="待审核" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i>提交</button>          
              </div>

            </form>           
        </div>
      </div>
    </div>
  </div>
@endsection
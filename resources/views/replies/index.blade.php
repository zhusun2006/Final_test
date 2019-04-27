@extends('layouts.default')
@section('title','核查审计')

@section('content')

 <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">
        @include('shared._messages')
        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            核查审计
          </h2>
          <hr>
            <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              @include('shared._errors')
              <div class="form-group">
                <label for="name">申请者：</label>
                <input class="form-control" type="text" name="user_id" value="{{ $reply[0]->sender_id }} " disabled/>
                <br>
                <label for="name">标题：</label>
                <input class="form-control" type="text" name="title" value="{{ $reply[0]->title }} " disabled/>
                <br>
                <label for="name">申请种类：</label>
                <input class="form-control" type="text" name="category_id" value="{{ $reply[0]->kind }} " disabled/>
              </div>

              <div class="form-group">
                <label for="name">申请内容：</label>
                <textarea name="content" class="form-control" id="editor" rows="6" required disabled>{{ $reply[0]->content }}</textarea>
              </div>
             <!--  <label for="file">附加文件</label>
                <input id="file" type="file" class="form-control" name="source">
             <br> -->
              <div class="well well-sm">
                <div class="form-group">
                  <label for="name">我的意见：</label>
                  <textarea name="adminreply" class="form-control" id="editor" rows="6" placeholder="请输入您的意见" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i>回复</button>          
              </div>
            </form>           
        </div>
      </div>
    </div>
  </div>

@endsection
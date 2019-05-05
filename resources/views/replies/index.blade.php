@extends('layouts.default')
@section('title','核查审批')

@section('content')

 <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">
        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            核查审批
          </h2>
          <hr>
            <a class="btn btn-link" href="{{ route('notice') }}"><-返回</a>
            <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="is_check" value="1"/>
              @include('shared._errors')
              <div class="form-group">
                <label for="name">申请者：</label>
                <input class="form-control" type="hidden" name="user_name" value="{{ $reply[0]->sender_id }}" />
                <input class="form-control" type="text" name="user_name" value="{{ $reply[0]->sender_id }} " disabled/>
                <br>
                <label for="name">标题：</label>
                <input class="form-control" type="hidden" name="title" value="{{ $reply[0]->title }}" />
                <input class="form-control" type="text" name="title" value="{{ $reply[0]->title }} " disabled/>
                <br>
                <label for="name">申请种类：</label>
                <input class="form-control" type="hidden" name="category_id" value="{{ $reply[0]->kind }}" />
                <input class="form-control" type="text" name="category_id" value="{{ $reply[0]->kind }} " disabled/>
              </div>

              <div class="form-group">
                <label for="name">申请内容：</label>
                <textarea name="content" class="form-control" id="editor" rows="6" required  style="display: none;">{{ $reply[0]->content }}</textarea>
                <textarea name="content" class="form-control" id="editor" rows="6" required disabled>{{ $reply[0]->content }}</textarea>
              </div>

              <div class="form-group">
                @if( $reply[0]->filename == null)
                  <label for="name">附件：没有可下载的附件</label>
                @else
                  <label for="name">附件下载：{{ $reply[0]->filename }}</label>
                  <a href="{{ route('download', $reply[0]->route) }}">下载</a>
                @endif
              </div>

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
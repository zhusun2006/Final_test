@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1><span class="glyphicon glyphicon-file"></span>浏览公告</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('topics.index') }}"><-返回</a>
            </div>
            @can('edit', $user)
            <div class="col-md-6">
              <a class="btn btn-sm btn-primary float-right mt-1" href="{{ route('topics.edit', $topic->id) }}">
                编辑
              </a>
            </div>
            @endcan
          </div>
        </div>
        <br>

        <div style="font-size: 32px; text-align: center;">
        	{{ $topic->title }}
        </div> 
        <hr>
        <div style="min-height: 525px;font-size: 19px;">
        	{{ $topic->body }}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

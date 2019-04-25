@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>浏览公告</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('topics.index') }}"><- 返回</a>
            </div>
            @can('edit', $user)
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('topics.edit', $topic->id) }}">
                Edit
              </a>
            </div>
            @endcan
          </div>
        </div>
        <br>

        <label>标题</label>
        <p>
        	{{ $topic->title }}
        </p> <label>内容</label>
        <p>
        	{{ $topic->body }}
        
      </div>
    </div>
  </div>
</div>

@endsection

@extends('layouts.app')

@section('title', isset($category) ? $category->name : '面板')

@section('content')

      <!-- Left Side Of Navbar -->
      @include('shared._messages')
    <nav class="navbar navbar-expand-sm bg-light">
      <ul class="navbar-nav">
        <li class="nav-item {{ active_class(if_route('topics.index')) }}"><a class="nav-link" href="{{ route('topics.index') }}">首页</a></li>
        <li class="nav-item {{ category_nav_active(1) }}"><a class="nav-link" href="{{ route('categories.show', 1) }}">任职公示</a></li>
        <li class="nav-item {{ category_nav_active(2) }}"><a class="nav-link" href="{{ route('categories.show', 2) }}">节假公告</a></li>
        <li class="nav-item {{ category_nav_active(3) }}"><a class="nav-link" href="{{ route('categories.show', 3) }}">事件进程</a></li>
        <li class="nav-item {{ category_nav_active(4) }}"><a class="nav-link" href="{{ route('categories.show', 4) }}">公告</a></li>
      </ul>
    </nav>


<div class="row mb-5">
  <div class="col-lg-9 col-md-9 topic-list">
    @if (isset($category))
      <div class="alert alert-info" role="alert">
        {{ $category->name }} ：{{ $category->description }}
      </div>
    @endif
    <div class="card ">

     <div class="card-header bg-transparent">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link {{ active_class( ! if_query('order', 'recent')) }}" href="{{ Request::url() }}?order=default">
              最多浏览
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ active_class(if_query('order', 'recent')) }}" href="{{ Request::url() }}?order=recent">
              最新发布
            </a>
          </li>
        </ul>
      </div>

      <div class="card-body">
        {{-- 话题列表 --}}
        @include('topics._topic_list', ['topics' => $topics])
        {{-- 分页 --}}
        <div class="mt-5">
          {!! $topics->appends(Request::except('page'))->render() !!}
        </div>
      </div>

    </div>

  </div>

  <div class="col-lg-3 col-md-3 sidebar">
    @include('topics._sidebar')
  </div>
</div>

@endsection

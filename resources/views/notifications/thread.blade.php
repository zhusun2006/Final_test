@extends('layouts.default')

@section('title', '我的申请')

@section('content')
  <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">

        <div class="card-body">

          <h3 class="text-xs-center">
            <i class="far fa-bell" aria-hidden="true"></i>我的申请
          </h3>
          <hr>

           @if ($replies->count())
            <div class="list-unstyled notification-list">
              @foreach ($replies as $reply)
                @include('notifications._detail', ['replies' => $replies])      
              @endforeach
              <br/>
              {!! $replies->render() !!}
            </div>

          @else
            <div class="empty-block">尚无申请消息！</div>
          @endif

        </div>
      </div>
    </div>
  </div>
@stop
@extends('layouts.default')

@section('title', '消息通知')

@section('content')
  <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">

        <div class="card-body">

          <h3 class="text-xs-center">
            <i class="far fa-bell" aria-hidden="true"></i>消息通知
          </h3>
          <hr>

           @if ($notifications->count())
            <div class="list-unstyled notification-list">
              @foreach ($notifications as $notification)
                @include('notifications._replied', ['notifications' => $notifications])      
              @endforeach
              <br/>
              {!! $notifications->render() !!}
            </div>

          @else
            <div class="empty-block">没有消息通知！</div>
          @endif

        </div>
      </div>
    </div>
  </div>
@stop
@extends('layouts.default')
@section('title','用户查阅')

@section('content')
<div class="offset-md-2 col-md-8">
  <h2 class="mb-4 text-center">站点用户</h2>
  <div class="list-group list-group-flush">
    @foreach ($users as $user)
      @if(Auth::user()->is_admin == 0)
        <div class="list-group-item">
        <img class="mr-3" src="{{ $user->avatar }}" alt="{{ $user->name }}" width=32>
        <span>
          {{ $user->name }}
        </span>
      @else
        @if(Auth::user()->id == $user->id)
          <div class="list-group-item">
          <img class="mr-3" src="{{ $user->avatar }}" alt="{{ $user->name }}" width=32>
          <span>
            {{ $user->name }}
          </span>
        @else
        <div class="list-group-item">
        <img class="mr-3" src="{{ $user->avatar }}" alt="{{ $user->name }}" width=32>
        <a href="{{ route('adminset', $user->id) }}">
            {{ $user->name }}
        </a>
        @endif
      @endif
		@can('destroy', $user)
			<form action="{{ route('users.destroy', $user->id) }}" method="post" class="float-right" onsubmit="return confirm('您确定要删除该用户吗？');">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
				<button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
			</form>
		@endcan
      </div>
    @endforeach
      </div>
  
    <div class="mt-3">
  	{!! $users->render() !!}
    </div>
  </div>
</div>
@stop
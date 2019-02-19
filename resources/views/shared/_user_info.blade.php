<a href=""{{ route('users.show',$user->id)}}>
	<center><img src="{{ $user->gravatar('140')}}" alt="{{$user->name}}" class="gravatar" /></center>
 </a>
 <h1>{{$user->name}}</h1>
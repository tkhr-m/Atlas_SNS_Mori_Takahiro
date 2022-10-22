@extends('layouts.login')

@section('content')
<div>
  <form action = '/search' method = 'post'>
    @csrf
    <input type = 'text' name = 'search' placeholder = 'ユーザー名' required>
    <input type = 'submit' value = '検索'>
  </form>
</div>
<div>
  @foreach($other_users as $another_user)
  <div>
    <p><img src="images/{{$another_user->image}}">{{$another_user->username}}</p>
  </div>
  @endforeach
</div>



@endsection

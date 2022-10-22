@extends('layouts.login')

@section('content')
<div>
  <form action = '/search' method = 'post'>
    @csrf
    <input type = 'text' name = 'search' placeholder = 'ユーザー名' required>
    <input type = 'image' src = 'images/post.png'>
  </form>
  <p>検索ワード：{{$search_word}}</p>
</div>


<div>
  @foreach($search_users as $search_user)
   <div>
   <p> <img src='images/{{$search_user->image}}'>{{$search_user->username}}</p>

   </div>
  @endforeach
</div>


@endsection

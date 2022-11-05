@extends('layouts.login')

@section('content')
<div class = 'search_block'>
  <form action = '/search' method = 'post'>
    @csrf
    <input type = 'text' name = 'search' placeholder = 'ユーザー名' required>
    <button type = 'submit'><i class="fa-solid fa-magnifying-glass" style = 'color:#fff'></i></button>
  </form>
  <p>検索ワード：{{$search_word}}</p>
</div>


<div>
  <ul>
  @foreach($search_users as $search_user)
    <li class = 'user_block'>
     <figure>
      <img class = 'user_icon' src='{{$search_user->image}}' alt = 'ユーザーアイコン'>
    </figure>
    <div class = 'user_content'>
      <p>{{$search_user->username}}</p>
      <div class ='follow_btn'>
        @if(Auth::user()->isFollowing($search_user->id))
        <form  action = '/search/unfollow' method = 'post'>
          @csrf
          <input type = 'hidden' name = 'followed_id' value = '{{$search_user->id}}'>
          <button type = 'submit' class = 'btn btn-danger btn-sm'>フォロー解除</button>
        </form>
        @else
        <form action = '/search/follow' method = 'post'>
          @csrf
          <input type = 'hidden' name = 'followed_id' value = '{{$search_user->id}}'>
          <button type = 'submit' class = 'btn btn-info btn-sm'>フォローする</button>
        </form>
        @endif
      </div>
    </div>
    </li>
  @endforeach
  </ul>
</div>


@endsection

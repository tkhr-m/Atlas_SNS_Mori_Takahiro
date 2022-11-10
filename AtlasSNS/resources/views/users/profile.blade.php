@extends('layouts.login')

@section('content')
<div class = 'profile_block'>
  <figure>
    <img class = 'user_icon' src = '{{$user_profile->image}}' alt = 'ユーザーアイコン'>
  </figure>
  <div class = 'profile_content'>
    <div class = 'item_name'>
      <p>name</p>
      <p>{{$user_profile->username}}</p>
    </div>
    <div class = 'item_bio'>
      <p>bio</p>
      <p>{{$user_profile->bio}}</p>
    </div>
  </div>
  <div class = 'profile_follow_btn'>
    @if(Auth::user()->isFollowing($user_profile->id))
    <form action = '/profile' method = 'post'>
      @csrf
      <input type = 'hidden' name = 'followed_id' value = '{{$user_profile->id}}'>
      <button type = 'submit' class = 'btn btn-danger btn-sm'>フォロー解除</button>
    </form>
    @else
    <form action = '/profile' method = 'post'>
      @csrf
      <input type = 'hidden' name = 'followed_id' value = '{{$user_profile->id}}'>
      <button type = 'submit' class = 'btn btn-info btn-sm'>フォローする</button>
    </form>
    @endif
  </div>
</div>

<div>
  <ul>
    @foreach($user_post as $post)
    <li class = "posted_block">
      <figure>
        <img class = 'user_icon' src = '{{$user_profile->image}}' alt = 'ユーザーアイコン'>
      </figure>
      <div class = "posted_content">
        <div class = 'posted_item'>
          <p>{{$user_profile->username}}</p>
          <p class = "posted_date">{{$post->updated_at}}</p>
        </div>
        <div>{{$post->post}}</div>
      </div>
    </li>
    @endforeach
  </ul>
</div>

@endsection

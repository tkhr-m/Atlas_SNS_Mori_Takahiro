@extends('layouts.login')

@section('content')
<div class = 'icon_block'>
  <div class = 'icon_content'>
    <p>Follower List</p>
    <div class = 'list_icon'>
      @foreach($followers as $follower)
      <figure>
        <form action = '/profile' method = 'post'>
          @csrf
          <input type = 'hidden' name = 'profile_id' value = '{{$follower->id}}'>
          <input type = 'image' src = '{{$follower->image}}'>
        </form>
      </figure>
      @endforeach
    </div>
  </div>
</div>

<div>
  <ul>
    @foreach($follower_posts as $follower_post)
    <li class = 'post_block'>
      <figure>
        <form action = '/profile', method = 'post'>
          @csrf
          <input type = 'hidden' name = 'profile_id' value = '{{$follower_post->user->id}}'>
          <input type = 'image' src = '{{$follower_post->user->image}}'>
        </form>
      </figure>
      <div class = 'post_content'>
        <div>
          <p>{{$follower_post->user->username}}</p>
          <p class = "posted_date">{{$follower_post->updated_at}}</p>
        </div>
        <div>{{$follower_post->post}}</div>
      </div>
  </li>
  @endforeach
</ul>
</div>


@endsection

@extends('layouts.login')

@section('content')

<div class = 'icon_block'>
  <div class = 'icon_content'>
    <p>Follow List</p>
    <div class = 'list_icon'>
      @foreach($followees as $followee)
      <figure>
        <form action = '/profile' method = 'post'>
          @csrf
          <input type = 'hidden' name = 'profile_id' value = '{{$followee->id}}'>
          <input type = 'image' src = '{{$followee->image}}'>
        </form>
      </figure>
      @endforeach
    </div>
  </div>
</div>
<div>
  <ul>
    @foreach($followee_posts as $followee_post)
    <li class = 'post_block'>
      <figure>
        <form action = '/profile' method = 'post'>
          @csrf
          <input type = 'hidden' name = 'profile_id' value = '{{$followee_post->user->id}}'>
          <input type ='image' src = '{{$followee_post->user->image}}'>
        </form>
      </figure>
      <div class = 'post_content'>
        <div>
          <p>{{$followee_post->user->username}}</p>
          <p class = "posted_date">{{$followee_post->updated_at}}</p>
        </div>
        <div>{{$followee_post->post}}</div>
      </div>
    </li>
    @endforeach
  </ul>
</div>



@endsection

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
  @foreach($other_users as $other_user)
  <div>
    <figure><img src="images/{{$other_user->image}}"></figure>
    <div>
      <p>{{$other_user->username}}</p>
      <div>

        @if(Auth::user()->isFollowing($other_user->id))
        <form action = '/search/unfollow' method = 'post'>
          @csrf
          <input type = 'hidden' name = 'followed_id' value = '{{$other_user->id}}'>
          <button type="submit" class="btn btn-danger">フォロー解除</button>
        </form>
        @else
        <form action = '/search/follow' method = 'post'>
          @csrf
          <input type = 'hidden' name = 'followed_id' value = '{{$other_user->id}}'>
          <button type="submit" class="btn btn-primary">フォローする</button>
        </form>
        @endif

      </div>
    </div>
  </div>
  @endforeach
</div>



@endsection

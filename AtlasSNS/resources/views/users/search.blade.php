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
        @if(count($user->follow->following_id)>=1)
        <button type="button" class="btn btn-primary">フォロー解除</button>
        @else
        <button type="button" class="btn btn-danger">フォローする</button>
        @endif
      </div>
    </div>
  </div>
  @endforeach
</?div>



@endsection

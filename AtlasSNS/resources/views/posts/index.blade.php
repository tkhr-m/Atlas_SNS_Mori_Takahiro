@extends('layouts.login')

@section('content')

{{-- 投稿 --}}
<div>
<form action = '/index/store' method = 'post'>
  @csrf
  <input type = 'text' name = 'tweet' maxlength = '150' placeholder = '投稿内容を入力して下さい。' required>
  <input type = 'image' src = 'images/post.png' width = '70px' height = '70px'>
</form>
</div>

{{-- 投稿一覧（ユーザー）　--}}
@foreach($posts as $post)
<div>
  <p>{{$post->user->username}}</p>
  <p>{{$post->post}}</p>

 {{-- 編集 --}}
  <div>
    <div class = 'overlay' id ='js-overlay'></div>
    <div class = 'modal' id = 'js-modal'>
      <form action = '/store' method = 'post'>
        @csrf
        <input type = 'text' value ='{{$post->post}}' maxlength ='150'>
        <input type = 'image' src = 'images/edit.png' width = '30px' height = '30px'>
      </form>
    </div>
  </div>
  <button class = 'modal-open' id = 'js-open'><img class = 'edit' src = 'images/edit.png'></button>

 {{-- 削除 --}}
  <form action = '/index/delete' method = 'post'>
    @csrf
    <input type = 'hidden' name = 'id' value = '{{$post->id}}'>
    <input type = 'image' src = 'images/trash.png' width = '30px' height = '30px' onclick = 'return confirm("削除してよろしいですか？")'>
  </form>
</div>
@endforeach


@endsection

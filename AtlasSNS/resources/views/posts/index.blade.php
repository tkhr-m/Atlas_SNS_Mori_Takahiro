@extends('layouts.login')

@section('content')

{{-- 投稿 --}}
<div class ="posting_block">
  <div>
    <figure><img src = "images/{{$user->image}}"></figure>
    <form action = '/index/store' method = 'post'>
      @csrf
      <textarea type = 'text' name = 'tweet' maxlength = '150' placeholder = '投稿内容を入力して下さい。' required></textarea>
      <input type = 'image' src = 'images/post.png' width = '70px' height = '70px'>
    </form>
  </div>
</div>

{{-- 投稿一覧（ユーザー）　--}}

<div>
  <ul>
    @foreach($user->posts as $post)
    <li class = "posted_block">
      <figure><img src = "images/{{$user->image}}"></figure>
      <div class = "posted_content">
        <div>
          <p class = "posted_name">{{$user->username}}</p>
          <p>{{$post->updated_at}}</p>
        </div>
        <div>{{$post->post}}</div>
      </div>
      <div>
        <a href = "#" class = 'modal_open' id = 'js_open' data-post = '{{$post->post}}' data-id = '{{$post->id}}'>
          <img class = 'edit' src = 'images/edit.png'>
        </a>

        <form action = '/index/delete' method = 'post'>
          @csrf
          <input type = 'hidden' name = 'post_id' value = '{{$post->id}}'>
          <input type = 'image' src = 'images/trash.png' width = '30px' height = '30px' onclick = 'return confirm("削除してよろしいですか？")'>
        </form>
      </div>
    </li>
    @endforeach
  </ul>
</div>

<div class = 'overlay' id ='js_overlay'></div>
<div class = 'modal' id = 'js_modal'>

    <form action = '/index/update' method = 'post'>
      @csrf
      <textarea name = 'modal_post' class = 'modal_post' maxlength ='150'></textarea>
      <input type = 'hidden' name = 'modal_id' class = 'modal_id' value = ''>
      <input class = 'edit_submit' type = 'image' src = 'images/edit.png' width = '30px' height = '30px'>
    </form>

</div>



@endsection

@extends('layouts.login')

@section('content')

{{-- 投稿 --}}
<div class ="posting_block">
  <figure><img class = 'user_icon' src = "{{asset(Auth::user()->image)}}"></figure>
  <form action = '/index/store' method = 'post'>
    @csrf
    <div class = 'input_area'>
      <textarea type = 'text' name = 'tweet' maxlength = '150' placeholder = '投稿内容を入力して下さい。' required></textarea>
      <div>
        <input type = 'image' src = 'images/post.png' width = '90px' height = '90px'>
      </div>
    </div>
  </form>
</div>

{{-- 投稿一覧（ユーザー）　--}}

<div>
  <ul>
    @foreach($posts as $post)
    <li class = "posted_block">
      <figure>
        <img class = 'user_icon' src = "{{$post->user->image}}" alt = 'ユーザーアイコン'>
      </figure>
      <div class = "posted_content">
        <div class = "posted_item">
          <p>{{$post->user->username}}</p>
          <p class = 'posted_date'>{{$post->updated_at}}</p>
        </div>
        <div>{{$post->post}}</div>
        @if($post->user->id === Auth::id())
        <div class = 'posted_edit'>
          <a href = "#" class = 'modal_open' id = 'jsOpen' data-post = '{{$post->post}}' data-id = '{{$post->id}}'>
            <img class = 'edit' src = 'images/edit.png' alt = '編集ボタン'>
          </a>

          <form action = '/index/delete' method = 'post'>
            @csrf
            <input type = 'hidden' name = 'post_id' value = '{{$post->id}}'>
            <input type = 'image' src = 'images/trash.png' width = '30px' height =   '30px' onclick = 'return confirm("削除してよろしいですか？")'>
          </form>
        </div>
      </div>
      @endif
    </li>
    @endforeach
  </ul>
</div>

<div class = 'overlay' id ='jsOverlay'></div>
<div class = 'modal' id = 'jsModal'>

    <form action = '/index/update' method = 'post'>
      @csrf
      <textarea name = 'modal_post' class = 'modal_post' maxlength ='150'></textarea>
      <input type = 'hidden' name = 'modal_id' class = 'modal_id' value = ''>
      <input class = 'edit_submit' id = 'jsClose' type = 'image' src = 'images/edit.png' width = '30px' height = '30px'>
    </form>

</div>



@endsection

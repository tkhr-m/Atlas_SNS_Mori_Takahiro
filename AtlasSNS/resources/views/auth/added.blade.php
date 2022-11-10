@extends('layouts.logout')

@section('content')

<div id="clear">
  <p>{{$session_name}}さん</p>
  <p>ようこそ!AtlasSNSへ</p>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう!</p>

  <button class="btn btn-danger" onclick = "location.href = '/login'">ログイン画面へ</button>
</div>

@endsection

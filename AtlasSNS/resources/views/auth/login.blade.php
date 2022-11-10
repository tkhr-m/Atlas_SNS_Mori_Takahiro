@extends('layouts.logout')

@section('content')
<div class = "login_wrap">
<div class = 'login_form'>
<form action = '/login' method = 'post'>
@csrf

<p>AtlasSNSへようこそ</p>
@error('mail')
<p>{{$message}}</p>
@enderror
<label for = 'email'><p>mail address</p></label>
<input type = 'text' name = 'mail' id = 'email' value = ''>
@error('password')
<p>{{$message}}</p>
@enderror
<label for = 'pass'><p>password</p></label>
<input type = 'password' name = 'password' id = 'pass' value = ''>
<button class = 'btn btn-danger' type = 'submit'>LOGIN</button>


</form>
</div>

<p><a href="/register">新規ユーザーの方はこちら</a></p>
</div>





@endsection

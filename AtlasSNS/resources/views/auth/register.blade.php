@extends('layouts.logout')

@section('content')

<div class = "register_wrap">
    <div class = 'register_form'>
        <form action = '/register' method = 'post'>
            @csrf

            <p>新規ユーザー登録</p>


            <label for = 'name'><p>user name</p></label>
            @error('username')
            <span id = 'errorMessage'>{{$message}}</span>
            @enderror
            <input type = 'text' name = 'username' id = 'name' value = ''>

            <label for = 'email'><p>mail address</p></label>
            @error('mail')
            <span id = 'errorMessage'>{{$message}}</span>
            @enderror
            <input type = 'text' name = 'mail' id = 'email' value = ''>

            <label for = 'pass'><p>password</p></label>
            @error('password')
            <span id = 'errorMessage'>{{$message}}</span>
            @enderror
            <input type = 'password' name = 'password' id = 'pass' value = ''>

            <label for = 'confirm'><p>password confirm</p></label>
             @error('password_confirmation')
            <span id = 'errorMessage'>{{$message}}</span>
            @enderror
            <input type = 'password' name = 'password_confirmation' id = 'confirmation' value = ''>
            <button class = 'btn btn-danger' type = 'submit'>REGISTER</button>
        </form>
    </div>
        <p class = 'back_to_login'><a href="/login">ログイン画面に戻る</a></p>
</div>


@endsection

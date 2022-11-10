@extends('layouts.login')

@section('content')
<div class = 'edit_block'>
  <figure>
    <img src = '{{Auth::user()->image}}' alt = 'ユーザーアイコン'>
  </figure>
  <div class = 'edit_form'>
    <form action = '/profile/update' method = 'post' enctype = 'multipart/form-data'>
      @csrf
      <input type = 'hidden' name = 'profile_id' value = '{{Auth::id()}}'>
       @error('profile_name')
            <span id = 'errorMessage'>{{$message}}</span>
        @enderror
      <div class = 'form_item'>
        <p><label for = 'name'>user name</label></p>
        <input type = 'text' name = 'profile_name' id = 'name' value = '{{Auth::user()->username}}'>
      </div>
       @error('profile_mail')
            <span id = 'errorMessage'>{{$message}}</span>
        @enderror
      <div class = 'form_item'>
        <p><label for = 'mail'>mail address</label></p>
        <input type = 'mail' name = 'profile_mail' id = 'mail' value = '{{Auth::user()->mail}}'d>
      </div>
       @error('profile_password')
            <span id = 'errorMessage'>{{$message}}</span>
        @enderror
      <div class = 'form_item'>
        <p><label for = 'pass'>password</label></p>
        <input type = 'password' name = 'profile_password' id = 'pass' value = '' >
      </div>

      <div class = 'form_item'>
        <p><label for = 'confirm'>password confirm</label></p>
        <input type = 'password' name = 'profile_password_confirmation' id = 'confirm' value = ''>
      </div>
       @error('profile_bio')
            <span id = 'errorMessage'>{{$message}}</span>
        @enderror
      <div class = 'form_item'>
        <p><label for = 'bio'>bio</label></p>
        <input type = 'text' name = 'profile_bio' id = 'bio' value = '{{Auth::user()->bio}}'>
      </div>
       @error('profile_image')
            <span id = 'errorMessage'>{{$message}}</span>
        @enderror
      <div class = 'form_item image_form'>
        <p><label for = 'image'>icon image</label></p>
        <label for = 'image'>
          <input type = 'file' name = 'profile_image' id = 'image' accept = 'image/*,.jpg,.png,.bmp,.gif,.svg'>
          <span>ファイルを選択</span>
        </label>
      </div>
      <div class = 'form_item'>
        <button type = 'submit' class = 'btn btn-danger'>更新</button>
      </div>
    </form>
  </div>
</div>






@endsection

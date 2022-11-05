<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <script src="https://kit.fontawesome.com/3942e1fb32.js" crossorigin="anonymous"></script>
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="" sizes="16x16" type="image/png" />
    <link rel="icon" href="" sizes="32x32" type="image/png" />
    <link rel="icon" href="" sizes="48x48" type="image/png" />
    <link rel="icon" href="" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
  <div class = 'header'>
    <figure class = 'page_icon'><a href = '/index'><img src="images/atlas.png"></a></figure>
    <div class ="header_content">
      <div class = "content_block">
        <div class = 'name_block'>
          <p class = "user_name">{{Auth::user()->username}}さん</p>
        </div>
        <div>
          <div class = 'arrow_block'>
            <span class = 'accordion_arrow'></span>
          </div>
          <figure class = 'image_block'>
            <img class = 'user_icon' src="{{Auth::user()->image}}">
          </figure>
        </div>
      </div>

      <ul class = 'menu_block'>
        <li><a class = 'menu_item' href="/index">HOME</a></li>
        <li><a class = 'menu_item' href="/profile">プロフィール編集</a></li>
        <li><a class = 'menu_item' href="/login">ログアウト</a></p></li>
      </ul>
    </div>
  </div>
  <div class = 'row'>
    <div class="container">
      @yield('content')
    </div >
    <div class="side_bar">
      <div class="side_bar_content">
        <p>{{Auth::user()->username}}さんの</p>
        <div class ='side_bar_item'>
          <p>フォロー数</p>
          <p>{{count(Auth::user()->followee())}}名</p>
        </div>
        <div class = 'list_btn'>
          <button class="btn btn-primary btn-sm"><a href="/follow_list">フォローリスト</a></button>
        </div>
        <div class = 'side_bar_item'>
          <p>フォロワー数</p>
          <p>{{count(Auth::user()->follower())}}名</p>
        </div>
        <div class ='follower_btn'>
          <button class="btn btn-primary btn-sm"><a href="/follower_list">フォロワーリスト</a></button>
        </div>
      </div>
      <div class = 'search_btn'>
          <button class="btn btn-primary"><a href="/search">ユーザー検索</a></button>
      </div>
    </div>
  </div>
    <footer>
    </footer>
    <script src = "https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src = "js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

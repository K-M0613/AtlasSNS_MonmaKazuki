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
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
            <a href="/top"><img src="{{ asset('images/atlas.png')}}" id="atlas"></a>
            <div id="header_content">
                <div id="user_image">
                    <p>{{ auth::User()->username }}　さん</p>
                </div>
                <div class="accordion">
                    <p class="accordion-btn"></p>
                    <ul class="accordion-list">
                        <li><a href="/top">ホーム</a></li>
                        <li><a href="/profile">プロフィール編集</a></li>
                        <li><a href="/logout">ログアウト</a></li>
                    </ul>
                </div>
                <img src="{{ asset('/storage/images/'.auth::User()->images) }}"/>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="authUserName">{{ auth::User()->username }}さんの</p>
                <div class="followCount">
                <p class="follow-count">フォロー数</p>
                <p class="follow-count">{{ auth::user()->follows()->count()}}人</p>
                </div>
                <p class="follow-btn"><a href="/followList" class="btn btn-primary">フォローリスト</a></p>
                <div class="followCount">
                <p class="follow-count">フォロワー数</p>
                <p class="follow-count">{{ auth::user()->followUsers()->count()}}人</p>
                </div>
                <p class="follow-btn"><a href="/followerList" class="btn btn-primary">フォロワーリスト</a></p>
            </div>
            <p class="search-btn"><a href="/search" class="btn btn-primary">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

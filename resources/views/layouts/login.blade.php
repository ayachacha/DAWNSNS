<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
            <div class="header-container">
                <h1><a href="/top"><img src="{{asset('images/main_logo.png')}}"></a></h1>
                <div class="accordion-menu">
                @if (Auth::check())
                    <p class="accordion-open">{{ Auth::user()->username }}さん<a class="icon-image"><img src="{{ asset('/storage/' . Auth::user()->images) }}"></a></p>
                    <nav class="accordion-content">
                        <ul class="accordion-lists">
                            <li class="accordion-list"><a href="/top">HOME</a></li>
                            <li class="accordion-list"><a href="/profile">プロフィール編集</a></li>
                            <li class="accordion-list"><a href="/logout">ログアウト</a></li>
                        </ul>
                    </nav>
                </div>
                @endif
            </div>

        </div>
    </header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div class="follow-number">
                <p>フォロー数</p>
                <p>{{ $followCount }}名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div class="follow-number">
                <p>フォロワー数</p>
                <p>{{ $followerCount }}名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/accordion.js') }}"></script>
</body>
</html>

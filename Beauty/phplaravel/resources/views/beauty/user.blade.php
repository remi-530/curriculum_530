<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>cosmetic manual</title>
    <link rel="stylesheet" type="text/css" href="/css/user.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
    <meta name="viewport" content="width=device-width">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <p>My page</p>
    </header>

    <div class="page">
        <div class="head">
            <div class ="img">
                @if(Auth::user()->image==null)
                <img src="./img/user.png">
                @else
                <img src="{{ Auth::user()->image}}">
                @endif
            </div>
            <div class="name">
                <div class="box top">{{ Auth::user()->name}}</div>
                <div class="box"><p>＠{{ Auth::user()->acount}}</p></div>
                <div class="box">{{ Auth::user()->body}}</div>
            </div>
            <div class="btn">
                <a href ="{{ route('edit_id', ['id' => Auth::user()->id])}}">プロフィールを編集</a>
                <br><br>
                <a href ="{{ route('delete_id', ['id' => Auth::user()->id])}}" onclick="return confirm('本当に削除しますか？')">アカウントを削除</a>
                <br><br>
                <a href ="logout" onclick="return confirm('ログアウトしますか？')">ログアウト</a>
            </div>
        </div>
    </div>
    @if(Auth::user()->role==1)
        <div class="tab1">
            <p>登録コスメ一覧</p>
        </div>
    @else
        <div class="tab2">
            <div class="tab review is-active"><p>レビュー</p></div>
            <div class="tab like"><p>いいね</p></div>
        </div>
    @endif

    @if(isset($get)&& Auth::user()->role==1)
        <div class ="box5">
            @foreach($get as $val)
            <div class ="products">
                <div class ="img5">
                    <img src="{{ $val['images'] }}">
                </div>
                <div class ="bottom">
                    <div class ="name2">
                        <a href ="{{ route('cosme2_id', ['id' => $val['id']])}}">
                            <p>{{ $val['cosme'] }}</p>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    @elseif(isset($get)&& Auth::user()->role==0)
                <div class ="box6 panel is-show">
                    @foreach($get as $val)
                        <div class ="review2">
                            <div class ="title">
                                <p>{{ $val['cosme'] }}</p>
                                <a href ="{{ route('delreview_id', ['id' => $val['r_id']])}}" onclick="return confirm('本当に削除しますか？')">このレビューを削除</a>
                            </div>
                            <div class ="komento">
                                <p>{{ $val['r_body'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
    @else
    @endif

    @if(isset($like)&& Auth::user()->role==0)
        <div class = "panel like2">
            <div class ="box5">
                @foreach($like as $val)
                    <div class ="products">
                        <div class ="img5">
                            <img src="{{ $val['images'] }}">
                        </div>
                        <div class ="bottom">
                            <div class ="name2">
                                <a href ="{{ route('cosme_id', ['id' => $val['cosme_id']])}}">
                                    <p>{{ $val['cosme'] }}</p>
                                </a>
                            </div>
                            <div class ="like3">
                                <button class="material-symbols-outlined fav" id="favorite" data-id ="{{ $val['l_id'] }}" onclick="fav({{ $val['l_id'] }})">favorite</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
    @endif

    <footer>
        <div class="menu">
            <a href="index">
                <span class="material-symbols-outlined">home</span>
            </a>
            <a href="search">
                <span class="material-symbols-outlined">search</span>
            </a>
            @if(!Auth::check())
            @elseif(Auth::user()->role==0)
            @else
            <a href="regicosme">
                <span class="material-symbols-outlined">add_circle</span>
            </a>
            @endif
            @if(Auth::check())
            <a href="user">
                <span class="material-symbols-outlined">account_circle</span>
            </a>
            @else
            <a href="login">
                <span class="material-symbols-outlined">account_circle</span>
            </a>
            @endif
        </div>
    </footer>
    <script src="{{ asset('/js/tab.js') }}"></script>
    <script src="{{ asset('/js/fav2.js') }}"></script>
</body>
</html>
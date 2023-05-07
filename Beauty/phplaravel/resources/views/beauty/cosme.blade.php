<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>cosmetic manual</title>
    <link rel="stylesheet" type="text/css" href="/css/cosme.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <p>.cosmetic manual.</p>
    </header>

    <div class ="box3">
        <div class ="detail">
            @foreach($cosme as $val)
            <div class ="title"><p>{{ $val['name'] }}</p></div>
            @if(Auth::check())
                <input id ="like" type="hidden" data-userid="{{ Auth::user()->id }}" data-cosmeid="{{ $val['cosme_id']}}" >
            @else
            @endif
            <div class ="main">
                <img src="../{{ $val['images'] }}">
                <div class ="box">
                    <div class ="box2">
                        @if($val['new']==0)
                        @else
                            <p>new</p>
                        @endif

                        @if(!Auth::check())
                        @elseif(Auth::user()->role==0 && $like == null)
                            <div class ="like">
                                <button class="material-symbols-outlined" id="favorite">favorite</button>
                            </div>
                        @elseif(Auth::user()->role==0)
                            <div class ="like">
                                <button class="material-symbols-outlined fav" id="favorite">favorite</button>
                            </div>
                        @else
                        @endif
                    </div>
                    <p>{{ $val['cosme'] }}<br>
                    <span>カテゴリー：{{ $val['category'] }}<br>
                    価格：{{ $val['price'] }}円</span>
                    </p>
                    <div class ="bottom">
                        <p>{{ $val['c_body'] }}</p>
                    </div>
                    <div class ="bottom">
                        @if(Auth::check() && Auth::user()->role==0)
                        <a href="{{ route('review_id', ['id' => $val['cosme_id']])}}">
                            <span class="material-symbols-outlined">add_circle</span>
                        </a>
                        @else
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @if(isset($review))
    <div class ="review2">
        <p>レビュー　一覧</p>
    </div>
    @foreach($review as $val)
    <div class ="review">
        <p>{{ $val['body'] }}</p>
    </div>
    @endforeach
    @else
    @endif

    <footer>
        <div class="menu">
            <a href="../index">
                <span class="material-symbols-outlined">home</span>
            </a>
            <a href="../search">
                <span class="material-symbols-outlined">search</span>
            </a>
            @if(!Auth::check())
            @elseif(Auth::user()->role==0)
            @else
            <a href="../regicosme">
                <span class="material-symbols-outlined">add_circle</span>
            </a>
            @endif
            @if(Auth::check())
            <a href="../user">
                <span class="material-symbols-outlined">account_circle</span>
            </a>
            @else
            <a href="../login">
                <span class="material-symbols-outlined">account_circle</span>
            </a>
            @endif
        </div>
    </footer>
    <script src="{{ asset('/js/like.js') }}"></script>
</body>
</html>
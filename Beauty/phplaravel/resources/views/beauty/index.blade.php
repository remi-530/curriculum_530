<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>cosmetic manual</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
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

    <div class ="box">
        @foreach($cosme as $val)
        <div class ="products">
            <div class ="title">
                <p>{{ $val['name'] }}</p>
            </div>
            <div class ="img">
                <img src="{{ $val['images'] }}">
            </div>
            <div class ="bottom">
                <div class ="name">
                    <a href ="{{ route('cosme_id', ['id' => $val['cosme_id']])}}">
                        <p>{{ $val['cosme'] }}</p>
                    </a>
                </div>
                @if(!Auth::check())
                    <div class ="like">
                            <button class="material-symbols-outlined" id="favorite">favorite</button>
                    </div>
                @elseif(Auth::user()->role==0)
                    <div class ="like">
                        <input id ="like" type="hidden" data-userid="{{ Auth::user()->id }}" >
                        @if(in_array($val['cosme_id'],$like_cosme))
                            <button class="material-symbols-outlined fav" id="favorite" data-cosme ="{{ $val['cosme_id'] }}" onclick="fav({{ $val['cosme_id'] }})">favorite</button>
                        @else
                            <button class="material-symbols-outlined" id="favorite" data-cosme ="{{ $val['cosme_id'] }}" onclick="fav({{ $val['cosme_id'] }})">favorite</button>
                        @endif
                    </div>
                @else
                @endif
            </div>
        </div>
        @endforeach
    </div>
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
    <script src="{{ asset('/js/fav.js') }}"></script>
</body>
</html>
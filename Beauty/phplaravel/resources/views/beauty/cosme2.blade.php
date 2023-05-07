<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>cosmetic manual</title>
    <link rel="stylesheet" type="text/css" href="/css/cosme2.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
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
            <div class ="main">
                <img src="../{{ $cosme['images'] }}">
                <div class ="box">
                    <div class ="box5">
                        <div class ="box4">
                            <a href ="{{ route('editcosme_id', ['id' => $cosme['id']])}}">編集</a>
                            <a href ="{{ route('deletecosme_id', ['id' => $cosme['id']])}}" onclick="return confirm('本当に削除しますか？')">削除</a>
                        </div>
                    </div>
                    <div class ="box2">
                        @if($cosme['new']==0)
                        @else
                        <p>new</p>
                        @endif
                    </div>
                    <p>{{ $cosme['cosme'] }}<br>
                    <span>{{ $cosme['category'] }}<br>
                    {{ $cosme['price'] }}</span>
                    </p>
                    <div class ="bottom">
                        <p>{{ $cosme['body'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>cosmetic manual</title>
    <link rel="stylesheet" type="text/css" href="/css/confirm.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
    <meta name="viewport" content="width=device-width">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <p>.cosmetic manual.</p>
    </header>

    <div class="form">
        <div class="title">
            <p>確認画面</p>
        </div>
        <div class="main">
            <form action="complete" method="post" name="form" id="form">
                @csrf
                <div class="item">
                    <label for="role">ブランドの方</label>
                    @if ($_POST['role']==0)
                    <input type="hidden" id="role" name="role" value="0">
                    <p>いいえ</p>
                    @else
                    <input type="hidden" id="role" name="role" value="1">
                    <p>はい</p>
                    @endif
                </div>
                <div class="item">
                    <label for="name">名前</label>
                    <input type="hidden" id="name" name="name" value="{{ $inputs['name'] }}">
                    <p>{{ $inputs['name'] }}</p>
                </div>
                <div class="item">
                    <label for="acount">ID</label>
                    <input type="hidden" id="acount" name="acount" value="{{ $inputs['acount'] }}">
                    <p>{{ $inputs['acount'] }}</p>
                </div>
                <div class="item">
                    <label for="email">メールアドレス</label>
                    <input type="hidden" id="email" name="email" value="{{ $inputs['email'] }}">
                    <p>{{ $inputs['email'] }}</p>
                </div>
                <div class="item">
                    <label for="password">パスワード</label>
                    <input type="hidden" id="password" name="password" value="{{ $inputs['password'] }}">
                    <p>{{ $inputs['password'] }}</p>
                </div>
                <div class="box3">
                    <input type="submit" id="submit_btn" value="登録">
                    <button type="button" onclick="history.back(-1)"><p>戻る</p></button>
                </div>
            </form>
        </div>
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
</body>
</html>
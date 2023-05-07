<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>cosmetic manual</title>
    <link rel="stylesheet" type="text/css" href="/css/pass.css">
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
            <p>パスワード再設定</p>
        </div>
        <div class="main">
            <form action="passcomp" method="post" name="form" id="form">
                @csrf
                <div class="item">
                    <label for="email">メールアドレス</label>
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <input type="text" id="email" name="email" placeholder="" value="">
                </div>
                <div class="item">
                    <label for="password">パスワード</label>
                    @if($errors->has('password'))
                        @foreach($errors->get('password') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <input type="password" id="password" name="password" placeholder="" value="">
                </div>
                <div class="box3">
                    <input type="submit" id="submit_btn" value="変更">
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
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>cosmetic manual</title>
    <link rel="stylesheet" type="text/css" href="/css/register.css">
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
            <p>新規登録</p>
        </div>
        <div class="main">
            <form action="confirm" method="post" name="form" id="form">
                @csrf
                <div class="item">
                    <label for="role">ブランドの方</label>
                    <input type="hidden" id="role" name="role" value="0">
                    <input type="checkbox" id="role" name="role" value="1">
                </div>
                <div class="item">
                    <label for="name">名前</label>
                    @if($errors->has('name'))
                        @foreach($errors->get('name') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <input type="text" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="item">
                    <label for="acount">ID</label>
                    @if($errors->has('acount'))
                        @foreach($errors->get('acount') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <input type="text" id="acount" name="acount" value="{{ old('acount') }}">
                </div>
                <div class="item">
                    <label for="email">メールアドレス</label>
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <input type="text" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="item">
                    <label for="password">パスワード</label>
                    @if($errors->has('password'))
                        @foreach($errors->get('password') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <input type="text" id="password" name="password" value="{{ old('password') }}">
                </div>
                <div class="box3">
                    <input type="submit" id="submit_btn" value="登録">
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
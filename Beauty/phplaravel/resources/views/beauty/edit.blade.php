<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>cosmetic manual</title>
    <link rel="stylesheet" type="text/css" href="/css/edit.css">
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
            <p>ユーザー情報編集</p>
        </div>
        <div class="main">
            <form action="{{ route('editcomp_id')}}" method="post" name="form" id="form" enctype="multipart/form-data">
                @csrf
                <div class="item">
                    <input type="hidden" name="id" value="{{  $post['id'] }}">
                </div>
                <div class="item">
                    <label for="name">名前</label>
                    @if($errors->has('name'))
                        @foreach($errors->get('name') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <input type="text" id="name" name="name" value="{{ $post['name'] }}">
                </div>
                <div class="item">
                    <label for="acount">ID</label>
                    @if($errors->has('acount'))
                        @foreach($errors->get('acount') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <input type="text" id="acount" name="acount" value="{{ $post['acount'] }}">
                </div>
                <div class="item">
                    <label for="email">メールアドレス</label>
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <input type="text" id="email" name="email" value="{{ $post['email'] }}">
                </div>
                <div class="item">
                    <label for="body">プロフィール</label><br>
                    @if($errors->has('body'))
                        @foreach($errors->get('body') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <textarea id="body" name="body" cols="30" rows="10">{{ $post['body'] }}</textarea>
                </div>
                <div class="item">
                    <label for="image">画像</label><br>
                    <input type="file" id="image" name="image">
                </div>
                <!-- <div class="item">
                    <label for="password">パスワード</label>
                    @if($errors->has('password'))
                        @foreach($errors->get('password') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <input type="text" id="password" name="password" value="{{ $post['password'] }}">
                </div> -->
                <div class="box3">
                    <input type="submit" id="submit_btn" value="登録">
                </div>
            </form>
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
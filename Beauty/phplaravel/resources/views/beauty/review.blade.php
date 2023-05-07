<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>cosmetic manual</title>
    <link rel="stylesheet" type="text/css" href="/css/review.css">
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
            <p>投稿</p>
        </div>
        <div class="main">
            <form action="{{ route('comp_id')}}" method="post" name="form" id="form">
                @csrf
                <div class="item">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                </div>
                <div class="item">
                    <input type="hidden" name="cosme_id" value="{{ $cosme['id'] }}">
                </div>
                
                <div class="item">
                    <label for="body">レビュー内容</label><br>
                    @if($errors->has('body'))
                        @foreach($errors->get('body') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <textarea id="body" name="body" cols="30" rows="10"></textarea>
                </div>
                <div class="box3">
                    <input type="submit" id="submit_btn" value="投稿">
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
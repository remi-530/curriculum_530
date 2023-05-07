<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>cosmetic manual</title>
    <link rel="stylesheet" type="text/css" href="/css/regicosme.css">
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
            <p>商品登録</p>
        </div>
        <div class="main">
            <form action="cosmecomp" method="post" name="form" id="form" enctype="multipart/form-data">
                @csrf
                <div class="item">
                    <label for="new">New</label>
                    <input type="hidden" id="new" name="new" value="0">
                    <input type="checkbox" id="new" name="new" value="1">
                </div>
                <div class="item">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                </div>
                <div class="item">
                    <label for="cosme">商品名</label>
                    @if($errors->has('cosme'))
                        @foreach($errors->get('cosme') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <input type="text" id="cosme" name="cosme" value="{{ old('cosme') }}">
                </div>
                <div class="item">
                    <label for="price">値段</label>
                    @if($errors->has('price'))
                        @foreach($errors->get('price') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <input type="text" id="price" name="price" value="{{ old('price') }}">
                </div>
                <div class="item">
                    <label for="category">カテゴリー</label><br>
                    @if($errors->has('category'))
                        @foreach($errors->get('category') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <select name="category" id="category">
                        <option>未選択</option>
                        <optgroup label = "BASE">
                            <option value="化粧下地">化粧下地</option>
                            <option value="ファンデーション">ファンデーション</option>
                            <option value="パウダー">パウダー</option>
                            <option value="コントロールカラー">コントロールカラー</option>
                        </optgroup>
                        <optgroup label = "EYE">
                            <option value="アイブロウ">アイブロウ</option>
                            <option value="マスカラ">マスカラ</option>
                            <option value="アイライナー">アイライナー</option>
                            <option value="アイシャドウ">アイシャドウ</option>
                        </optgroup>
                        <optgroup label = "OTHERS">
                            <option value="リップ">リップ</option>
                            <option value="チーク">チーク</option>
                            <option value="ハイライト・シェーディング">ハイライト・シェーディング</option>
                        </optgroup>
                    </select>
                </div>
                <div class="item">
                    <label for="body">商品説明</label><br>
                    @if($errors->has('body'))
                        @foreach($errors->get('body') as $message)
                            <p style="color:red">{{ $message }}<br></p>
                        @endforeach
                    @endif 
                    <textarea id="body" name="body" cols="30" rows="10">{{ old('body') }}</textarea>
                </div>
                <div class="item">
                    <label for="images">画像</label><br>
                    <input type="file" id="images" name="images">
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
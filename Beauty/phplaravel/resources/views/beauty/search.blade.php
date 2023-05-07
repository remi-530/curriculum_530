<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>cosmetic manual</title>
    <link rel="stylesheet" type="text/css" href="/css/search.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
    <meta name="viewport" content="width=device-width">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <p>検索</p>
    </header>

    <div class = "box">
    
        <div class="contents">
            <div class="item">
                <label for="category">カテゴリー検索</label><br>
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

            <button class="seach">検索</button>
        </div>
        <div class = "body">
            <div class ="box2">
                
            </div>
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
    <script src="{{ asset('/js/seach.js') }}"></script>
</body>
</html>
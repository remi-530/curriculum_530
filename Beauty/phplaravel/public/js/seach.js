$('.seach').on('click', function () {
    $('.box2').empty(); //もともとある要素を空にする
    $('.search-null').remove(); //検索結果が0のときのテキストを消す

    let category = $('[name=category]').val(); //検索ワードを取得

    // console.log(category);

    if (!category) {
        return false;
    } //ガード節で検索ワードが空の時、ここで処理を止めて何もビューに出さない

    $.ajax({
        type: 'GET',
        url: '/result/{category}' , //後述するweb.phpのURLと同じ形にする
        data: {
            'category': category, //ここはサーバーに贈りたい情報。今回は検索ファームのバリューを送りたい。
        },
        dataType: 'json', //json形式で受け取る

    }).done(function (data) { //ajaxが成功したときの処理

        let html = '';
        let auth_html = '';
        const userDatelist = data;
        console.log(userDatelist);
        let i = 0;
        for(i =0; i < userDatelist.length; i++){
            let  divTag= $('<div class ="products" />');
            divTag.append($('<div class ="title" />').append('<p />').text(userDatelist[i].name));
            divTag.append($('<div class ="img"><img src="'+userDatelist[i].images+'"></div>'));
            divTag.append($('<div class ="bottom"><div class ="name"><a href =" /cosme?id='+userDatelist[i].cosme_id+' "><p></p></a></div></div>').text(userDatelist[i].cosme));
            $('.box2').append(divTag);
        }
    });
});
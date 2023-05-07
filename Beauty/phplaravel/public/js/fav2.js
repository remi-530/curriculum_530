
function fav(l_id){
    const favorite = document.querySelector(`button[data-id="${l_id}"]`);
    favorite.classList.remove('fav');


    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
    $.ajax({
        type: 'POST',
        url: '/like2' , //後述するweb.phpのURLと同じ形にする
        data: {
            'l_id': l_id,//ここはサーバーに贈りたい情報。今回は検索ファームのバリューを送りたい。
        },
        dataType: 'json', //json形式で受け取る
    
    }).done(function (data) { //ajaxが成功したときの処理
        console.log(data);

    }).fail( function ( jqXHR, textStatus, errorThrown )
    {
        console.log( jqXHR );
        console.log( textStatus );
        console.log( errorThrown );
    } );
}
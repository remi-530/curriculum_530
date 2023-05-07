
// document.addEventListener('DOMContentLoaded',function(){
//     var btns = document.querySelectorAll('#favorite');
//     for(var i = 0; i < btns.length; i++){
//         btns[i].addEventListener('click',function(){
//             this.classList.toggle('fav');
//         },false);
//     }
// },false);

const like_info = $('#like').data();

const user_id = like_info.userid;
var like =0;
function fav(cosme_id){
    const favorite = document.querySelector(`button[data-cosme="${cosme_id}"]`);
    favorite.classList.toggle('fav');
    if(favorite.classList.contains('fav')){
        like =1;
    }else{
        like =0;
    }


    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
    $.ajax({
        type: 'POST',
        url: '/like' , //後述するweb.phpのURLと同じ形にする
        data: {
            'user_id': user_id,
            'cosme_id': cosme_id,
            'like': like//ここはサーバーに贈りたい情報。今回は検索ファームのバリューを送りたい。
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
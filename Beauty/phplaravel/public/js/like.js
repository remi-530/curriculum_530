
const like_info = $('#like').data();

const user_id = like_info.userid;
const cosme_id = like_info.cosmeid;

$('#favorite').click(function(){
    var like = 0;
    if($('#favorite').hasClass('fav')){
        $("#favorite").removeClass("fav");
        like = 0;
    }else{
        $("#favorite").addClass("fav");
        like = 1;
    }
    // console.log(like);

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

    }).fail(function () {
    //ajax通信がエラーのときの処理
        console.log('処理に失敗しました。リロードしてから再度やり直してください。');
    });
});


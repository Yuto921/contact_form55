$(function(){

    let username = $('#ok [name=username]').val();
    let email = $('#ok [name=email]').val();
    let content = $('#ok [name=content]').val();
    console.log(username);
    console.log(email);
    console.log(content);

    $('#ok').on('click', function(){
        if(!username && !email && !content) {
            alert('ユーザー名・email・お問い合わせ内容を入力してください。');
            $('#ok').remove();
        } else if (!username || !email || !content) {
            alert('未入力があります。');
            $('#ok').remove();
        }
    });




});
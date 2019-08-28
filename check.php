<?php
// スーパーグローバル変数(定義済み変数)
// (PHPがもともと用意している変数・・役割を持っている)

// var_dump($_POST); //連想配列・・キーがないと値が出ない(キーはhtmlのname属性)


// 送信されてきた値の取得
$username = $_POST['username'];
$email = $_POST['email'];
$content = $_POST['content'];

// ユーザー名が空かチェック
if ($username == '') { // (!$username)はやらない*他の言語でエラーになるから
    $usernameResult = 'ユーザー名が入力されていません';
} else {
    $usernameResult = $username;
}

if ($email == '') {
    $emailResult = 'メールアドレスが入力されていません';
} else {
    $emailResult = $email;
}

if ($content == '') {
    $contentResult = 'お問い合わせ内容が入力されていません';
} else {
    $contentResult = $content;
}



?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>入力内容確認</title>
    <script src="https://kit.fontawesome.com/c8b873bcaa.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-check.css">
</head>
<body>
    <div id="title">
        <i class="fas fa-map-marker fa-5x fa-fw"></i>
        <div class="title">入力内容確認</div>
    </div>

    <div id="contents">

        <div class="content">
            <i class="far fa-user-circle fa-3x fa-fw"></i>
            <div><div class="span">名前:</div> <?php echo $usernameResult; ?></div>
        </div>


        <div class="content">
            <i class="far fa-envelope fa-3x fa-fw"></i>
            <div><div class="span">メールアドレス:</div> <?php echo $emailResult; ?></div>
        </div>

        <div class="content">
            <i class="far fa-comment fa-3x fa-fw"></i>
            <div><div class="span">お問い合わせ内容:</div>　<div id="php-contact"> <?php echo $contentResult; ?> </div></div>
        </div>


        <div id="form">
            <form action="index.html">
                <button type="submit" class="btn btn-primary btn-lg btn-block">戻る</button>
                <br>
            </form>
            <form action="">
                <button type="submit" class="btn btn-primary btn-lg btn-block my-red">OK</button>
            </form>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="js/"></script>
</body>
</html>
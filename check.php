<?php
// このページが表示された時の送信方法 (GET送信 or POST送信)の確認
// GET送信の場合は、入力画面に遷移する

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // このページを表示する際の送信がGETの場合
    // index.html に遷移する
    header('Location: index.html');
}


// functions.phpを読み込んで、定義した関数を使えるようにする
require_once('functions.php');





// スーパーグローバル変数(定義済み変数)
// (PHPがもともと用意している変数・・役割を持っている)

// var_dump($_POST); //連想配列・・キーがないと値が出ない(キーはhtmlのname属性)


// 送信されてきた値の取得
// エスケープ処理をして、XSS(クロスサイトスクリプティング)の対策をする

// エスケープ処理：htmlspecialchars
// htmlspecialchars(対象の文字, オプション, 文字コード)
$username = h($_POST['username']);
// $username = h('Yoneda']); -> h ('Yoneda') { htmlspecialchars(hoge hoge) return 'Yoneda'; }

$email = h($_POST['email']);
$content = h($_POST['content']);

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
            <!-- <form action="index.html"> 何かを送信するためのものだから、戻るときは、jsで操作した方がスマート -->
                <!-- <button type="submit" class="btn btn-primary btn-lg btn-block">戻る</button> -->

                <!-- type="button" onclick="history.back();" で一個前に戻るjs -->
                <button type="button" onclick="history.back();" class="btn btn-primary btn-lg btn-block">戻る</button>
                <br>
            <!-- </form> -->

            <form id="ok" action="thanks.php" method="POST">
                <!-- リクエストスコープ　裏で隠しながら -->
                <input class="input" type="hidden" name="username" value="<?php echo $username;?>">

                <input class="input" type="hidden" name="email" value="<?php echo $email;?>">

                <input class="input" type="hidden" name="content" value="<?php echo $content;?>">

                <button type="submit" class="btn btn-primary btn-lg btn-block my-red">OK</button>
            </form>

        </div>
    </div>


    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="js/check.js"></script>
</body>
</html>
<?php
// スーパーグローバル変数(定義済み変数)
// (PHPがもともと用意している変数・・役割を持っている)

// var_dump($_POST); //連想配列・・キーがないと値が出ない(キーはhtmlのname属性)

var_dump($_POST);

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
</head>
<body>
    <h1>入力内容確認</h1>

    <p>名前:　<?php echo $usernameResult; ?></p>
    <p>メールアドレス: <?php echo $emailResult; ?></p>
    <p>お問い合わせ内容: <?php echo $contentResult; ?></p>

    <form action="">
        <button>戻る</button><br>
        <input type="submit" value="OK">
    </form>

</body>
</html>
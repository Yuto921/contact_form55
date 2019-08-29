<?php
    // このページが表示された時の送信方法 (GET送信 or POST送信)の確認
    // GET送信の場合は、入力画面に遷移する

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // このページを表示する際の送信がGETの場合
        // index.html に遷移する
        header('Location: index.html');
    }


    //1. functions.phpを読み込む
    require_once('functions.php');
    var_dump($_POST);
    //2. $_POSTから送信された値を取得 (エスケープ処理も)
    $username = h($_POST['username']);
    $email = h($_POST['email']);
    $content = h($_POST['content']);
    //3. 値を画面に表示する

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>送信完了</title>
</head>
<body>
    <h1>お問い合わせありがとうございました。</h1>
    <p>名前:<?php echo $username; ?></p>
    <p>メールアドレス:<?php echo $email; ?></p>
    <p>お問い合わせ内容:<?php echo $content; ?></p>
    
</body>
</html>
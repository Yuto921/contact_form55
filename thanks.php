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
    require_once('dbconnect.php'); //データベース管理ファイルを読み込む
    var_dump($_POST);
    //2. $_POSTから送信された値を取得 (エスケープ処理も)
    $username = h($_POST['username']);
    $email = h($_POST['email']);
    $content = h($_POST['content']);
    //3. 値を画面に表示する

    // 受け取った値(check.phpのhiddenで飛んできた値)をもとに、データベースに登録
    // prepare()のなかに準備して、$stmtの入れる
    // ? : SQLインジェクションの対策 (攻撃から守る) (例)名前のところにSQL文を書いて、ログインのユーザー情報を取ってこれる

    // SQLの準備 -> $stmtに入ってる
    $stmt = $dbh->prepare( 'INSERT INTO surveys (username, email, content, created_at) VALUES (?, ?, ?, now())' );

    // SQLを実行
    // ? の部分に当たる値を配列で渡す
    $stmt->execute([$username, $email, $content]);

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
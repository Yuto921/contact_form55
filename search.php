<?php
    // この画面でやりたいこと:名前が一致するデータの一覧表示
    // [プロセス]
    // 1. 必要なファイルの読み込み
    // 2. 入力された名前でデータベース検索
    // 3. 検索結果を画面に表示する


    //必要なファイルの読み込み
    require_once ('functions.php');
    require_once ('dbconnect.php');

    // issetがfalseだった時に、空文字で検索SELECTする
    $username = '';

    //名前が入力されているかチェック
    //isset関数・・変数の中身が存在するかどうかのPHP関数(TRUEかFALSEを戻り値に返す)
    // usernameが設定されているかどうか
    if (isset ($_GET['username'])) {
        //送信された名前を取得 *検索してないときは、$_GET[]が空っぽ (幼稚園でいない園児の名前を呼ぶ)
        $username = $_GET['username'];
    }

    //実行するSQLの準備
    $stmt = $dbh->prepare('SELECT * FROM surveys WHERE username = ?');
    
    //SQLの実行 配列の形で渡す ？
    $stmt->execute([$username]);

    //取得した一覧を変数に入れる
    $results = $stmt->fetchAll();

    //配列の中身を確認
    // var_dump($results);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>検索画面</title>
</head>
<body>
    <h1>検索画面</h1>
    <!-- actionが空の場合、自分に送信 -->
    <form action="" method="GET">
        <p>検索したい名前を入力してください</p>
        <input type="text" name="username">
        <input type="submit" value="検索">
    </form>

    <h2>検索結果</h2>

    <?php foreach ($results as $result) {?>
    <p>名前:<?php echo h($result["username"]); ?></p>
    <p>メールアドレス:<?php echo h($result["email"]); ?></p>
    <p>内容:<?php echo h($result["content"]); ?></p>
    <hr>
    <?php } ?>
    
</body>
</html>
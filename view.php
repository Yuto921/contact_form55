<?php
    // 目的 : 画面にお問い合わせの一覧を出す
    // [プロセス]
    // 1. 必要な部品を読み込む(functions.php , dbconnect.php)
    // 2. 画面に出力するものを取得する(SELECT文)
    // 3. 取得したデータを画面に表示する


    // 必要な部品を読み込む
    require_once('functions.php');
    require_once('dbconnect.php');

    // 画面に出力するものを取得する
    // SELECT文の準備
    $stmt = $dbh->prepare('SELECT * FROM surveys ');
    // 準備したものを実行 //もし、 ? の部分に当たる値を配列で渡す
    $stmt->execute();

    /*

    class 〇〇 {

        $kekka = []

        method ▲▲;
        method ▲▲;
        method ▲▲;

        function execute() {
            $kekka = fdsafaf;
        }

        function fetchAll()
        {
            return $kekka;
        }
    }

    */


    // 取得した一覧を変数に格納 fetchAll(全件の検索結果)
    $results = $stmt->fetchAll();



    // var_dump($results); //データベースからの値を [配列] で返す  キーと値のセット

    // 検索結果が[配列]になって入ってきている -> foreachで回して一個の値を取得


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ一覧</title>
</head>
<body>

    <h1>一覧</h1>

    <!-- 一覧を表示する -->
    <?php foreach ($results as $result) { ?>

        <p>名前: <?php echo h($result['username']); ?></p>
        <p>メールアドレス: <?php echo h($result['email']); ?></p>
        <p>内容: <?php echo h($result['content']); ?></p>

        <!-- hrタグ 線を引く -->
        <hr>

    <?php } ?>



</body>
</html>
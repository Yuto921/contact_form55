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
    <script src="https://kit.fontawesome.com/c8b873bcaa.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/view.css">
</head>
<body>

    <div class="div">
        <i class="far fa-address-card fa-3x fa-fw"></i>
        <h1>一覧</h1>
    </div>

    <!-- 一覧を表示する -->
    <?php foreach ($results as $result) { ?>

        <div class="div">
            <i class="far fa-user-circle fa-3x fa-fw"></i>
            <p class="name">名前: 　<?php echo h($result['username']); ?></p>
        </div>

        <div class="div">
            <i class="far fa-envelope fa-3x fa-fw"></i>
            <p class="email">メールアドレス: 　<?php echo h($result['email']); ?></p>
        </div>

        <div class="div">
            <i class="far fa-comment fa-3x fa-fw"></i>
            <p class="content">内容: 　<?php echo h($result['content']); ?></p>
        </div>

        <!-- hrタグ 線を引く -->
        <hr>

    <?php } ?>



    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
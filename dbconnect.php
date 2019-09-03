
<?php
// データベースに接続する処理

// 接続に使用する値を変数に格納
$host = "localhost"; //localhostは自分のパソコン
$dbname = "contact_form"; // localhostのなかのcontact_form
$charset = "utf8";
$user = "root"; // databaseに接続するときの名前 (デフォルト)
$password = ""; // databaseに接続するときのパスワード (デフォルト)
$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // データのエラーを出すか
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // データのソートはどうするか
  PDO::ATTR_EMULATE_PREPARES   => false,
];

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

// echo $dsn;// mysql:host=localhost;dbname=contact_form;charset=utf8

// データベースへの接続
try { //try{}でエラーが発生したら、catch{}

    // データベースへの接続実行
    $dbh = new PDO($dsn, $user, $password, $options);

} catch (\PDOException $e) {

    // データベースへの接続に失敗した場合
    // エラーを出力
    var_dump($e->getMessage());

    // 処理を強制的に中断 for文でいうbreakみたいな
    exit;

}

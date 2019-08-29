<?php // functionなどよく使う処理をまとめたファイル

// エスケープ処理をする関数
// $str : エスケープしたい文字
// return : エスケープした文字

function h($str) //$str(文字という意味)に変換してほしい文字を引数に渡す
{ //PHPのコーディング規約的に...
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
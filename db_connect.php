<?php

$dsn = 'mysql:host=localhost;dbname=task_list;charset=utf8';
$user = 'root'; // XAMPPの初期設定
$password = ''; // XAMPPの初期設定（空）

try {
    $dbh = new PDO($dsn, $user, $password);
    // エラーが発生した時に例外を投げる設定
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo 'ただいま障害によりサービスが利用できません。';
    exit;
}

// echo '接続成功しました！';

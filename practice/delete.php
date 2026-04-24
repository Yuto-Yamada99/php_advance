<?php

require_once 'db_connect.php';

// URLパラメータから削除したいIDを取得
$id = $_GET['id'] ?? null;

if ($id) {
    // 指定したIDのデータを削除するSQL
    // WHERE句を忘れると全データが消える
    $sql = 'DELETE FROM tasks WHERE id = ?';

    // クラス化した $db の query メソッドを使って安全に削除
    $dbh->query($sql, [$id]);
}

// 削除が終わったら（あるいはIDがなくても）一覧画面に戻る
header('Location: index.php');
exit;

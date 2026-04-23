<?php

// データベース接続
$pdo = new PDO('mysql:host=localhost;dbname=task_list;charset=utf8', 'root', '');

// データベースにデータを書き込む
$sql = 'INSERT INTO tasks(title,content,created_at,updated_at) Values(::title, ::content, NOW()), NOW())';
$stmt = $pdo->prepare($sql);

$stmt->bindValue('::title', $title, PDO::PARAM_STR);
$stmt->bindValue('::content', $content, PDO::PARAM_STR);

$stmt->execute();

if (isset($_POST['title']) && isset($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = 'INSERT INTO tasks(title,content,created_at,updated_at) Values(::title, ::content, NOW()), NOW())';
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue('::title', $title, PDO::PARAM_STR);
    $stmt->bindValue('::content', $content, PDO::PARAM_STR);

    $stmt->execute();
} else {
    $title = 'なし';
    $content = 'なし';
}
echo '投稿内容を受信'.$title.','.$content;

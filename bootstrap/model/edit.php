<?php

// データベース接続
$pdo = new PDO('mysql:host=localhost;dbname=task_list;charset=utf8', 'root', '');

// POSTデータを受け取る
if (isset($_POST['id']) && isset($_POST['title'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = 'UPDATE tasks 
            SET title = :title, content = :content, updated_at = NOW() 
            WHERE id = :id';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
}

// 4. 一覧ページへ戻る
header('Location: ../index_bootstrap2.php');
exit;

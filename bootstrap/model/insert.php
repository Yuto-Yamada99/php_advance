<?php

require_once 'todo.php';
$todo = new Todo();

// print_r($_POST);
// 受け取ったデータを書き込む
if (isset($_POST['title']) && isset($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $todo->create($title, $content);

    // 保存が終わったら一覧ページへ飛ばす ---
    header('Location: ../index_bootstrap2.php');
    exit;
}
// else {
//     header('Location: ../index_bootstrap2.php');
//     exit;
// }
// echo '投稿内容を受信'.$title.','.$content;

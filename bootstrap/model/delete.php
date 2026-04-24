<?php

require_once 'todo.php';
$todo = new Todo();

// print_r($_POST);
// 受け取ったデータを書き込む
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    $todo->delete($delete_id);

    // 保存が終わったら一覧ページへ飛ばす ---
    header('Location: ../index_bootstrap2.php');
    exit;
}

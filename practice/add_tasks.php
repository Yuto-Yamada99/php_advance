<?php
require_once 'db_connect.php';

// 「作成する」ボタンが押された時の処理
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // データベースに保存するSQL
    // idは自動、created_at/updated_atはNOW()で現在時刻を入れる
    $sql = 'INSERT INTO tasks (title, content, created_at, updated_at) 
            VALUES (?, ?, NOW(), NOW())';

    $db->query($sql, [$title, $content]);

    // 保存が終わったら一覧画面（index.php）に戻る
    header('Location: index_bootstrap.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規TODO作成</title>
    <style>
        .form-wrapper { margin: 20px; }
        .input-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-wrapper">
        <h1>新規TODO作成</h1>
        <form action="add_tasks.php" method="POST">
            <div class="input-group">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div class="input-group">
                <label for="content">内容</label>
                <textarea name="content" id="content" rows="5" required></textarea>
            </div>
            <button type="submit">作成する</button>
            <a href="index_bootstrap.php">戻る</a>
        </form>
    </div>
</body>
</html>
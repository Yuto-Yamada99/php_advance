<?php
require_once 'db_connect.php';

// URLパラメータからIDを取得
$id = $_GET['id'] ?? null;

if (!$id) {
    exit('IDが指定されていません');
}

// 更新処理（ボタンが押された時）
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // 指定したIDのデータを更新するSQL
    $sql = 'UPDATE tasks SET title = ?, content = ?, updated_at = NOW() WHERE id = ?';
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$title, $content, $id]);

    header('Location: index_bootstrap.php');
    exit;
}

// 表示用データの取得（画面を開いた時
$sql = 'SELECT * FROM tasks WHERE id = ?';
$stmt = $dbh->query($sql);
$stmt->execute([$id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$task) {
    exit('指定されたTODOは見つかりませんでした');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>TODO編集</title>
    <style>
        .form-wrapper { margin: 20px; }
        .input-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-wrapper">
        <h1>TODO編集</h1>
        <form action="edit.php?id=<?php echo $id; ?>" method="POST">
            <div class="input-group">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" 
                       value="<?php echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            <div class="input-group">
                <label for="content">内容</label>
                <textarea name="content" id="content" rows="5" required><?php echo htmlspecialchars($task['content'], ENT_QUOTES, 'UTF-8'); ?></textarea>
            </div>
            <button type="submit">更新する</button>
            <a href="index_bootstrap.php">戻る</a>
        </form>
    </div>
</body>
</html>
<?php
require_once 'db_connect.php';

// データを取得（作成日時の新しい順）
$sql = 'SELECT * FROM tasks ORDER BY created_at DESC';
$stmt = $db->query($sql);
$tasks = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ToDoリスト一覧</title>
    <style>
        /* 少し見た目を整えるためのCSS */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn { padding: 5px 10px; text-decoration: none; border-radius: 3px; color: white; }
        .edit-btn { background-color: #28a745; }
        .delete-btn { background-color: #dc3545; }
    </style>
</head>
<body>
    <h1>ToDoリスト一覧</h1>
    
    <a href="add_tasks.php" style="padding: 10px; background: #007bff; color: white; text-decoration: none;">+ 新規TODO作成</a>

    <table>
        <thead>
            <tr>
                <th>タイトル</th>
                <th>内容</th>
                <th>作成日時</th>
                <th>更新日時</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($task['content'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo $task['created_at']; ?></td>
                    <td><?php echo $task['updated_at']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $task['id']; ?>" class="btn edit-btn">編集</a>
                        <a href="delete.php?id=<?php echo $task['id']; ?>" class="btn delete-btn" onclick="return confirm('本当に削除しますか？')">削除</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
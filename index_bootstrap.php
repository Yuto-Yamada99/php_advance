<?php
require_once 'db_connect.php';

// データを取得
$sql = 'SELECT * FROM tasks ORDER BY created_at DESC';
$stmt = $dbh->query($sql);
$tasks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>ToDo</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index_style.css">

</head>
<body>
    <div class="container">
        <div class="header-area d-flex justify-content-between align-items-center">
            <h1>ToDoリスト一覧</h1>
            <a href="add_tasks.php" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> + 新規TODO作成
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
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
                            <td class="align-middle">
                                <?php
                                    echo htmlspecialchars($task['title'], ENT_QUOTES, 'UTF-8');
                        ?>
                            </td>
                            <td class="align-middle">
                                <?php
                            echo htmlspecialchars($task['content'], ENT_QUOTES, 'UTF-8');
                        ?>
                            </td>
                            <td class="align-middle">
                                <?php
                            echo $task['created_at'];
                        ?>
                            </td>
                            <td class="align-middle">
                                <?php
                            echo $task['updated_at'];
                        ?>
                            </td>
                            <td class="align-middle">
                                <a href="edit.php?id=<?php echo $task['id']; ?>" class="btn btn-success btn-sm">編集</a>
                                
                                <a href="delete.php?id=<?php echo $task['id']; ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('本当に削除しますか？')">削除</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
<!DOCTYPE html>
<html lang="ja">

<?php
require_once 'views/head_tmp.php';
?>

<body>
    <h1>Todoリスト一覧</h1>
    <?php
    // データベース接続
    $pdo = new PDO('mysql:host=localhost;dbname=task_list;charset=utf8', 'root', '');

// データベースからデータを取得
// カラム：id/title/content/created_at/updated_at/
$sql = 'SELECT * FROM tasks ORDER BY created_at;';
$stmt = $pdo->prepare($sql);
$stmt->execute();

// 取得したデータの表示
// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     print_r($row);
//     echo '<br>';
// }

?>
    <!-- <a href="add.php"><button type="submit">+新規TODO追加</button></a> -->
    <a class="btn btn-primary" href="add.php">+新規TODO追加</a>

    <table class="table-striped">
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
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['content']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td><?php echo $row['updated_at']; ?></td>
                <td>
                    <!-- <a href="edit_bootstrap.php"><button type="submit">編集</button></a> -->
                    <a class="btn btn-primary" href="edit_bootstrap.php">編集</a>
                    <!-- <button type="submit">削除</button> -->
                    <a class="btn btn-primary" href="edit_bootstrap.php">削除</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
<?php
// 1. データベース接続
$pdo = new PDO('mysql:host=localhost;dbname=task_list;charset=utf8', 'root', '');

// 2. URLの?idを受け取る
$id = $_GET['id'];

// 3. そのIDのデータを1件だけ取得する
$sql = 'SELECT * FROM tasks WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$task = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">

<?php
require_once 'views/head_tmp.php';
?>


<body>
    <h1>Todoを編集</h1>

    <form action="model/edit.php" method="post">
        
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        
        <!-- classでbootstrapで整える -->
        <div class="form-group">
            <label>タイトル</label>
            <input type="txt" class="form-control" name="title" value=<?php echo htmlspecialchars($task['title']); ?>>
        </div>
        <div class="form-group">
            <label for="content">内容</label>
            <textarea name="content" class="form-control" id="content"><?php echo htmlspecialchars($task['content']); ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">変更する</button>
        <a href="index_bootstrap2.php" class="btn btn-secondary">戻る</a>
    </form>

</body>
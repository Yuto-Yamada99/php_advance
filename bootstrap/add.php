<!DOCTYPE html>
<html lang="ja">

<?php
require_once 'views/head_tmp.php';
?>

<body>
    <h1>新規Todoを作成</h1>
    
    <form action="model/insert.php" method="post">
        
        <!-- classでbootstrapで整える -->
        <div class="form-group">
            <label>タイトル</label>
            <input type="txt" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="content">内容</label>
            <textarea name="content" class="form-control" id="content"></textarea>
        </div>
        
        <button type="submit" class="btn btn-secondary">追加する</button>
        <!-- <a href="index_bootstrap.php"><button type="submit">戻る</button></a> -->
        <a href="index_bootstrap2.php" class="btn btn-secondary">戻る</a>
    </form>

</body>
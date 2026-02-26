<?php require 'includes/header.php'; ?>
<?php require_once('includes/connectDbData.php'); ?>
<?php
$pdo = new PDO(ACCESSDB, DBID, DBPW);
$sql=$pdo->prepare('select * from names where name=?');
$sql->execute([$_POST['name']]);
$row=$sql->fetch();
if ($row) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];

    echo '<div class="wrap">';
    echo '<p>「', $_POST['name'], '」は元気だよ！</p>';
    echo '<a href="index.php">様子を見る ▶</a>';
    echo '</div>';
} else {
    echo '<div class="wrap">';
    echo '<p>名前が違うみたい…</p>';
    echo '<a href="login-input.php">前の画面に戻る</a>';
    echo '</div>';
}
?>
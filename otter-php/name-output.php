<?php require 'includes/header.php'; ?>
<?php require_once('includes/connectDbData.php'); ?>
<?php
$pdo = new PDO(ACCESSDB, DBID, DBPW);

if (!isset($_POST['name'])) {
    echo '<p>名前を入力してください</p>';
    echo '<a href="name.php">前の画面に戻る</a>';
}

$sql=$pdo->prepare('select * from names where name=?');
$sql->execute([$_POST['name']]);

if (!empty($sql->fetch())) {
    echo '<div class="wrap">';
    echo '<p>そのなまえは既に登録済みだよ</p>';
    echo '<a href="name-input.php">前の画面に戻る</a>';
    echo '</div>';
} else {
    $sql=$pdo->prepare('insert into names values(null,?)');
    $sql->execute([$_POST['name']]);
    $id = $pdo->lastInsertId(); // insertした列のautoincrementのidを取得する

    $sql=$pdo->prepare('insert into animals(id) value(?)');
    $sql->execute([$id]);

    $_SESSION['id'] = $id;
    $_SESSION['name'] = $_POST['name'];

    echo '<div class="wrap">';
    echo '<p>命名完了</p>';
    echo '<a href="index.php">様子を見る ▶</a>';
    echo '</div>';
}
?>
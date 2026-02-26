<?php require 'includes/header.php'; ?>
<?php require_once('includes/connectDbData.php'); ?>
<?php
$pdo=new PDO(ACCESSDB, DBID, DBPW);
$count = $_POST['count'];
if ($_SESSION['money'] >= 10 * $count) {
    if ($_SESSION['name'] == 'あらいぐま') {
        $sql=$pdo->prepare('update animals set total_spend = total_spend + ?, 
                            hunger = least(240, greatest(0, hunger + ?)) where id=?');
        $sql->execute([10 * $count, 10 * $count, $_SESSION['id']]);
        $_SESSION['flash'] = 'ごみ箱を漁れて喜んでるみたい！'; 
    } else {
        $sql=$pdo->prepare('update animals set total_spend = total_spend + ?, 
                            hunger = least(240, greatest(0, hunger - ?)) where id=?');
        $sql->execute([10 * $count, 10 * $count, $_SESSION['id']]);
        $_SESSION['flash'] = 'ごみ箱は好きじゃないみたい…'; 
    }
    header('location: index.php');
    exit;
} else {
    $_SESSION['flash'] = 'お金が不足しているみたい！'; 
    header('location: index.php');
    exit;
}
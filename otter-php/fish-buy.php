<?php require 'includes/header.php'; ?>
<?php require_once('includes/connectDbData.php'); ?>
<?php
$pdo=new PDO(ACCESSDB, DBID, DBPW);
$count = $_POST['count'];
if ($_SESSION['money'] >= 50 * $count) {
    $sql=$pdo->prepare('update animals set total_spend = total_spend + ?, 
                        hunger = least(240, greatest(0, hunger + ?)) where id=?'); // 最大 = 240, 最小 = 0
    $sql->execute([50 * $count, 10 * $count, $_SESSION['id']]);
    $_SESSION['flash'] = 'さかなを食べて喜んでるみたい！'; 
    header('location: index.php');
    exit;
} else {
    $_SESSION['flash'] = 'お金が不足しているみたい！'; 
    header('location: index.php');
    exit;
}
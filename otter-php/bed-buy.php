<?php require 'includes/header.php'; ?>
<?php require_once('includes/connectDbData.php'); ?>
<?php
$pdo=new PDO(ACCESSDB, DBID, DBPW);
$sql=$pdo->prepare('select has_bed from animals where id=?');
$sql->execute([$_SESSION['id']]);
$row=$sql->fetch();
if ($row['has_bed'] == 0) {
    if ($_SESSION['money'] >= 100) {
        $sql=$pdo->prepare('update animals set total_spend = total_spend + 100, has_bed=1 where id=?');
        $sql->execute([$_SESSION['id']]);
    }
    header('location: index.php');
    exit;
} else {
    header('location: index.php');
    exit;
}
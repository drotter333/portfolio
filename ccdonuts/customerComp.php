<?php require 'includes/header.php'; ?>
<main class="compArea">
<div class="mainTitle"><h1>会員登録完了</h1></div>
<?php require_once('includes/connectDbData.php'); ?>
<?php
$pdo = new PDO(ACCESSDB, DBID, DBPW);

// 重複チェック
// if (isset($_SESSION['customers'])) {
//     $id=$_SESSION['customers']['id'];
//     $sql=$pdo->prepare('select * from customers where id!=? and mail=?');
//     $sql->execute([$id, $_REQUEST['mail']]);
// } else {
//     $sql=$pdo->prepare('select * from customers where mail=?');
//     $sql->execute([$_REQUEST['mail']]); }
// if (!empty($sql->fetchAll())) {
//     echo '登録済みです。'; }

$sql=$pdo->prepare('insert into customers values(null,?,?,?,?,?,?,?)');
$sql->execute([
    $_REQUEST['name'], $_REQUEST['furigana'], $_REQUEST['postcode_a'], $_REQUEST['postcode_b'], 
    $_REQUEST['address'], $_REQUEST['mail'], $_REQUEST['password']]);
echo '<div class="compWrapp">';
echo '<p>会員登録が完了しました。</p>';
echo '<p>ログインページへお進みください。</p>';
echo '</div>';
?>
<div class="links">
    <a href="#">クレジットカード登録へすすむ</a>
    <a href="#">購入確認ページへすすむ</a>
</div>
<?php require 'includes/footer.php'; ?>
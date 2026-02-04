<?php require 'includes/header.php'; ?>
<main class="compArea">
<?php require_once('includes/connectDbData.php'); ?>
<?php
$pdo = new PDO(ACCESSDB, DBID, DBPW);
$sql=$pdo->prepare('insert into card values(null,?,?,?,?,?,?)');
$sql->execute([
    $_SESSION['customers']['id'], $_REQUEST['card_number'], $_REQUEST['card_brand'],  
    $_REQUEST['month'], $_REQUEST['year'], $_REQUEST['security_code']]);
$_SESSION['card'] = [
    'card_brand' => $_REQUEST['card_brand']];
echo '<div class="mainTitle"><h1>カード情報登録完了</h1></div>';
echo '<div class="compWrapp">';
echo '<p>支払い情報登録が完了しました。</p>';
echo '<p>続けて購入確認ページへお進みください。</p>';
echo '</div>';
echo '<div class="links">';
echo '<a href="purchaseConfirm.php">購入確認ページへすすむ</a>';
echo '</div>';
?>
</main>
<?php require 'includes/footer.php'; ?>
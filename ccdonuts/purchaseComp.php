<?php $purchaseTitle = '購入完了'; ?>
<?php require 'includes/header.php'; ?>
<main class="compArea">
<div class="mainTitle"><h1>ご購入完了</h1></div>
<?php require_once('includes/connectDbData.php'); ?>
<?php
$pdo = new PDO(ACCESSDB, DBID, DBPW);
$purchase_id = $pdo->lastInsertId();
$sql=$pdo->prepare('insert into purchase values(?,?)');
if ($sql->execute([$purchase_id, $_SESSION['customers']['id']])) {
	foreach ($_SESSION['products'] as $products_id=>$products) {
		$sql=$pdo->prepare('insert into purchase_detail values(?,?,?)');
		$sql->execute([$purchase_id, $products_id, $products['count']]);
	}
    unset($_SESSION['products']);
    echo '<div class="compWrapp">';
    echo '<p>ご購入いただきありがとうございます。</p>';
    echo '<p>今後ともご愛顧の程、宜しくお願いいたします。</p>';
    echo '</div>';
    echo '<div class="links">';
    echo '<a href="#">TOPページへすすむ</a>';
    echo '</div>';
}
?>
</main>
<?php require 'includes/footer.php'; ?>
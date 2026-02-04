<?php $pageTitle = '商品一覧'; ?>
<?php require 'includes/header.php'; ?>
<main>
<section class="catalogSec">
<div class="catalogTitle"><h1>商品一覧</h1></div>
<p class="subTitle">メインメニュー</p>
<ul class="mainMenu">
<?php require_once('includes/connectDbData.php'); ?>
<?php
$pdo =  new PDO(ACCESSDB, DBID, DBPW);
$sql=$pdo->query('select * from products');

foreach ($sql as $row) {
    $id=$row['id'];
    echo '<li>';
    echo '<img src="images/', $row['id'], '.png">';
    echo '<img src="images/sp', $row['id'], '.png" class="spOnly">';
    echo '<p class="text">', $row['name'], '</p>';
    echo '<p class="price">税込￥', number_format($row['price']), '</p>'; // number_format＝桁区切りを付ける
    echo '<div class="cartBtn"><a href="detail.php?id=', $id, '"><button>カートに入れる</button></a></div>';
    echo '</li>';
}

?>
</ul>
</section>
</main>
<?php require 'includes/footer.php'; ?>
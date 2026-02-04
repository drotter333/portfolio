<?php require 'includes/header.php'; ?>
<main>
<section class="catalogSec">
<div class="catalogTitle"><h1>商品一覧</h1></div>
<p class="subTitle">検索結果</p>
<ul class="mainMenu">
<?php require_once('includes/connectDbData.php'); ?>
<?php
$pdo =  new PDO(ACCESSDB, DBID, DBPW);
$sql=$pdo->prepare('select * from products where name like ?');
$sql->execute(['%'.$_REQUEST['keyword'].'%']);
foreach ($sql as $row) {
    echo '<li>';
    echo '<img src="images/', $row['id'], '.png">';
    echo '<img src="images/sp', $row['id'], '.png" class="spOnly">';
    echo '<p class="text">', $row['name'], '</p>';
    echo '<p class="price">税込￥', number_format($row['price']), '</p>'; //桁区切りを付ける
    echo '<div class="cartBtn"><a href="detail.php?id=', $id, '"><button>カートに入れる</button></a></div>';
    echo '</li>';
}
?>
</ul>
</section>
</main>
<?php require 'includes/footer.php'; ?>
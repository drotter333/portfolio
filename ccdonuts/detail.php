<?php require_once('includes/connectDbData.php'); ?>
<?php
$pdo = new PDO(ACCESSDB, DBID, DBPW);
$sql=$pdo->prepare('select * from products where id=?');
$sql->execute([$_REQUEST['id']]);
$row = $sql->fetch(); // fetchで1件のみ取得（※foreachは複数件）

$pageTitle = '商品一覧';
$productName = $row['name'];
require 'includes/header.php';

echo '<main class="detail">';
echo '<div class="detailImage">';
echo '<img src="images/', $row['id'], '.png">';
echo '</div>';
echo '<form action="cart.php" method="post">';
echo '<div>';
echo '<h2>', $row['name'], '</h2>';
echo '<p class="text">', $row['introduction'], '</p>';
echo '<p class="price">税込￥ ', number_format($row['price']), '</p>';
echo '<div class="selectArea">';
echo '<select name="count">';
for ($i=1; $i<=10; $i++) {
    echo '<option value="', $i, '">', $i, '</option>';
}
echo '</select>';
echo '<span>個</span>';

echo '<input type="hidden" name="id" value="', $row['id'], '">';
echo '<input type="hidden" name="name" value="', $row['name'], '">';
echo '<input type="hidden" name="price" value="', $row['price'], '">';

echo '<div class="submit"><input type="submit" value="カートに入れる"></div>'; 
echo '</form>';
echo '<div class="heart"><img src="images/heart.png"></div>';
echo '</div>';
echo '</div>';
?>
</main>
<?php require 'includes/footer.php'; ?>
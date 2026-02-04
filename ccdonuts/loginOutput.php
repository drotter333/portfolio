<?php $loginTitle = 'ログイン完了'; ?>
<?php require 'includes/header.php'; ?>
<main class="compArea">
<?php require_once('includes/connectDbData.php'); ?>
<?php
$pdo =  new PDO(ACCESSDB, DBID, DBPW);
$sql=$pdo->prepare('select * from customers where mail=? and password=?');
$sql->execute([$_REQUEST['mail'], $_REQUEST['password']]);
foreach ($sql as $row) {
    $_SESSION['customers']=[
    'id'=>$row['id'], 'name'=>$row['name'], 'furigana'=>$row['furigana'], 'postcode_a'=>$row['postcode_a'], 
    'postcode_b'=>$row['postcode_b'], 'address'=>$row['address'], 'mail'=>$row['mail'], 'password'=>$row['password']];
}
if (isset($_SESSION['customers'])) {
    echo '<div class="mainTitle"><h1>ログイン完了</h1></div>';
    echo '<div class="compWrapp">';
    echo '<p>ログインが完了しました。</p>';
    echo '<p>引き続きお楽しみください。</p>';
    echo '</div>';
    echo '<div class="links">';
    echo '<a href="#">購入確認ページへすすむ</a>';
    echo '<a href="#">TOPページへもどる</a>';
    echo '</div>';
} else {
    echo '<div class="mainTitle"><h1>ログイン失敗</h1></div>';
    echo '<div class="compWrapp">';
    echo '<p>ログイン名またはパスワードが違います。</p>';
    echo '</div>';
    echo '<div class="links">';
    echo '<a href="#">購入確認ページへすすむ</a>';
    echo '<a href="#">TOPページへもどる</a>';
    echo '</div>';
}
?>
</main>
<?php require 'includes/footer.php'; ?>
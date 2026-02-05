<?php $purchaseTitle = '購入確認'; ?>
<?php require 'includes/header.php'; ?>
<main class="purchaseArea">
<div class="mainTitle"><h1>ご購入確認</h1></div>
<div class="purchaseTitle"><p>ご購入商品</p><div>
<?php
$totalCount = 0;
$totalPrice = 0;
foreach ($_SESSION['products'] as $products) {
    $totalCount += $products['count'];
    $totalPrice += $products['price'] * $products['count'];
    echo '<dl>';
    echo '<div class="purchaseRow">';
    echo '<dt>商品名</dt>';
    echo '<dd>' . $products['name'] . '</dd>';
    echo '</div>';
    echo '<div class="purchaseRow">';
    echo '<dt>数量</dt>';
    echo '<dd>', $products['count'], '個</dd>';
    echo '</div>';
    echo '<div class="purchaseRow">';
    echo '<dt>金額</dt>';
    echo '<dd>税込￥ ', number_format($products['price']), '</dd>';
    echo '</div>';
    echo '</dl>';
}
echo '<dl>';
echo '<div class="purchaseRow">';
echo '<dt class="sum">合計数量</dt>';
echo '<dd class="sum">', $totalCount, ' 個</dd>';
echo '</div>';
echo '<div class="purchaseRow">';
echo '<dt class="sum">合計金額</dt>';
echo '<dd class="sum">税込 ￥', number_format($totalPrice), '</dd>';
echo '</div>';
echo '</dl>';

echo '<div class="purchaseTitle"><p>お届け先</p></div>';

if (isset($_SESSION['customers'])) {
    echo '<dl>';
    echo '<div class="purchaseRow">';
    echo '<dt>お名前</dt>';
    echo '<dd>', $_SESSION['customers']['name'], '</dd>';
    echo '</div>';
    echo '<div class="purchaseRow">';
    echo '<dt>郵便番号</dt>';
    echo '<dd>', $_SESSION['customers']['postcode_a'], '', $_SESSION['customers']['postcode_b'], '</dd>';
    echo '</div>';
    echo '<div class="purchaseRow">';
    echo '<dt>住所</dt>';
    echo '<dd>', $_SESSION['customers']['address'], '</dd>';
    echo '</div>';
    echo '</dl>';
} else {
   echo '<dl>';
   echo '<div class="purchaseRow">';
   echo '<dt></dt>';
   echo '<dd>お客様情報はありません</dd>';
   echo '</div>';
   echo '</dl>';
}
?>
    <div class="purchaseTitle"><p>支払い方法</p><div>
    <div class="enter">
        <div class="submit">
            <form action="card.php">
                <input type="submit" value="カード情報登録する">
            </form>
        </div>
        <a href="card.php">カード情報登録がまだのお客様はこちらへお進みください。</a>
    </div>
</main>
<?php require 'includes/footer.php'; ?>
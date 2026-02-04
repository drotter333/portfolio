<?php require 'includes/header.php'; ?>
<main class="cardArea">
<div class="mainTitle"><h1>会員登録</h1></div>
<?php
if (!isset($_SESSION['customers'])) {
    echo '<p>カード情報を登録するには、ログインしてください。</p>';
} else {
    echo '<p class="label">当サイトは模擬サイトですので、実際のクレジットカード情報は登録しないでください</p>';
    $user=$card_number=$month=$year=$security_code='';
    echo '<form action="cardConfirm.php" method="post">';
    echo '<p>お名前<span class="required">（必須）</span></p>';
    echo '<input type="text" name="user" value="', $_SESSION['customers']['name'], '">';
    echo '<p>カード番号<span class="required">（必須）</span></p>';
    echo '<input type="text" name="card_number" value="', htmlspecialchars($card_number), '">';
    echo '<p>カード会社<span class="required">（必須）</span></p>';
    echo '<div class="radioBtn">';
    echo '<input type="radio" name="card_brand" id="jcb" value="JCB">';
    echo '<label for="jcb">JCB</label>';
    echo '<input type="radio" name="card_brand" id="visa" value="VISA">';
    echo '<label for="visa">Visa</label>';
    echo '<input type="radio" name="card_brand" id="mc" value="Mastercard">';
    echo '<label for="mc">Mastercard</label>';
    echo '</div>';
    echo '<p>有効期限<span class="required">（必須）</span></p>';
    echo '<div class="date">';
    echo '<div class="dateTop"><input type="text" name="month" value="', htmlspecialchars($month), '">月</div>';
    echo '<div class="dateBot"><input type="text" name="year" value="', htmlspecialchars($year), '">年</div>';
    echo '</div>';
    echo '<p>セキュリティコード<span class="required">（必須）</span></p>';
    echo '<input type="text" name="security_code" value="', htmlspecialchars($security_code), '">';
    echo '<div class="submit"><input type="submit" value="入力確認する"></div>';
    echo '</form>';
}
?>
</main>
<?php require 'includes/footer.php'; ?>
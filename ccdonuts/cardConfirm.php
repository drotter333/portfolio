<?php require 'includes/header.php'; ?>
<main class="outputArea">
<div class="mainTitle"><h1>入力情報確認</h1></div>
<?php
echo '<div class="outputWrapp">';
echo '<p>お名前</p>';
echo '<p class="information">', $_SESSION['customers']['name'], '</p>';
echo '<p>カード番号</p>';
echo '<p class="information">', $_REQUEST['card_number'], '</p>';
echo '<p>カード会社</p>';
echo '<p class="information">', $_REQUEST['card_brand'], '</p>';
echo '<p>有効期限</p>';
echo '<div class="dateTop"><p class="information">', $_REQUEST['month'], '</p>月</div>';
echo '<div class="dateBot"><p class="information">', $_REQUEST['year'], '</p>年</div>';
echo '<p>セキュリティコード</p>';
echo '<p class="information">', $_REQUEST['security_code'], '</p>';

echo '<form action="cardComp.php" method="post">'; // 非表示にして登録画面に渡す
echo '<input type="hidden" name="user" value="', $_SESSION['customers']['id'], '">';
echo '<input type="hidden" name="card_number" value="', $_REQUEST['card_number'], '">';
echo '<input type="hidden" name="card_brand" value="', $_REQUEST['card_brand'], '">';
echo '<input type="hidden" name="month" value="', $_REQUEST['month'], '">';
echo '<input type="hidden" name="year" value="', $_REQUEST['year'], '">';
echo '<input type="hidden" name="security_code" value="', $_REQUEST['security_code'], '">';

echo '<div class="submit"><input type="submit" value="登録する"></div>';
echo '</form>';
echo '</div>';
?>
</main>
<?php require 'includes/footer.php'; ?>
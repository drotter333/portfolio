<?php require 'includes/header.php'; ?>
<?php 
$mail = $_REQUEST['mail'];
if (!preg_match('/^[^@]+@[^@]+$/', $mail)) { // [^@]（@以外の任意の文字）
    echo '<p class="label">メールアドレスが適切ではありません。</p>';
}
$mail = $_POST['mail'];
$mail_confirm = $_POST['mail_confirm'];
if ($mail !== $mail_confirm) {
    echo '<p class="label">メールアドレスが一致しません。</p>';
}
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
if ($password !== $password_confirm) {
    echo '<p class="label">パスワードが一致しません。</p>';
}

echo '<main class="outputArea">';
echo '<div class="mainTitle"><h1>入力確認</h1></div>';
echo '<div class="outputWrapp">';
echo '<p>お名前</p>';
echo '<p class="information">', $_REQUEST['name'], '</p>';
echo '<p>お名前（フリガナ）</p>';
echo '<p class="information">', $_REQUEST['furigana'], '</p>';
echo '<p>郵便番号</p>';
echo '<p class="information">', $_REQUEST['postcode_a'], '', $_REQUEST['postcode_b'], '</p>';
echo '<p>住所</p>';
echo '<p class="information">', $_REQUEST['address'], '</p>';
echo '<p>メールアドレス</p>';
echo '<p class="information">', $_REQUEST['mail'], '</p>';
echo '<p>メールアドレス（確認用）</p>';
echo '<p class="information">', $_REQUEST['mail_confirm'], '</p>';
echo '<p>パスワード</p>';
echo '<p class="information">', $_REQUEST['password'], '</p>';
echo '<p>パスワード（確認用）</p>';
echo '<p class="information">', $_REQUEST['password_confirm'], '</p>';

echo '<form action="customerComp.php" method="post">'; // 非表示にして登録画面に渡す
echo '<input type="hidden" name="name" value="', $_REQUEST['name'], '">';
echo '<input type="hidden" name="furigana" value="', $_REQUEST['furigana'], '">';
echo '<input type="hidden" name="postcode_a" value="', $_REQUEST['postcode_a'], '">';
echo '<input type="hidden" name="postcode_b" value="', $_REQUEST['postcode_b'], '">';
echo '<input type="hidden" name="address" value="', $_REQUEST['address'], '">';
echo '<input type="hidden" name="mail" value="', $_REQUEST['mail'], '">';
echo '<input type="hidden" name="password" value="', $_REQUEST['password'], '">';

echo '<div class="submit"><input type="submit" value="登録する"></div>';
echo '</form>';
echo '</div>';
echo '</main>';
?>
<?php require 'includes/footer.php'; ?>
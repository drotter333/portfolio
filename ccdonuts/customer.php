<?php require 'includes/header.php'; ?>
<?php
// if (isset($_SESSION['customers'])) {
//     $name=$_SESSION['customers']['name'];
//     $furigana=$_SESSION['customers']['furigana'];
//     $postcode_a=$_SESSION['customers']['postcode_a'];
//     $postcode_b=$_SESSION['customers']['postcode_b'];
//     $address=$_SESSION['customers']['address'];
//     $mail=$_SESSION['customers']['mail'];
//     $password=$_SESSION['customers']['password']; }

echo '<main class="customerArea">';
echo '<div class="mainTitle"><h1>会員登録</h1></div>';

$name=$furigana=$postcode_a=$postcode_b=$address=$mail=$password='';
echo '<form action="customerConfirm.php" method="post">'; // パスワードが平文で表示されている　xss対策は最低限
echo '<p>お名前<span class="required">（必須）</span></p>';
echo '<input type="text" name="name" value="', htmlspecialchars($name), '">';
echo '<p>お名前（フリガナ）<span class="required">（必須）</span></p>';
echo '<input type="text" name="furigana" value="', htmlspecialchars($furigana), '">';
echo '<p>郵便番号<span class="required">（必須）</span></p>';
echo '<div class="postCode">';
echo '<input type="text" class="postCodeL" name="postcode_a" value="', htmlspecialchars($postcode_a), '">';
echo '<input type="text" class="postCodeR" name="postcode_b" value="', htmlspecialchars($postcode_b), '">';
echo '</div>';
echo '<p>住所<span class="required">（必須）</span></p>';
echo '<input type="text" name="address" value="', htmlspecialchars($address), '">';
echo '<p>メールアドレス<span class="required">（必須）</span></p>';
echo '<input type="email" name="mail" value="', htmlspecialchars($mail), '">';
echo '<p>メールアドレス（確認用）<span class="required">（必須）</span></p>';
echo '<input type="email" name="mail_confirm">';
echo '<p>パスワード<span class="required">（必須）</span></p>';
echo '<p class="label">半角英数字8文字以上20文字以内で入力してください。※記号の使用はできません</p>';
echo '<input type="password" name="password" value="', htmlspecialchars($password), '">';
echo '<p>パスワード（確認用）<span class="required">（必須）</span></p>';
echo '<input type="password" name="password_confirm">';
echo '<div class="submit"><input type="submit" value="入力確認する"></div>';
echo '</form>';
?>
<?php require 'includes/footer.php'; ?>
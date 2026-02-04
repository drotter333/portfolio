<?php $pageTitle = 'ログイン'; ?>
<?php require 'includes/header.php'; ?>
<main class="loginArea">
    <div class="mainTitle"><h1>ログイン</h1></div>
    <form action="loginOutput.php" method="post">
        <p>メールアドレス</p>
        <input type="text" name="mail">
        <p>パスワード</p>
        <input type="password" name="password">
        <div class="submit"><input type="submit" value="ログインする"></div>
    </form>
    <a href="customer.php">会員登録はこちら</a>
</main>
<?php require 'includes/footer.php'; ?>
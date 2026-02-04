<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common/reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Zen+Kaku+Gothic+New&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">

    <?php
    if (isset($pageTitle)) {
        echo '<title>', $pageTitle, '</title>';
    } else if (isset($loginTitle)) {
        echo '<title>', $loginTitle, '</title>';
    } else if (isset($logoutTitle)) {
        echo '<title>', $logoutTitle, '</title>';
    } else if (isset($purchaseTitle)) {
        echo '<title>', $purchaseTitle, '</title>';
    }
    ?>
    
</head>
<body>
<header>
    <div class="headerTop">
        <nav class="gMenu">
            <input class="menuBtn" type="checkBox" id="menuBtn">
            <label class="menuIcon" for="menuBtn">
                <span class="navicon"></span>
            </label>
            <ul class="menuSp">
                <li class="menuLogo"><img src="images/pcHeaderLogo.png"></li>
                <li><a href="index.php">top</a></li>
                <li><a href="product.php">商品一覧</a></li>
                <li><a href="#">よくあるご質問</a></li>
                <li><a href="#">問い合わせ</a></li>
                <li><a href="#">当サイトのポリシー</a></li>
            </ul>
        </nav>
        <a href="index.php"><img src="images/pcHeaderLogo.png" class="headerLogo"></a>
        <div class="headerImages">
            <?php
            if (isset($_SESSION['customers'])) {
                echo '<div class="logout"><a href="logoutInput.php"><img src="images/logout.png"></a></div>';
            } else {
                echo '<div class="login"><a href="loginInput.php"><img src="images/login.png"></a></div>';
            }
            ?>
            <div class="cart"><a href="cart.php"><img src="images/cart.png"></a></div>
        </div>
    </div>
    <div class="headerBot">
        <form action="search.php" method="post"> 
            <input type="image" src="images/search.png" alt="検索" class="search"><input type="text" name="keyword" class="inputText">
        </form>
    </div>
</header>
<?php
if (isset($pageTitle) && isset($productName)) {
    echo '<p class="breadcrumb">TOP＞', $pageTitle, '＞', $productName, '</p>';
} else if (isset($pageTitle)) {
    echo '<p class="breadcrumb">TOP＞', $pageTitle, '</p>';
} else if (isset($loginTitle)) {
    echo '<p class="breadcrumb">TOP＞ログイン＞', $loginTitle, '</p>';
} else if (isset($logoutTitle)) {
    echo '<p class="breadcrumb">TOP＞ログイン＞', $logoutTitle, '</p>';
} else if (isset($purchaseTitle)) {
    echo '<p class="breadcrumb">TOP＞カート＞', $purchaseTitle, '</p>';
}

if (isset($_SESSION['customers'])) {
    echo '<p class="headerText">ようこそ　', $_SESSION['customers']['name'], '様</p>';
} else {
    echo '<p class="headerText">ようこそ　ゲスト様</p>';
}
?>
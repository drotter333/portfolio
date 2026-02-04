<?php $logoutTitle = 'ログアウト完了'; ?>
<?php require 'includes/header.php'; ?>
<main class="compArea">
<?php
if (isset($_SESSION['customers'])) {
    unset($_SESSION['customers']);
    echo '<div class="mainTitle"><h1>ログアウト成功</h1></div>';
    echo '<div class="compWrapp">';
    echo '<p>ログアウトしました。</p>';
    echo '</div>';
    echo '<div class="links">';
    echo '<a href="#">購入確認ページへすすむ</a>';
    echo '<a href="#">TOPページへもどる</a>';
    echo '</div>';
} else {
    echo '<div class="mainTitle"><h1>ログアウト失敗</h1></div>';
    echo '<div class="compWrapp">';
    echo '<p>すでにログアウトしています。</p>';
    echo '</div>';
    echo '<div class="links">';
    echo '<a href="#">購入確認ページへすすむ</a>';
    echo '<a href="#">TOPページへもどる</a>';
    echo '</div>';
}
?>
</main>
<?php require 'includes/footer.php'; ?>
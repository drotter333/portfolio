<?php $loginTitle = '購入確認'; ?>
<?php require 'includes/header.php'; ?>
<main class="purchaseArea">
    <div class="mainTitle"><h1>ご購入確認</h1></div>
    <div class="purchaseTitle"><p>ご購入商品</p><div>
    <?php
    if (!isset($_SESSION['customers'])) {
	    echo '購入手続きを行うにはログインしてください。';
    } else if (empty($_SESSION['products'])) {
        echo 'カートに商品がありません。';
    } else {
        $totalCount = 0;
        $totalPrice = 0;     
        foreach ($_SESSION['products'] as $products) {
            $totalCount += $products['count'];
            $totalPrice += $products['price'] * $products['count'];
            echo '<dl>';
            echo '<div class="purchaseRow">';
            echo '<dt>商品名</dt>';
            echo '<dd>', $products['name'], '</dd>';
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

        echo '<div class="purchaseTitle"><p>支払い方法</p></div>';
        echo '<dl>';
        echo '<div class="purchaseRow">';
        echo '<dt>お支払い</dt>';

        require_once('includes/connectDbData.php');
        $pdo = new PDO(ACCESSDB, DBID, DBPW);
        $sql = $pdo->prepare('select card_brand from card where user_id = ?');
        $sql->execute([$_SESSION['customers']['id']]); // customersのidとcardのuser_idを紐づけているため
        $card = $sql->fetch();
        if ($card !== false) {
            echo '<dd>クレジットカード</dd>';
            echo '</div>';
            echo '<div class="purchaseRow">';
            echo '<dt>ブランド</dt>';
            echo '<dd>', $card['card_brand'], '</dd>';
            echo '</div>';
        } else {
            echo '<dd>現金支払い</dd>';
        }
        echo '</div>';
        echo '</dl>';

        echo '<div class="submit">';
        echo '<form action="purchaseComp.php">';
        echo '<input type="submit" value="購入を確定する" class="buy">';
        echo '</form>';
        echo '</div>';
    }
    ?>
</main>
<?php require 'includes/footer.php'; ?>
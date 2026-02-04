<?php require 'includes/header.php'; ?>
<main>
    <img src="images/pcHero.png">
    <img src="images/spHero.png" class="spOnly">
    <section class="topSec">
        <div class="topImages">
            <div class="newProduct">
                <img src="images/pcSummerCitrus.png">
                <img src="images/spSummerCitrus.png" class="spOnly">
            </div>
            <div class="chocolateDonuts">
                <img src="images/pcChocolateDonuts.png">
                <img src="images/spChocolateDonuts.png" class="spOnly">
            </div>
        </div>
        <div class="product">
            <a href="product.php" ><img src="images/pcProduct.png"></a>
            <a href="product.php"><img src="images/spProduct.png" class="spOnly"></a>
        </div>
    </section>
    <div class="contents">
        <img src="images/pcContent.png">
        <img src="images/spContent.png" class="spOnly">
    </div>
    <section class="botSec">
    <div class="botTitle"><h1>人気ランキング</h1></div>
    <?php require_once('includes/connectDbData.php'); ?>
    <?php
    $pdo = new PDO(ACCESSDB, DBID, DBPW);

    //  .の意味：（テーブル.列）
    // 取得したいデータ：select products.id as product_id, products.name, products.price, SUM(purchase_detail.count) AS total_count
    // どのテーブルから：from purchase_detail
    // joinの意味：複数のテーブルを、共通の列を使って合体させる
    // 2つのテーブルをidを使って結合：join products on purchase_detail.product_id = products.id
    // group byの意味：同じ値の行をひとまとめにする
    // 商品ごとにまとめる：group by purchase_detail.product_id, products.name, products.price
    $sql = $pdo->query('select products.id as product_id, products.name, products.price,
                        SUM(purchase_detail.count) as total_count
                        from purchase_detail
                        join products on purchase_detail.product_id = products.id
                        group by purchase_detail.product_id, products.name, products.price
                        order by total_count desc limit 6');

    $ranking = $sql->fetchAll();
    echo '<ol class="ranking">';
    $rank = 1;
    foreach ($ranking as $products) {
        echo '<li>';

        if ($rank == 1) {
            echo '<span class="first">', $rank, '</span>';
        } else if ($rank == 2) {
            echo '<span class="second">', $rank, '</span>';
        } else if ($rank == 3) {
            echo '<span class="third">', $rank, '</span>';
        } else {
            echo '<span>', $rank, '</span>';
        }

        echo '<img src="images/', $products['product_id'], '.png">';
        echo '<img src="images/sp', $products['product_id'], '.png" class="spOnly">';
        echo '<p class="text">', $products['name'], '</p>';
        echo '<p class="price">税込￥', number_format($products['price']), '</p>';
        echo '<div class="cartBtn"><button>カートに入れる</button></div>';
        echo '</li>';
        
        $rank++;
    }
    echo '</ol>';
    ?>
        <div class="botRank">
        </div>
    </section>
</main>
<?php require 'includes/footer.php'; ?>
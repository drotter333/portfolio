<?php $pageTitle = 'カート'; ?>
<?php require 'includes/header.php'; ?>
<main class="cartArea">
<?php
if (!isset($_SESSION['products'])) {
    $_SESSION['products']=[];
}
if (isset($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['price'], $_REQUEST['count'])) {
    $id = $_REQUEST['id'];
    $_SESSION['products'][$id]=[
    'name'=>$_REQUEST['name'], 'price'=>$_REQUEST['price'], 'count'=>$_REQUEST['count']
    ];
}
$totalCount = 0;
$totalPrice = 0;

if (!empty($_SESSION['products'])) {
    foreach ($_SESSION['products'] as $products) {
    $totalCount += $products['count'];
    $totalPrice += $products['price'] * $products['count'];
    }
    echo '<div class="check">';
    echo '<p>現在　商品 ', $totalCount, ' 点</p>';
    echo '<p>合計小計：税込 ￥', number_format($totalPrice), '</p>';
    echo '<a href="purchase.php"><button>購入確認へ進む</button></a>';
    echo '</div>';
    foreach ($_SESSION['products'] as $id=>$products) {
        echo '<div class="cartContainer">';
        echo '<img src="images/', $id, '.png" class="cartImage">';
        echo '<div class="cartWrapp">';
        echo '<h2>', $products['name'], '</h2>';
        echo '<div class="cartItem">';
        echo '<p class="price">税込￥ ', number_format($products['price']), '</p>';
        echo '<div>';

        echo '<form action="cartUpdate.php" method="post">';
        echo '<input type="hidden" name="id" value="', $id, '">';
        echo '<span>数量</span>';
        echo '<select name="count">';
        for ($i=1; $i<=10; $i++) {
            if ($i == $products['count']) {
                echo '<option value="', $i, '" selected>', $i, '</option>';
            } else {
                echo '<option value="', $i, '">', $i, '</option>';
            }
        }
        echo '</select>';
        echo '<span>個</span>';
        echo '</div>';
        echo '</div>';
        echo '<button>再計算</button>';
        echo '</form>';

        echo '<a href="cartDelete.php?id=', $id, '">削除する</a>';
        echo '</div>';
        echo '</div>';
    }
    echo '<div class="check">';
    echo '<p>現在　商品 ', $totalCount, ' 点</p>';
    echo '<p>合計小計：税込 ￥', number_format($totalPrice), '</p>';
    echo '<a href="purchase.php"><button>購入確認へ進む</button></a>';
    echo '</div>';
}
?>
<div class="cartBtn"><a href="product.php"><button>買い物を続ける</button></a></div>
</main>
<?php require 'includes/footer.php'; ?>
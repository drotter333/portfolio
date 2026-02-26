<?php require 'includes/header.php'; ?>
<?php require_once('includes/connectDbData.php'); ?>
<body>
<div class="loading" id="loading">
    <p class="loadText">読み込み中…</p>
    <div class="content">
        <h1>かわうその雑学</h1>
        <p id="tipsText"></p>
    </div>
</div>
<?php
$pdo = new PDO(ACCESSDB, DBID, DBPW);

$sql=$pdo->prepare('select created_at, last_login from animals where id=?');
$sql->execute([$_SESSION['id']]);
$row=$sql->fetch();
$created = new Datetime($row['created_at']);
$last = new DateTime($row['last_login']);
$now = new Datetime();
$seconds = max(0, $last->getTimestamp() - $created->getTimestamp());
$mins = $seconds / 60;
$hours = $seconds / 3600;
$interval = max(0, $now->getTimestamp() - $last->getTimestamp());

// 空腹度
$sql=$pdo->prepare('select hunger from animals where id=?');
$sql->execute([$_SESSION['id']]);
$row=$sql->fetch();
$hunger = max(0, $row['hunger'] - ($interval / 3600) * 10);
$sql=$pdo->prepare('update animals set hunger=? where id=?');
$sql->execute([$hunger, $_SESSION['id']]);

// 時間取得
$sql=$pdo->prepare('select * from animals where id=?');
$sql->execute([$_SESSION['id']]);
$row=$sql->fetch();
if ($row) {
    $sql=$pdo->prepare('update animals set last_login = now() where id=?');
    $sql->execute([$_SESSION['id']]);  
} else {
    $sql=$pdo->prepare('insert into animals (id, last_login) values (?, now())');
    $sql->execute([$_SESSION['id']]);
}

// 所持金
$sql=$pdo->prepare('update animals set money=? where id=?');
$sql->execute([$mins, $_SESSION['id']]);
$sql=$pdo->prepare('select money from animals where id=?');
$sql->execute([$_SESSION['id']]);
$row=$sql->fetch();
$_SESSION['money'] = $row['money'];

// データ取得
$sql = $pdo->prepare('select has_bed, total_spend, hunger from animals where id=?');
$sql->execute([$_SESSION['id']]);
$row = $sql->fetch();

echo '<p class="name">なまえ：', $_SESSION['name'], '<span class="born">（誕生から', floor($hours), '時間経過）<span></p>';
if (isset($_SESSION['flash'])) {
    echo '<div id="flash">', $_SESSION['flash'], '</div>';
    echo '<button id="close">✕</button>';
}
echo '<div id="field">';
if ($row['has_bed'] == 1) {
    echo '<img src="images/bed.png" class="bed">';
}
echo '<div class="status">';
echo '<p>所持金：', floor($mins - $row['total_spend']), 'G（1G/分）</p>';
echo '<p>空腹度：', floor($row['hunger']), '/240</p>';
echo '</div>';

echo '<button id="cart"><img src="images/cart.png"></button>';
echo '<div id="drawer">';
if ($row['has_bed'] == 0) {
    echo '<p>1000G</p>';
    echo '<button type="button" id="buy"><img src="images/bed_icon.png"></button>';
} else {
    echo '<p class="grayout">売り切れ</p>';
    echo '<button type="button" id="buy" class="grayout"><img src="images/bed_icon.png"></button>';
}
echo '<p>50G</p>';
echo '<button type="button" id="buy2"><img src="images/fish.png" id="fish"></button>';
echo '<p>10G</p>';
echo '<button type="button" id="buy3"><img src="images/trash.png" id="trash"></button>';
echo '</div>';

echo '<div id="confirm">';
echo '<p>「ベッド」を100Gで買う？</p>';
echo '<form action="bed-buy.php" method="post">';
echo '<div class="confBtn">';
echo '<button type="submit">はい</button>';
echo '<button type="button" class="no" data-target="confirm">いいえ</button>';
echo '</div>';
echo '</form>';
echo '</div>';

echo '<div id="confirm2">';
echo '<p>「さかな」を50Gで買う？</p>';
echo '<form action="fish-buy.php" method="post">';
echo '<div class="count">';
echo '<span>数量</span>';
echo '<select name="count">';
for ($i=1; $i<=10; $i++) {
    echo '<option value="', $i, '">', $i, '</option>';
}
echo '</select>';
echo '<span>個</span>';
echo '</div>';
echo '<div class="confBtn">';
echo '<button type="submit">はい</button>';
echo '<button type="button" class="no" data-target="confirm2">いいえ</button>';
echo '</div>';
echo '</form>';
echo '</div>';

echo '<div id="confirm3">';
echo '<p>「ごみ箱」を10Gで買う？</p>';
echo '<form action="trash-buy.php" method="post">';
echo '<div class="count">';
echo '<span>数量</span>';
echo '<select name="count">';
for ($i=1; $i<=10; $i++) {
    echo '<option value="', $i, '">', $i, '</option>';
}
echo '</select>';
echo '<span>個</span>';
echo '</div>';
echo '<div class="confBtn">';
echo '<button type="submit">はい</button>';
echo '<button type="button" class="no" data-target="confirm3">いいえ</button>';
echo '</div>';
echo '</form>';
echo '</div>';

echo '<div id="item2">';
echo '<h1>さかな（60G）</h1>';
echo '<p>かわうその好物！<br>(空腹度+10)</p>';
echo '</div>';

echo '<div id="item3">';
echo '<h1>ごみ箱（10G）</h1>';
echo '<p>ある動物が好むかも…<br>(空腹度-10)</p>';
echo '</div>';

echo '<button>';
if ($_SESSION['name'] == 'あらいぐま') {
    if ($hours <= 24) {
        echo '<img src="images/araiguma.png" id="animal">';
    } else if ($hours <= 48) {
        echo '<img src="images/araiguma175.png" id="animal">';
    } else {
        echo '<img src="images/araiguma200.png" id="animal">';
    }
} else {
    if ($hours <= 24) {
        echo '<img src="images/kawauso.png" id="animal">';
    } else if ($hours <= 48) {
        echo '<img src="images/kawauso175.png" id="animal">';
    } else {
        echo '<img src="images/kawauso200.png" id="animal">';
    }
}
echo '</button>';
echo '</div>';
?>
<script src="scripts/script.js"></script>
</body>
</html>
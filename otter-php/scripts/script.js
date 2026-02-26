// 移動
const animal = document.getElementById("animal");
const field = document.getElementById("field");

function moveAnimal() {
    const maxX = field.clientWidth - animal.clientWidth;
    const maxY = field.clientHeight - animal.clientHeight;

    const randomX = Math.random() * maxX;
    const randomY = Math.random() * maxY;

    animal.style.left = randomX + "px";
    animal.style.top = randomY + "px";
}
setInterval(moveAnimal, 2000);

// クリック
animal.addEventListener('click', function(e) {
    const div = document.createElement('div');
    const heart = document.createTextNode('❤');
    div.classList.add('heart');
    div.appendChild(heart);

    div.style.position = 'absolute';
    div.style.left = e.clientX + 'px';
    div.style.top = e.clientY + 'px';

    div.addEventListener('animationend', function() {
    div.remove();
    });

    document.body.appendChild(div);
});

// ドロワーメニュー
const cart = document.getElementById("cart");
const drawer = document.getElementById("drawer");

cart.addEventListener('click', function() {
    drawer.classList.toggle("show");
});

const confirm = document.getElementById("confirm");
const confirm2 = document.getElementById("confirm2");
const confirm3 = document.getElementById("confirm3");
const buy = document.getElementById("buy");
buy.addEventListener('click', function() {
    confirm.classList.toggle('show');
});
const buy2 = document.getElementById("buy2");
buy2.addEventListener('click', function() {
    confirm2.classList.toggle('show');
});
const buy3 = document.getElementById("buy3");
buy3.addEventListener('click', function() {
    confirm3.classList.toggle('show');
});
const no = document.querySelectorAll('.no');
no.forEach(function(button) {
    button.addEventListener('click', function() {
        const target = this.dataset.target;
        document.getElementById(target).classList.remove('show');
    });
});

//マウスオーバー（アイテム詳細）
const fish = document.getElementById('fish');
const trash = document.getElementById('trash');
const item2 = document.getElementById('item2');
const item3 = document.getElementById('item3');
fish.addEventListener('mouseover', function() {
    item2.classList.add("pop")
fish.addEventListener('mouseout', function() {
    item2.classList.remove("pop");
});
});
trash.addEventListener('mouseover', function() {
    item3.classList.add("pop")
trash.addEventListener('mouseout', function() {
    item3.classList.remove("pop");
});
});

// ローディング
const load = document.getElementById("loading");
const text = document.getElementById("tipsText");
const messages = ["川の上で寝るとき、はぐれないために仲間と手をつないで寝ることがある。(1/3)",
                  "自分のお気に入りの「石」（マイストーン）をずっと持ち歩く習性がある。(2/3)",
                  "臭腺を持っていて、見た目に反してすごくクサい臭いを放つ。(3/3)"];
const random = Math.floor(Math.random() * messages.length);

text.innerText = messages[random];

window.addEventListener('load', function() {
    this.setTimeout(function () {
        load.classList.add("fade");
    }, 2500);
});

// フラッシュメッセージ
const flash = document.getElementById('flash');
const close = document.getElementById('close');
close.addEventListener('click', function() {
    flash.classList.add('close');
    close.classList.add('close');
});
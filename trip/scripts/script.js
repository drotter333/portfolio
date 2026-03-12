'use strict';
// メインビジュアル（スライド）
const mv_left = document.getElementById('mv_left');
const mv_right = document.getElementById('mv_right');
const heroText = document.getElementById('heroText');
const images_left = ['images/mv2_left.png', 'images/mv3_left.png', 'images/mv1_left.png'];
const images_right = ['images/mv2_right.png', 'images/mv3_right.png', 'images/mv1_right.png'];
const texts = ['絶品郷土料理', '異国のような宿', '広がる青の世界'];
let i = 0;
setInterval(function() {
    mv_left.classList.add('fadeout');
    mv_right.classList.add('fadeout');
    heroText.classList.add('fadeout');
    setTimeout(function() {
        mv_left.src = images_left[i];
        mv_right.src = images_right[i];
        heroText.innerText = texts[i];
        i++;
        if (i === images_left.length) {
            i = 0;
        };
        mv_left.classList.remove('fadeout');
        mv_right.classList.remove('fadeout');
        heroText.classList.remove('fadeout');
    }, 2000);
}, 8000);

// スクロールイベント
const act1 = document.getElementById('act1');
const act2 = document.getElementById('act2');
const act3 = document.getElementById('act3');
window.addEventListener('scroll', function() {
    const scroll = window.scrollY;
    // まだ('show')を持っていない、かつ 2000px を超えた時だけ実行
    if(scroll > 2000 && !act1.classList.contains('show')) {
        act1.classList.remove('hide');
        act1.classList.add('show');
        setTimeout(function(){
            act2.classList.remove('hide');
            act2.classList.add('show');
        }, 500);
        setTimeout(function(){
            act3.classList.remove('hide');
            act3.classList.add('show');
        }, 1000); 
    };
});

// サムネイル
const thumbnail = document.getElementById('thumbnail');
const foods = ['images/foods1.png', 'images/foods2.png', 'images/foods3.png', 'images/foods4.png'];
let j = 0;
setInterval(function() {
    thumbnail.src = foods[j];
    j++;
    if (j === foods.length) {
        j = 0;
    };
}, 4000);

// スライダー（無限）
const hotels_slider = document.getElementById('hotels_slider');
const photos_slider = document.getElementById('photos_slider');
let posX1 = 0;
let posX2 = 0;
function slider() {
    posX1 -= 1;
    if (posX1 <= -2610) {
        posX1 = 0;
    };
    hotels_slider.style.transform = `translateX(${posX1}px)`;
    requestAnimationFrame(slider);
};

function slider2(){
    posX2 -= .5;
    if (posX2 <= -1671) {
        posX2 = 0;
    };
    photos_slider.style.transform = `translateX(${posX2}px)`;
    requestAnimationFrame(slider2);
};
slider();
slider2();

const sp_hotels_slider = document.getElementById('sp_hotels_slider');
const sp_photos_slider = document.getElementById('sp_photos_slider');
let posX3 = 0;
let posX4 = 0;
function slider3() {
    posX3 -= .5;
    if (posX3 <= -681) {
        posX3 = 0;
    };
    sp_hotels_slider.style.transform = `translateX(${posX3}px)`;
    requestAnimationFrame(slider3);
};
function slider4() {
    posX4 -= .5;
    if (posX4 <= -828) {
        posX4 = 0;
    };
    sp_photos_slider.style.transform = `translateX(${posX4}px)`;
    requestAnimationFrame(slider4);
};
slider3();
slider4();

// ナビゲーション
const open = document.getElementById('open');
const close = document.getElementById('close');
const navi = document.getElementById('navi');
open.addEventListener('click', function() {
    navi.style.top = '0';
});
close.addEventListener('click', function() {
    navi.style.top = '-768px';
});

// ローディング
const load = document.getElementById("loading");
const load_img = document.getElementById('load_img')
window.addEventListener('load', function() {
    load_img.style.transform = 'translateY(0)';
    load_img.style.opacity = '1';
    this.setTimeout(function () {
        load.classList.add("fade");
        setTimeout(function () {
            load.style.display = 'none';
        }, 1000);
    }, 2500);
});
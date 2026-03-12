'use strict';

// スライダー（無限）
const photos_slider = document.getElementById('photos_slider');
let posX2 = 0;
function slider2(){
    posX2 -= .5;
    if (posX2 <= -1671) {
        posX2 = 0;
    };
    photos_slider.style.transform = `translateX(${posX2}px)`;
    requestAnimationFrame(slider2);
}
slider2();

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
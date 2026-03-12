'use strict';

const diving = document.getElementById('diving');
const kayak = document.getElementById('kayak');
const parasail = document.getElementById('parasail');
const act_images = document.getElementById('act_images');
const tag_title = document.getElementById('tag_title');
const tag_text = document.getElementById('tag_text');
const tag_price = document.getElementById('tag_price');

diving.addEventListener('click', function() {
    kayak.style.borderBottom = 'none';
    parasail.style.borderBottom = 'none';
    diving.style.borderBottom = '1px solid #000';
    tag_title.innerText = '水中の世界';
    tag_text.innerText = '沖縄の海と言えば「ダイビング」。透き通った海水から織り成す青色はまさに幻想的。水に包まれながら癒される空間を味わえます。';
    tag_price.innerText = '費用相場：￥13,200～￥26,400';
    act_images.src = 'images/act_tag1.png';
});
kayak.addEventListener('click', function() {
    diving.style.borderBottom = 'none';
    parasail.style.borderBottom = 'none';
    kayak.style.borderBottom = '1px solid #000';
    tag_title.innerText = '水上リフレッシュ';
    tag_text.innerText = '水上でのアクティビティはサーフィンやバナナボートだけでなく、シーカヤック人気です。潮騒を聞きながら適度な運動で心地いい体験ができます。';
    tag_price.innerText = '費用相場：￥1,500～￥3,500';
    act_images.src = 'images/act_tag2.png';
});
parasail.addEventListener('click', function() {
    diving.style.borderBottom = 'none';
    kayak.style.borderBottom = 'none';
    parasail.style.borderBottom = '1px solid #000';
    tag_title.innerText = '空中散歩';
    tag_text.innerText = '沖縄は海だけじゃない！空もある！上を見れば青い空、下を見れば青い海。青に包まれる沖縄のパラセーリングで絶景体験ができます。';
    tag_price.innerText = '費用相場：￥6,000～￥15,000';
    act_images.src = 'images/act_tag3.png';
});

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
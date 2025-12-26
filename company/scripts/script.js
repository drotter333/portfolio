"use strict"

// ローディング画面
window.addEventListener("load", function () {
    const loading = document.getElementById("loading");
    const content = document.getElementById("content");

    setTimeout(function () {
        loading.classList.add("fadeout");

        setTimeout(function () {
            loading.style.display = "none";
            content.classList.add("pop");
        }, 3000);
    }, 3000);
});

// ulリスト
const show1 = document.getElementById('show1');
const list1 = document.getElementById('hidden1');
const show2 = document.getElementById('show2');
const list2 = document.getElementById('hidden2');
const show3 = document.getElementById('show3');
const list3 = document.getElementById('hidden3');
const show4 = document.getElementById('show4');
const list4 = document.getElementById('hidden4');

show1.addEventListener('click', function () {
  list1.classList.toggle('hidden');
});
show2.addEventListener('click', function () {
  list2.classList.toggle('hidden');
});
show3.addEventListener('click', function () {
  list3.classList.toggle('hidden');
});
show4.addEventListener('click', function () {
  list4.classList.toggle('hidden');
});

//スライド
const images = ["images/img01.jpg", "images/img02.jpg", "images/img03.jpg"];
const img = document.getElementById('img');
const prev = document.getElementById('prev');
const next = document.getElementById('next');
let current = 0;

next.addEventListener('click', function(){
    if(current +1 < images.length) {
        current = current + 1;
        img.src = images[current];
    }
});
prev.addEventListener('click', function(){
    if(current > 0) {
        current = current - 1;
        img.src = images[current];
    }
});

// ドロワーメニュー
const openBtn = document.getElementById('openNav');
const closeBtn = document.getElementById('closeNav');
const drawer = document.getElementById('drawer');

openBtn.addEventListener('click', function () {
    drawer.classList.add('show');
});

closeBtn.addEventListener('click', function () {
    drawer.classList.remove('show');
});

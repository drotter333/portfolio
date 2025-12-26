'use strict';

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

// ローディング画面
window.addEventListener("load", function () {
    const loading = document.getElementById("loading");
    const content = document.getElementById("content");

    setTimeout(function () {
        loading.classList.add("fadeout");

        setTimeout(function () {
            loading.style.display = "none";
            content.classList.add("pop");
        }, 2000);
    }, 2000);
});

//カルーセル

const slide = document.getElementById('slider');
const prevBtn = document.getElementById('prev'); 
const nextBtn = document.getElementById('next'); 

const dots = [
    document.getElementById('list1'),
    document.getElementById('list2'),
    document.getElementById('list3'),
    document.getElementById('list4'),
    document.getElementById('list5')
];

let currentIndex = 0;
let timer; // タイマーIDを保存する変数

// ■ 画面更新用の関数（共通処理）
// currentIndex の値に基づいて、クラスを付け替えるだけの関数です
const updateSlide = function () {
    // スライダーのクラス更新
    slide.className = 'slider'; 
    slide.classList.add(`slider${currentIndex + 1}`);

    // ドットのクラス更新
    dots.forEach(dot => dot.classList.remove('listChange'));
    dots[currentIndex].classList.add('listChange');
}

// ■ 次へ進む処理
const nextMove = function () {
    currentIndex++;
    if (currentIndex >= dots.length) {
        currentIndex = 0;
    }
    updateSlide();
}

// ■ 前へ戻る処理
const prevMove = function () {
    currentIndex--;
    if (currentIndex < 0) {
        currentIndex = dots.length - 1; // 0より小さくなったら最後の番号(4)へ
    }
    updateSlide();
}

// ■ 自動再生タイマーの管理
// ボタンを押した時に「今動いているタイマー」を消して、新しくスタートさせる
const resetTimer = function () {
    clearInterval(timer); // 現在のタイマーを停止
    timer = setInterval(nextMove, 1200); // 新しくタイマーを開始
}

// ■ イベントリスナー（クリック時の動作）

// Nextボタン
nextBtn.addEventListener('click', () => {
    nextMove();
    resetTimer(); // タイマーリセット
});

// Prevボタン
prevBtn.addEventListener('click', () => {
    prevMove();
    resetTimer(); // タイマーリセット
});

// ■ 初回起動
// ページ読み込み時にタイマーをスタートさせる
timer = setInterval(nextMove, 2200);

//topへ戻るボタンevent
window.addEventListener('scroll', function () {
    const topButton = document.getElementById('jsTop');
    const scroll = window.pageYOffset;
    if (scroll > 100) {
        topButton.style.display = 'block'
    } else {
        topButton.style.display = 'none'
    }
});

const topButton = document.getElementById('jsTop');
topButton.addEventListener('click', () => {
    window.scroll({
        top: 0,
        behavior: 'smooth'
    });
});


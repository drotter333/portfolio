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

// モーダル機能
document.addEventListener("DOMContentLoaded", function () {

    const modalOpenButtons = document.querySelectorAll(".modalOpen");
    const modals = document.querySelectorAll(".modalMain");

    modalOpenButtons.forEach(function (btn, index) {

        const modal = modals[index];

        // ★ PC/SP 全ての閉じるボタンを取得
        const closeButtons = modal.querySelectorAll(".modalClose");

        // 開く
        btn.addEventListener("click", function () {
            modal.classList.add("active");
        });

        // 閉じる（PC・SP両方で動く）
        closeButtons.forEach(function (closeBtn) {
            closeBtn.addEventListener("click", function () {
                modal.classList.remove("active");
            });
        });

        // モーダル外クリックで閉じる
        modal.addEventListener("click", function (e) {
            if (e.target === modal) {
                modal.classList.remove("active");
            }
        });
    });
});

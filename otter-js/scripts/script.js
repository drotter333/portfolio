'use strict';

const selectBtn = document.getElementById('selectBtn');
const load1 = document.getElementById('load1')
selectBtn.addEventListener('click', function() {
    load1.classList.add('pop');
});

const next = document.querySelectorAll('.next')
const kawa_st = document.getElementById('kawa_st')
const name = document.getElementById('name');
const hp = document.getElementById('hp');
const atk = document.getElementById('atk');
const def = document.getElementById('def');
const spd = document.getElementById('spd');
next.forEach(function(button) {
    button.addEventListener('click', function() {
        const target = this.dataset.target;
        document.getElementById(target).classList.add('pop');
        kawa_st.classList.add('pop');
        name.innerText = kawauso.name;
        hp.innerText = kawauso.hp;
        atk.innerText = kawauso.atk;
        def.innerText = kawauso.def;
        spd.innerText = kawauso.spd;
    });
});

// ステータス
const kawauso = {
    name: "かわうそ",
    hp: 100,
    atk: 20,
    def: 10,
    spd: 2000,
};
const slime = {
    name: "スライム（青）",
    hp: 45,
    atk: 18,
    def: 10,
    spd: 2000,
};
const slime2 = {
    name: "スライム（緑）",
    hp: 95,
    atk: 32,
    def: 12,
    spd: 2000,
};
const araiguma = {
    name: "あらいぐま",
    hp: 120,
    atk: 38,
    def: 15,
    spd: 2000,
};
const slimeMaxHp = 45;
const slime2MaxHp = 95;
const araigumaMaxHp = 120;
const percent1 = (slime.hp / slimeMaxHp) * 100;
const percent2 = (slime2.hp / slime2MaxHp) * 100;
const percent3 = (araiguma.hp / araigumaMaxHp) * 100;

// マウスオーバー
const status = document.getElementById('status');
const chara = document.getElementById('chara');
const item = document.getElementById('item');
const item2 = document.getElementById('item2');
const text1 = document.getElementById('text1');
chara.addEventListener('mouseover', function() {
    status.classList.add('pop');
});
chara.addEventListener('mouseout', function() {
    status.classList.remove('pop');
});
item.addEventListener('mouseover', function() {
    text1.classList.add('pop');
});
item.addEventListener('mouseout', function() {
    text1.classList.remove('pop');
});
item2.addEventListener('mouseover', function() {
    text2.classList.add('pop');
});
item2.addEventListener('mouseout', function() {
    text2.classList.remove('pop');
});

// 「スライム（青）」
const start1 = document.getElementById('start1');
const log1 = document.getElementById('log1');
const enemyLog1 = document.getElementById('enemyLog1');
const enemy_hp = document.getElementById('enemy_hp');
const kawausoMod = document.getElementById('kawauso');
const slimeMod = document.getElementById('slime')
const arrow = document.getElementById('arrow');
const defeat = document.getElementById('defeat')
const sword = document.getElementById('sword');
const swordText = document.getElementById('swordText');
start1.addEventListener('click', function() {
    let battleInterval;
    let enemyInterval;
    kawausoMod.classList.add('pop');
    slime.hp = slimeMaxHp;
    enemy_hp.style.width = "100%";
    // かわうそ「攻撃」
    battleInterval = setInterval(function() {
        if (kawauso.hp <= 0) return;
        const randDMG = Math.floor(Math.random() * 3) + 1;
        const damage = Math.floor(kawauso.atk - slime.def) + randDMG;
        slime.hp = slime.hp - damage;
        console.log(slime.hp);
        // ＨＰゲージ
        if (slime.hp < 0) {
        slime.hp = 0;
        enemy_hp.style.width = '0%';
        }
        const percent1 = (slime.hp / slimeMaxHp) * 100;
         if (percent1 <= 25) { 
        enemy_hp.style.backgroundColor = 'tomato';
        } else if (percent1 <= 50) { 
        enemy_hp.style.backgroundColor = 'orange';
        }
        enemy_hp.style.width = percent1 + "%";
        // ダメージ表記
        const damageText = document.createElement('span');
        damageText.className = 'damageLog';
        damageText.innerText = damage;
        log1.appendChild(damageText);
        // 攻撃モーション
        kawausoMod.classList.remove('jump');
        void kawausoMod.offsetWidth;
        kawausoMod.classList.add('jump');

        setTimeout(function() {
            damageText.remove();
        }, 1000);
        // 勝利演出
        if(slime.hp <= 0) {
        clearInterval(battleInterval);
        clearInterval(enemyInterval);
        slimeMod.classList.add('down');

            setTimeout(function() {
            kawausoMod.classList.add('win');
            // アイテムドロップ
            const items = ['images/item.png', 'images/item2.png', 'images/item3.png'];
            const rand = Math.floor(Math.random() * 100);
            if (rand < 15) { 
                item.src = items[2]; 
                item.style.backgroundColor = 'plum';
                item.style.outline = '4px solid purple';
                arrow.style.color = 'purple';
                sword.style.color = 'purple';
                sword.innerText = 'ぶき ★３';
                swordText.innerHTML = 'そうびすると<br>のうりょくが<br>あがるよ。<br>( atk + 18 )';
            } 
            else if (rand < 40) { 
                item.src = items[1];
                item.style.backgroundColor = 'lightgreen'; 
                item.style.outline = '4px solid darkgreen';
                arrow.style.color = 'darkgreen';
                sword.style.color = 'darkgreen';
                sword.innerText = 'ぶき ★２';
                swordText.innerHTML = 'そうびすると<br>のうりょくが<br>あがるよ。<br>( atk + 12 )';
            } 
            else { 
                item.src = items[0];
                sword.style.color = 'dimgray'
                sword.innerText = 'ぶき ★１';
                swordText.innerHTML = 'そうびすると<br>のうりょくが<br>あがるよ。<br>( atk + 8 )';
            }
            item.style.display = 'block';
            arrow.style.display = 'block';
            }, 2000);
        };
    }, kawauso.spd);

    // スライム（青）「攻撃」
    setTimeout(function() {
        enemyInterval = setInterval(function() {
            if (slime.hp <= 0) return;
            const enemyRnd = Math.floor(Math.random() * 3) + 1;
            const enemyDMG = Math.floor(slime.atk - kawauso.def) + enemyRnd;
            kawauso.hp = kawauso.hp - enemyDMG;

            const edText = document.createElement('span');
            edText.className = 'damageLog';
            edText.innerText = enemyDMG;
            enemyLog1.appendChild(edText);

            slimeMod.classList.remove('jump');
            void slimeMod.offsetWidth;
            slimeMod.classList.add('jump');

            hp.innerText = kawauso.hp;

            setTimeout(function() {
                edText.remove();
            }, 1000);

            if(kawauso.hp <= 0) {
                clearInterval(battleInterval);
                clearInterval(enemyInterval);
                kawausoMod.classList.add('down');

                setTimeout(function() { 
                defeat.classList.add('pop');
                }, 2000);
            };
        }, slime.spd);
    }, 1000);
});

// アイテム取得
const take = document.getElementById('take');
const next1 = document.getElementById('next1');
let taken = false;
take.addEventListener('click', function() {
    if (taken) return;
    item.style.top = '64%';
    item.style.left = '26.5%';
    item.style.width = '50px';
    arrow.style.display = 'none';

    if (item.src.includes('item3.png')) {
        kawauso.atk = kawauso.atk + 18;
    } else if (item.src.includes('item2.png')) {
        kawauso.atk = kawauso.atk + 12;
    } else {
        kawauso.atk = kawauso.atk + 8;
    }
    taken = true;

    atk.innerText = kawauso.atk;
    
    setTimeout(function() {
        next1.classList.add('pop');
    }, 500);
});

// ロード画面
const nextBtn1 = document.getElementById('nextBtn1');
const load2 = document.getElementById('load2')
nextBtn1.addEventListener('click', function() {
    next1.classList.remove('pop');
    load2.classList.add('pop');
});

// 「スライム（緑）」
const start2 = document.getElementById('start2');
const stage2 = document.getElementById('stage2')
const log2 = document.getElementById('log2');
const slime2Mod = document.getElementById('slime2');
const enemyLog2 = document.getElementById('enemyLog2');
const enemy_hp2 = document.getElementById('enemy_hp2');
const armor = document.getElementById('armor');
const armorText = document.getElementById('armorText');
start2.addEventListener('click', function() {

    kawausoMod.classList.remove('win');
    kawausoMod.classList.remove('jump');
    load2.classList.remove('pop');
    stage2.classList.add('pop');
    text1.style.top = '58%';
    text1.style.left = '22%';
    text1.style.fontSize = '8px';

    kawauso.hp = 100;
    hp.innerText = kawauso.hp;

    let battleInterval;
    let enemyInterval;
    slime2.hp = slime2MaxHp;
    enemy_hp2.style.width = "100%";
    // かわうそ「攻撃」
    battleInterval = setInterval(function() {
        if (kawauso.hp <= 0) return;
        const randDMG = Math.floor(Math.random() * 3) + 1;
        const damage = Math.floor(kawauso.atk - slime2.def) + randDMG;
        slime2.hp = slime2.hp - damage;
        console.log(slime2.hp);

        if (slime2.hp < 0) {
        slime2.hp = 0;
        enemy_hp2.style.width = '0%';
        }
        const percent2 = (slime2.hp / slime2MaxHp) * 100;
         if (percent2 <= 25) { 
        enemy_hp2.style.backgroundColor = 'tomato';
        } else if (percent2 <= 50) { 
        enemy_hp2.style.backgroundColor = 'orange';
        }
        enemy_hp2.style.width = percent2 + "%";
        
        const damageText = document.createElement('span');
        damageText.className = 'damageLog';
        damageText.innerText = damage;
        log2.appendChild(damageText);

        kawausoMod.classList.remove('jump');
        void kawausoMod.offsetWidth;
        kawausoMod.classList.add('jump');

        setTimeout(function() {
            damageText.remove();
        }, 1000);
    
        if(slime2.hp <= 0) {
        clearInterval(battleInterval);
        clearInterval(enemyInterval);
        slime2Mod.classList.add('down'); 

            setTimeout(function() {
            kawausoMod.classList.add('win');

            const items = ['images/armor.png', 'images/armor2.png', 'images/armor3.png'];
            const rand = Math.floor(Math.random() * 100);
            if (rand < 15) { 
                item2.src = items[2]; 
                item2.style.backgroundColor = 'plum';
                item2.style.outline = '4px solid purple';
                arrow.style.color = 'purple';
                armor.style.color = 'purple';
                armor.innerText = 'ぼうぐ ★３';
                armorText.innerHTML = 'そうびすると<br>のうりょくが<br>あがるよ。<br>( def + 18 )';
            } 
            else if (rand < 40) { 
                item2.src = items[1];
                item2.style.backgroundColor = 'lightgreen'; 
                item2.style.outline = '4px solid darkgreen';
                arrow.style.color = 'darkgreen';
                armor.style.color = 'darkgreen';
                armor.innerText = 'ぼうぐ ★２';
                armorText.innerHTML = 'そうびすると<br>のうりょくが<br>あがるよ。<br>( def + 12 )';
            } 
            else { 
                item2.src = items[0];
                arrow.style.color = 'dimgray';
                armor.style.color = 'dimgray';
                armor.innerText = 'ぼうぐ ★１';
                armorText.innerHTML = 'そうびすると<br>のうりょくが<br>あがるよ。<br>( def + 8 )';
            }
            item2.style.display = 'block';
            arrow.style.display = 'block';
            }, 2000);
        };
    }, kawauso.spd);

    // スライム（緑）「攻撃」
    setTimeout(function() {
        enemyInterval = setInterval(function() {
            if (slime2.hp <= 0) return;
            const enemyRnd = Math.floor(Math.random() * 3) + 1;
            const enemyDMG = Math.floor(slime2.atk - kawauso.def) + enemyRnd;
            kawauso.hp = kawauso.hp - enemyDMG;

            const edText = document.createElement('span');
            edText.className = 'damageLog';
            edText.innerText = enemyDMG;
            enemyLog2.appendChild(edText);

            slime2Mod.classList.remove('jump');
            void slime2Mod.offsetWidth;
            slime2Mod.classList.add('jump');

            hp.innerText = kawauso.hp;

            setTimeout(function() {
                edText.remove();
            }, 1000);

            if(kawauso.hp <= 0) {
                clearInterval(battleInterval);
                clearInterval(enemyInterval);
                kawausoMod.classList.add('down');

                setTimeout(function() { 
                defeat.classList.add('pop');
                }, 2000);
            };
        }, slime2.spd);
    }, 1000);
});

// アイテム取得
const take2 = document.getElementById('take2');
const next2 = document.getElementById('next2')
let taken2 = false;
take2.addEventListener('click', function() {
    if (taken2) return;
    item2.style.top = '53%';
    item2.style.left = '26.5%';
    item2.style.width = '50px';
    arrow.style.display = 'none';

    if (item2.src.includes('armor3.png')) {
        kawauso.def = kawauso.def + 18;
    } else if (item2.src.includes('armor2.png')) {
        kawauso.def = kawauso.def + 12;
    } else {
        kawauso.def = kawauso.def + 8;
    }
    taken2 = true;

    def.innerText = kawauso.def;

    setTimeout(function() {
        next2.classList.add('pop');
    }, 500);
});

// ロード画面
const nextBtn2 = document.getElementById('nextBtn2')
const load3 = document.getElementById('load3');
nextBtn2.addEventListener('click', function() {
    next2.classList.remove('pop');
    load3.classList.add('pop');
});

// 「あらいぐま」
const araigumaMod = document.getElementById('araiguma');
const start3 = document.getElementById('start3');
const stage3 = document.getElementById('stage3');
const log3 = document.getElementById('log3');
const enemyLog3 = document.getElementById('enemyLog3');
const enemy_hp3 = document.getElementById('enemy_hp3');
const victory = document.getElementById('victory');
start3.addEventListener('click', function() {
    kawausoMod.classList.remove('win');
    kawausoMod.classList.remove('jump');
    load3.classList.remove('pop');
    stage3.classList.add('pop');
    text2.style.top = '47%';
    text2.style.left = '22%';
    text2.style.fontSize = '8px';

    kawauso.hp = 100;
    hp.innerText = kawauso.hp;

    let battleInterval;
    let enemyInterval;
    araiguma.hp = slime2MaxHp;
    enemy_hp3.style.width = "100%";
    // かわうそ「攻撃」
    battleInterval = setInterval(function() {
        if (kawauso.hp <= 0) return;
        const randDMG = Math.floor(Math.random() * 3) + 1;
        const damage = Math.floor(kawauso.atk - araiguma.def) + randDMG;
        araiguma.hp = araiguma.hp - damage;
        console.log(araiguma.hp);

        if (araiguma.hp < 0) {
        araiguma.hp = 0;
        enemy_hp3.style.width = '0%';
        }
        const percent3 = (araiguma.hp / araigumaMaxHp) * 100;
         if (percent3 <= 25) { 
        enemy_hp3.style.backgroundColor = 'tomato';
        } else if (percent3 <= 50) { 
        enemy_hp3.style.backgroundColor = 'orange';
        }
        enemy_hp3.style.width = percent3 + "%";
        
        const damageText = document.createElement('span');
        damageText.className = 'damageLog';
        damageText.innerText = damage;
        log3.appendChild(damageText);

        kawausoMod.classList.remove('jump');
        void kawausoMod.offsetWidth;
        kawausoMod.classList.add('jump');

        setTimeout(function() {
            damageText.remove();
        }, 1000);
    
        if(araiguma.hp <= 0) {
        clearInterval(battleInterval);
        clearInterval(enemyInterval);
        araigumaMod.classList.add('down'); 

            setTimeout(function() {
                kawausoMod.classList.add('win');
            }, 2000);
            setTimeout(function() {
                victory.classList.add('pop');
            }, 3000);
        };
    }, kawauso.spd);

    // あらいぐま（ボス）「攻撃」
    setTimeout(function() {
        enemyInterval = setInterval(function() {
            if (araiguma.hp <= 0) return;
            const enemyRnd = Math.floor(Math.random() * 3) + 1;
            const enemyDMG = Math.floor(araiguma.atk - kawauso.def) + enemyRnd;
            kawauso.hp = kawauso.hp - enemyDMG;

            const edText = document.createElement('span');
            edText.className = 'damageLog';
            edText.innerText = enemyDMG;
            enemyLog3.appendChild(edText);

            araigumaMod.classList.remove('jump');
            void araigumaMod.offsetWidth;
            araigumaMod.classList.add('jump');

            hp.innerText = kawauso.hp;

            setTimeout(function() {
                edText.remove();
            }, 1000);

            if(kawauso.hp <= 0) {
                clearInterval(battleInterval);
                clearInterval(enemyInterval);
                kawausoMod.classList.add('down');

                setTimeout(function() { 
                defeat.classList.add('pop');
                }, 2000);
            };
        }, araiguma.spd);
    }, 1000);
});

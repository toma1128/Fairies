// 従業員とお客様のid取得
const emp = document.getElementById("employee");
const cus = document.getElementById("customer");

// 従業員とお客様のボタンのid取得
const empBtn = document.getElementById("loginBtn1");
const cusBtn = document.getElementById("loginBtn2");

// ボタンの線
const line = document.getElementById("select_job");

// 従業員ボタンを押したときの処理
empBtn.addEventListener("click", () => {
    event.preventDefault(); // デフォルトの送信動作を停止
    emp.style.display = 'block';
    cus.style.display = 'none';
    empBtn.style.backgroundColor = '#B0DAFF';
    cusBtn.style.backgroundColor = '#E5E5E5';
    line.style.borderColor = '#19A7CE';
    empBtn.style.borderColor = '#B0DAFF';
    cusBtn.style.borderColor = '#E5E5E5';


});

// お客様ボタンを押したときの処理
cusBtn.addEventListener("click", () => {
    event.preventDefault(); // デフォルトの送信動作を停止
    emp.style.display = 'none';
    cus.style.display = 'block';

    empBtn.style.backgroundColor = '#E5E5E5';
    cusBtn.style.backgroundColor = '#FFFCA8';
    line.style.borderColor = '#E9B824';

    empBtn.style.borderColor = '#E5E5E5';
    cusBtn.style.borderColor = '#FFFCA8';


});

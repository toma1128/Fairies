// HTML要素の取得とクリックイベントの設定
document.addEventListener("DOMContentLoaded", function () {
    // tr要素を取得
    var trElement = document.querySelector("tr");

    // tr要素が存在するか確認し、存在する場合にクリックイベントを追加
    if (trElement) {
        trElement.addEventListener("click", function () {
            // ページ遷移関数を呼び出す
            redirectToLoginPage();
        });
    }
});

// 画面切り替え
const emp = document.getElementById("employee_about");
const cus = document.getElementById("customer_about");

const empBtn = document.getElementById("emp_btn");
const cosBtn = document.getElementById("cus_btn");

empBtn.addEventListener("click", () => {

    emp.style.display = 'block';
    cus.style.display = 'none';
});

cosBtn.addEventListener("click", () => {
    emp.style.display = 'none';
    cus.style.display = 'block';
});
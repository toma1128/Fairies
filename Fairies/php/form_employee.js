// 出勤可能と選択した際に出勤できない理由などのボタンを押せないようにする
const possible = document.getElementById("possible");
const impossible = document.getElementById("impossible");
const fonts = document.querySelectorAll(".font");

//  出勤できる時
possible.addEventListener("click", function () {
  // 出勤できない期間
  const days = document.querySelectorAll('input[name="datechoice"]');
  days.forEach((days) => {
    //処理
    days.disabled = true;
  });
  //　出勤できない理由
  const reason = document.querySelectorAll('input[name="reason"]');
  reason.forEach((reason) => {
    //処理
    reason.disabled = true;
  });
  // 文字の色の変更
  fonts.forEach((fonts) => {
    //処理
    fonts.style.color = "#e5e5e5";
  });
});

// 出勤できない時
impossible.addEventListener("click", function () {
  // 出勤できない期間
  const days = document.querySelectorAll('input[name="datechoice"]');
  days.forEach((days) => {
    //処理
    days.disabled = false;
  });
  //　出勤できない理由
  const reason = document.querySelectorAll('input[name="reason"]');
  reason.forEach((reason) => {
    //処理
    reason.disabled = false;
  });
  // 文字の色の変更
  fonts.forEach((fonts) => {
    //処理
    fonts.style.color = "#000";
  });
});

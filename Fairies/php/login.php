<?php
function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

// エラーレポーティングを有効にする
error_reporting(E_ALL);
ini_set('display_errors', 1);

// データベースへの接続情報
$servername = "localhost"; // データベースのホスト名
$username = "fairies"; // データベースのユーザー名
$password = "daimonia"; // データベースのパスワード
$dbname = "feya"; // 使用するデータベース名

// データベースに接続する
$conn_DB = new mysqli($servername, $username, $password, $dbname);
if ($conn_DB->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submitBtn1'])) {  //従業員の方のログインボタンが押されたら
  $num = $_POST['userId_employee'];
  $pass = $_POST['password_employee'];

  $pass_sql = $conn_DB->prepare('SELECT PASSWORD FROM EMPLOYEES WHERE NUMBER = ?');
  $pass_sql->bind_param("s", $num);
  $pass_sql->execute(); // クエリを実行する

  // 結果セットを取得し、関連する行を配列に追加する
  $result = array(); // 空の配列を作成
  $result_set = $pass_sql->get_result(); // 結果セットを取得
  while ($row = $result_set->fetch_assoc()) { // 各行を取得
    $result[] = $row; // 配列に行を追加
  }

  if (!empty($result) && $pass === $result[0]['PASSWORD']) {
    session_start();
    $_SESSION['number'] = $num;

    header("Location: home_employee.php");
    exit;
  }
} elseif (isset($_POST['submitBtn2'])) {   //お客様の方のログインボタンが押されたら
  $num = $_POST['userId_customer'];
  $password = $_POST['password_customer'];

  $pass_sql = $conn_DB->prepare('SELECT PASSWORD FROM CUSTOMERS WHERE CUSTOMERNUMBER = ?');
  $pass_sql->bind_param("i", $num);
  $pass_sql->execute(); // クエリを実行する

  // 結果セットを取得し、関連する行を配列に追加する
  $result = array(); // 空の配列を作成
  $result_set = $pass_sql->get_result(); // 結果セットを取得
  while ($row = $result_set->fetch_assoc()) { // 各行を取得
    $result[] = $row; // 配列に行を追加
  }

  if (!empty($result) && $pass == $result['PASSWORD']) {
    session_start();
    $_SESSION['number'] = $num;

    header("Location: form_customer.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./login.css">
  <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
  <title>ログイン画面</title>
</head>

<body>
  <header>
    <img src="images/fairies_home.png" alt="ロゴ" width="280">
  </header>
  <main>
    <div class="title">
      <img src="images/title_img.png" alt="title">
      <p>災害連絡掲示板</p>
    </div>
    <div class="main_login">
      <div id="select_job">
        <nav>
          <div class="nav-menu">
            <button id="loginBtn1">従業員はこちら</button>
            <button id="loginBtn2">お客様はこちら</button>
          </div>
        </nav>
      </div>
      <!-- 従業員のログイン表示-->
      <div id="employee">
        <div class="emp_register">
          <p>新規登録は</p>
          <a href="./user_register.php">こちら</a>
        </div> <!--新規作成画面に移動-->
        <form action="" method="POST">
          <div class="emp_number">
            <p>社員番号を入力してください</p>
            <div class="text_space">
              <input type="text" placeholder="12345" name="userId_employee">
            </div>
          </div>
          <div class="emp_pass">
            <p>パスワードを入力してください</p>
            <div class="text_space">
              <input type="password" placeholder="eccComp2024" name="password_employee">
            </div>
          </div>
          <div class="button">
            <button type="submit" id="empBtn" name="submitBtn1">ログイン</button>
          </div>
        </form>
      </div>
      <!-- お客様のログイン表示 -->
      <div id="customer">
        <div class="cus_register">
          <p>新規登録は</p>
          <a href="./cus_register.php">こちら</a>
        </div> <!--新規作成画面に移動-->
        <form action="" method="POST">
          <div class="cus_number">
            <p>お客様番号を入力してください</p>
            <div class="text_space">
              <input type="text" placeholder="12345" name="userId_customer">
            </div>
          </div>
          <div class="cus_pass">
            <p>パスワード入力してください</p>
            <div class="text_space">
              <input type="password" placeholder="eccComp2024" name="password_customer">
            </div>
          </div>
          <!-- ボタンの押した処理作る後で -->
          <div class="button">
            <button type="submit" id="cusBtn" name="submitBtn2">ログイン</button>
          </div>
        </form>
      </div>
    </div>
  </main>
  <script src="./login.js"></script>
</body>

</html>
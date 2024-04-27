<?php
define('DB_USER', 'fairies'); //ユーザ名
define('DB_PASS', 'daimonia'); //パスワード

// $userId_employee = filter_input(INPUT_POST,"userId_employee");
// $password_employee = filter_input(INPUT_POST,"password_employee", FILTER_VALIDATE_INT);
// $userId_customer = filter_input(INPUT_POST,"userId_customer");
// $password_customer = filter_input(INPUT_POST,"password_customer", FILTER_VALIDATE_INT);

/**
 * 入力が空白でないか確認する
 *
 * @param string $str
 * @return bool
 */
function is_not_space(?string $str): bool
{
  $str = preg_replace("/( |　)/", "", $str);
  if ($str == "") {
    return FALSE;
  } else {
    return TRUE;
  }
}

if (isset($_POST["submitBtn1"])) {
  try {

    $db = new PDO($dsn, DB_USER, DB_PASS);

    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

    $sql = 'SELECT * FROM COMPANY EMPLOYEES';

    $where = "where COMPANY EMPLOYEES NUMBER = :COMPANY EMPLOYEES NUMBER";
    $AND = "AND PASSWORD = :PASSWORD";

    $stmt = $db->prepare($sql . $where . $AND);
    if ($userId_employee && $password_employee) {
      //値のバインド
      $stmt->bindParam(':COMPANY EMPLOYEES NUMBER', $userId_employee, PDO::PARAM_INT);
      $stmt->bindParam(':PASSWORD', $password_employee, PDO::PARAM_STR);
    } else {
    }
    //SQL実行
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      header('Location home_employee.php');
      exit();
    }

    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';

  } catch (PDOException $e) {
    echo 'error:' . $e->getMessage();
  } finally {

    //この上は省略
    //接続切断処理
    $stmt = null;
    $db = null;
  }
} else if (isset($_POST["submitBtn2"])) {
  try {

    $db = new PDO($dsn, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

    $sql = 'SELECT * FROM CUSTOMERS';

    $where = "where CUSTOMER NUMBER = :CUSTOMER NUMBER";
    $AND = "AND PASSWORD = :PASSWORD";

    $stmt = $db->prepare($sql . $where . $AND);
    if ($userId_customer && $password_customer) {
      //値のバインド
      $stmt->bindParam(':CUSTOMER NUMBER', $userId_customer, PDO::PARAM_INT);
      $stmt->bindParam(':PASSWORD', $password_customer, PDO::PARAM_STR);
    } else {
    }
    //SQL実行
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      header('Location customerform.php');
      exit;
    }
  } catch (PDOException $e) {
    echo 'error:' . $e->getMessage();
  } finally {

    //この上は省略
    //接続切断処理
    $stmt = null;
    $db = null;
  }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./fairiesproject_login.css">
  <title>従業員画面</title>
</head>

<body>
  <form method="POST">
    <header>
      <h1>
        <img src="images/fairieshome.png" alt="ロゴ" width="280">
      </h1>
    </header>
    <main>
      <div class="title">
        <img src="images/title_img.png" alt="title">
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

        </div>

        <!-- お客様のログイン表示 -->
        <div id="customer">

          <div class="cus_register">
            <p>新規登録は</p>
            <a href="./user_register.php">こちら</a>
          </div> <!--新規作成画面に移動-->
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
          <div class="button">
            <button type="submit" id="cusBtn" name="submitBtn2">ログイン</button>
          </div>
        </div>
      </div>
      <div id="loginWrapper">

        <div>
          <label for="userId_customer">お客様番号:</label>
          <input type="text" placeholder="お客様番号を入力してください" name="userId_customer" id="userId_customer">
        </div>
        <div>
          <label for="password_customer">パスワード:</label>
          <input type="password" placeholder="パスワード入力してください" name="password_customer" id="password_customer">
        </div>
        <button type="submit" id="submitBtn2" name="submitBtn2">ログイン</button>
      </div>

    </main>

  </form>
  <script src="./login.js"></script>
</body>


</html>
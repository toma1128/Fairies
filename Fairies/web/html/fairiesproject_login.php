<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./fairiesproject_login.css">
    <title>従業員画面</title>
</head>
<body>
    <form>
        <header>
            <h1>
                <img src="images/fairieshome.png" alt="ロゴ" width="280">
            </h1>
        </header> 
        <main>       
            <h2>災害連絡掲示板</h2>
            <nav>
                <div class="nav-menu">
                  <button id="loginBtn1">従業員の方</button>
                  <button id="loginBtn2">お客様はこちら</button>
            </nav>
        </main>
    </form>
    <dialog id="loginDialog_employee">
        <div id="loginWrapper">
          <header id="loginHeader">
            <h2>ログイン画面</h2>
            <button type="button" id="closeBtn1">x</button>
          </header>
          <div>
            <label for="userId_employee">社員番号:</label>
            <input type="text" placeholder="社員番号入力してください" name="userId_employee" id="userId_employee">
          </div>
          <div>
            <label for="password_employee">パスワード:</label>
            <input type="password" placeholder="パスワード入力してください" name="password_employee" id="password_employee">
          </div>
          <div><a href="#">新規登録はこちら</a></div>       <!--新規作成画面に移動-->
          <button type="submit" id="submitBtn1">ログイン</button>
        </div>
    </dialog>           <!--従業員用ダイアログ-->
    <dialog id="loginDialog_customer">
        <div id="loginWrapper">
          <header id="loginHeader">
            <h2>ログイン画面</h2>
            <button type="button" id="closeBtn2">x</button>
          </header>
          <div>
            <label for="userId_customer">お客様番号:</label>
            <input type="text" placeholder="お客様番号を入力してください" name="userId_customer" id="userId_customer">
          </div>
          <div>
            <label for="password_customer">パスワード:</label>
            <input type="password" placeholder="パスワード入力してください" name="password_customer" id="password_customer">
          </div>
          <div><a href="#">新規登録はこちら</a></div>       <!--新規作成画面に移動-->
          <button type="submit" id="submitBtn2">ログイン</button>
        </div>
      </dialog>            <!--お客様用ダイアログ-->
      <script src="fairiesproject_login.js"></script>
</body>
</html>

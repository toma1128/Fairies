<?php
// 読み取り
$CusNumber = filter_input(INPUT_POST, "CusNumber", FILTER_VALIDATE_INT);
$uname = filter_input(INPUT_POST, "uname");
$pass = filter_input(INPUT_POST, "password");

// データベースの情報
//mysql -u fairies -p feya; 
//password:daimonia;
$servername = "localhost";
$username = "fairies";
$password = "daimonia";
$dbname = "feya";

//データベースに接続するためsqlインスタン生成
$conn_DB = new mysqli($servername, $username, $password, $dbname);
if ($conn_DB->connect_error) {
    die("Connection failed :" . $conn_DB->connect_error);
}

$conn_DB->set_charset('utf8');   //文字コードを設定

//DBのCUSTOMERSの中にその情報が格納
$stmt = $conn_DB->prepare("INSERT INTO CUSTOMERS (CUSTOMERNUMBER, NAME, PASSWORD) VALUE(?, ?, ?)");
$stmt->bind_param("iss", $CusNumber, $uname, $pass);


//挿入に成功したかどうかを確認 
if ($stmt->execute()) {

    //接続切断処理
    $stmt->close();
    $conn_DB->close();
} else {
    // エラーが発生した場合の処理
    echo "Error: " . $stmt->error;
}
if ($_POST['registerBtn']) {
    session_start();
    $_SESSION['CusNumber'] = $CusNumber;

    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cus_register_check.css">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <title>新規作成画面（確認）</title>
</head>

<body>
    <header>
        <img src="images/fairies_home.png" alt="ロゴ" width="230">
        <a href="http://localhost/Fairies/Fairies/php/login.php">ログイン画面に戻る</a>
    </header>
    <main>
        <div>
            <div id="title">
                <h2>新規作成（確認）</h2>
            </div>
            <div id="check_words">
                <div class="select">
                    <label for="number">お客様番号</label><br>
                    <p><?= $CusNumber ?></p>
                </div>
                <div class="select">
                    <label for="uname">お名前</label><br>
                    <p><?= $uname ?></p>
                </div>
                <div class="select">
                    <label for="password">パスワード</label><br>
                    <p><?= $pass ?></p>
                </div>
            </div>
            <div id="button">
                <button id="submit" type="submit" name="submit" onclick="location.href='./cus_register.php'">入力画面に戻る</button>
                <button id="submit" type="submit" name="submit" onclick="location.href='./login.php'">送信</button>
            </div>
        </div>
    </main>
</body>

</html>
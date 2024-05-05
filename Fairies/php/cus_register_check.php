<?php
date_default_timezone_set('Asia/Tokyo');
$number = filter_input(INPUT_POST, "number");
$name = filter_input(INPUT_POST, "uname");
$pass = filter_input(INPUT_POST, "password");
    // データベースへの接続情報
    $servername = "localhost"; // データベースのホスト名
    $username = "fairies"; // データベースのユーザー名
    $password = "daimonia"; // データベースのパスワード
    $dbname = "feya"; // 使用するデータベース名

    // データベースに接続する
    $conn_DB = new mysqli($servername, $username, $password, $dbname);

    // 接続を確認する
    if ($conn_DB->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $conn_DB->set_charset('utf8');   //文字コードを設定

    // SQLクエリを作成して実行する
    $stmt = $conn_DB->prepare('INSERT INTO CUSTOMERS (NUMBER, NAME, PASSWORD) VALUES (?, ?, ?)');

    $stmt->bind_param('issss',$number, $name, $pass);
    if($stmt->execute()){
        // ステートメントを閉じる
        $stmt->close();
        // データベース接続を閉じる
        $conn_DB->close();
    } else {
        // エラーが発生した場合の処理
        echo "Error: " . $stmt->error;
    }
if($_POST['submit']){
    session_start();
    $_SESSION['number'] = $number;

    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="user_register_check.css">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <title>新規作成画面（確認）</title>
</head>

<body>
    <header>
        <img src="images/fairies_home.png" alt="ロゴ" width="230">
        <a href="http://localhost/Fairies/Fairies/php/login.php">ホームに戻る</a>
    </header>
    <main>
        <div>
            <div id="title">
                <h2>新規作成（確認）</h2>
            </div>
            <div id="check_words">
                <div class="select">
                    <label for="team">所属門又はチーム</label>
                    <p><?= $data['department'][$department] ?></p>
                </div>
                <div class="select">
                    <label for="number">社員番号</label><br>
                    <p><?= $number ?></p>
                </div>
                <div class="select">
                    <label for="uname">お名前</label><br>
                    <p><?= $name ?></p>
                </div>
                <div class="select">
                    <label for="password">パスワード</label><br>
                    <p><?= $pass ?></p>
                </div>
                <div class="select">
                    <label for="birthday">入社日</label><br>
                    <p><?= $formattedJoinDate ?></p>
                </div>
            </div>
            <div id="button">
                <button id="submit" type="submit" name="submit" onclick="location.href='./user_register.php'">入力画面に戻る</button>
                <button id="submit" type="submit" name="submit" onclick="location.href='./login.php'">送信</button>
            </div>
        </div>
    </main>
</body>

</html>
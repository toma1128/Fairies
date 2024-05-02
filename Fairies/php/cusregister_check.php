<?php
    //全てのエラーが発生したら、注意、警告する処理
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //エラー表示用
    session_start();

    //Cus_register.phpからもらった情報を取得
    $CusNumber = filter_input(INPUT_POST, "CusNumber");
    $uname = filter_input(INPUT_POST, "uname");
    $Cus_password = filter_input(INPUT_POST, "password");


    // データベースへの接続情報
    $servername = "localhost";
    $username = "fairies";
    $password = "daimonia";
    $dbname = "feya";

    //DBに接続するためmysqliインスタンス生成
    $conn_DB = new mysqli($servername, $username, $password, $dbname);

    //DBにエラーがある場合、エラー内容表示
    if ($conn_DB->connect_error) {
        die("Connection failed: " . $conn_DB->connect_error);
    }

    //DBに繋いだ後、DBの文字集合をutf8で設定する処理
    $conn_DB->set_charset('utf8');

    //CUSTOMERS表を入力する処理
    $stmt = $conn_DB->prepare('SELECT * FROM CUSTOMERS WHERE CUSTOMERNUMBER = ?');

    $stmt->bind_param('i', $CusNumber);

    $stmt->execute();

    $result = $stmt->get_result();

    //その表の中にお客様番号がある場合の処理
    if($result->num_rows > 0){
        $_SESSION['error'] = '既に固有番号があります。';
        header("Location: ./cus_register.php");
        exit();
    }else{

        // クエリを準備
        $stmt = $conn_DB->prepare('INSERT INTO CUSTOMERS (CUSTOMERNUMBER, NAME, PASSWORD) VALUES (?, ?, ?)');

        $stmt->bind_param('iss', $CusNumber, $uname, $Cus_password);

        // SQL実行
        $stmt->execute();
        // if ($stmt->execute()) {
        //     // echo "データが正常に挿入されました";
        // }else{
        //     // echo "データの挿入に失敗しました";
        // }
        $stmt->close();
        $conn_DB->close();

    }

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cus_register.css">
    <title>新規作成画面</title>
</head>
<body>
    <header>
        <h1 class="logo">
            <img src="images/fairieshome.png" alt="ロゴ" width="230">
        </h1>
    </header>
    <main>
        <div id="screen">
            <div class="select">
                <h2>新規作成（お客様用）</h2>
            </div>
                <div class="container" class="select">
                    <div class="select">
                        <label for="number">お客様固有番号</label><br>
                        <p><?=$CusNumber ?></p>
                    </div>
                    <div class="select">
                        <div>
                            <label for="uname">お名前</label><br>
                            <p><?=$uname ?></p>
                        </div>
                        <div>
                            <label for="password">パスワード</label><br>
                            <p><?=$Cus_password ?></p>
                        </div>
                    </div>
                </div>
                <p>送信しました</p>
                <button id="submit" type="submit" name="submit" onclick="location.href='./login.php'">確認</button>
            </div>
        </div>
    </main>
</body>

</html>
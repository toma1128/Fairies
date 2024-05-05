<?php
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

//mysql -u fairies -p feya; 
//password:daimonia;
$servername = "localhost";
$username = "fairies";
$password = "daimonia";
$dbname = "feya";
try {
    //データベースに接続するためsqlインスタン生成
    $conn_DB = new mysqli($servername, $username, $password, $dbname);
    if ($conn_DB->connect_error) {
        die("Connect failed :" . $conn_DB->connect_error);
    }
    //初期設定
    $CusNumber = filter_input(INPUT_POST, "CusNumber", FILTER_VALIDATE_INT);
    $uname = filter_input(INPUT_POST, "uname");
    $password = filter_input(INPUT_POST, "password");

    if (isset($_POST['registerBtn'])) {

        // CusNumberがデータベース内に存在するか確認
        $stmt = $conn_DB->prepare("SELECT * FROM CUSTOMERS where CUSTOMERNUMBER = ?");
        $stmt->bind_param("i", $CusNumber);
        $stmt->execute();
        $result = $stmt->get_result();

        //　登録する際、CusNumberが存在する場合の処理
        if ($result->num_rows > 0) {
            echo "既に存在します。";
        } else {
            // // パスワードをハッシュ化
            // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            //登録されたら、DBのCUSTOMERSの中にその情報が格納
            $stmt = $conn_DB->prepare("INSERT INTO CUSTOMERS (CUSTOMERNUMBER, NAME, PASSWORD) VALUE(?, ?, ?)");
            $stmt->bind_param("iss", $CusNumber, $uname, $password);

            //SQL実行
            $stmt->execute();

            //挿入に成功したかどうかを確認 
            if ($stmt->affected_rows > 0) {
                echo "<div>登録に成功しました。</div>";
                header("Location: login.php");
                exit();
            } else {
                echo "<div>登録に失敗しました。</div>";
            }
        }
    }
} catch (PDOException $e) {
    echo 'error:' . $e->getMessage();
} finally {

    //接続切断処理
    $stmt = null;
    $db = null;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cus_register.css">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <title>初期作成画面</title>
</head>

<body>
    <header>
        <img src="images/fairies_home.png" alt="ロゴ" width="230">
        <a class="form_link" href="">ログアウト</a>
    </header>

    <main>
        <div>
            <div id="title">
                <h2>初 期 作 成（お客様用）</h2>
            </div>
            <form action="" method="POST" class="w-1/2 mx-8">
                <div class="select">
                    <label for="number">お客様番号</label><br>
                    <input type="number" name="CusNumber" id="CusNumber" placeholder="例:99999" required>
                </div>
                <div class="select">
                    <div>
                        <label for="uname">お名前</label><br>
                        <input type="text" name="uname" id="uname" placeholder="例:山田花子" required>
                    </div>
                    <div>
                        <label for="password">パスワード</label><br>
                        <p>記号と英数字をそれぞれ一文字以上を含めて、八文字以上で入力してください.</p>
                        <input type="password" name="password" id="password" placeholder="例:123qwe" required>
                    </div>
                </div>
                <button id="submit" type="submit" name="registerBtn">登録</button>
            </form>
        </div>
    </main>
</body>

</html>
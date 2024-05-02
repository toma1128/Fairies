<?php
function h( $str ){
    return htmlspecialchars( $str, ENT_QUOTES, "UTF-8" );
}

//mysql -u fairies -p feya; 
//password:daimonia;
$servername = "localhost";
$username = "fairies";
$password = "daimonia";
$dbname = "feya";
try{
    //データベースに接続するためsqlインスタン生成
    $conn_DB = new mysqli($servername, $username, $password, $dbname);
    if($conn_DB->connect_error){
        die("Connect failed :". $conn_DB -> connect_error);
    }
    //初期設定
    $CusNumber = filter_input(INPUT_POST,"CusNumber", FILTER_VALIDATE_INT);
    $uname = filter_input(INPUT_POST,"uname");
    $password = filter_input(INPUT_POST,"password");

    if(isset($_POST['registerBtn'])){

         // CusNumberがデータベース内に存在するか確認
        $stmt = $conn_DB->prepare("SELECT * FROM CUSTOMERS where CUSTOMERNUMBER = ?");
        $stmt->bind_param("i",$CusNumber);
        $stmt->execute();
        $result = $stmt->get_result();

        //　登録する際、CusNumberが存在する場合の処理
        if($result->num_rows > 0){
            echo "既に存在します。";
        }else{
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

}catch(PDOException $e){
    echo'error:'.$e->getMessage();
}finally{

    //接続切断処理
    $stmt = null;
    $db = null;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="user_register.css">
    <title>初期作成画面</title>
</head>

<body>
    <header>
        <h1 class="logo">
            <img src="images/fairieshome.png" alt="ロゴ" width="230">
        </h1>
        <ul>
            <li><a class="form_link" href="">ログアウト</a></li>
        </ul>
    </header>

    <main>
        <form action="" method="POST" class="w-1/2 mx-8">
        <div id="screen">
            <div class="select">
                <h2>初期作成（お客様用）</h2>
            </div>
                <div class="container" class="select">
                    <div class="select">
                        <label for="number">お客様番号</label><br>
                        <input type="number" name="CusNumber" id="CusNumber" placeholder="例:99999" required>
                    </div>
                    <div class="select">
                        <div>
                            <label for="uname">お名前</label><br>
                            <input type="text" name="uname" id="uname" placeholder="名前を入力してください。" required>
                        </div>
                        <div>
                            <label for="password">パスワード</label><br>
                            <p>記号と英数字をそれぞれ一文字以上を含めて、八文字以上で入力してください.</p>
                            <input type="password" name="password" id="password" placeholder="8文字以上の英数字" required>
                        </div>
                    </div>
                </div>
                <button id="submit" type="submit" name="registerBtn">登録</button>
            </form>
        </div>
</body>

</html>

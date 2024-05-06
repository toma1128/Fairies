<?php
    // フォームから送信されたデータを取得する
    session_start();
    $number = $_SESSION['number'];
    $_SESSION['number'] = $number;  //念のため
    $possible = filter_input(INPUT_POST, "yesnochoice", FILTER_VALIDATE_INT);
    $period = filter_input(INPUT_POST, "datechoice", FILTER_VALIDATE_INT)  ? $_POST['datechoice'] : 0;
    $reason = filter_input(INPUT_POST, "reason", FILTER_VALIDATE_INT) ? $_POST['reason'] : 0;
    $message = filter_input(INPUT_POST, "options");

    // データベースへの接続情報
    $servername = "localhost"; // データベースのホスト名
    $username = "fairies"; // データベースのユーザー名
    $password = "daimonia"; // データベースのパスワード
    $dbname = "feya"; // 使用するデータベース名

    // データベースに接続する
    $conn_DB = new mysqli($servername, $username, $password, $dbname);

    //IDの取得(連番)
    $getID = "SELECT MAX(ID) FROM EMPLOYEE_FORMS;";
    $result = $conn_DB->query($getID);
    $row = $result->fetch_row();
    $id = $row[0] + 1;


    // 接続を確認する
    if ($conn_DB->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $conn_DB->set_charset('utf8');   //文字コードを設定;

    // SQLクエリを作成して実行する
    $stmt = $conn_DB->prepare('INSERT INTO EMPLOYEE_FORMS (ID, NUMBER, POSSIBLE, PERIOD, REASON, MESSAGE) VALUES (?, ?, ?, ?, ?, ?)');
    
    $stmt->bind_param('isiiis',$id, $number, $possible, $period, $reason, $message);
    $stmt->execute();

    // ステートメントを閉じる
    $stmt->close();

    // データベース接続を閉じる
    $conn_DB->close();

    $data = [   //フォームのデータ
        "possible" => [
            1 => "可能",
            2 => "不可能"
        ],
        "period" => [
            0 => "",
            1 => "一週間以内",
            2 => "一か月以内",
            3 => "半年以内",
            4 => "一年以上",
            5 => "未定"
        ],
        "reason" => [
            0 => "",
            1 => "怪我",
            2 => "家族",
            3 => "家",
            4 => "交通機関",
            5 => "その他"
        ]
    ]
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./form_check.css">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <title>確認画面</title>
</head>
<body>
    <header>

        <h1>
            <img src="images/fairieshome.png" alt="ロゴ" width="230">


        </h1>
        <nav>
            <ul>
                <a href="http://localhost/Fairies/Fairies/php/login.php" class="button-link">
                    <button type="button" class="button">ログアウト</button>
                </a>
            </ul>
        </nav>
    </header>

    <main>
        <div>
            <h2>災害安否確認フォーム</h2>
                </div>
                <div>
                    <p class=question>出勤可否</p>
                    <p class=response>□<?=$data["possible"]["$possible"] ?></p>
                </div>
                <div>
                    <p class=question>出勤出来ない期限</p>
                    <p class=response>□<?= $data["period"]["$period"] ?></p>
                </div>
                <div>
                    <p class=question>出社出来ない理由</p>
                    <p class=response>□<?=$data["reason"]["$reason"] ?></p>
                </div>
                <div>
                    <p class=question>連絡事項等</p>
                    <textarea name="options" id="options" cols="30" rows="10" value="" class=response><?=$message ?></textarea>
                </div>
                <div>
                    <p class=explanation>お間違えなければ登録、変更する場合は変更を押してください</p>
                </div>
                <button type="submit" id="submit" onclick="location.href='./home_employee.php'"class = registration>登&nbsp;録</button>
                <button onclick="location.href='./form_employee.php'"class = change>変&nbsp;更</button>
        </dev>
    </main>


</body>
</html>
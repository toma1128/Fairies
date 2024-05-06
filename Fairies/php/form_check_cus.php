<?php
// 読み取り
date_default_timezone_set('Asia/Tokyo');
// どこから持ってくるかわからん
// 重複ダメって怒られた;;
$id = "11111";
$number = "12345";
// ーーーーーーーーーーーーーー
$home = filter_input(INPUT_POST, "choice", FILTER_VALIDATE_INT);
$detail = filter_input(INPUT_POST, "datechoice", FILTER_VALIDATE_INT);

// 多分あってると思う

// ファイルの一時的な保存先からファイルを移動する
$photo1_tmp = $_FILES['filename1']['tmp_name'];
$photo2_tmp = $_FILES['filename2']['tmp_name'];
$photo3_tmp = $_FILES['filename3']['tmp_name'];

// ファイル名の生成
$photo1_name = basename($_FILES['filename1']['name']);
$photo2_name = basename($_FILES['filename2']['name']);
$photo3_name = basename($_FILES['filename3']['name']);
// 移動先のディレクトリを指定（images フォルダ内）
$uploadDirectory = 'webImages/';

// ファイルを移動
$destination1 = $uploadDirectory . $photo1_name;
$destination2 = $uploadDirectory . $photo2_name;
$destination3 = $uploadDirectory . $photo3_name;

// ファイルを移動
move_uploaded_file($photo1_tmp, $destination1);
move_uploaded_file($photo2_tmp, $destination2);
move_uploaded_file($photo3_tmp, $destination3);


// ーーーーーーーーーーーーーーーーーーーーーーーー
// テキストフィールドに対しての処理を行っていません。
$message = filter_input(INPUT_POST, "options");

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
$stmt = $conn_DB->prepare('INSERT INTO CUSTOMER_FORMS (ID, NUMBER, STATE, PART, PHOTO1,PHOTO2,PHOTO3,INFORMATION) VALUES (?, ?, ?, ?, ?,?,?,?)');

$stmt->bind_param('iissssss', $id, $number, $home, $detail, $destination1, $destination2, $destination3, $message);

if ($stmt->execute()) {
    // ステートメントを閉じる
    $stmt->close();
    // データベース接続を閉じる
    $conn_DB->close();
} else {
    // エラーが発生した場合の処理
    echo "Error: " . $stmt->error;
}

if ($_POST['submit']) {
    session_start();
    $_SESSION['home'] = $home;

    header("Location: login.php");
    exit;
}
// 家の状態
$homeData = [
    "home" => [
        1 => "崩壊",
        2 => "ひび割れ",
        3 => "その他"
    ]
];
// 壊れている箇所
$detailData = [
    "detail" => [
        1 => "屋根",
        2 => "壁",
        3 => "電気",
        4 => "水道",
        5 => "その他"
    ]
]


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./form_check_cus.css">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <title>フォーム画面</title>
</head>

<body>
    <header>
        <img src="images/fairies_home.png" alt="ロゴ" width="230">
        <a href="http://localhost/Fairies/Fairies/php/login.php">ログアウト</a>
    </header>
    <main>
        <div id="title">
            <h2>災害安否確認フォーム（確認）</h2>
        </div>
        <div id="check_words">
            <div class="select">
                <label>現在の家を状態</label>
                <p><?= $homeData['home'][$home] ?></p>
            </div>
            <div class="select">
                <label>壊れている箇所</label>
                <p><?= $detailData['detail'][$detail] ?></p>
            </div>
            <div class="select">
                <label>壊れている部分の写真</label>
                <div id="photo">
                    <!-- 保存する場所のファイルの名前も表示されちゃうのどうにかしてほしい -->
                    <p><?= $destination1 ?></p>
                    <p><?= $destination2 ?></p>
                    <p><?= $destination3 ?></p>
                </div>
            </div>
            <div class="select">
                <label>壊れた箇所の詳細な情報</label>
                <p><?= $message ?></p>
            </div>
        </div>
        <div id="button">
            <button type="submit" name="submit" onclick="location.href='./form_customer.php'">入力画面に戻る</button>
            <button type="submit" name="submit" onclick="location.href='./login.php'">送信</button>
        </div>

    </main>
</body>

</html>
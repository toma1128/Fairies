<?php
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

$where = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

// $where が設定されている場合は、条件付きのクエリを実行する
$stmt = $conn_DB->prepare(' SELECT C.CUSTOMERNUMBER AS NUMBER, C.NAME AS NAME, CF.STATE AS STATE, CF.PART AS PART, CF.PHOTO1 AS PHOTO1, CF.PHOTO2 AS PHOTO2, CF.PHOTO3 AS PHOTO3, CF.INFORMATION AS MESSAGE FROM CUSTOMERS AS C JOIN CUSTOMER_FORMS AS CF ON(C.CUSTOMERNUMBER = CF.NUMBER) WHERE CF.ID = ?');

$stmt->bind_param("s", $where);
$stmt->execute(); // クエリを実行する
// ここで結果を処理する

// 結果セットを取得し、関連する行を配列に追加する
$result = array(); // 空の配列を作成
$result_set = $stmt->get_result(); // 結果セットを取得
while ($row = $result_set->fetch_assoc()) { // 各行を取得
    $result[] = $row; // 配列に行を追加
}

$data = [   //フォームのデータ
    "state" => [
        1 => "崩壊",
        2 => "ひび割れ",
        3=> "その他"
    ],
    "part" => [
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
    <title>個人情報画面</title>
    <link rel="stylesheet" href="personal_customer.css">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">

<body>
    <header>
        <img src="images/fairies_home.png" alt="ロゴ" width="230">
        <a href="http://localhost/Fairies/Fairies/php/home_employee.php">ホームに戻る</a>
    </header>
    <main>
        <?php foreach ($result as $r) : ?>
        <div id="information">
            <div id="status">
                <h3 id="register_number"><?= $r["NUMBER"] ?></h3>
                <h3 id="time">〇年〇月〇日</h3>
            </div>
            <h3 id="name"><?= $r["NAME"] ?></h3>
        </div>
        <div id="word">
            <p id="home_condition"><?= $data["state"][$r["STATE"]] ?></p>
            <div id="home">
                <img src="images/16111_color.png" alt="home" id="home_image">
                <div id="home_detail">
                    <ul>
                        <li><?= $data["part"][$r["PART"]] ?></li>
                    </ul>
                </div>
                <div id="comment">
                    <p><?= $r["MESSAGE"] ?></p>
                </div>
            </div>
        </div>
        <div id=folder>
            <div class=photo>
                <img src="./<?= $r["PHOTO1"] ?>" alt="">
            </div>
            <div class=photo>
                <img src="./<?= $r["PHOTO2"] ?>" alt="">
            </div>
            <div class=photo>
                <img src="./<?= $r["PHOTO3"] ?>" alt="">
            </div>
        </div>
        <?php endforeach ?>
    </main>
</body>

</html>
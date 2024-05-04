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
$stmt = $conn_DB->prepare('SELECT D.NAME AS DNAME, E.NAME AS ENAME, EF.POSSIBLE AS POSSIBLE, EF.PERIOD AS PERIOD, EF.REASON AS REASON, EF.MESSAGE AS MESSAGE FROM EMPLOYEES AS E JOIN DEPARTMENTS AS D ON(E.DEPARTMENT_ID = D.ID) JOIN EMPLOYEE_FORMS AS EF ON(E.NUMBER = EF.NUMBER) WHERE EF.ID = ?');

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
    "possible" => [
        1 => "可能",
        2 => "不可能"
    ],
    "period" => [
        1 => "一週間以内",
        2 => "一か月以内",
        3 => "半年以内",
        4 => "一年以上",
        5 => "未定"
    ],
    "reason" => [
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
    <title>個人情報画面</title>
    <link rel="stylesheet" href="personal_employee.css">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <img src="images/fairies_home.png" alt="ロゴ" width="230">
        <a href="http://localhost/Fairies/Fairies/php/home_employee.php">ホームに戻る</a>
    </header>
    <main>
        <?php foreach ($result as $r) : ?>
            <div>
                <div id=STATUS>
                    <h3><?= $r["DNAME"] ?></h3>
                    <h3>入社日</h3>
                </div>
                <h3 id="name">&nbsp;<?= $r["ENAME"] ?>&nbsp;</h3>
            </div>
            <div>
                <div class="comment">
                    <p><?= $r["MESSAGE"] ?></p>
                </div>
                <div class="duration">
                    <?php if ($r['POSSIBLE'] == '1') : ?>
                        <p>出社可能です。</p>
                    <?php else : ?>
                        <p> <?= $data["period"][$r['REASON']] ?>、<?= $data['reason'][$r['REASON']] ?>が原因で出社できません。</p>
                    <?php endif; ?>
                </div>
                <div class="people_image">
                    <img src="images/17459_color.png" alt="human" width="280">
                </div>
            </div>
        <?php endforeach ?>
    </main>
</body>

</html>
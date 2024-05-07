<?php

function h($str)
{
    if ($str === null) {
        return '';
    }
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

// if (isset($_POST["logoutBtn"])) {
//     header('Location: fairiesproject_login.php');
//     //exit();
// }

session_start();
$employee_no = $_SESSION['number'];

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

$where = filter_input(INPUT_POST, "department", FILTER_VALIDATE_INT);
// 全件表示用のクエリを準備する
$stmt = $conn_DB->prepare('SELECT EF.ID AS EFID, D.NAME AS DNAME, E.NAME AS ENAME, EF.POSSIBLE AS POSSIBLE, EF.PERIOD AS PERIOD, EF.REASON AS REASON FROM EMPLOYEES AS E JOIN DEPARTMENTS AS D ON(E.DEPARTMENT_ID = D.ID) JOIN EMPLOYEE_FORMS AS EF ON(E.NUMBER = EF.NUMBER)');

// もし $where が設定されていない場合は、全件表示用のクエリを実行する
if (!$where or $where == 0) {
    $stmt->execute(); // クエリを実行する
    // ここで結果を処理する
} elseif ($where >= 1) {
    // $where が設定されている場合は、条件付きのクエリを実行する
    $stmt = $conn_DB->prepare('SELECT EF.ID AS EFID, D.NAME AS DNAME, E.NAME AS ENAME, EF.POSSIBLE AS POSSIBLE, EF.PERIOD AS PERIOD, EF.REASON AS REASON FROM EMPLOYEES AS E JOIN DEPARTMENTS AS D ON(E.DEPARTMENT_ID = D.ID) JOIN EMPLOYEE_FORMS AS EF ON(E.NUMBER = EF.NUMBER) WHERE D.ID = ?');

    $stmt->bind_param("i", $where);
    $stmt->execute(); // クエリを実行する
    // ここで結果を処理する
}

// 結果セットを取得し、関連する行を配列に追加する
$result = array(); // 空の配列を作成
$result_set = $stmt->get_result(); // 結果セットを取得
while ($row = $result_set->fetch_assoc()) { // 各行を取得
    $result[] = $row; // 配列に行を追加
}

$stmt2 = $conn_DB->prepare('SELECT CF.ID AS CFID, C.CUSTOMERNUMBER AS CUSTOMERNUMBER, C.NAME AS CNAME, CF.STATE as CFSTATE FROM CUSTOMERS AS C JOIN CUSTOMER_FORMS AS CF ON(C.CUSTOMERNUMBER = CF.NUMBER)');
$stmt2->execute();

// 두 번째 쿼리 결과 처리
$result2 = array();
$result_set2 = $stmt2->get_result();
while ($row = $result_set2->fetch_assoc()) {
    $result2[] = $row;
}

// var_dump($_POST);
// var_dump('help me please');
//全権表示用のクエリを準備する

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
];

$customer_data = [
    "state" => [
        1 => "崩壊",
        2 => "ひび割れ",
        3=> "その他"
    ]
];


?>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home_employee.css">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <title>ホーム画面</title>
</head>

<body>
    <header>
        <img src="images/fairies_home.png" alt="ロゴ" width="230">
        <ul>
            <li onclick="location.href='./form_employee.php';">安否報告</li>
            <li onclick="location.href='./login.php';">ログアウト</li>
        </ul>
    </header>
    <main>
        <div id="screen">
            <div id="naviWrap">
                <ul id="categoryNavi"> <!-- 右立のやつ-->
                    <li id="emp_btn"> 従業員一覧</li>
                    <li id="cus_btn">お客様一覧</li>
                </ul>
            </div>
            <div id="employee_about">
                <div class="categoryWrap">
                    <!-- <div id="categoryWrap"> -->
                    <div id="category_employee"> <!--従業員一覧かお客様一覧の表示-->
                        <h2>従業員一覧</h2>
                    </div>

                    <!-- </div> -->
                    <form action="" method="POST">
                        <input type="search" id="query" name="q" placeholder="Search...">
                        <button>検索</button>
                        <div class="soto">
                            <label for="department">部署</label>
                            <select name="department" id="department">
                                <option value="0">全て</option>
                                <option value="1">営業</option>
                                <option value="2">設計</option>
                                <option value="3">施工管理</option>
                                <option value="4">事務</option>
                                <option value="5">積算</option>
                            </select>
                        </div>
                        <div class="soto">
                            <label for="date">期限</label>
                            <select name="date" id="date">
                                <option value="1">全て</option>
                                <option value="2">一週間以内</option>
                                <option value="3">一か月以内</option>
                                <option value="4">半年以内</option>
                                <option value="5">一年以上</option>
                                <option value="6">未定</option>

                            </select>
                        </div>
                    </form>

                </div>
                <div class="contentWrap"> <!--情報データが入るところ-->
                    <table>
                        <?php foreach ($result as $r) : ?>
                            <tbody>
                                <tr onclick="location.href='./personal_employee.php?id=<?= $r["EFID"]  ?> ';">
                                    <td><?= h($r["DNAME"]) ?></td>
                                    <td><?= h($r["ENAME"]) ?></td>
                                    <td><?= h($data["possible"][($r["POSSIBLE"])]) ?></td>
                                    <td><?= h($data["period"][($r["PERIOD"])]) ?></td>
                                    <td><?= h($data["reason"][($r["REASON"])]) ?></td>
                                </tr>
                            </tbody>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
            <div id="customer_about">
                <div class="categoryWrap">
                    <!-- <div id="categoryWrap"> -->
                    <div id="category_customer">
                        <h2>お客様一覧</h2>
                    </div>
                    <!-- </div> -->
                    <input type="search" id="query" name="q" placeholder="Search...">
                    <button>検索</button>
                    </form>
                </div>
                <div class="contentWrap">
                    <table>
                        <?php foreach ($result2 as $r) : ?>
                            <tbody>
                                <tr onclick="location.href='./personal_customer.php?id=<?= $r["CFID"] ?>';">
                                    <td><?= isset($r['CUSTOMERNUMBER']) ? h($r['CUSTOMERNUMBER']) : '' ?></td>
                                    <td><?= isset($r['CNAME']) ? h($r['CNAME']) : '' ?></td>
                                    <td><?= $customer_data["state"][$r["CFSTATE"]] ?></td>
                                </tr>
                            </tbody>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="./home_emp.js"></script>

</html>
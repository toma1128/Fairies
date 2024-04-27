<?php
// if (isset($_POST["logoutBtn"])) {
//     header('Location: fairiesproject_login.php');
//     //exit();
// }

$employee_no = filter_input(INPUT_POST,"EMPLOYEE_NO");

// $dsn = "mysql:host=localhost;dbname=feya;charset=utf8mb4";
// try{
//     $db = new PDO($dsn, "fairies", "daimonia");
//     //PDOの動作オプションを指定
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //静的プレースホルダの設定
//     //SQLの準備
//     $sql = "SELECT D.NAME, E.NAME, EF.POSSIBLE, EF.PERIOD, EF.REASON FROM EMPLOYEES AS E JOIN DEPARTMENTS AS D ON(E.DEPARTMENT_ID = D.ID) JOIN EMPLOYEE_FORMS AS EF ON(E.NUMBER = EF.NUMBER);";
//     //SQLの実行
//     $sql->execute();
//     //SQL実行結果
//     while ($rows = $sql->fetch(PDO::FETCH_ASSOC)) {
//       $result[] = $rows;
//     }
//     //db切断
//     $sql = null;
//     $db = null;
//     }catch(PDOException $poe){
//       exit("DBエラー".$poe->getMessage());
//     }

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="home_employee.css">
    <title>ホーム画面</title>
</head>

<body>
    <header>
        <h1 class="logo">
            <img src="images/fairieshome.png" alt="ロゴ" width="230">
        </h1>
        <ul>
            <li><a class="form_link" href="./form_employee.php?number=<?=$employee_no?>">安否報告</a></li>
            <li><a class="form_link" href="">ログアウト</a></li>
        </ul>
    </header>
    <main>
        <form method="POST">
            <div id="screen">
                <div id="naviWrap">
                    <ul id="categoryNavi"> <!-- 右立のやつ-->
                        <li><a href="#category-1"> 従業員一覧</a></li>
                        <li><a href="#category-2">お客様一覧</a></li>
                    </ul>
                </div>
                <div id="employee_about">
                    <div id="categoryWrap">
                        <!-- <div id="categoryWrap"> -->
                        <div id="category-1" class="category"> <!--従業員一覧かお客様一覧の表示-->
                            <h2>従業員一覧</h2>
                        </div>
                        <!-- </div> -->
                        <input type="search" id="query" name="q" placeholder="Search...">
                        <button>検索</button>
                        <div class="so-to">
                            <label for="department">部署</label>
                            <select name="department" id="department">
                                <option value="1">全て</option>
                                <option value="2">営業</option>
                                <option value="3">設計</option>
                                <option value="4">施工管理</option>
                                <option value="5">事務</option>
                                <option value="6">積算</option>
                            </select>
                        </div>
                        <div class="">
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
                    </div>
                    <div id="contentWrap"> <!--情報データが入るところ-->
                        <table>
                            <tbody>
                                <!-- <?php foreach($result as $r): ?> 中途半端なのでコメントアウト
                                    <tr>
                                    <a class="btn btn-primary" href="./form_employee.php?=<?=$employee_no?>
                                    <td><?=h($r["D.NAME"]) ?></td>
                                    <td><?=h($r["E.NAME"]) ?></td>
                                    <td><?=h($r["EF.POSSIBLE"]) ?></td>
                                    <td><?=h($r["EF.PERIOD"]) ?></td>
                                    <td><?=h($r["EF.REASON"]) ?></td>
                                    </tr>
                                <?php endforeach ?> -->
                            </tbody>
                        </table>
                        <table>
                            <tbody>
                                <tr>
                                    <td>ECC部署</td>
                                    <td>田中太郎</td>
                                    <td>出社不可</td>
                                    <td>一か月以内</td>
                                    <td>怪我</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>

</html>
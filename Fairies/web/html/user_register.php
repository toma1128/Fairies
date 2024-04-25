<?php
// define('DB_USER', 'fairies'); //ユーザ名
// define('DB_PASS', 'daimonia'); //パスワード

// $result = [
//     "register"  => true,
//     "message" => null,
//     "result"  => null,
// ];

// $name = filter_input(INPUT_POST, "name");
// $ruby = filter_input(INPUT_POST, "ruby");
// $password = filter_input(INPUT_POST, "password");
// $confirmpassword = filter_input(INPUT_POST, "confirmPassword");
// $number = filter_input(INPUT_POST, "number", FILTER_VALIDATE_INT);
// $birthday = filter_input(INPUT_POST, "birthday", FILTER_VALIDATE_INT);


// if ($result["register"]) {
//     try {
//         $db = new PDO($dsn, DB_USER, DB_PASS);
//         $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         $db->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

//         $sql = "INSERT INTO apparel_products VALUES(:product_id, :product_name, :price, :size, :color, :stock)";

//         $stmt = $db->prepare($sql);


//         //値のバインド
//         $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
//         $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
//         $stmt->bindParam(':price', $price, PDO::PARAM_STR);
//         $stmt->bindParam(':size', $size, PDO::PARAM_INT);
//         $stmt->bindParam(':color', $color, PDO::PARAM_INT);
//         $stmt->bindParam(':stock', $stock, PDO::PARAM_STR);

//         //SQL実行
//         $stmt->execute();

//         //結果を格納する配列宣言
//         $result["result"] = $stmt->rowCount();

//         if ($result["result"] === 1) {
//             $db->commit();
//             $result["message"] = "データの登録に成功しました";
//         } else {
//             $db->rollback();
//             $result["message"] = "データの登録に失敗しました";
//         }
//         echo '<pre>';
//         var_dump($result);
//         echo '</pre>';
//         header("Location: fairiesproject_login.php");
//         exit; // リダイレクト後にスクリプトが継続されないようにする
//     } catch (PDOException $e) {
//         echo 'error:' . $e->getMessage();
//     } finally {
//         // 接続切断処理
//         $stmt = null;
//         $db = null;
//     }
// } else {
//     echo "<script>const status = false;</script>";
// }
?>

<!-- 
１．新規登録画面で登録を押した場合にエラーに合ってるのがある場合、
エラーメッセージがダイアログで小さく表示されるような作業をしようとする
２．後-->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="user_register.css">
    <title>新規作成画面</title>
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
        <div>
            <div class="select">
                <h2>新規作成（従業員用）</h2>
            </div>
            <form id="registrationForm" action="fairiesproject_register.php" method="POST" class="w-1/2 mx-8">
                <div class="container" class="select">
                    <label for="team">所属門又はチーム:</label>
                    <p>半角数字で入力してください。</p>
                    <select name="team" id="team">
                        <option value="1">営業</option>
                        <option value="2">設計</option>
                        <option value="3">施工管理</option>
                        <option value="4">事務</option>
                        <option value="5">積算</option>
                    </select>
                    <div class="select">
                        <label for="number">社員番号</label><br>
                        <input type="number" name="number" id="number" placeholder="例:99999" required>
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

                    <div class="select">
                        <label for="birthday">入社日</label><br>
                        <input type="date" id="birthday" name="birthday" required>
                    </div>
                </div>
                <button id="submit" type="submit">登録</button>
                <!-- 新規登録画面で失敗した場合、ダイアログにその結果を表示される用-->
                <dialog id="resultDialog">
                    <div id="dialogWrap">
                        <form action="" method="post" id="addItemForm">
                            <div class="form-item-wrap">
                                <div class="form-item">
                                    <?= $result["message"] ?><br>
                                </div>
                            </div>
                            <div class="form-item-wrap"><button id="addItem" type="submit">確認</button></div>
                        </form>
                    </div>
                    <span class="material-icons">close</span>
                </dialog>
            </form>
        </div>
</body>

</html>
<script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        event.preventDefault(); // フォームのデフォルトの送信を防止

        // フォームの要素を取得
        const form = event.target;
        const nameInput = form.querySelector('#name');
        const rubyInput = form.querySelector('#ruby');
        const passwordInput = form.querySelector('#password');
        const confirmPasswordInput = form.querySelector('#confirmpassword');
        const numberInput = form.querySelector('#number');

        let isValid = true;
        let errorMessage = '';

        // 名前の入力をバリデート
        if (!nameInput.value) {
            errorMessage += '名前を入力してください。\n';
            isValid = false;
        }

        // 価格（`ruby`）の入力をバリデート
        if (!rubyInput.value) {
            errorMessage += '価格を入力してください。\n';
            isValid = false;
        }

        // パスワードの入力をバリデート
        if (!passwordInput.value) {
            errorMessage += 'パスワードを入力してください。\n';
            isValid = false;
        }

        // パスワード確認の入力をバリデート
        if (!confirmPasswordInput.value || passwordInput.value !== confirmPasswordInput.value) {
            errorMessage += 'パスワードが一致しません。\n';
            isValid = false;
        }

        // 電話番号の入力をバリデート
        if (!numberInput.value || isNaN(numberInput.value)) {
            errorMessage += '電話番号を正しく入力してください。\n';
            isValid = false;
        }

        // フォームが有効でない場合、エラーメッセージを表示
        if (!isValid) {
            alert(errorMessage);
        } else {
            // フォームが有効な場合、フォームを送信します
            form.submit();
        }
    });
</script>
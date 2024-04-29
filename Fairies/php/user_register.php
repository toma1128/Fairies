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
        <div id="screen">
            <div class="select">
                <h2>新規作成（従業員用）</h2>
            </div>
            <form id="registrationForm" action="./empregister_check.php" method="POST" class="w-1/2 mx-8">
                
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
                <button id="submit" type="submit" name="submit" onclick="location.href='./empregister_check.php'">登録</button>
                <!-- 新規登録画面で失敗した場合、ダイアログにその結果を表示される用-->
                <!-- <dialog id="resultDialog">
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
                </dialog> -->
            </form>
        </div>
</body>
</html>
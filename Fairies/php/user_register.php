<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="user_register.css">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <title>新規作成画面</title>
</head>

<body>
    <header>
        <img src="images/fairies_home.png" alt="ロゴ" width="230">
        <a href="http://localhost/Fairies/Fairies/php/login.php">ログイン画面に戻る</a>
    </header>

    <main>
        <div>
            <div id="title">
                <h2>新 規 作 成</h2>
            </div>
            <form id="registrationForm" action="./emp_register_check.php" method="POST" class="w-1/2 mx-8">
                <div class="select">
                    <label for="team">所属門又はチーム<br></label>
                    <select name="team" id="team">
                        <option value="1">営業</option>
                        <option value="2">設計</option>
                        <option value="3">施工管理</option>
                        <option value="4">事務</option>
                        <option value="5">積算</option>
                    </select>
                </div>
                <div class="select">
                    <label for="number">社員番号を入力</label><br>
                    <p>半角数字で入力してください。</p>
                    <input type="number" name="number" id="number" placeholder="例:99999" required>
                </div>
                <div class="select">
                    <div>
                        <label for="uname">お名前を入力</label><br>
                        <input type="text" name="uname" id="uname" placeholder="例:田 中 太 郎" required>
                    </div>
                    <div>
                        <label for="password">パスワードを設定</label><br>
                        <p>記号と英数字をそれぞれ一文字以上を含めて、八文字以上で入力してください</p>
                        <input type="password" name="password" id="password" placeholder="例:123qwe" required>
                    </div>
                </div>
                <div class="select">
                    <label for="birthday">入社日を入力</label><br>
                    <input type="date" id="birthday" name="birthday" required>
                </div>
                <button type="submit" name="submit" onclick="location.href='./emp_register_check.php'">送信内容を確認する</button>
            </form>
        </div>
    </main>
</body>

</html>
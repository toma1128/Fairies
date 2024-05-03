
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
        <h1 class="logo">
            <img src="images/fairies_home.png" alt="ロゴ" width="230">
        </h1>
        <nav>
            <ul class="nav-menu">
                <a href="http://localhost/Fairies/Fairies/php/login.php" class="button-link">
                    <button type="button" class="button">ホームに戻る</button>
                </a>
            </ul>
        </nav>
        <div>
            <h2>新&nbsp;規&nbsp;作&nbsp;成</h2>
        </div>
    </header>
    <main>
        <div id="screen">
            <form id="registrationForm" action="./emp_register_check.php" method="POST" class="w-1/2 mx-8">
                
                <div class="container" class="select">
                    <label for="team" class=font-size>所属門又はチーム</label>
                    <p>半角数字で入力してください。</p>
                    <select name="team" id="team">
                        <option value="1">営業</option>
                        <option value="2">設計</option>
                        <option value="3">施工管理</option>
                        <option value="4">事務</option>
                        <option value="5">積算</option>
                    </select>
                    <div class="select">
                        <label for="number" class=font-size>社員番号を入力</label><br>
                        <input type="number" name="number" id="number" placeholder="例:99999" required>
                    </div>
                    <div class="select">
                        <div>
                            <label for="uname"class=font-size>お名前を入力</label><br>
                            <input type="text" name="uname" id="uname" placeholder="田&nbsp;中&nbsp;太&nbsp;郎" required>
                        </div>
                        <div>
                            <label for="password"class=font-size>パスワードを設定</label><br>
                            <p>記号と英数字をそれぞれ一文字以上を含めて、八文字以上で入力してください</p>
                            <input type="password" name="password" id="password" placeholder="8文字以上の英数字" required>
                        </div>
                    </div>

                    <div class="select"class=font-size>
                        <label for="birthday">入社日を入力</label><br>
                        <input type="date" id="birthday" name="birthday" required>
                    </div>
                </div>
                <button id="submit" type="submit" name="submit" onclick="location.href='./empregister_check.php'">登&nbsp;録</button>
            </form>
        </div>
</body>
</html>
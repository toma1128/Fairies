<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cus_register.css">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <title>初期作成画面</title>
</head>

<body>
    <header>
        <img src="images/fairies_home.png" alt="ロゴ" width="230">
        <a class="form_link" href="./login.php">ログイン画面に戻る</a>
    </header>
    <main>
        <div>
            <div id="title">
                <h2>初 期 作 成（お客様用）</h2>
            </div>
            <?php
                //checkphpに画面遷移する時に、固有番号がDBの中にすでにある
                //この処理を始めます。
                session_start();
                
                if(isset($_SESSION['error'])){
                    echo '<p style="color: red">'. $_SESSION['error']. '</p>';

                    //エラーメッセージ初期化
                    unset($_SESSION['error']);
                }

             ?>
            <form action="./cus_register_check.php" method="POST" class="w-1/2 mx-8">
                <div class="select">
                    <label for="number">お客様番号</label><br>
                    <input type="number" name="CusNumber" id="CusNumber" placeholder="例:99999" required>
                </div>
                <div class="select">
                    <div>
                        <label for="uname">お名前</label><br>
                        <input type="text" name="uname" id="uname" placeholder="例:山田花子" required>
                    </div>
                    <div>
                        <label for="password">パスワード</label><br>
                        <p>記号と英数字をそれぞれ一文字以上を含めて、八文字以上で入力してください.</p>
                        <input type="password" name="password" id="password" placeholder="例:123qwe" required>
                    </div>
                </div>
                <button type="submit" name="registerBtn" onclick="location.href='./cus_register_check.php'">送信内容を確認する</button>
            </form>
        </div>
    </main>
</body>

</html>
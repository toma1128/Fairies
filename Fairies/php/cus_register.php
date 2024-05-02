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
        <h1 class="logo">
            <img src="images/fairieshome.png" alt="ロゴ" width="230">
        </h1>
        <nav>
            <ul class="nav-menu">
                <a href="http://localhost/Fairies/Fairies/php/login.php" class="button-link">
                    <button type="button" class="button">ホームに戻る</button>
                </a>
            </ul>
        </nav>
    </header>
    <main>
        <div id="screen">
        <form id="registrationForm" action="./cusregister_check.php" method="POST">
            <div class="select">
                <h2>初期作成（お客様用）</h2>
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
            </div>
            
                <div class="container" class="select">
                    <div class="select">
                        <label for="number">お客様番号</label><br>
                        <input type="number" name="CusNumber" id="CusNumber" placeholder="例:99999" required>
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
                </div>
                <button id="submit" type="submit" name="submit">登&nbsp;録</button>
            </form>
        </div>
    </main>
</body>

</html>

<?php
session_start();
$num = $_SESSION['number'];
$_SESSION['number'] = $num;
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./form_customer.css">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <title>フォーム画面</title>
</head>

<body>
    <header>
        <img src="images/fairies_home.png" alt="ロゴ" width="230">
        <a href="http://localhost/Fairies/Fairies/php/login.php">ログアウト</a>
    </header>
    <main>
        <div id="title">
            <h2>災害安否確認フォーム</h2>
        </div>
        <!--  enctype="multipart/form-data"画像 -->
        <form action="./form_check_cus.php" method="POST" enctype="multipart/form-data">
            <div class="select">
                <p>現在の家を状態を教えてください。</p>
                <input type="radio" id="choice1" name="choice" value="1">
                <label for="choice1">崩壊</label>
                <input type="radio" id="choice2" name="choice" value="2">
                <label for="choice2">ひび割れ</label>
                <input type="radio" id="choice3" name="choice" value="3">
                <label for="choice3">その他</label>
            </div>
            <div class="select">
                <p>壊れている箇所を教えていださい。</p>
                <input type="radio" id="2ndchoice1" name="datechoice" value="1">
                <label for="2ndchoice1">屋根</label>
                <input type="radio" id="2ndchoice2" name="datechoice" value="2">
                <label for="2ndchoice2">壁</label>
                <input type="radio" id="2ndchoice3" name="datechoice" value="3">
                <label for="2ndchoice3">電気</label>
                <input type="radio" id="2ndchoice4" name="datechoice" value="4">
                <label for="2ndchoice4">水道</label>
                <input type="radio" id="2ndchoice5" name="datechoice" value="5">
                <label for="2ndchoice5">その他</label>
            </div>
            <div class="select">
                <p>壊れている部分の写真３枚送付してください。</p>
                <div id="photo">
                    <input type="file" id="myFile" name="filename1">
                    <input type="file" id="myFile" name="filename2">
                    <input type="file" id="myFile" name="filename3">
                </div>
            </div>
            <div class="select">
                <p>壊れた箇所の詳細な情報をお書きください。</p>
                <textarea name="options" id="options" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" name="submit" onclick="location.href='./emp_register_check.php'">送信内容を確認する</button>
        </form>
    </main>
</body>

</html>
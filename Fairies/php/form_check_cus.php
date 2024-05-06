<?php
$home="崩壊";
$detail = "屋根";


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./form_check_cus.css">
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
        <form action="" method="POST">
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
                <p>出社出来ない理由を選択してください。</p>
                <input type="radio" id="reason1" name="reason" value="1">
                <label for="reason1">怪我</label>
                <input type="radio" id="reason2" name="reason" value="2">
                <label for="reason2">家族</label>
                <input type="radio" id="reason3" name="reason" value="3">
                <label for="reason3">家</label>
                <input type="radio" id="reason4" name="reason" value="4">
                <label for="reason4">交通機関</label>
                <input type="radio" id="reason5" name="reason" value="5">
                <label for="reason5">その他</label>
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
            <button type="submit" id="submit">送信</button>
        </form>
    </main>
</body>

</html>
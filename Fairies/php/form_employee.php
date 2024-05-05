<?php
session_start();
$num = $_SESSION['number'];
$_SESSION['number'] = $num;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./form_employee.css">
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <title>フォーム画面</title>
</head>

<body>
    <header>
        <img src="images/fairies_home.png" alt="ロゴ" width="230">
        <a href="http://localhost/Fairies/Fairies/php/login.php">ログアウト</a>
    </header>
    <main>
        <div>
            <div id="title">
                <h2>災害安否確認フォーム</h2>
            </div>
            <form action="./form_check.php" method="POST">
                <div class=select>
                    <p>出勤可能ですか？</p>
                    <div class="select_word" id="possible">
                        <input type="radio" id="yes" name="yesnochoice" value="1">
                        <label for="yes">可能</label>
                    </div>
                    <div class="select_word" id="impossible">
                        <input type="radio" id="no" name="yesnochoice" value="2">
                        <label for="no">不可</label>
                    </div>
                </div>
                <div class="select">
                    <p>出勤出来ない期限を選択してください。</p>
                    <div class="select_word">
                        <input type="radio" id="datechoice1" name="datechoice" value="1">
                        <label for="datechoice1" class=font>一週間以内</label>
                    </div>
                    <div class="select_word">
                        <input type="radio" id="datechoice2" name="datechoice" value="2">
                        <label for="datechoice2" class=font>一か月以内</label>
                    </div>
                    <div class="select_word">
                        <input type="radio" id="datechoice3" name="datechoice" value="3">
                        <label for="datechoice3" class=font>半年以内</label>
                    </div>
                    <div class="select_word">
                        <input type="radio" id="datechoice4" name="datechoice" value="4">
                        <label for="datechoice4" class=font>一年以上</label>
                    </div>
                    <div class="select_word">
                        <input type="radio" id="datechoice5" name="datechoice" value="5">
                        <label for="datechoice5" class=font>未定</label>
                    </div>
                </div>
                <div class="select">
                    <p>出社出来ない理由を選択してください。</p>
                    <div class="select_word">
                        <input type="radio" id="reason1" name="reason" value="1">
                        <label for="reason1" class=font>怪我</label>
                    </div>
                    <div class="select_word">
                        <input type="radio" id="reason2" name="reason" value="2">
                        <label for="reason2" class=font>家族</label>
                    </div>
                    <div class="select_word">
                        <input type="radio" id="reason3" name="reason" value="3">
                        <label for="reason3" class=font>家</label>
                    </div>
                    <div class="select_word">
                        <input type="radio" id="reason4" name="reason" value="4">
                        <label for="reason4" class=font>交通機関</label>
                    </div>
                    <div class="select_word">
                        <input type="radio" id="reason5" name="reason" value="5">
                        <label for="reason5" class=font>その他</label>
                    </div>
                </div>
                <div class="select">
                    <p>連絡事項等あればお書きください。</p>
                    <textarea name="options" id="options" cols="30" rows="10" value=""></textarea>
                </div>
                <button type="submit" name="submit" id="submit" onclick="location.href='./form_check.php'">確認</button>
            </form>
        </div>
    </main>
    <script src="./form_employee.js"></script>
</body>

</html>
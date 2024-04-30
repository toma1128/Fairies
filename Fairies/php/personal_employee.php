<?php
if(isset($_POST["logoutBtn"])){
    header('Location: fairiesproject_login.php');
    //exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>個人情報画面</title>
        <link rel="stylesheet" href="personal_employee.css">
        <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>
                <img src="images/fairieshome.png" alt="ロゴ" width="280">
            </h1>
            <nav>
                <ul class="nav-menu">
                    <a href="http://localhost/Fairies/Fairies/php/login.php" class="button-link">
                        <button type="button" class="button">ログアウト</button>
                    </a>
                </ul>
            </nav>
        </header>
        <main>
            <div>
                <div id = STATUS>
                    <h3>ECC部署</h3>
                    <h3>&nbsp;&nbsp;二年目</h3>
                </div>
                <h3 id="name">&nbsp;田中太郎&nbsp;</h3>
            </div>
            <div>
                <div class="comment">
                    <p>右足折れてしまいました。<br>治り次第出社します。</p>
                </div>
                <div class="duration">
                   <p> 一年以上、怪我のため出社できません。</p>
                </div>
                <div class="people_image">
                    <img src="images/17459_color.png" alt="human" width="280">
                </div>
            </div>
        </main>
    </body>
</html>
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
    </head>
    <body>
        <form method="POST">
        <header>
            <h1>
                <img src="images/fairieshome.png" alt="ロゴ" width="280">
            </h1>
            <nav>
                <ul class="nav-menu">
                <li><button id="logoutBtn" name="logoutBtn" >ログアウト</button></li>
                </ul>
            </nav>
        </header>
        <main>
            <div>
                <h3 id="department">ECC部署</h3>
                <h3 id="time">二年目</h3>
                <h3 id="name">山田</h3>
            </div>
            <div>
                <div class="comment">
                    右足折れてしまいました。治り次第出社します。
                </div>
                <div class="duration">
                    一年以上、怪我のため出社できません。
                </div>
                <div class="people_image">
                    <img src="images/人.png" alt="ロゴ" width="280">
                </div>
            </div>
        </main>    
        </form>
    </body>
</html>


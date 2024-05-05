<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./form_employee.css">
    <title>確認画面</title>
</head>
<body>
    <header>
        <h1 class="logo">
            <img src="images/fairies_home.png" alt="ロゴ" width="230">
        </h1>
    </header>
    <div>
        <h2>form確認画面</h2>
            </div>
            <div id="myForm">
                <p>出勤可否</p>
                <p><?=$data["possible"]["$possible"] ?></p>
            </div>
            <div>
                <p>出勤出来ない期限</p>
                <p><?= $data["period"]["$period"] ?></p>
            </div>
            <div>
                <p>出社出来ない理由を選択してください。</p>
                <p><?=$data["reason"]["$reason"] ?></p>
            </div>
            <div>
                <p>連絡事項等あればお書きください。</p>
                <textarea name="options" id="options" cols="30" rows="10" value=""><?=$message ?></textarea>
            </div>
            <button type="submit" id="submit" onclick="location.href='./form_check.php'">送信</button>
    </dev>
</body>
</html>
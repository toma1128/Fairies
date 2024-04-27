<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="user_register.css">
    <title>初期作成画面</title>
</head>

<body>
    <header>
        <h1 class="logo">
            <img src="images/fairieshome.png" alt="ロゴ" width="230">
        </h1>
        <ul>
            <li><a class="form_link" href="">ログアウト</a></li>
        </ul>

    </header>
    <main>
        <div id="screen">
            <div class="select">
                <h2>初期作成（お客様用）</h2>
            </div>
            <form id="registrationForm" action="fairiesproject_register.php" method="POST" class="w-1/2 mx-8">
                
                <div class="container" class="select">
                    <div class="select">
                        <label for="number">お客様番号</label><br>
                        <input type="number" name="number" id="number" placeholder="例:99999" required>
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
                <button id="submit" type="submit">登録</button>
                <!-- 新規登録画面で失敗した場合、ダイアログにその結果を表示される用-->
                <dialog id="resultDialog">
                    <div id="dialogWrap">
                        <form action="" method="post" id="addItemForm">
                            <div class="form-item-wrap">
                                <div class="form-item">
                                    <?= $result["message"] ?><br>
                                </div>
                            </div>
                            <div class="form-item-wrap"><button id="addItem" type="submit"  onclick="location.href='./form_customer.php'">確認</button></div>
                        </form>
                    </div>
                    <span class="material-icons">close</span>
                </dialog>
            </form>
        </div>
</body>

</html>
<!-- <script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        event.preventDefault(); // フォームのデフォルトの送信を防止

        // フォームの要素を取得
        const form = event.target;
        const nameInput = form.querySelector('#name');
        const rubyInput = form.querySelector('#ruby');
        const passwordInput = form.querySelector('#password');
        const confirmPasswordInput = form.querySelector('#confirmpassword');
        const numberInput = form.querySelector('#number');

        let isValid = true;
        let errorMessage = '';

        // 名前の入力をバリデート
        if (!nameInput.value) {
            errorMessage += '名前を入力してください。\n';
            isValid = false;
        }

        // 価格（`ruby`）の入力をバリデート
        if (!rubyInput.value) {
            errorMessage += '価格を入力してください。\n';
            isValid = false;
        }

        // パスワードの入力をバリデート
        if (!passwordInput.value) {
            errorMessage += 'パスワードを入力してください。\n';
            isValid = false;
        }

        // パスワード確認の入力をバリデート
        if (!confirmPasswordInput.value || passwordInput.value !== confirmPasswordInput.value) {
            errorMessage += 'パスワードが一致しません。\n';
            isValid = false;
        }

        // 電話番号の入力をバリデート
        if (!numberInput.value || isNaN(numberInput.value)) {
            errorMessage += '電話番号を正しく入力してください。\n';
            isValid = false;
        }

        // フォームが有効でない場合、エラーメッセージを表示
        if (!isValid) {
            alert(errorMessage);
        } else {
            // フォームが有効な場合、フォームを送信します
            form.submit();
        }
    });
</script> -->
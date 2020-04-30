<?php
session_start();
if(isset($SESSION['id'])){
    header("Location:mypage.php");
}
?>

<html lang="ja">
    
<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <header>
            <img src="4eachblog_logo.jpg">
            <div class="login"><a href="login.php">ログイン</a></div>
    </header>
<main>
    <form action="mypage.php" method="post">
    <div class="error" style="text-align:center; background-color:#FF9999; color:red; margin-top:15px;">
    <label>メールアドレスまたはパスワードが間違っています。</label><br>
    </div>
    <div class="form_contents">
        <div class="mail">
        <label>メールアドレス</label><br>
        <input type="text" class="formbox" size="40" value="<?php setcookie(mail,$_COOKIE['mail'],time()+60*60*24*7);
            echo $_COOKIE['name'];?>" name="mail">
        </div>
        <div class="password">
        <label>パスワード</label><br>
        <input type="password" class="formbox" size="40" value="<?php setcookie(password,$_COOKKIE['password'],time()+60*60*24*7);
            echo $_COOKIE['password'];?>" name="password">
        </div>
        <div class="loginbutton">
        <input type="submit" class="submit_button" size="35" value="ログイン">
        </div>
    </div>
    </form>
</main>
<footer>
        Ⓒ2018 InterNous.inc.All rights reserved
</footer>
</body>
</html>

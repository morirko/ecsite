<?php
mb_internal_encoding("utf8");

session_start();

if(empty($_POST['from_mypage'])){
     header('Location:login_error.php');
}
?>

<!DOCTYPE HTML>
<html lang="ja">
    
<head>
    <meta charset="UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
</head>

<body>
<header>
        <img src="4eachblog_logo.jpg">
        <div class="login"><a href="log_out.php">ログアウト</a></div>
</header>
<main>
<form action="mypage_update.php" method="post"> 
    
    <div class="mypage">
   
    <h1>会員情報</h1>
    <label>こんにちは！<?php echo $_SESSION['name'];?>さん</label><br>
    <div class="formmain">
    <div class="pic">
    <img src="<?php echo $_SESSION['picture'];?>">
    </div><br>
    <div class="box">
    <p>氏名:
    <input type="text" class="formbox" size="40" value="<?php echo $_SESSION['name'];?>" name="name">
    </p><br>
    <p>メール:
    <input type="text" class="formbox" size="40" value="<?php echo $_SESSION['mail'];?>" name="mail">
    </p><br>
    <p>パスワード:
    <input type="password" class="formbox" size="40" value="<?php echo $_SESSION['password'];?>" name="password">
    </p><br>
    </div>
     </div>
    <div class="comments">
     <p>コメント:
    <textarea rows="5" cols="45" value="<?php echo $_SESSION['comments'];?>" name="comments"></textarea>
    </p><br>
    </div>
    <div class="hensyubutton">
    <input type="submit" class="submit_button" size="35" value="この内容に変更する">
    </div>
    </div>
    </form>

  
</main>
<footer>
        Ⓒ2018 InterNous.inc.All rights reserved
</footer>
</body>
</html>
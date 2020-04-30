<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])){

try{
    $pdo=new PDO("mysql:dbname=riko;host=localhost;","root","mysql");
}catch(PDOExeption $e){
    die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをしてください。</p>
    <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>");
}

$stmt=$pdo->prepare("select*from login_mypage where mail = ? && password = ?");

$stmt->bindValue(1,$_POST['mail']);
$stmt->bindValue(2,$_POST['password']);

$stmt->execute();
$pdo=NULL;

while($row=$stmt->fetch()){
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        $_SESSION['mail']=$row['mail'];
        $_SESSION['password']=$row['password'];
        $_SESSION['picture']=$row['picture'];
        $_SESSION['comments']=$row['comments'];
}


if(empty($_SESSION['password'] || $_SESSION['mail'])){
    header('Location:login_error.php');
}
}

setcookie('mail',$_SESSION['mail'],time()+60*60*24*7,'/');
setcookie('password',$_SESSION['password'],time()+60*60*24*7,'/');
?>

<!DOCTYPE HTML>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="mypage.css">
    </head>
   <body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="logout"><a href="log_out.php">ログアウト</a></div>
    </header>
    <main>
    <div class="mypage">
        <h1>会員情報</h1>
        <label>こんにちは！<?php echo $_SESSION['name'];?>さん</label><br>
        <div class="formmain">
        <div class="pic">
        <img src="<?php echo $_SESSION['picture'];?>">
        </div><br>
        <div class="box">
        <p>氏名:
        <?php echo $_SESSION['name'];?>
        </p><br>
        <p>メール:
        <?php echo $_SESSION['mail'];?>
        </p><br>
        <p>パスワード
        <?php echo $_SESSION['password'];?>
        </p><br>
        </div>
        </div>
        <div class="comments">
         <p>コメント
        <br>
        <?php echo $_SESSION['comments'];?>
        </p><br>
        </div>
        <form action="mypage_hensyu.php"method="post"class="form_center">
            <input type="hidden"value="<?php echo rand(1,10);?>" name="from_mypage">
            <div class="hensyubutton">
                <input type="submit" class="submit_button" size="35" value="編集する">
            </div>
        </form>
        </div>
    </main>
    <footer>
        Ⓒ2018 InterNous.inc.All rights reserved
    </footer>
    </body>
</html>
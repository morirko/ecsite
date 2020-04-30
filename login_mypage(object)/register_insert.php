<?php
mb_internal_encoding("utf8");
//requireでDB.phpを読み込み
require "DB.php";
//DBクラスをインスタンス化
$DB=new DB();
//疑問符プレースホルダ
$pdo=$DB->connect();
$stmt=$pdo->prepare($DB->insert());

$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['picture']);
$stmt->bindValue(5,$_POST['comments']);

$stmt->execute();
$pdo=NULL;
header('Location:after_register.html');
?>
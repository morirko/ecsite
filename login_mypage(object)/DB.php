<?php
mb_internal_encoding("utf8");

class DB{
    //DBに接続するfunction
   public function connect(){
            //PDOインスタンスを生成
$pdo=new PDO("mysql:dbname=riko;host=localhost;","root","");
            //戻り値は$pdo
            return $pdo;
    }
//insertするfunction
    public function insert(){
        //疑問符パラメータを用いてSQLステートメントのテンプレートを準備
        return "insert into login_mypage(name,mail,password,picture,comments)values(?,?,?,?,?)";
    }
    public function select(){
        return "select*from login_mypage where mail = ? && password = ?";
    }
    public function update(){
        return "update login_mypage set name=?,mail=?,password=?,comments=? where id= ? ";
    }
    }
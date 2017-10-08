<?php

session_start();

//0.外部ファイル読み込み
include("functions.php");
ssidChk();//セッションチェック関数

//1. POST受信
$name    = $_POST["name"];
$lid     = $_POST["lid"];
//$lpw = password_hash($_POST["lpw"], PASSWORD_DEFAULT);

$kanri_flg  = $_POST["kanri_flg"];
$life_flg   = $_POST["life_flg"];
$id      = $_POST["id"];


//2. DB接続
$pdo = db_con();


//３．SQLを作成(ｓｔｍｌの中で)
$stmt = $pdo->prepare("UPDATE gs_user_table SET name=:name, lid=:lid, kanri_flg=:kanri_flg, life_flg= :life_flg WHERE id= :id");
$stmt->bindValue(':name', $name, PDO::PARAM_STR); 
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
//$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();
//実行後、エラーだったらfalseが返る
//PDO::PARAM_STR 文字列なら追加(セキュリティ向上)
//数値の場合はPDO::PARAM_INT

//４．エラー表示
if($status==false){
  queryError($stmt);
  
}else{//処理が終われば『index.php』に戻る。
  header("Location: user_select.php");//スペース必須
  exit;//おまじない

}
?>

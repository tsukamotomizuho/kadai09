<?php

session_start();

//0.外部ファイル読み込み
include("functions.php");
ssidChk();//セッションチェック関数

//1. POST受信
$id     = $_GET["id"];


//2. DB接続
$pdo = db_con();

//３．SQLを作成(ｓｔｍｌの中で)
$stmt = $pdo->prepare('DELETE FROM gs_user_table  WHERE id= :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//４．エラー表示
if($status==false){
  queryError($stmt);
}else{//処理が終われば『index.php』に戻る。
  header("Location: user_select.php");//スペース必須
  exit;//おまじない

}
?>

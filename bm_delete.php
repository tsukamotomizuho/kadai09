<?php

session_start();

//0.外部ファイル読み込み
include("functions.php");
ssidChk();//セッションチェック関数

//1. POST受信
$book_id     = $_GET["book_id"];


//2. DB接続
$pdo = db_con();

//３．SQLを作成(ｓｔｍｌの中で)
$stmt = $pdo->prepare('DELETE FROM gs_bm_table  WHERE book_id= :book_id');
$stmt->bindValue(':book_id', $book_id, PDO::PARAM_INT);
$status = $stmt->execute();

//４．エラー表示
if($status==false){
  queryError($stmt);
}else{//処理が終われば『index.php』に戻る。
  header("Location: select.php");//スペース必須
  exit;//おまじない

}
?>

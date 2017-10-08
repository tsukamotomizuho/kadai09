<?php

session_start();

//0.外部ファイル読み込み
include("functions.php");
ssidChk();//セッションチェック関数

//1. POST受信
$book_name    = $_POST["book_name"];
$book_url     = $_POST["book_url"];
$book_comment = $_POST["book_comment"];
$book_id      = $_POST["book_id"];


//2. DB接続
$pdo = db_con();


//３．SQLを作成(ｓｔｍｌの中で)
$stmt = $pdo->prepare("UPDATE gs_bm_table SET book_name=:book_name, book_url=:book_url, book_comment=:book_comment WHERE book_id= :book_id");
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR); 
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);
$stmt->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);
$stmt->bindValue(':book_id', $book_id, PDO::PARAM_INT);
$status = $stmt->execute();
//実行後、エラーだったらfalseが返る
//PDO::PARAM_STR 文字列なら追加(セキュリティ向上)
//数値の場合はPDO::PARAM_INT

//４．エラー表示
if($status==false){
  queryError($stmt);  
}else{//処理が終われば『index.php』に戻る。
  header("Location: select.php");//スペース必須
  exit;//おまじない

}

?>

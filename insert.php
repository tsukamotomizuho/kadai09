<?php

session_start();

//0.外部ファイル読み込み
include("functions.php");
//ssidChk();//セッションチェック関数

//1. POST受信
$book_name    = $_POST["book_name"];
$book_url     = $_POST["book_url"];
$book_comment = $_POST["book_comment"];

//2. DB接続
$pdo = db_con();//functions.phpから呼び出し


//３．SQLを作成(stmlの中で)
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(book_id, book_name, book_url, book_comment,
create_date )VALUES(NULL, :book_name, :book_url, :book_comment, sysdate())");
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR); 
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);
$stmt->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);
$status = $stmt->execute();
//実行後、エラーだったらfalseが返る
//PDO::PARAM_STR 文字列なら追加(セキュリティ向上)
//数値の場合はPDO::PARAM_INT

//４．エラー表示
if($status==false){
	queryError($stmt);
  
}else{//処理が終われば『index.php』に戻る。
	
	if(!isset($_SESSION["chk_ssid"]) || 
	   $_SESSION["chk_ssid"] != session_id()
	  ){
		  header("Location: free_index.php");//スペース必須
		  exit;//おまじない
	}else{
		  header("Location: index.php");//スペース必須
		  exit;//おまじない
	}
	

}
?>

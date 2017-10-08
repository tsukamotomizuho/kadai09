<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");
ssidChk();//セッションチェック関数

//1. POST受信
$name    = $_POST["name"];
$lid     = $_POST["lid"];
$lpw = password_hash($_POST["lpw"], PASSWORD_DEFAULT);
$kanri_flg     = $_POST["kanri_flg"];//0=管理者, 1=スーパー管理

//2. DB接続
$pdo = db_con();

//$kanri_flg = 0;
$life_flg  = 0;//0=使用中, 1=使用しなくなった

//３．SQLを作成(stmlの中で)
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw, kanri_flg, life_flg)VALUES(NULL, :name, :lid, :lpw, :kanri_flg, :life_flg)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR); 
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);
$status = $stmt->execute();
//実行後、エラーだったらfalseが返る
//PDO::PARAM_STR 文字列なら追加(セキュリティ向上)
//数値の場合はPDO::PARAM_INT

//４．エラー表示
if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);//エラー表示
  
}else{//処理が終われば『index.php』に戻る。
  header("Location: user_index.php");//スペース必須
  exit;//おまじない

}
?>

<?php

session_start();

//0.外部ファイル読み込み
include("functions.php");
ssidChk();//セッションチェック関数

//1. GETでidを受信
$id   = $_GET["id"];

//2. DB接続
$pdo = db_con();

//３．SQLを作成(ｓｔｍｌの中で)
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id= :id");
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();
//実行後、エラーだったらfalseが返る


//４．エラー表示
$row ='';

if($status==false){
  queryError($stmt);
  
}else{//正常
	//1データのみの場合はループさせない
	$row = $stmt->fetch();
	//$row["name"],$row["id"]....

}

$kanri_flg1 ='';
$kanri_flg2 ='';

$life_flg1  ='';
$life_flg2  ='';

//管理者フラグチェック
if($row["kanri_flg"]==1){
	$kanri_flg1 ='checked';
}else{
	$kanri_flg2 ='checked';
}


	
//生存フラグチェック
if($row["life_flg"]==1){
	$life_flg1='checked';
}else{
	$life_flg2='checked';
}	
	
	
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Userデータ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="user_select.php">User一覧へ</a>　<a class="navbar-brand" href="logout.php">ログアウト</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div><?=$_SESSION["name"]?>様</div>
<form method="post" action="user_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>User更新</legend>
     <label>ユーザ名：<input type="text" name="name" value="<?=$row["name"]?>" required></label><br>
     <label>ユーザID：<input type="text" name="lid" value="<?=$row["lid"]?>" required></label><br>
<!--     <label>パスワード：<input type="text" name="lpw" value="<?=$row["lpw"]?>" required></label><br>-->
	 <label>管理者フラグ：<input type="radio" name="kanri_flg" value=1 <?=$kanri_flg1?>>管理者　<input type="radio" name="kanri_flg" value=0 <?=$kanri_flg2?>>一般</label><br>
	 <label>生存フラグ  ：<input type="radio" name="life_flg" value=1 <?=$life_flg1?>>削除済　<input type="radio" name="life_flg" value=0 <?=$life_flg2?>>使用中</label><br>
	<input type="hidden" name ="id" value="<?= $row["id"]?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
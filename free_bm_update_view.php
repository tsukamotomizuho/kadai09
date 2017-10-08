<?php

//0.外部ファイル読み込み
include("functions.php");

//1. GETでidを受信
$book_id   = $_GET["book_id"];

//2. DB接続
$pdo = db_con();


//３．SQLを作成(ｓｔｍｌの中で)
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE book_id= :book_id");
$stmt->bindValue(':book_id',$book_id, PDO::PARAM_INT);
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

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="free_select.php">boolmark一覧へ</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div>一般ユーザ様</div>
<form method="post" action="bm_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>bookmark詳細</legend>
     <label>書籍名：<input type="text" name="book_name" value="<?=$row["book_name"]?>" readonly></label><br>
     <label>書籍URL：<input type="text" name="book_url" value="<?=$row["book_url"]?>" readonly></label><br>
     <label>書籍コメント：<textArea name="book_comment" rows="4" cols="40" readonly><?=$row["book_comment"]?></textArea></label><br>
	  <input type="hidden" name ="book_id" value="<?= $row["book_id"]?>">
<!--     <input type="submit" value="送信">-->
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
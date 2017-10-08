<?php

session_start();

//0.外部ファイル読み込み
include("functions.php");
ssidChk();//セッションチェック関数

//2. DB接続
$pdo = db_con();

//３．SQLを作成(ｓｔｍｌの中で)
$stmt = $pdo->prepare("SELECT * FROM gs_user_table ORDER BY id ASC");
$status = $stmt->execute();
//実行後、エラーだったらfalseが返る


//４．エラー表示
$view_admin ='';
$adminKind = '初期値';
$view_table='';
$user_adlink ='';

if($status==false){
  queryError($stmt);
  
}else{//正常
	
//権限チェック

if($_SESSION["kanri_flg"] == 1){
	$adminKind = "権限：システム管理者";
	$user_adlink='<a class="navbar-brand" href="user_index.php">User登録へ</a>　';
		
	while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
		
		$view_table .= '<tr>';
		$view_table .= '<td>'.$r["name"]."</td>";
		$view_table .= '<td>'.$r["lid"].'</td>';
		$view_table .= '<td><a href ="user_update_view.php?id='.$r["id"].'">'.'[編集]</a>';
		$view_table .= '　';
		$view_table .= '<a href ="user_delete.php?id='.$r["id"].'">[削除]</td></a>';
		$view_table .= '</tr>';
	}


	
}else{
	$adminKind = "権限：社内担当";

	while($r = $stmt->fetch(PDO::FETCH_ASSOC)){		
		$view_table .= '<tr>';
		$view_table .= '<td>'.$r["name"]."</td>";
		$view_table .= '<td>'.$r["lid"].'</td>';
		$view_table .= '</tr>';
		
	}
	
}	
	

	
	
	
}





?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <?=$user_adlink?><a class="navbar-brand" href ="select.php">bookmark一覧へ</a>　<a class="navbar-brand" href="logout.php">ログアウト</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div><?=$_SESSION["name"]?>様　<?=$adminKind?></div>

<div>
     
    <div class="container jumbotron">
<!--    <legend>User一覧</legend><?=$view?>-->
    
	<legend>User一覧_table</legend>
	<table border="1">
	<tr>
		<th>ユーザ名</th>
		<th>ユーザID</th>
		<th></th>
	</tr>
	<?=$view_table?>
	</table>    
</div>  
</div>
<!-- Main[End] -->

</body>
</html>

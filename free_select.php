<?php

//0.外部ファイル読み込み
include("functions.php");

//2. DB接続
$pdo = db_con();

//３．SQLを作成(ｓｔｍｌの中で)
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table ORDER BY book_id ASC");
$status = $stmt->execute();
//実行後、エラーだったらfalseが返る


//４．エラー表示

$view_admin ='　';
$view_table='';

if($status==false){
	queryError($stmt);
}else{//正常
	while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
		
		$view_table .= '<tr>';
		$view_table .= '<td>'.$r["create_date"]."</td>";
		$view_table .= '<td>'.$r["book_name"].'</td>';
		$view_table .= '<td><a href ="free_bm_update_view.php?book_id='.$r["book_id"].'">'.'[詳細]</a>';
		$view_table .= '</tr>';
		
	}
	
}

//権限チェック
$adminKind = '一般ユーザー';

?>


	

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>boolmark表示</title>
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
      <a class="navbar-brand" href="free_index.php">boolmark登録へ</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>ようこそ！　<?=$adminKind?>様</div>
<div>
    
    <div class="container jumbotron">
    
	<legend>bookmark一覧</legend>
	<table border="1">
	<tr>
		<th>登録日</th>
		<th>書籍名</th>
		<th></th>
	</tr>
	<?=$view_table?>
	</table>
    
    
    </div>
</div>

<!-- Main[End] -->

</body>
</html>

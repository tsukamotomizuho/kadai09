
<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");
ssidChk();//セッションチェック関数

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>User登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="user_select.php">User一覧へ</a> <a class="navbar-brand" href="logout.php">ログアウト</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div><?=$_SESSION["name"]?>様</div>
<form method="post" action="user_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>User登録</legend>
     <label>ユーザ名：<input type="text" name="name" required></label><br>
     <label>ユーザID：<input type="text" name="lid" required></label><br>
     <label>パスワード：<input type="text" name="lpw" required></label><br>
     <label>管理者フラグ：<input type="radio" name="kanri_flg" value=1>管理者　<input type="radio" name="kanri_flg" value=0 checked>一般</label><br>
     
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

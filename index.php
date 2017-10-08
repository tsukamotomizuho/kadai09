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
  <title>bookmarkデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">boolmark一覧へ</a>　<a class="navbar-brand" href="logout.php">ログアウト</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div><?=$_SESSION["name"]?>様</div>
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>bookmark登録</legend>
     <label>書籍名：<input type="text" name="book_name" required></label><br>
     <label>書籍URL：<input type="text" name="book_url" required></label><br>
     <label>書籍コメント：<textArea name="book_comment" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

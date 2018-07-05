<?php
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["title"]) || $_POST["title"]=="" ||
  !isset($_POST["url"]) || $_POST["url"]=="" ||
  !isset($_POST["naiyou"]) || $_POST["naiyou"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$title   = $_POST["title"];
$url  = $_POST["url"];
$naiyou = $_POST["naiyou"];

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_bm;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(ユニーク値, 書籍名, 書籍URL, 書籍コメント,
登録日時 )VALUES(NULL, :a1, :a2, :a3, sysdate())");
$stmt->bindValue(':a1', $title);
$stmt->bindValue(':a2', $url);
$stmt->bindValue(':a3', $naiyou);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit;
}
?>
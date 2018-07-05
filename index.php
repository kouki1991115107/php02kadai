<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Mark</title>
</head>
<body>
<!-- header -->
    <nav>
   <div>
   <a href="select.php">ブックマーク 一覧</a>
   </div>
    </nav>
<!-- header end -->

<!-- main -->
    <form method="post" action="insert.php">
        <div>
        <fieldset>
            <legend>Book mark</legend>
            <label>Title：<input type="text" name="title"></label><br>
            <label>URL：<input type="text" name="url"></label><br>
            <label>Comment<textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
            <input type="submit" value="送信">
        </fieldset>
        </div>
    </form>

<!-- main end -->


</body>
</html>
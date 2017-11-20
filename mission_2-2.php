<html>
<head>
<title>ブックブログ</title>
<head/>
<body>
<?php
    $number =(int)file_get_contents("counter1.txt");//ファイルの内容を1行ずつ配列に格納
    $name   =($_POST['name']);
    $comment=($_POST['comment']);
    $date   = date("Y/m/d H:i:s"); 
 $number++;
$str= $number."<>".$name."<>".$comment."<>".$date."\r\n";
$fp =fopen ("mission_2-2.txt","a");//  file("mission_2-2.txt")に保存
fwrite($fp,$str);
fclose ($fp); 

file_put_contents("counter1.txt",$number);
 ?>
<br>
 <h1>ブックブログ</h1>
  <form action="<?php echo($_SERVER['PHP_SELF'])?>" method="post">

 名前：<br />
  <input type="text" name="name" size="30" value="" /><br />

  コメント：<br />
  <textarea name="comment" cols="30" rows="5"></textarea><br />
  <br />
  <input type="submit" value="投稿" />
</form>

</body>
</html>

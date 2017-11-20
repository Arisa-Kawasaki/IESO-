<html>
<head>
<title>ブックブログ</title>
<head/>
<body>
<?php
    //ファイルの内容を1行ずつ配列に格納
$number=(int)file_get_contents("counter1.txt");
$name=$_POST["name"];
$comment=$_POST["comment"];
$date=date("Y/m/d H:i:s");
$number++;
$str=$number."<>".$name."<>".$comment."<>".$date."\r\n";
$file=file('./mission_2-2.txt');// "mission_2-2.txt"に保存
$fp =fopen ("mission_2-2.txt","a");//  file("mission_2-2.txt")に保存
fwrite($fp,$str);
fclose ($fp); 

file_put_contents("counter1.txt",$number);
// 配列数分ループして値を取り出す
for ($i= 0 ; $i <count($file) ; $i++) {
}
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
//表示
<?php
//配列
$contents=file('./mission_2-2.txt');
//配列数分ループ
foreach($contents as $content){
//それぞれの値を取得
$parts = explode("<>",$content);
echo "番号：" . $parts[0] . "<br>";
echo "名前：" . $parts[1] . "<br>";
echo "コメント：" . $parts[2] . "<br>";
echo "投稿された時間：" . $parts[3] . "<br>";
}
?>

</body>
</html>

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
$fp =fopen ("mission_2-2.txt","a");//file("mission_2-2.txt")に保存
fwrite($fp,$str);
fclose ($fp);

file_put_contents("counter1.txt",$number);
// 配列数分ループして値を取り出す
for ($i= 0 ; $i <count($file) ; $i++) {
}
?>
<br>
 <h1>ブックブログ</h1>
<?php
//編集
//編集が押されたとき
	echo"check_if1|".$_POST["edit"]."|<hr>";
if(isset($_POST["edit"])){
//関数定義(POSTは送信)
$edit_num=$_POST["edit_num"];
	echo"check1|".$_POST["edit_num"]."|<hr>";
//mission_2-2.txtを配列化して読み込む（fileは読み込み）
$edicon=file('./mission_2-2.txt');
	echo"<pre>";
	var_dump($edicon);
	echo"<hr>";
	echo"</pre>";

//配列数分ループ
	echo"<pre>";
	echo"<hr>loop0|";
	print_r($edicon);
	echo"<hr>";
	echo"</pre>";
for ($k= 0 ; $k <count($edicon) ; $k++) {
	echo"loop1".$k."|";
	echo$edicon[$k]."<hr>";
	echo"loopend".$k."|<hr>";
//投稿番号を取得
$ediDate= explode("<>",$edicon[$k]);
	var_dump($ediDate);
	echo"<hr>";
	echo$edicon[$k]."<hr>";
//各投稿番号と編集番号を比較して同じとき
if($ediDate[0]==$edit_num){
	echo"check_if2|".$edit_num."|<hr>";
//textにはmission_2-2.txtの名前を入力
$text=$edicon[1];
	echo"check4|".$edicon[1]."|<hr>";
//submitにはmission_2-2.txtのコメントを入力
$submit=$edicon[2];
	echo"check5|".$edicon[2]."|<hr>";
}
}
}
?>


//入力フォーム
  <form action="<?php echo($_SERVER['PHP_SELF'])?>" method="post">

 名前：<br />

  <input type="text" name="name" size="30" value="<?php echo $text;?>"/><br />
  
  コメント：<br />
  <textarea name="comment" cols="30" rows="5">"<?php echo $submit;?>"</textarea><br />
  <br />
  <input type="submit" value="登録する" />
</form>

//削除フォーム
  <form action="<?php echo($_SERVER['PHP_SELF'])?>" method="post">
  削除対象番号：<br />
　  <input type="text" name="delete" size="30" value="" /><br />
      <br />
  <input type="submit" value="削除" /><br />

//編集フォーム
  <form action="<?php echo($_SERVER['PHP_SELF'])?>" method="post">
 編集対象番号：<br />
  <input type="text" name="edit_num" size="30" value="<?=isset($_POST["edit_num"]) ?$_POST["edit_num"]:null?>"><br />
  <br />
  <input type="submit" value="編集" /><br />
</form>
<?php
//削除
//削除が押されたとき
//echo"check_if1|".$_POST["delete"]."|<hr>";
if(isset($_POST["delete"])){
//関数をそれぞれ定義(fileは読み込み、POSTは送信)
$delete=$_POST["delete"];
	//echo"check1|".$_POST["delete"]."|<hr>";
//mission_2-2.txtそれぞれの値を取得
$delcon=file('./mission_2-2.txt');
	//echo"<pre>";
	//var_dump($delcon);
	//echo"<hr>";
	//echo"</pre>";
//配列数分ループ
	//echo"<pre>";
	//echo"<hr>loop0|";
	//print_r($file);
	//echo"<hr>";
	//echo"</pre>";
for ($j= 0 ; $j <count($file) ; $j++) {
	//echo"loop1".$j."|";
	//echo$file[$j]."<hr>";
}
	//echo"loopend".$j."|<hr>";
//それぞれの配列の値を取得
$delDate = explode("<>",$delcon[$j]);
	//var_dump($delDate);
	//echo"<hr>";
	//echo$delcon[$j]."<hr>";
//取得した値を削除
array_splice($delDate,$delcon[$j],1);// 第2引数から1個削除
	//var_dump($delDate);
	//echo"<hr>";
	//echo$delcon[$j]."<hr>";

/*
delDate
(
    [0] => 0
)
*/

//各投稿番号と比較して違うもの
if($delDate[0]!=$delete);
	//echo"check_if2|".$delDete."|<hr>";
//mission_2-2.txtに上書き
$b=fopen ("mission_2-2.txt","w");
//mission_2-2.txtに同内容を書き込む
@fwrite($b,$delcon[$j]);
//mission_2-2.txtを閉じる
fclose ($b); 
}
?>

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

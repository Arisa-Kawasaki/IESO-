<html>
<body>
<form action="mission_1-7.php" method="post">
<input type="text" name="message" >
<input type="submit"value="投稿"/>
</form>
<?php
$contents=file('./mission_1-4.txt');
$message = $_POST["message"];
$fp=fopen("mission_1-4.txt","a+");
fputs($fp,$message);
fwrite($fp, $message,"\r\n");
fclose($fp);
readfile($filename);
//配列数分ループ
foreach($contents as $content){
echo "投稿：" . $contents[0] . "<br>";
}
?>
</body>
</html>

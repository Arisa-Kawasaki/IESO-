<html>
<body>

<form action="mission_1-5.php" method="post">
  <input type="text" name="message" >
  <input type="submit"value="登録"/>
</form>
<?php
if(isset($_POST["message"])){
$message = $_POST["message"];
echo $message;
}
$fp=fopen("mission_1-4.txt","a+");
fclose($fp);
readfile($filename);
?>
</body>
</html>


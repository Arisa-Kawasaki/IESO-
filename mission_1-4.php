<?php
if(isset($_POST["message"])){
$message = $_POST["message"];
echo $message;
}
?>
<html>
<body>
<form action="mission_1-4.php" method="post">
  <input type="text" name="message" 
<br />
<input type="submit" value="登録"/>
</form>
</body>
</html>

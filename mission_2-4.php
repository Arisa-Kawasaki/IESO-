<html>
<head>
<title>�u�b�N�u���O</title>
<head/>
<body>
<?php
    //�t�@�C���̓��e��1�s���z��Ɋi�[
$number=(int)file_get_contents("counter1.txt");

$name=$_POST["name"];

$comment=$_POST["comment"];

$date=date("Y/m/d H:i:s");

$number++;

$str=$number."<>".$name."<>".$comment."<>".$date."\r\n";

$file=file('./mission_2-2.txt');// "mission_2-2.txt"�ɕۑ�

$fp =fopen ("mission_2-2.txt","a");//  file("mission_2-2.txt")�ɕۑ�

fwrite($fp,$str);

fclose ($fp); 

file_put_contents("counter1.txt",$number);
// �z�񐔕����[�v���Ēl�����o��
for ($i= 0 ; $i <count($file) ; $i++) {
}
?>

<br>
 <h1>�u�b�N�u���O</h1>
//���̓t�H�[��
  <form action="<?php echo($_SERVER['PHP_SELF'])?>" method="post">

 ���O�F<br />
  <input type="text" name="name" size="30" value="" /><br />
  
  �R�����g�F<br />
  <textarea name="comment" cols="30" rows="5"></textarea><br />
  <br />
  <input type="submit" value="�o�^����" />
</form>

�@//�폜�t�H�[��
  <form action="<?php echo($_SERVER['PHP_SELF'])?>" method="post">
  �폜�Ώ۔ԍ��F<br />
�@  <input type="text" name="delete" size="30" value="" /><br />
      <br />
  <input type="submit" value="�폜" />
</form>

<?php
//�폜
	//�폜�������ꂽ�Ƃ�
	echo"check_if1|".$_POST["delete"]."|<hr>";

if(isset($_POST["delete"])){
	//�֐������ꂼ���`(file�͓ǂݍ��݁APOST�͑��M)

$delete=$_POST["delete"];
	echo"check1|".$_POST["delete"]."|<hr>";

$delcon=file('./mission_2-2.txt');//�P�s���̔z��
	echo"<pre>";
	var_dump($delcon);
	echo"<hr>";
	echo"</pre>";

$b=fopen ("mission_2-2.txt","w+");//���e�������ĊJ��

foreach($delcon as $line){//�z�񂩂�1�����o��	
	echo"<pre>";
	var_dump($delcon);
	echo"<hr>";
	echo"</pre>";

$delDate = explode("<>",$line);//<>�Ő؂��Ĕz���
	var_dump($delDate);
	echo"<hr>";
	echo$line."<hr>";

if(str_replace(PHP_EOL,'',$delDate[0])!=str_replace(PHP_EOL,'',$delete)){
	echo"check_if2|".$delDate[0]."|<hr>";
}
fputs($b,$line);//�t�@�C���ɒǋL
}//$delete�Ɠ����Ƃ��͉������Ȃ��B
fclose ($b);//mission_2-2.txt����� 
}
?>

//�\��
<?php
//�z��
$contents=file('./mission_2-2.txt');
//�z�񐔕����[�v
foreach($contents as $content){
//���ꂼ��̒l���擾
$parts = explode("<>",$content);
echo "�ԍ��F" . $parts[0] . "<br>";
echo "���O�F" . $parts[1] . "<br>";
echo "�R�����g�F" . $parts[2] . "<br>";
echo "���e���ꂽ���ԁF" . $parts[3] . "<br>";
}
?>
</body>
</html>

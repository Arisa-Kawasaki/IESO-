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
$fp =fopen ("mission_2-2.txt","a");//file("mission_2-2.txt")�ɕۑ�
fwrite($fp,$str);
fclose ($fp);

file_put_contents("counter1.txt",$number);
// �z�񐔕����[�v���Ēl�����o��
for ($i= 0 ; $i <count($file) ; $i++) {
}
?>
<br>
 <h1>�u�b�N�u���O</h1>
<?php
//�ҏW
//�ҏW�������ꂽ�Ƃ�
	echo"check_if1|".$_POST["edit"]."|<hr>";
if(isset($_POST["edit"])){
//�֐���`(POST�͑��M)
$edit_num=$_POST["edit_num"];
	echo"check1|".$_POST["edit_num"]."|<hr>";
//mission_2-2.txt��z�񉻂��ēǂݍ��ށifile�͓ǂݍ��݁j
$edicon=file('./mission_2-2.txt');
	echo"<pre>";
	var_dump($edicon);
	echo"<hr>";
	echo"</pre>";

//�z�񐔕����[�v
	echo"<pre>";
	echo"<hr>loop0|";
	print_r($edicon);
	echo"<hr>";
	echo"</pre>";
for ($k= 0 ; $k <count($edicon) ; $k++) {
	echo"loop1".$k."|";
	echo$edicon[$k]."<hr>";
	echo"loopend".$k."|<hr>";
//���e�ԍ����擾
$ediDate= explode("<>",$edicon[$k]);
	var_dump($ediDate);
	echo"<hr>";
	echo$edicon[$k]."<hr>";
//�e���e�ԍ��ƕҏW�ԍ����r���ē����Ƃ�
if($ediDate[0]==$edit_num){
	echo"check_if2|".$edit_num."|<hr>";
//text�ɂ�mission_2-2.txt�̖��O�����
$text=$edicon[1];
	echo"check4|".$edicon[1]."|<hr>";
//submit�ɂ�mission_2-2.txt�̃R�����g�����
$submit=$edicon[2];
	echo"check5|".$edicon[2]."|<hr>";
}
}
}
?>


//���̓t�H�[��
  <form action="<?php echo($_SERVER['PHP_SELF'])?>" method="post">

 ���O�F<br />

  <input type="text" name="name" size="30" value="<?php echo $text;?>"/><br />
  
  �R�����g�F<br />
  <textarea name="comment" cols="30" rows="5">"<?php echo $submit;?>"</textarea><br />
  <br />
  <input type="submit" value="�o�^����" />
</form>

//�폜�t�H�[��
  <form action="<?php echo($_SERVER['PHP_SELF'])?>" method="post">
  �폜�Ώ۔ԍ��F<br />
�@  <input type="text" name="delete" size="30" value="" /><br />
      <br />
  <input type="submit" value="�폜" /><br />

//�ҏW�t�H�[��
  <form action="<?php echo($_SERVER['PHP_SELF'])?>" method="post">
 �ҏW�Ώ۔ԍ��F<br />
  <input type="text" name="edit_num" size="30" value="<?=isset($_POST["edit_num"]) ?$_POST["edit_num"]:null?>"><br />
  <br />
  <input type="submit" value="�ҏW" /><br />
</form>
<?php
//�폜
//�폜�������ꂽ�Ƃ�
//echo"check_if1|".$_POST["delete"]."|<hr>";
if(isset($_POST["delete"])){
//�֐������ꂼ���`(file�͓ǂݍ��݁APOST�͑��M)
$delete=$_POST["delete"];
	//echo"check1|".$_POST["delete"]."|<hr>";
//mission_2-2.txt���ꂼ��̒l���擾
$delcon=file('./mission_2-2.txt');
	//echo"<pre>";
	//var_dump($delcon);
	//echo"<hr>";
	//echo"</pre>";
//�z�񐔕����[�v
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
//���ꂼ��̔z��̒l���擾
$delDate = explode("<>",$delcon[$j]);
	//var_dump($delDate);
	//echo"<hr>";
	//echo$delcon[$j]."<hr>";
//�擾�����l���폜
array_splice($delDate,$delcon[$j],1);// ��2��������1�폜
	//var_dump($delDate);
	//echo"<hr>";
	//echo$delcon[$j]."<hr>";

/*
delDate
(
    [0] => 0
)
*/

//�e���e�ԍ��Ɣ�r���ĈႤ����
if($delDate[0]!=$delete);
	//echo"check_if2|".$delDete."|<hr>";
//mission_2-2.txt�ɏ㏑��
$b=fopen ("mission_2-2.txt","w");
//mission_2-2.txt�ɓ����e����������
@fwrite($b,$delcon[$j]);
//mission_2-2.txt�����
fclose ($b); 
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

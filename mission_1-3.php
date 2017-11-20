<?php
$filename = "mission_1-2.txt";

$fp = fopen($filename, 'r');

fwrite($fp, 'Hello world');

$txt = fgets($fp);

echo $txt.'<br>';


fclose($fp);

readfile($filename);
?>

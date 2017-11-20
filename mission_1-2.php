<?php

$fp=fopen("mission_1-2.txt","a+");

fwrite($fp, 'Hello world');

fclose($fp);

readfile($filename);
?>
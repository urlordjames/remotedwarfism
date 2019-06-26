<?php
$file = fopen("send.txt", "w");
fwrite($file, "yeah");
fclose($file);
sleep(1);
$file = fopen("send.txt", "w");
fwrite($file, "");
fclose($file);
?>
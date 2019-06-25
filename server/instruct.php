<?php
session_start();
if (!isset($_POST["key"])) {
	echo("either key or username not set");
	exit();
}

if ($_SESSION["username"] != "Jacques") {
	echo("not Jacuqes");
	exit();
}

$unekey = $_POST["key"];
$file = fopen("do.txt", "w");
fwrite($file, $unekey);
fclose($file);
sleep(1);
$file = fopen("do.txt", "w");
fwrite($file, "");
fclose($file);

?>
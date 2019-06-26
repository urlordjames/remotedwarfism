<?php
session_start();
if (!isset($_POST["key"]) || !isset($_SESSION["username"])) {
	echo("key not set");
	exit();
}

if ($_SESSION["username"] != "Jacques") {
	echo("not Jacques");
	exit();
}

$unekey = $_POST["key"];

header("Location: /badia");

$file = fopen("do.txt", "w");
fwrite($file, $unekey);
fclose($file);
sleep(1);
$file = fopen("do.txt", "w");
fwrite($file, "");
fclose($file);

?>
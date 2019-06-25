<?php
$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) && isset($_POST["passwd"])) {
	if (hash("sha512", $_POST["passwd"]) != "60c55e7f7942bdba7385034085fbaf4240019a38cd165b7e930428e4059acb4d157a231e5ba5d884d71d9f265f571466709215b1a5e1bd6da2d4dc92a59b6f12") {
		echo("incorrect passwd");
		exit();
	}
	if (getimagesize($_FILES["fileToUpload"]["tmp_name"]) !== false) {
		$uploadOk = true;
	} else {
		echo "File is not an image.";
		$uploadOk = false;
		exit();
	}
	if ($_FILES["fileToUpload"]["size"] > 3000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = false;
		exit();
	}
	if ($uploadOk){
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "dwarf.png")) {
			echo "good home dawg";
		}
	}
}
?>
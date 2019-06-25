<?php
$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) && isset($_POST["passwd"])) {
	if (hash("sha512", $_POST["passwd"]) != "8c5fd9edadc3eabf96d86750dd360667907a49969cfbce948696a5be487dfa2eb459e4f82fda36d3e0a40436ba2dfef5fc43ee85718380aeacbb284794e1c084") {
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
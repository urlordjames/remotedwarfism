<html>
<body>
	<form action="instruct.php" method="post" enctype="multipart/form-data">
		<input type="textbox" name="key" id="key">
		<input type="submit" value="send key" name="submit">
	</form>
	<image src="dwarf.png" id="dwarf">
	<script>
		setInterval(function(){
			var request = new XMLHttpRequest();
			request.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("dwarf").src = "dwarf.png";
			}};
			request.open("GET", "getimage.php", true);
			request.send();
		}, 3000);
	</script>
</body>
</html>

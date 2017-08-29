<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload Multiplo PHP</title>
	<style>
		label, input {
			display: block;
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
	    <label for="arquivos'"></label>
		<input type="file" name="arquivos[]" id="arquivos" multiple="multiple">
		<button type="submit">Enviar arquivos</button>
	</form>
	<?php 
		require_once 'Files.php';
		$files = new Files();
		if(isset($_FILES['arquivos'])){
			$files->setFiles($_FILES['arquivos']);
			echo $files->validFiles();
		}
	 ?>
</body>
</html>
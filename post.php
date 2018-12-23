<?php
$msg = "";
if (isset($_POST['upload'])) {
	$target = "image/".basename($_FILES['image']['name']);

	$db = mysqli_connect("localhost","root","","tovar");

	$image = $_FILES['image']['name'];
	$text = $_POST['text'];
	$price = $_POST['price'];

	$sql = "INSERT INTO product (image,price,text) VALUES ('$image','$price','$text')";
	mysqli_query($db,$sql);

	if (move_uploaded_file($_FILES['image']['name'], $target)) {
		$msg = "Фото успешно загружено";
	} else {
		$msg = "Не удалось загрузить изображение";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>	
	<style type="text/css">
body{
	   background-image: linear-gradient(#f1f1f1, #f1f1f1);
}
	</style>
</head>
<body>
<div class="container-fluid">
	<form method="post" action="post.php" enctype="multipart/form-data">
	<div class="row  form-group" style="margin-top: 10%">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<input type="file" name="image">
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<input class="form-control" type="number" placeholder="Введите цену" name="price">
		</div>
	</div>
	<div class="row  form-group">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<textarea class="form-control"name="text" cols="40" placeholder="Введите описание" rows="4"></textarea>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md-5"></div>
		<div class="col-md-2">
			<!-- <button class="btn btn-md btn-success" style="width: 100%" ng-click="insert()">Submit</button> -->
			<input type="submit"   style="width: 100%" class="btn btn-md btn-success" name="upload" value="Submit">
		</div>
	</div>
	</form>	
</div>
</body>
</html>
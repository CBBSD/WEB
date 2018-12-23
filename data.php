<?php
	
	$mysqli = new mysqli("localhost","root","","tovar");
	$mysqli->query("SET NAMES 'utf8'");


	$data=[];
	
		$res=$mysqli->query("SELECT image,price,text FROM product");
		foreach($res as $value){			
			$data[] = $value;
		}
	echo json_encode($data);

	$mysqli->close();
	
	
?>
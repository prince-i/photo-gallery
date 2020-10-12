<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	try{
		$conn = new PDO("mysql:host=$servername;dbname=dbimage",$username,$password);
	}catch(PDOException $e){
		echo $sql."No Connection...".$e->getMessage();
		$conn = null;
	}

?>
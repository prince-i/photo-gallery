<?php
	include "conn.php";
	if(isset($_POST["upload"])){
		$id = 0; //predefined value 0 for auto increment triggering
		$caption = $_POST["caption"];
		$filename = $_FILES["imageFile"]["name"]; //default filename
		$filetmp = $_FILES["imageFile"]["tmp_name"];	//file tmp going to move to website folder
		$extn = pathinfo($filename,PATHINFO_EXTENSION); //fetch extension
		$size = $_FILES["imageFile"]["size"]; //fetch size in bytes
		$sizeKB = $size / 1024;
		$sizeMB = $sizeKB / 1024 ."MB";

		if(empty($filename)){
			echo "<script>alert('Choose valid file.')</script>";
		}elseif($extn != 'jpg' && $extn != 'png' && $extn != 'jpeg' && $extn != 'gif'){
			echo "<script>alert('Invalid file format')</script>";
		}else {
			$idRandom = mt_rand(10000,100000);
			$dateCode = date('ymd');
			$new_file_name = $idRandom."-".$dateCode."-".$filename;
			move_uploaded_file($filetmp,"assets/".$new_file_name);
			$upload_query_data = "INSERT INTO image VALUES('$id','$new_file_name','$caption','$sizeMB')";
			$stmt = $conn->prepare($upload_query_data);
			if($stmt->execute()){
				echo "<script>alert('Uploaded successfully')</script>";
				echo "<script>window.location.replace('index.php')</script>";
			}else{
				echo "<script>alert('Failed to upload')</script>";
			}
	}
}
?>
<?php
	include "conn.php";
	$process = $_GET["process"]; //get process from ajax
	if($process == 'fetch_img'){
		$fetch_img_query = "SELECT *from image order by id ASC";
		$stmt = $conn->prepare($fetch_img_query); //connection prepare the sql query
		$stmt->execute(); //statement execute
		$result = $stmt->fetchALL(); //statement fetch all from query
		if($stmt->rowCount() > 0){   // data is more than 0 images will return
			foreach($result as $x){
				
			}
		}
	}

?>
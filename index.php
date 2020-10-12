<?php
	define("title","upload");
	include "php/upload.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo title;?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

	<main class="container">
		<div class="row">
			<!-- container of uploaded images -->
			<h3 class="center">Gallery</h3>
			<div class="divider"></div>
			<table id="imageData"></table>

			<!-- floating upload button -->
			<div class="fixed-action-btn">
			  <a class="btn-floating btn-large red modal-trigger" data-target="upload_modal_form">
			    <i class="large material-icons">cloud_upload</i>
			  </a>
			</div>
		</div>	
	</main>


	<div id="upload_modal_form" class="modal">
		<div class="modal-content">
			<h3 class="center">Upload</h3>
			<form method="POST" class="row" enctype="multipart/form-data">
				 <div class="file-field input-field">
			      <div class="btn">
			        <span>File</span>
			        <input type="file" name="imageFile">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>

			    <div class="input-field">
			    	<input type="text" name="caption"><label>Caption</label>
			    </div>

			    <div class="input-field">
			    	<input type="submit" name="upload" value="upload" class="btn">
			    </div>
			</form>
		</div>
	</div>


	<!-- jquery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- jquery call functions for materializecss framework -->
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('.modal').modal();
    	});

    	load_images();
    	function load_images(){
    		var xhttp = new XMLHttpRequest();
		    xmlhttp.onreadystatechange = function() {
		      if (this.readyState == 4 && this.status == 200) {
		        document.getElementById("txtHint").innerHTML = this.responseText;
		      }
		    };
		    xhttp.open("GET","php/fetch_images.php?process=fetch_img",true);
		    xhttp.send();
		  }
    	
    </script>
</body>
</html>
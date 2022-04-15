<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ajax File Upload</title>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(e){
			$("#fupForm").on('submit', function(e){
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: 'submit.php',
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData:false,
					beforeSend: function(){
						$('.submitBtn').attr("disabled","disabled");
						$('#fupForm').css("opacity",".5");
					},
					success: function(msg){ console.log(msg);
						$('.statusMsg').html('');
						if(msg == 'ok'){
							$('#fupForm')[0].reset();
							$('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
						}else{
							$('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
						}
						$('#fupForm').css("opacity","");
						$(".submitBtn").removeAttr("disabled");
					}
				});
			});
		
			//file type validation
			$("#file").change(function() {
				var file = this.files[0];
				var imagefile = file.type;
				var match= ["image/jpeg","image/png","image/jpg"];
				if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
					alert('Please select a valid image file (JPEG/JPG/PNG).');
					$("#file").val('');
					return false;
				}
			});
		});
	</script>

	<?php 
		//DB details
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "semicolan";

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if($db->connect_error){
    die("Unable to connect database: " . $db->connect_error);
}


		if (!file_exists('trial for upload/uploads')) {
  	 	 mkdir('trial for upload/uploads', 0777, true);
		}

		if(!empty($_POST['name']) || !empty($_POST['email']) || !empty($_FILES['file']['name'])){
    	$uploadedFile = '';
    	if(!empty($_FILES["file"]["type"])){
        $fileName = time().'_'.$_FILES['file']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        if((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['file']['tmp_name'];
            $targetPath = "uploads/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
            }
        }
    }
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    //include database configuration file
    include_once 'dbConfig.php';
    
    //insert form data in the database
    $insert = $db->query("INSERT form_data (name,email,file_name) VALUES ('".$name."','".$email."','".$uploadedFile."')");
    // echo $insert; die();
    
    echo $insert?'ok':'err';
}
	 ?>
</head>
<body>

	<div class="container mt-3">
		<h2>Ajax File Upload with Form Data</h2>
		<p class="statusMsg"></p>
		<form action="index.php" enctype="multipart/form-data" id="fupForm" >
			<div class="form-group">
				<label for="name">NAME</label>
				<input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required />
			</div>
			<div class="form-group">
			<label for="email">EMAIL</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required />
			</div>
			<div class="form-group">
				<label for="file">File</label>
				<input type="file" class="form-control" id="file" name="file" required />
			</div>
			<br>
			<input type="submit" name="submit" class="btn btn-danger submitBtn" value="SAVE"/>
		</form>
	</div>

</body>
</html>
<?php

if (isset($_POST['submit'])) {
	$user = $_POST['user'];
	$file = $_FILES['file'];
	print_r($file);
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));


	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	if (in_array($fileActualExt, $allowed)) {

		if ($fileError === 0) {

			if ($fileSize < 500000) {
				
					$fileNameNew = uniqid('', true).".".$fileActualExt;

					$fileDestination = 'uploads/'.$fileNameNew;

					move_uploaded_file($fileTmpName, $fileDestination);

					header("location: index.php?uploadsuccess");

			}else{
				echo "you file is too big";
			}
			// code...
		}else{
			echo "there was an error while uploading your file";
		}
		
	} else{
		echo "You cannot upload files of this type!";
	}
}
else{
	echo "no submit data";
}

?>

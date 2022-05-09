<?php

session_start();
include_once 'dbh.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

	$sql = "SELECT * FROM user";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result)> 0) {
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['id'];
			$sqlImg = "SELECT * from profileimg where userid = '$id'";
			$resultImg = mysqli_query($conn, $sqlImg);

			while($rowImg = mysqli_fetch_assoc($resultImg) ){
				echo("<div>");
					if ($rowImg['status']==0) {
						echo "<img src ='upload/profile".$id."jpg'";
					} else {
						echo "<img src ='upload/profiledefault.jpg'";
					}
					echo $row['username'];
				echo("</div>");
			}
		}
	}else{
		echo "there are no users yet!";
	}

	if (isset($_SESSION['id'])) {
		if ($_SESSION['id'] == 1) {
			echo "you are logged in as user #1";
		}

		echo "
		<form action='upload.php' method ='POST' enctype='multipart/form-data'>

			<input type='text' name='user' id='user'>
			<input type='file' name='file'>
			<button type='submit' name='submit' id='submit'>upload</button>
		</form>
		";
	}else{
		echo "you are not logged in";
		echo("<form action='signupt.php' method='POST'>

			<input type='text' name = 'first' placeholder = 'First Name'>
			<input type='text' name = 'last' placeholder = 'Last Name'>
			<input type='text' name = 'uid' placeholder = 'User name'>
			<input type='text' name = 'pwd' placeholder = 'Password'>
			<button type='submit' name='submitSignup'>Singup</button>
			</form>");
	}

?>

	
<p>
	Login As User!
</p>
	<form action="login.php" method="POST">
		<button type="submit" name="submitLogin">Login</button>
	</form>

	<p>
	LogOut As User!
</p>
	<form action="logout.php" method="POST">
		<button type="submit" name="submitLogout">LogOut</button>
	</form>
</body>
</html>
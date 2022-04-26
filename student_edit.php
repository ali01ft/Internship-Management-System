<?php

session_start();




$server = "localhost";
        $username = "root";
        $password = "";
        $database = "ims";

        $conn = mysqli_connect($server, $username, $password, $database);



$userID = $_SESSION['user_id'];
 				

?>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<style type="text/css">
		.form-control
		{
			width:250px;
			height: 38px;
		}
		.form1
		{
			margin:0 540px;
		}
		label
		{
			color: black;
		}


	</style>
</head>
<body style="background-color: #004528;">

	<h2 style="text-align: center;color: #black;">Edit Information</h2>
	<?php
		
		$sql = "SELECT * FROM student WHERE STUDENT_ID='$_SESSION[user_id]'";
		$result = mysqli_query($conn,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$NAME=$row['NAME'];
			$STUDENT_EMAIL=$row['STUDENT_EMAIL'];
			$COURSE=$row['COURSE'];
			$ENROLL=$row['ENROLL'];
			$GENDER=$row['GENDER'];
			$CURRENT_RESIDENCE=$row['CURRENT_RESIDENCE'];
			$CONTACT_NO=$row['CONTACT_NO'];
			$YEAR_OF_STUDY=$row['YEAR_OF_STUDY'];
			$PASSWORD=$row['PASSWORD'];
			$CV=$row['CV'];
			$USERNAME=$row['USERNAME'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['user_id']; ?></h4>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">


		<label><h4><b>NAME Name: </b></h4></label>
		<input class="form-control" type="text" name="NAME" value="<?php echo $NAME; ?>">

		<label><h4><b>STUDENT_EMAIL Name</b></h4></label>
		<input class="form-control" type="text" name="STUDENT_EMAIL" value="<?php echo $STUDENT_EMAIL; ?>">

		<label><h4><b>COURSE</b></h4></label>
		<input class="form-control" type="text" name="COURSE" value="<?php echo $COURSE; ?>">

		<label><h4><b>ENROLL</b></h4></label>
		<input class="form-control" type="text" name="ENROLL" value="<?php echo $ENROLL; ?>">

		<label><h4><b>GENDER</b></h4></label>
		<input class="form-control" type="text" name="GENDER" value="<?php echo $GENDER; ?>">

		<label><h4><b>CURRENT_RESIDENCE No</b></h4></label>
		<input class="form-control" type="text" name="CURRENT_RESIDENCE" value="<?php echo $CURRENT_RESIDENCE; ?>">
		<label><h4><b>CONTACT_NO</b></h4></label>
		<input class="form-control" type="text" name="CONTACT_NO" value="<?php echo $CONTACT_NO; ?>">

		<label><h4><b>YEAR_OF_STUDY</b></h4></label>
		<input class="form-control" type="text" name="YEAR_OF_STUDY" value="<?php echo $YEAR_OF_STUDY; ?>">

		<label><h4><b>PASSWORD</b></h4></label>
		<input class="form-control" type="text" name="PASSWORD" value="<?php echo $PASSWORD; ?>">
		
		<label><h4><b>CV</b></h4></label>
		<input class="form-control" type="text" name="CV" value="<?php echo $CV; ?>">
		
		<label><h4><b>USERNAME</b></h4></label>
		<input class="form-control" type="text" name="USERNAME" value="<?php echo $USERNAME; ?>">

		
		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{
			

			$NAME=$_POST['NAME'];
			$STUDENT_EMAIL=$_POST['STUDENT_EMAIL'];
			$COURSE=$_POST['COURSE'];
			$ENROLL=$_POST['ENROLL'];
			$GENDER=$_POST['GENDER'];
			$CURRENT_RESIDENCE=$_POST['CURRENT_RESIDENCE'];
			$CONTACT_NO=$_POST['CONTACT_NO'];
			$YEAR_OF_STUDY=$_POST['YEAR_OF_STUDY'];
			$PASSWORD=$_POST['PASSWORD'];
			$CV=$_POST['CV'];
			$USERNAME=$_POST['USERNAME'];

			$sql1= "UPDATE student SET NAME='$NAME', STUDENT_EMAIL='$STUDENT_EMAIL', COURSE='$COURSE', ENROLL='$ENROLL', GENDER='$GENDER', CURRENT_RESIDENCE='$CURRENT_RESIDENCE',CONTACT_NO='$CONTACT_NO',YEAR_OF_STUDY='$YEAR_OF_STUDY',PASSWORD='$PASSWORD',CV='$CV',USERNAME='$USERNAME' WHERE STUDENT_ID = $userID";

			if(mysqli_query($conn,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="student_profile.php";
					</script>
				<?php
			}
		}
 	?>
</body>
</html>


<?php

session_start();




$server = "localhost";
        $username = "root";
        $password = "";
        $database = "ims";

        $conn = mysqli_connect($server, $username, $password, $database);

if(isset($_SESSION['company_id']))
	{

		$id = $_SESSION['company_id'];
		print_r($id);


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
		
		$sql = "SELECT * FROM industry WHERE REGIS_NO='$_SESSION[company_id]'";
		$result = mysqli_query($conn,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$COMPANY_NAME=$row['COMPANY_NAME'];
			$COMPANY_ADDRESS=$row['COMPANY_ADDRESS'];
			$CONTACT_NO=$row['CONTACT_NO'];
			$WEBSITE=$row['WEBSITE'];
			$Password=$row['Password'];
			$USERNAME=$row['USERNAME'];
			$Email=$row['Email'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: black;">Welcome,</span>	
		<h4 style="color: black;"><?php echo $_SESSION['company_id']; ?></h4>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

		

		<label><h4><b> Name: </b></h4></label>
		<input class="form-control" type="text" name="COMPANY_NAME" value="<?php echo $COMPANY_NAME; ?>">

		<label><h4><b>Address:</b></h4></label>
		<input class="form-control" type="text" name="COMPANY_ADDRESS" value="<?php echo $COMPANY_ADDRESS; ?>">

		<label><h4><b>Contact:</b></h4></label>
		<input class="form-control" type="text" name="CONTACT_NO" value="<?php echo $CONTACT_NO; ?>">

		<label><h4><b>Website Link:</b></h4></label>
		<input class="form-control" type="text" name="WEBSITE" value="<?php echo $WEBSITE; ?>">

		<label><h4><b>Password:</b></h4></label>
		<input class="form-control" type="text" name="Password" value="<?php echo $Password; ?>">

		<label><h4><b>Username:</b></h4></label>
		<input class="form-control" type="text" name="USERNAME" value="<?php echo $USERNAME; ?>">

		<label><h4><b>Email:</b></h4></label>
		<input class="form-control" type="text" name="Email" value="<?php echo $Email; ?>">

		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{

			$COMPANY_NAME=$_POST['COMPANY_NAME'];
			print_r($COMPANY_NAME);
			$COMPANY_ADDRESS=$_POST['COMPANY_ADDRESS'];
			print_r($COMPANY_ADDRESS);
			$CONTACT_NO=$_POST['CONTACT_NO'];
			print_r($CONTACT_NO);
			$WEBSITE=$_POST['WEBSITE'];
			print_r($WEBSITE);

			$Password=$_POST['Password'];
			print_r($Password);

			$USERNAME=$_POST['USERNAME'];
			print_r($USERNAME);

			$Email=$_POST['Email'];
			print_r($Email);

		

			$sql1= "UPDATE industry SET COMPANY_NAME='$COMPANY_NAME', COMPANY_ADDRESS='$COMPANY_ADDRESS', CONTACT_NO='$CONTACT_NO', WEBSITE='$WEBSITE', Password='$Password', USERNAME='$USERNAME',Email='$Email' WHERE REGIS_NO =$id";
			

			if(mysqli_query($conn,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						//window.location="industry_profile.php";
					</script>
				<?php
			}
		}
 	?>
</body>
</html>
<?php 
}else {
   header("Location:login_access.php");
}
 ?>


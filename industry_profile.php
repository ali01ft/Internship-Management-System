<?php




session_start();


$idustryID = $_SESSION['company_id'];


$server = "localhost";
        $username = "root";
        $password = "";
        $database = "ims";

        $conn = mysqli_connect($server, $username, $password, $database);

if(isset($_SESSION['company_id']))
	{

		$r=mysqli_query($conn,"SELECT * FROM industry where REGIS_NO = $idustryID ");

                 $row=mysqli_fetch_assoc($r);


?>
<!D
<!DOCTYPE html>
 <html>
 <head>
 	<title>Profile</title>
 	<style type="text/css">
 		.wrapper
 		{
 			width: 300px;
 			margin: 0 auto;
 			color: white;
 		}
 		img {
		  border-radius: 50%;
		}
 	</style>
 </head>
 <body style="background-color: grey; ">
 	<div class="container">
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1">Edit</button>
 		</form>
 		<div class="wrapper">
 			<?php

 				if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript">
 							window.location="industry_edit.php"
 						</script>
 					<?php
 				}
 				
 			?>
 			<h2 style="text-align: center;">My Profile</h2>

 			<div class="card">
			  <img src="Image/i_icon.png" alt="i_icon" style="width:100%">
			</div>

 			<div style="text-align: center;"> <b>Welcome, </b>
	 			<h4>
	 				<?php echo $_SESSION['company_id']; ?>
	 			</h4>
 			</div>
 			<?php

 				echo "<b>";
 				echo "<table class='table table-bordered'>";
	 				

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Company Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['COMPANY_NAME'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Adress: </b>";
	 					echo "</td>";


	 					echo "<td>";
	 						echo $row['COMPANY_ADDRESS'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Contact: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['CONTACT_NO'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Website: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['WEBSITE'];
	 					echo "</td>";
	 				echo "</tr>";

	 				

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Password'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Username: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['USERNAME'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Email'];
	 					echo "</td>";
	 				echo "</tr>";
	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>
<?php
 }else {
   header("Location:login_access.php");
}
 ?>

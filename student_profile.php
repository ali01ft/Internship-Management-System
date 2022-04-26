<?php




session_start();


$userID = $_SESSION['user_id'];

$server = "localhost";
        $username = "root";
        $password = "";
        $database = "ims";

        $conn = mysqli_connect($server, $username, $password, $database);

function is_user_login()
{
	if(isset($_SESSION['user_id']))
	{
		return true;
	}
	return false;
}


$q=mysqli_query($conn,"SELECT * FROM student where STUDENT_ID = $userID");
 				
 				$row=mysqli_fetch_assoc($q);
 				

?>

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
 							window.location="student_edit.php"
 						</script>
 					<?php
 				}
 				
 			?>
 			<h2 style="text-align: center;">My Profile</h2>

 			<div class="card">
			  <img src="Image/s_icon.png" alt="s_icon" style="width:100%">
			</div>

 			<div style="text-align: center;"> <b>Welcome, </b>
	 			<h4>
	 				<?php echo $_SESSION['user_id']; ?>
	 			</h4>
 			</div>
 			<?php

 				echo "<b>";
 				echo "<table class='table table-bordered'>";
	 				

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> STUDENT ID: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['STUDENT_ID'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Name: </b>";
	 					echo "</td>";


	 					echo "<td>";
	 						echo $row['NAME'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['STUDENT_EMAIL'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Course: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['COURSE'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Enroll: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['ENROLL'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Supervisor: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['SUPERVISOR'];
	 					echo "</td>";
	 				echo "</tr>";


	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Gender: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['GENDER'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Adress: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['CURRENT_RESIDENCE'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Contact no: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['CONTACT_NO'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Year of study: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['YEAR_OF_STUDY'];
	 					echo "</td>";
	 				echo "</tr>";
	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>

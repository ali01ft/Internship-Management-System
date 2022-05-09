<?php




session_start();


$userID = $_SESSION['user_id'];

$server = "localhost";
        $username = "root";
        $password = "";
        $database = "ims";

        $conn = mysqli_connect($server, $username, $password, $database);




$q=mysqli_query($conn,"SELECT * FROM student where STUDENT_ID = $userID");
 				
 				$row=mysqli_fetch_assoc($q);
 		

				

?>

<!DOCTYPE html>
 <html>
 <head>
 	<title>Profile</title>
 	<meta charset="UTF-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    	<link rel="stylesheet" href="styles.css" />
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
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['PASSWORD'];
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
	 						echo "<b> CV: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo  "<a href='jobs/profile".$row -> REGIS_NO.".pdf' download>Download</a>";
	 					echo "</td>";
	 				echo "</tr>";
	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>

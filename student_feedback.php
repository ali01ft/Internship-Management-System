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
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Student Feedback</title>

    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    
	    <link rel="stylesheet" href="css/style.css">
	    <style type="text/css">



    	body
    	{
    		background-image: url("images/66.jpg");
    		background-repeat: no-repeat;
    	}
    	.wrapper
    	{
    		padding: 10px;
    		margin: -20px auto;
    		width:900px;
    		height: 600px;
    		background-color: black;
    		opacity: .8;
    		color: white;
    	}
    	.form-control
    	{
    		height: 100px;
    		width: 100%;
    	}
    	.scroll
    	{
    		width: 50%;
    		height: 100px;
    		overflow: auto;
    	
    	}

   
    </style>
</head>
<body>


<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>Student Feedback</h1>
                <p>Please give us your feedback</p>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img src="Image/s_icon.png" alt="s_icon" style="width:100%">
            <h3><?php echo $_SESSION['user_id']; ?></h3>
          </div>
          <div class="card-body">
            <?php

			 				echo "<b>";

			 			
				 				

				 				echo "<tr>";
				 					echo "<td>";
				 						echo "<b> STUDENT ID: </b> ";
				 					echo "</td>";
				 					echo "<td>";
				 						echo $row['STUDENT_ID'];
				 					echo "</td>";
				 				echo "</tr>";

				 				
				 		?>

          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <?php

			 				echo "<b>";
			 				echo "<table class='table table-bordered'>";
				 				
				 				echo "<tr>";
				 					echo "<td>";
				 						echo "<b> Name: </b> ";
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
				 						echo "<b> Year of study: </b>";	
				 					echo "</td>";
				 					echo "<td>";
				 						echo $row['YEAR_OF_STUDY'];
				 					echo "</td>";
				 				echo "</tr>";
				 				
				 				
				 					
				 				
			 				echo "</table>";
			 				echo "</b>";
			 			?>
            </table>
          </div>
        </div>
        <div style="height: 26px"></div>
       
          
          <div class="wrapper">
          <h4>Please leave your feeback down below</h4>
          <form style="" action="" method="post">
          <input class="form-control" type="text" name="comment" placeholder="Write something..."><br>  
          <input class="btn btn-default" type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;">   
          </form>
            
          <br><br>
            <div class="scroll">
              
              <div id="rating_div">
										<div class="star-rating">
											<span class="fa divya fa-star-o" data-rating="1" style="font-size:20px;"></span>
											<span class="fa fa-star-o" data-rating="2" style="font-size:20px;"></span>
											<span class="fa fa-star-o" data-rating="3" style="font-size:20px;"></span>
											<span class="fa fa-star-o" data-rating="4" style="font-size:20px;"></span>
											<span class="fa fa-star-o" data-rating="5" style="font-size:20px;"></span>
											<input type="hidden" name="whatever3" class="rating-value" value="1">
										</div>
							</div>
							</div>
							</div><br>
							<input type="hidden" name="demo_id" id="demo_id" value="1">
							<div class="col-md-4">
							<textarea class="form-control" rows="5" placeholder="Write your review here..." name="remark" id="remark" required></textarea><br>
							<p><button  class="btn btn-default btn-sm btn-info" id="srr_rating">Submit</button></p>
							</div>
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
							<script src="js/index.js"></script>
            </div>
            </div>

          </div>
        
      </div>
    </div>
  </div>
</div>

	</body>
</html>
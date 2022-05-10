<?php

session_start();
$userID = $_SESSION['user_id'];
include'process.php';
$q=mysqli_query($conn,"SELECT * FROM student where STUDENT_ID = $userID");
 				
 				$row=mysqli_fetch_assoc($q);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Student Feedback</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
		<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
		<link rel='stylesheet' href='https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css'>
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
        <div class="row container">
					<div class="col-md-4 ">
						<h3><b>Rating & Reviews</b></h3>
						<div class="row">
						
							<div class="col-md-6">
								<h3 align="center"><b><?php echo round($AVGRATE,1);?></b> <i class="fa fa-star" data-rating="2" style="font-size:20px;color:#ff9f00;"></i></h3>
								<p><?=$Total;?> ratings and <?=$Total_review;?> reviews</p>
							</div>
							<div class="col-md-6">
								<?php
								while($db_rating= mysqli_fetch_array($rating)){
								?>
									<h4 align="center"><?=$db_rating['rating'];?> <i class="fa fa-star" data-rating="2" style="font-size:20px;color:green;"></i> Total <?=$db_rating['Total'];?></h4>
									
									
								<?php	
								}
									
								?>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">	
							<?php
								while($db_review= mysqli_fetch_array($review)){
							?>
									<h4><?=$db_review['rating'];?> <i class="fa fa-star" data-rating="2" style="font-size:20px;color:green;"></i> by <span style="font-size:14px;"><?=$db_review['email'];?></span></h4>
									<p><?=$db_review['remark'];?></p>
									<hr>
							<?php	
								}
									
							?>
							</div>
						</div>
							
						
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

	</body>
</html>
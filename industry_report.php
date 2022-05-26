
<?php
			
			// include autoloader
			require_once 'dompdf/autoload.inc.php';
 
			// reference the Dompdf namespace
			use Dompdf\Dompdf;


			if(isset($_GET['data'])){
			// instantiate and use the dompdf class
			$pdf = new Dompdf();

			//Using html contents here
			//using output buffer
			ob_start();

			 if(isset($_GET['data'])){

               $cid = $_GET['data'];
               var_dump($cid);

             } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <title>IMS</title>
</head>



<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-address-book me-1"></i>Swinburne</div>
            <div class="list-group list-group-flush my-3">
                <a href="staff_internshiplisting.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Internship listing</a>
                <a href="staff_studentlist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Student listing</a>
                  <a href="staff_companylist.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-project-diagram me-2"></i>Company listing</a> 
                <a href="staff_approval.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Student Approval</a>                  
                <a href="staff_infographics.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Analytics</a>
                <a href="staff_feedbacklist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Feedback list</a>
                <a href="staff_history.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Internship History</a> 
                <a href="staff_logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>

<h1 style="color: green;"> <?php echo "$cid" ?> </h1>
<p style="text-align: center;">Company Report</p>
<p>this Company has complied with swinburne guidelines and has provided our students with working experience.</p>


<table>
	<tr></tr>
	<tr></tr>	
	<tr></tr>		

</table>	

</div>
</body>
</html>


<?php

			//get the obs data
			$html = ob_get_clean();

			//insert variable
			$pdf->loadHtml($html);

			// (Optional) Setup the paper size and orientation
			$pdf->setPaper('A4');

			// Render the HTML as PDF
			$pdf->render();

			// Output the generated PDF to Browser
			$pdf->stream('result.pdf', Array('Attachent'=>0));


}			
			
?>


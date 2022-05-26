
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

<h1 style="color: green;"> <?php echo "$cid" ?> </h1>
<p style="text-align: center;">Company Report</p>
<p>this Company has complied with swinburne guidelines and has provided our students with working experience.</p>

<table>
	<tr></tr>
	<tr></tr>	
	<tr></tr>		

</table>	


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


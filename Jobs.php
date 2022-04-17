<?php
//function test input
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


session_start();

$id = $_SESSION['REGIS_NO'];

$StudentID = $uname = $Course = $ContactNo = $Cresidence = $email = $pname = $pwd = $Enrolled = $Supervisor = $yof = $cv = NULl;

// define variable and set to empty VALUES
$msgErr = "";

if(isset($_POST["submit"])){
  $success = 1;
  $JobTile = $_POST["JobTitle"];
  $Location = $_POST["Location"];
  $Qualification = $_POST["Qualification"];
  $Category = $_POST["Category"];
  $Position = $_POST["Position"];
  $Vacancy = $_POST["Vacancy"];
  $file = $_FILES["file"];


  //$date_started = date("Y/m/d");


  //  Check Student ID process


    if (empty($_POST["JobTitle"]) || empty($_POST["Location"]) || empty($_POST["Qualification"]) || empty($_POST["Category"]) || empty($_POST["Position"]) || empty($_POST["Vacancy"]) || empty($_POST["file"])) {
        $msgErr = "<span style='color:red;'>Please fill this detail.</span>";
        $success = 0;
      }

      if ($success == 1) {

        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "ims";

        $conn = mysqli_connect($server, $username, $password, $database);



            //checking if empty or not

        if (empty($_FILES["file"])) {

          $cvErr = "<span style='color:red;'>Must upload a CV!</span>";


       }else{
        // uploading file function
        //seperating all the types in the array

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt)); //just keeping the extension part of the name

        //only allow pdfs
        $allowed = array('pdf');

        //creating folder to upload files if it does not exist

        if (!file_exists('industry')) //create directory if not there
        {
          mkdir('industry', 0777, true);
    
        }else{
         echo "couldnt make folder";
        }

          if (in_array($fileActualExt, $allowed)) {

            if ($fileError === 0) {

              if ($fileSize < 20000000) {
        
                $fileNameNew = "profile".$id.".".$fileActualExt;


                $fileDestination = 'industry/'.$fileNameNew;
              
                   move_uploaded_file($fileTmpName, $fileDestination); //store the file in this destination
           

            // header("location: index.php?uploadsuccess");

              $file = $fileNameNew;

            }else{
              echo "your file is too big";
            }
      
          }else{
              echo "there was an error while uploading your file";
          }
    
        } else{
          echo "You cannot upload files of this type only pdf are allowed!";
        }

      }


        if(!$conn){
          die("Connection failed: " . mysqli_connect_error());
        }

        else{           //else create query with all the correct validation and write into tables
              $create ="INSERT INTO jobs (Job_Title, Location, Qualification, Category, Position, Vacancy, REGIS_NO) VALUES(?,?,?,?,?,?,?);";

                mysqli_stmt_prepare($stmt,$create);
                mysqli_stmt_bind_param($stmt, "sssssss",$JobTile, $Location, $Qualification, $Category, $Position, $Vacancy, $regisNo);
                mysqli_stmt_execute($stmt);
                session_start();
                $_SESSION["email"] = $email;

               // header("Location:signup - Copy.php");       //direct to friendadd.php
              }

              mysqli_stmt_close($stmt);

              }

              mysqli_close($conn);
            }
          

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Registering</title>
</head>
<body>

    <a href="index.php">log in</a>
      <h1>Internship Management System</h1>
    </a>
    
    <h2>Job Inserting Page</h2>

    <h3>Please Provide a document with extra details such as Description of the job, Qualifications that are required, details of the employer, information about salary, posible duration and any other extra info you want the interns to know</h3>

<!-- Forms -->
	<form action = "Jobs.php" method = "POST" enctype="multipart/form-data" >
      <label for="JobTitle">Job Title<br><span class="error"> <?php echo $msgErr;?></span><br></label>
        <input type="text" name="JobTitle" id="JobTitle" value="<?php if(isset($_POST["JobTitle"])) echo $_POST["JobTitle"]; ?>">
      <br>

      <label for="Location">Location<br><span class="error"> <?php echo $msgErr;?></span><br></label>
        <input type="text" name="Location" id="Location">
      <br>


      <label for="Qualifications">Qualifications<br><span class="error"> <?php echo $msgErr;?></span><br></label>
        <input type="text" name="Qualifications" id="Qualifications" value="<?php if(isset($_POST["Qualification"])) echo $_POST["Qualification"]; ?>">
      <br>



      <label for="Position">Position<br><span class="error"> <?php echo $msgErr;?></span><br></label>
        <input type="text" name="Position" id="Position" value="<?php if(isset($_POST["Position"])) echo $_POST["Position"]; ?>">
      <br>


      <label for="Vacancy">Vacancy<br><span class="error"> <?php echo $msgErr;?></span><br></label>
        <input type="text" name="Vacancy" id="Vacancy" value="<?php if(isset($_POST["Vacancy"])) echo $_POST["Vacancy"]; ?>">
      <br>


      <label for="Category">Category<br><span class="error"> <?php echo $msgErr;?></span><br></label>
        <input type="text" name="Category" id="Category" value="<?php if(isset($_POST["Category"])) echo $_POST["Category"]; ?>">
      <br>


			<label for ="file">Insert Your Criteria:<br><span class="error"> <?php echo $msgErr;?></span><br></label>
      <input type="file" name="file" value = "<?php if(isset($_POST["file"])) echo $_POST["file"]; ?>">
      <br>
      <br>
		  <input type="submit" value="submit" name="submit">
			<input type="reset" value="Clear" name="clear_button">

	
			<p><a href="index.php">Back to Home</a> </p>
		</form>
	</div>

<!-- Footer -->


   
  </div>

</body>
</html>

<?php
//function test input
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



  session_start();
 
if (isset($_SESSION['company_id']) && isset($_SESSION['user_email'])) { 



$id = $_SESSION['company_id'];


// define variable and set to empty VALUES
$msgErr = $cvErr = "";

if(isset($_POST["submit"])){
  $success = 1;
  $JobTile = $_POST["JobTitle"];

  $Location = $_POST["Location"];

  $Qualification = $_POST["Qualifications"];

  $Category = $_POST["Category"];

  $Position = $_POST["Position"];

  $Vacancy = $_POST["Vacancy"];

  $Extra = $_POST['Extra'];

  $file = $_FILES["file"];
 


  $date = date("Y/m/d");
  $duration = $_POST["Duration"];


    $newDate = date('Y/m/d', strtotime($date. ' + '. $duration. 'months'));
  


  //  Check Student ID process


   // if ($_POST["JobTitle"] = "" || $_POST["Location"]  || empty($_POST["Qualifications"]) || empty($_POST["Category"]) || empty($_POST["Position"]) || //empty($_POST["Vacancy"]) || empty($_POST["file"])) {
    //    $msgErr = "<span style='color:red;'>Please fill this detail.</span>";
     //   $success = 0;
    //  }
    //  else{
    //    $success = 1;
   //   }


      if (empty($_FILES["file"])) {

          $cvErr = "<span style='color:red;'>Must upload a CV!</span>";
          $success = 0;


       }elseif($success == 1){
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

        if (!file_exists('jobs')) //create directory if not there
        {
          mkdir('jobs', 0777, true);
    
        }

          if (in_array($fileActualExt, $allowed)) {

            if ($fileError === 0) {

              if ($fileSize < 20000000) {
        
                $fileNameNew = "profile".$id.".".$fileActualExt;


                $fileDestination = 'jobs/'.$fileNameNew;
              
                   move_uploaded_file($fileTmpName, $fileDestination);
           

            // header("location: index.php?uploadsuccess");

              $cv = $fileNameNew;

            }else{
              $cvErr = "<span style='color:red;'>Your file is too big! max 20 mb</span>";
               $success = 0;
            }
      
          }else{
              $cvErr = "<span style='color:red;'>There was an error uploading file</span>";
              $success = 0;
          }
    
        } else{
          $cvErr = "<span style='color:red;'>You cannot upload this file only PDF are allowed</span>";
          $success = 0;
        }

      }else{
        $cvErr = "<span style='color:red;'>Please other form values</span>";
          $success = 0;
      }

      if ($success == 1) {

        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "ims";

        $conn = mysqli_connect($server, $username, $password, $database);

        if(!$conn){
          die("Connection failed: " . mysqli_connect_error());
        }

        else{           //else create query with all the correct validation and write into tables

              mysqli_query($conn,"ALTER TABLE jobs AUTO_INCREMENT = 1");

              $stmt = mysqli_stmt_init($conn);

              $create ="INSERT INTO jobs (Job_Title, Location, Qualification, Category, Position, Vacancy, REGIS_NO, Date_Posted, Date_End, Extra_Details) VALUES(?,?,?,?,?,?,?,?,?,?);";

                mysqli_stmt_prepare($stmt,$create);
                mysqli_stmt_bind_param($stmt, "ssssssssss",$JobTile, $Location, $Qualification, $Category, $Position, $Vacancy, $id, $date, $newDate, $Extra);
               $u = mysqli_stmt_execute($stmt);


              }

              mysqli_stmt_close($stmt);
              mysqli_close($conn);

              }
                header("Location: Jobs.php?msg=1");

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
    <title>IMS</title>
</head>



<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-address-book me-1"></i>Swinburne</div>
            <div class="list-group list-group-flush my-3">
                <a href="in_joblist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Posted Job listing</a>             
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-paperclip me-2"></i>Post a Job</a>
                <a href="staff_logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Post a Job</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?=$_SESSION['user_full_name']?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="industry_profile.php">Profile</a></li>
                            </ul>

                        </li>
                    </ul>
                </div>
            </nav>




             <!-- Content wrapper -->
            <div class="container-fluid px-4">
                <div class="row my-5">
                    <h4 class="fs-5 mb-3">Please Provide a document with extra details such as Description of the job, Qualifications that are required, details of the employer, information about salary, posible duration and any other extra info you want the interns to know</h4>
                    <div class="col">

              

                      

                  <!-- Forms -->
                  	<form class="p-5 rounded shadow" action = "Jobs.php" method = "POST" enctype="multipart/form-data" >
                        <label for="JobTitle">Job Title<br><span class="error"> <?php echo $msgErr;?></span><br></label>
                          <input type="text" name="JobTitle" id="JobTitle" value="<?php if(isset($_POST["JobTitle"])) echo $_POST["JobTitle"]; ?>">
                        <br>

                        <label for="Location">Location<br><span class="error"> <?php echo $msgErr;?></span><br></label>
                          <input type="text" name="Location" id="Location">
                        <br>


                        <label for="Qualifications">Qualifications<br><span class="error"> <?php echo $msgErr;?></span><br></label>
                          <input type="text" name="Qualifications" id="Qualifications" value="<?php if(isset($_POST["Qualifications"])) echo $_POST["Qualifications"]; ?>">
                        <br>



                        <label for="Position">Position<br><span class="error"> <?php echo $msgErr;?></span><br></label>
                          <input type="text" name="Position" id="Position" value="<?php if(isset($_POST["Position"])) echo $_POST["Position"]; ?>">
                        <br>


                        <label for="Vacancy">Vacancy<br><span class="error"> <?php echo $msgErr;?></span></label>
                          <input type="text" name="Vacancy" id="Vacancy" value="<?php if(isset($_POST["Vacancy"])) echo $_POST["Vacancy"]; ?>">
                        <br>
                        <br>


                        <label for="Category">Category<br><span class="error"> <?php echo $msgErr;?></span></label>

                        <select name="Category" id="Category" onclick="addFields()">
                            <option value="" selected>---</option>
                            <option value="Car Industry" >Car Industry</option>
                            <option value="Telecom Industry" >Telecom Industry</option>
                            <option value="ICT Industry" >ICT Industry</option>
                            <option value="Food Industry" >Food Industry</option>
                            <option value="Oil Industry">Oil Industry</option>
                        </select>

                        <br>
                        <label for="Extra">Extra Description</label>
                        <input type="text" name="Extra" id="Extra">
              
                        <br>
                        <br>

                        <label for="Duration">Duration For this offer</label>
                        <select class="1-11" name="Duration" id="Duration">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                        </select><span> months</span>
                        <br>
                        <br>


                  		<label for ="file">Insert Your Criteria:<br><span class="error"> <?php echo $msgErr;?></span></label>
                        <br>
                        <input type="file" name="file" value = "<?php if(isset($_POST["file"])) echo $_POST["file"]; ?>">
                        <br>
                        <br>
                  		  <input type="submit" value="submit" name="submit">
                  			<input type="reset" value="Clear" name="clear_button">

                  	
                  		
                  		</form>
                     </div>



                </div>

            </div>
        </div>
    </div>	




<!-- Footer -->

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>


   
  
<?php
  }else{
     header("Location: industry_login.php");
  }?>
   
</body>
</html>

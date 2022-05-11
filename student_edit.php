<?php

session_start();



$userID = $_SESSION['user_id'];



        //establishing connection
    $server = "localhost";
        $username = "root";
        $password = "";
        $database = "ims";

        $conn = mysqli_connect($server, $username, $password, $database);

        $cvErr = "";

            

        
        //submitting documents
        if (isset($_POST['submit'])) {
    
            if (isset($_FILES["file"])) {

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

                if (!file_exists('uploads')) //create directory if not there
                {
                    mkdir('documents', 0777, true);
    
                }else{
                    echo "couldnt make folder";
                }

                if (in_array($fileActualExt, $allowed)) {

                    if ($fileError === 0) {

                        if ($fileSize < 20000000) {
        
                            $fileNameNew = "profile".$StudentID.".".$fileActualExt;


                            $fileDestination = 'uploads/'.$fileNameNew;

                            move_uploaded_file($fileTmpName, $fileDestination);

                        }else{
                            echo "you file is too big";
                        }
      
                    }else{
                            echo "there was an error while uploading your file";
                    }
    
            } else{
                    echo "You cannot upload files of this type only pdf are allowed!";
            }

        }
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
                <a href="staff_internshiplisting.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Internship listing</a>
                <a href="staff_studentlist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Student listing</a>
                  <a href="staff_companylist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Company listing</a>
                        <a href="staff_approval.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Student Approval</a>                   
                <a href="staff_infographics.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-chart-line me-2"></i>Analytics</a>
                <a href="staff_feedbacklist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Feedback list</a>
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
                    <h2 class="fs-2 m-0">Analytics</h2>
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
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
                <!-- Content wrapper -->
            <div class="container-fluid px-4">
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Define your search</h3>
                    <div class="col">
                        <h2 style="text-align: center;color: #black;">Edit Information</h2>
    <?php
        
        $sql = "SELECT * FROM student WHERE STUDENT_ID='$_SESSION[user_id]'";
        $result = mysqli_query($conn,$sql) or die (mysql_error());

        while ($row = mysqli_fetch_assoc($result)) 
        {
            $NAME=$row['NAME'];
            $STUDENT_EMAIL=$row['STUDENT_EMAIL'];
            $COURSE=$row['COURSE'];
            $ENROLL=$row['ENROLL'];
            $GENDER=$row['GENDER'];
            $CURRENT_RESIDENCE=$row['CURRENT_RESIDENCE'];
            $CONTACT_NO=$row['CONTACT_NO'];
            $YEAR_OF_STUDY=$row['YEAR_OF_STUDY'];
            $PASSWORD=$row['PASSWORD'];
            $CV=$row['CV'];
            $USERNAME=$row['USERNAME'];
        }

    ?>

    <div class="profile_info" style="text-align: center;">
        <span style="color: white;">Welcome,</span> 
        <h4 style="color: white;"><?php echo $_SESSION['user_id']; ?></h4>
    </div><br><br>
    
    <div class="form1">
        <form action="" method="post" enctype="multipart/form-data">


        <label><h4><b>NAME Name: </b></h4></label>
        <input class="form-control" type="text" name="NAME" value="<?php echo $NAME; ?>">

        <label><h4><b>STUDENT_EMAIL Name</b></h4></label>
        <input class="form-control" type="text" name="STUDENT_EMAIL" value="<?php echo $STUDENT_EMAIL; ?>">

        <label><h4><b>COURSE</b></h4></label>
        <input class="form-control" type="text" name="COURSE" value="<?php echo $COURSE; ?>">

        <label><h4><b>ENROLL</b></h4></label>
        <input class="form-control" type="text" name="ENROLL" value="<?php echo $ENROLL; ?>">

        <label><h4><b>GENDER</b></h4></label>
        <input class="form-control" type="text" name="GENDER" value="<?php echo $GENDER; ?>">

        <label><h4><b>CURRENT_RESIDENCE No</b></h4></label>
        <input class="form-control" type="text" name="CURRENT_RESIDENCE" value="<?php echo $CURRENT_RESIDENCE; ?>">

        <label><h4><b>CONTACT_NO</b></h4></label>
        <input class="form-control" type="text" name="CONTACT_NO" value="<?php echo $CONTACT_NO; ?>">

        <label><h4><b>YEAR_OF_STUDY</b></h4></label>
        <input class="form-control" type="text" name="YEAR_OF_STUDY" value="<?php echo $YEAR_OF_STUDY; ?>">

        <label><h4><b>PASSWORD</b></h4></label>
        <input class="form-control" type="text" name="PASSWORD" value="<?php echo $PASSWORD; ?>">

        
        <label><h4><b>USERNAME</b></h4></label>
        <input class="form-control" type="text" name="USERNAME" value="<?php echo $USERNAME; ?>">

        
                    
                        
        <label>New CV: <input type="file" name="file" value = "<?php if(isset($_POST["file"])) echo $_POST["file"]; ?>">
        </label>
            <input type="reset" value="Clear" name="clear_button">

                    

                               

                 
        <br>
        <div style="padding-left: 100px;">
            <button class="btn btn-default" type="submit" name="submit">save</button></div>
    </form>
</div>
        <?php 

        if(isset($_POST['submit']))
        {
            

            $NAME=$_POST['NAME'];
            $STUDENT_EMAIL=$_POST['STUDENT_EMAIL'];
            $COURSE=$_POST['COURSE'];
            $ENROLL=$_POST['ENROLL'];
            $GENDER=$_POST['GENDER'];
            $CURRENT_RESIDENCE=$_POST['CURRENT_RESIDENCE'];
            $CONTACT_NO=$_POST['CONTACT_NO'];
            $YEAR_OF_STUDY=$_POST['YEAR_OF_STUDY'];
            $PASSWORD=$_POST['PASSWORD'];
            $CV=$_POST['CV'];
            $USERNAME=$_POST['USERNAME'];




            $sql1= "UPDATE student SET NAME='$NAME', STUDENT_EMAIL='$STUDENT_EMAIL', COURSE='$COURSE', ENROLL='$ENROLL', GENDER='$GENDER', CURRENT_RESIDENCE='$CURRENT_RESIDENCE',CONTACT_NO='$CONTACT_NO',YEAR_OF_STUDY='$YEAR_OF_STUDY',PASSWORD='$PASSWORD',CV='$CV',USERNAME='$USERNAME' WHERE STUDENT_ID = $userID";

            if(mysqli_query($conn,$sql1))
            {
                ?>
                    <script type="text/javascript">
                        alert("Saved Successfully.");
                        window.location="student_profile.php";
                    </script>
                <?php
            }
        }
        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>

<?php 
//}else {
  // header("Location:staff_login.php");
//}
 //?>



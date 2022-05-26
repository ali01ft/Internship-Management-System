
<?php

session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 

    $id = $_SESSION['user_id'];


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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
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
                    <h2 class="fs-2 m-0">Profile Page</h2>
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
                                <li><a href="student_profile.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-paperclip me-2"></i>Profile</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
                <!-- Content wrapper -->
        <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <div class="container-fluid px-4">
                                        <div class="row my-5">
                                        <h3 class="fs-4 mb-3">Define your search</h3>
                                        <div class="col">
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

                                <div class="card-header bg-transparent text-center">
                                <img class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="student dp">
                                <h4>
                                        <?php echo $_SESSION['user_id']; ?>
                                </h4>
                                </div>
                                <div style="text-align: center;"> <b>Welcome, </b>
                                    
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
                                                echo "<a href='uploads/profile".$row ['STUDENT_ID'].".pdf' download>Download</a>";
                                            echo "</td>";
                                        echo "</tr>";
                                        
                                    echo "</table>";
                                    echo "</b>";
                                ?>
                            </div>
                        </div>
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

                        </div>
                    </div>
                </div>
            </form>           
        </div>
</body>

</html>

 <?php
 }else {
  header("Location:  login_access.php");
}
 ?>



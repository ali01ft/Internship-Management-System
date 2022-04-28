

<?php 
  session_start();

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
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
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-project-diagram me-2"></i>Internship listing</a>
                <a href="staff_studentlist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Student listing</a>
                <a href="staff_companylist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Company listing</a>
                        <a href="staff_approval.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Student Approval</a>        
                <a href="staff_infographics.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
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
                    <h2 class="fs-2 m-0">Internship listing</h2>
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

            <div class="container-fluid px-4">
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Current available listings</h3>
                    <div class="col">
                         <?php 

                                 $conn = new mysqli('localhost', 'root', '', 'ims');
                                 if(isset($_GET['search'])){
                                    $searchKey = $_GET['search'];
                                    $sql = "SELECT * FROM JOBS WHERE Location LIKE '%$searchKey%'";
                                 }else
                                 $sql = "SELECT * FROM JOBS";
                                 $result = $conn->query($sql);
                               ?>

                               <form action="" method="GET"> 
                                 <div class="col-md-6">
                                    <input type="text" name="search" class='form-control' placeholder="Search By Location" value=<?php echo @$_GET['search']; ?> > 
                                 </div>
                                 <div class="col-md-6 text-left">
                                  <button class="btn btn-light">Search</button>
                                    <button onclick="myFunction()" class="btn btn-light">Refresh </button>
                                    <script>
                                    function myFunction() {
                                        location.reload();
                                    }
                                    </script>
                                 </div>
                               </form>

                               <br> 
                               <br>
                            </div>

                          <table class="table bg-white rounded shadow-sm  table-hover">
                            <div class="row">
                              <tr>
                                 <th>Job ID</th>
                                 <th>Job Title</th>
                                 <th>Location</th>
                                 <th>Qualification</th>
                                 <th>Category</th>
                                 <th>Position</th>
                                 <th>Apply</th>
                              </tr>
                              <?php while( $row = $result->fetch_object() ): ?>
                              <tr>
                                 <td><?php echo $row->Job_ID ?></td>
                                 <td><?php echo $row->Job_Title ?></td>
                                 <td><?php echo $row->Location ?></td>
                                 <td><?php echo $row->Qualification ?></td>
                                 <td><?php echo $row->Category ?></td>
                                 <td><?php echo $row->Position ?></td>
                              </tr>
                              <?php endwhile; ?>
                            </table>


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
}else {
   header("Location:  staff_login.php");
}
 ?>


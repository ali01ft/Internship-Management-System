<?php 
  session_start();
if (isset($_SESSION['company_id']) && isset($_SESSION['user_email'])) { 

    $id = $_SESSION['company_id'];

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


       <?php 

                                 $conn = new mysqli('localhost', 'root', '', 'ims');


                                   if(isset($_GET['data'])){

                                        $Jid =  $_GET['data'];
                
                                    }
                                    else{
                                        $Jid = "";
                                    }   


                                $sql2 = "SELECT s.STUDENT_ID, s.NAME, s.STUDENT_EMAIL, s.COURSE, s.GENDER, s.YEAR_OF_STUDY, a.Status, a.appID
                                        from student s
                                        INNER join applicants a ON s.STUDENT_ID = a.STUDENT_ID
                                        WHERE a.Job_ID = '$Jid' and (a.Status ='Confirmed' or a.Status = 'Ending' or a.Status ='Ended' or a.Status = 'Completed')";
                                $listing = $conn ->query($sql2);


                        ?>







<div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-address-book me-1"></i>Swinburne</div>
            <div class="list-group list-group-flush my-3">
            
                  <a href="in_joblist.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-project-diagram me-2"></i>Dashboard</a>                   
                <a href="Jobs.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Post a Job</a>       
                <a href="student_logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>


        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Students That Are Working On this Internship</h2>
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
                    <h3 class="fs-4 mb-3">List of Working Students</h3>
                    <div class="col">



                     <!--fething data module-->
                        <div class="card">
                            <div class="card-body">

                            <form method="POST">
                                <table id="datatableid1" class="table table-bordered">
                                <thead>
                                <tr>
                                <th scope="col">Student ID</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Student Email</th>
                                 <th scope="col">Course</th>
                                 <th scope="col">Gender</th>
                                 <th scope="col">Year of Study</th>
                                 <th scope="col">CV</th>
                                 <th scope="col">Feedback</th>



                                </tr>
                                </thead>
                                <tbody>
                             <?php while( $row = $listing->fetch_object() ): 

                                    $condition = $row ->Status;
                                    $sid = $row->STUDENT_ID;
                                    print_r($sid);
                                    $aid = $row->appID;
                                    $_SESSION['app'] = $aid;



                                ?>
                                <tr>
                                 <td><?php echo $row->STUDENT_ID?></td>
                                 <td><?php echo $row->NAME?></td>
                                 <td><?php echo $row->STUDENT_EMAIL?></td>
                                 <td><?php echo $row->COURSE?></td>
                                 <td><?php echo $row->GENDER?></td>
                                 <td><?php echo $row->YEAR_OF_STUDY?></td>
                                 <td><?php echo "<a href='uploads/profile".$row -> STUDENT_ID.".pdf' download>Download</a>"?></td>
                                 <td><?php 

                                    if ($condition == 'Ended' or $condition == 'Completed') {
                                        echo "<a href ='industry_feedback.php?data=$sid' style='color: white;'><button type='button' class='btn btn-secondary'><div class='text-center'> Give</div> </button></a>";
                                    }

                                ?></td>
                              </tr>
                              <?php endwhile; ?>
                          </tbody>
                        </table>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a href ='in_joblist.php' style='color: white;'><button type='button' class='btn btn-secondary'> Back </button></a>
                <button  style="float: right; margin-right: 10px;" class="btn btn-danger" name="download-button" id="download-button">Download Table</button>
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
                             <!-- Script links for functions and datatable -->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

                            <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
                            <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

                            <script>
                                $(document).ready(function () {

                                    $('.viewbtn').on('click', function () {
                                        $('#viewmodal').modal('show');
                                        $.ajax({ //create an ajax request to display.php
                                            type: "GET",
                                            url: "display.php",
                                            dataType: "html", //expect html to be returned                
                                            success: function (response) {
                                                $("#responsecontainer").html(response);
                                                //alert(response);
                                            }
                                        });
                                    });

                                });
                            </script>

                             <!-- Table controller  -->
                            <script>
                                $(document).ready(function () {

                                    $('#datatableid').DataTable({
                                        "pagingType": "full_numbers",
                                        "lengthMenu": [
                                            [10, 25, 50, -1],
                                            [10, 25, 50, "All"]
                                        ],
                                        responsive: true,
                                        language: {
                                            search: "_INPUT_",
                                            searchPlaceholder: "Search Your Data",
                                        }
                                    });

                                    $('#datatableid1').DataTable(
                                         {
                                        "pagingType": "full_numbers",
                                        "lengthMenu": [
                                            [10, 25, 50, -1],
                                            [10, 25, 50, "All"]
                                        ],
                                        responsive: true,
                                        language: {
                                            search: "_INPUT_",
                                            searchPlaceholder: "Search Your Data",
                                        }
                                        }      
                                    );

                                });
                            </script>



                            <!-- Function to display delete popup -->
                              <script>
                                $(document).ready(function () {

                                    $('.deletebtn').on('click', function () {

                                        $('#deletemodal').modal('show');

                                        $tr = $(this).closest('tr');

                                        var data = $tr.children("td").map(function () {
                                            return $(this).text();
                                        }).get();

                                        console.log(data);

                                        $('#delete_id').val(data[0]);

                                    });
                                });
                            </script>


                    <!--DOwnload data table-->

                                                 <script>function htmlToCSV(html, filename) {
                                    var data = [];
                                    var rows = document.querySelectorAll("table tr");
                                            
                                    for (var i = 0; i < rows.length; i++) {
                                        var row = [], cols = rows[i].querySelectorAll("td, th");
                                                
                                        for (var j = 0; j < cols.length; j++) {

                                                row.push(cols[j].innerText);
                                        }
                                                
                                        data.push(row.join(","));       
                                    }

                                    downloadCSVFile(data.join("\n"), filename);
                                    }
                            </script>



                             <script>
                                    function downloadCSVFile(csv, filename) {
                                    var csv_file, download_link;

                                    csv_file = new Blob([csv], {type: "text/csv"});

                                    download_link = document.createElement("a");

                                    download_link.download = filename;

                                    download_link.href = window.URL.createObjectURL(csv_file);

                                    download_link.style.display = "none";

                                    document.body.appendChild(download_link);

                                    download_link.click();
                            }</script>

                             <script>document.getElementById("download-button").addEventListener("click", function () {
                                    var html = document.querySelector("table").outerHTML;
                                    htmlToCSV(html, "Internlist.csv");
                                });
                            </script>






</html>

<?php 
}else {
   header("Location:  industry_login.php");
}
 ?>

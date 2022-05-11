<?php 

$ufn = $_SESSION['user_full_name'];

echo "<body>";

   echo "<div class='d-flex' id='wrapper'>";
     // Sidebar 
      echo  "<div class='bg-white' id='sidebar-wrapper'>";
      echo   "<div class='sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom'><i
                    class='fas fa-address-book me-1'></i>Swinburne</div>";
        echo    "<div class='list-group list-group-flush my-3'>";
          echo   "<a href='student_internshiplisting.php' class='list-group-item list-group-item-action bg-transparent second-text fw-bold'><i
                        class='fas fa-project-diagram me-2'></i>Internship listing</a>";
             echo    "<a href='student_companylist.php' class='list-group-item list-group-item-action bg-transparent second-text fw-bold'><i
                        class='fas fa-project-diagram me-2'></i>Company listing</a>";                   
               echo "<a href='student_dashboard.php' class='list-group-item list-group-item-action bg-transparent second-text active'><i
                        class='fas fa-paperclip me-2'></i>Student Dashboard</a>";
               echo     "<a href='student_logout.php' class='list-group-item list-group-item-action bg-transparent text-danger fw-bold'><i
                        class='fas fa-power-off me-2'></i>Logout</a>";
        echo "</div>";
       echo "</div>";
        //#sidebar-wrapper -->

       //Page Content -->
        echo "<div id='page-content-wrapper'>";
            echo "<nav class='nvbar navbar-expand-lg navbar-light bg-transparent py-4 px-4'>";
              echo "<div class='d-flex align-items-center'>";
                echo   "<i class='fas fa-align-left primary-text fs-4 me-3' id='menu-toggle'></i>";
                   echo "<h2 class='fs-2 m-0'>Student Dashboard</h2>";
                echo "</div>";

                echo "<button class='navbar-toggler' type='button' data-bs-toggle='collapse';
                    data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent'
                    aria-expanded='false' aria-label='Toggle navigation'>";
               echo  "<span class='navbar-toggler-icon'></span>";
                echo "</button>";

                echo "<div class='collapse navbar-collapse' id='navbarSupportedContent'>";
                echo    "<ul class='navbar-nav ms-auto mb-2 mb-lg-0'>";
                echo       "<li class='nav-item dropdown'>";
                echo            "<a class='nav-link dropdown-toggle second-text fw-bold' href='#' id='navbarDropdown'
                                role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-user me-2'></i>$ufn
                                </a>";
                echo            " <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>";
                echo                 "<li><a class='dropdown-item' href='#'>Profile</a></li>";
                echo             "</ul>";
                echo         "</li>";
                echo     "</ul>";
                echo "</div>";
            echo "</nav>";

                echo "<div>";
                echo     "<p>Status: Waiting for Admin approval for internship</p>"; 
                echo "</div>";






                echo     "<a href='in_joblist.php'> Back </a>";

                   
              
            echo "</div>";
        echo "</div>";
  
 //#page-content-wrapper -->
    echo "</div>";

    echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js'></script>";
    echo "<script>
         var el = document.getElementById('wrapper');
         var toggleButton = document.getElementById('menu-toggle');

        toggleButton.onclick = function () {
             el.classList.toggle('toggled');
         };";
    echo "</script>";
echo "</body>";
        


echo "</html>";

?>
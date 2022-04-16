<?php
//function test input
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$regisNo = $uname = $ContactNo = $Cresidence = $email = $pname = $pwd = $web = NULl;

// define variable and set to empty VALUES
$msgErr = $emailErr = $pnameErr = $pwdErr = $regis_noErr = $cpwdErr = $pwdErr = $CresErr = $Contact_noErr = $webErr = $unameErr = "";

if(isset($_POST["register_button"])){
  $success = 1;
  $regisNo = $_POST["regis_no"];
  $uname = $_POST["uname"];
  $ContactNo = $_POST["Contact_no"];
  $Cresidence = $_POST["Cresidence"];
  $email = $_POST["email"];
  $pname = $_POST["pname"];
  $pwd = $_POST["pwd"];
  $cpwd = $_POST["cpwd"];
  $web = $_POST["web"];
  //$date_started = date("Y/m/d");

  //  Check Student ID process
      if (empty($_POST["regis_no"])) {
        $regis_noErr = "<span style='color:red;'>Registration is required.</span>";
        $success = 0;
      }
   
  // Email validation process
      if (empty($_POST["email"])) {
        $emailErr = "<span style='color:red;'>Email is required.</span>";
        $success = 0;
      }
      else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {     // check if e-mail address is well-formed
          $emailErr = "<span style='color:red;'>Invalid email format.</span>";
          $success = 0;
        }
      }

  // Email validation process
      if (empty($_POST["web"])) {
        $webErr = "<span style='color:red;'>Website is required.</span>";
        $success = 0;
      }

  // Username name validation process
      if (empty($_POST["uname"])) {
        $unameErr = "<span style='color:red;'>Username is required.</span>";
        $success = 0;
      }
      else {
        $uname = test_input($_POST["uname"]);
        if (!preg_match("/^[a-zA-Z]*$/",$uname)) {    // check if name only contains letters
          $unameErr = "<span style='color:red;'>Only letters are allowed with maximum 10 characters, no blanks.</span>";
          $success = 0;
        }
            elseif(strlen($uname) >= 10){
                $unameErr = "<span style='color:red;'>Only 10 characters are allowed.</span>";
                $success = 0;
          }
      }    

  // Profile name validation process
      if (empty($_POST["pname"])) {
        $pnameErr = "<span style='color:red;'>Company Full name is required.</span>";
        $success = 0;
      }
      else {
        $pname = test_input($_POST["pname"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$pname)) {    // check if name only contains letters
          $pnameErr = "<span style='color:red;'>Only letters are allowed with maximum 25 characters.</span>";
          $success = 0;
        }
	     	elseif(strlen($pname) >= 40){
			    $pnameErr = "<span style='color:red;'>Only 40 characters are allowed.</span>";
			    $success = 0;
		    }
      }

  // Resident validation process
      if (empty($_POST["Cresidence"])) {
        $CresErr = "<span style='color:red;'>Current Residence Address is Required.</span>";
        $success = 0;
      }

  //  Check Contact Number process
      if (empty($_POST["Contact_no"])) {
        $Contact_noErr = "<span style='color:red;'>Contact Number is required.</span>";
        $success = 0;
      } 
      else {
        $ContactNo = test_input($_POST["Contact_no"]);
        if (!preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/",$ContactNo)) {    // check if it matches pattern
          $Contact_noErr = "<span style='color:red;'>Please Use Valid number.</span>";
          $success = 0;
        }
      
	     }

  // Password validation process
	    if(empty($_POST["pwd"])){   // check if both password does match
        $pwdErr = "<span style='color:red;'>Password is required.</span>";
        $success = 0;
      }
	//check if length is 8
	     elseif (strlen($pwd) < 8){
		    $pwdErr = "<span style='color:red;'>Your Password Must Contain At least 8 characters!.</span>";
		   $success = 0;
	      }
	  // check if atleast has one letter
	      elseif (!preg_match("/[A-Z]/",$pwd)){
		     $pwdErr = "<span style='color:red;'>Your Password Must Contain At Least 1 Capital Letter!</span>";
		     $success = 0;
	      }
	   // check if atleast has one number
	        elseif (!preg_match("/[1-9]/",$pwd)){
		        $pwdErr = "<span style='color:red;'>Your Password Must Contain At Least 1 Number!</span>";
		        $success = 0;
	        }
	   //check if atleast has one small letter
	         elseif (!preg_match("/[a-z]/",$pwd)){
		         $pwdErr = "<span style='color:red;'>Your Password Must Contain At Least 1 lower case letter!</span>";
		         $success = 0;
	          } 
                elseif(empty($cpwd)){   // check if confirm password isnt empty
                  $cpwdErr = "<span style='color:red;'>Password is required.</span>";
                  $success = 0;
                }
	  
        else
		  //check if both password is matching
	      {
          if($pwd != $cpwd) {
            $cpwdErr = "<span style='color:red;'>Both password does not match. Please try again.</span>";
           $success = 0;
           }
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

           else{
			       mysqli_query($conn,"ALTER TABLE industry AUTO_INCREMENT = 1");
            $getEmail = "SELECT * from industry where Email = ?";         //Validation if same email were used
            $stmt = mysqli_stmt_init($conn); //initialize statement with connection
				  	 mysqli_stmt_prepare($stmt,$getEmail); //prepare statement
				  	 mysqli_stmt_bind_param($stmt, "s", $email); //binding variable into string
					   mysqli_stmt_execute($stmt); //execute statement
				  	 mysqli_stmt_store_result($stmt); //storing the result
            $row = mysqli_stmt_num_rows($stmt); //fetching rows number

              mysqli_query($conn,"ALTER TABLE industry AUTO_INCREMENT = 1");
            $getID = "SELECT * from industry where REGIS_NO = ?";         //Validation if same number is used
            $stmt = mysqli_stmt_init($conn); //initialize statement with connection
            mysqli_stmt_prepare($stmt,$getID); //prepare statement
            mysqli_stmt_bind_param($stmt, "s", $regisNo); //binding variable into string
            mysqli_stmt_execute($stmt); //execute statement
            mysqli_stmt_store_result($stmt); //storing the result
            $idrow = mysqli_stmt_num_rows($stmt); //fetching rows number

            if($idrow != 0){
              $msgErr = "<p style='color:red;'> Registration failed!<br> An account with the same UserID already exist</p>";
            }

            elseif($row != 0){
              $msgErr = "<p style='color:red;'> Registration failed!<br> An account with the same email already exist</p>";
            }

            else{           //else create query with all the correct validation and write into tables
              $create ="INSERT INTO industry (REGIS_NO, COMPANY_NAME, COMPANY_ADDRESS, CONTACT_NO, WEBSITE, Password, USERNAME, Email) VALUES(?,?,?,?,?,?,?,?);";

                mysqli_stmt_prepare($stmt,$create);
                mysqli_stmt_bind_param($stmt, "ssssssss",$regisNo, $pname, $Cresidence, $ContactNo, $web, $pwd, $uname, $email);
                mysqli_stmt_execute($stmt);
                session_start();
                $_SESSION["regis_no"] = $regisNo;

               header("Location:csignup.php");       //direct to friendadd.php
              }

              mysqli_stmt_close($stmt);

              }

              mysqli_close($conn);
            }
          }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
</head>
<body>

    <a href="index.php">log in</a>
      <h1>Internship Management System</h1>
    </a>
    
    <h2>Registration Page</h2>

<!-- Forms -->
	<form action = "csignup.php" method = "POST" >
			<p>Company Registration Number: <input type="text" name="regis_no" value = "<?php if(isset($_POST["regis_no"])) echo $_POST["regis_no"]; ?>">
      <span class="error"> <?php echo $regis_noErr;?></span></p>

			<p>Email address: <input type="text" name="email" value = "<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>">
      <span class="error"> <?php echo $emailErr;?></span></p>

			<p>Password: <input type="password" name="pwd">
			<span class="error"> <?php echo $pwdErr;?></span> </p>

			<p>Confirm password: <input type="password" name="cpwd">
			<span class="error"> <?php echo $cpwdErr;?></span> </p>

      <p>Username: <input type="text" name="uname" value = "<?php if(isset($_POST["uname"])) echo $_POST["uname"]; ?>">
      <span class="error"> <?php echo $unameErr;?></span> </p>

			<p>Company Name: <input type="text" name="pname" value = "<?php if(isset($_POST["pname"])) echo $_POST["pname"]; ?>">
			<span class="error"> <?php echo $pnameErr;?></span> </p>
     
			<p>Company Address: <input type="text" name="Cresidence" value = "<?php if(isset($_POST["Cresidence"])) echo $_POST["Cresidence"]; ?>">
			<span class="error"> <?php echo $CresErr;?></span> </p>

			<p>Contact Number: <input type="text" name="Contact_no" value = "<?php if(isset($_POST["Contact_no"])) echo $_POST["Contact_no"]; ?>">
			<span class="error"> <?php echo $Contact_noErr;?></span> </p>

			<p>Your Website Link: <input type="text" name="web" value = "<?php if(isset($_POST["web"])) echo $_POST["web"]; ?>">
			<span class="error"> <?php echo $webErr;?></span> </p>
			

			<input type="submit" value="Register" name="register_button">
			<input type="reset" value="Clear" name="clear_button">

			<span class="error"> <?php echo $msgErr;?></span>
	
			<p><a href="index.php">Back to Home</a> </p>
		</form>
	</div>

<!-- Footer -->


   
  </div>

</body>
</html>

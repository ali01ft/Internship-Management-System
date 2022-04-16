<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 25%;
}

.column {
  float: left;
  width: 33.33%;
  padding: 50px;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}
}
</style>
</head>
<body>

  <img src="image\swinburne.png" alt="swin_logo" class="center">

  <h2 style="text-align:center">Login Page</h2>
  
<div >
  
  <div class="row">
    <div class="column">
      <form action="/student_page.php">

        <input type="image" src="image\Student.png" name="submit" width="400" height="330" alt="Student Login"/>
        
      </form>
    </div>
    <div class="column">
      <form action="/company_page.php">

        <input type="image" src="image\Company.png" name="submit" width="400" height="330" alt="Company Login"/>
      
      </form>
    </div>
    <div class="column">
      <form action="/admin_page.php">

      
        <input type="image" src="image\Admin.png" name="submit" width="400" height="330" alt="Admin Login"/>
    
      
    </form>
    </div>

    
  
    

    
   

    
  </div>

  <div style="padding-left:16px">
  
  <p style="text-align:center">Welcome please select your class.</p>
  
</div>



   

    
</div>


</body>
</html>
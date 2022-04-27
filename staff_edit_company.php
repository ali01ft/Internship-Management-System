<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'ims');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $cname = $_POST['cname'];
        $address = $_POST['address'];
        $website = $_POST['website'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];

        $query = "UPDATE industry SET COMPANY_NAME='$cname', COMPANY_ADDRESS='$address', WEBSITE='$website', CONTACT_NO=' $contact', Email ='$email' WHERE REGIS_NO='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:staff_companylist.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>
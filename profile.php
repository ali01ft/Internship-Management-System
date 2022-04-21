<?php


//profile.php

session_start();
print_r($_SESSION);

$server = "localhost";
        $username = "root";
        $password = "";
        $database = "ims";

        $conn = mysqli_connect($server, $username, $password, $database);

function is_user_login()
{
	if(isset($_SESSION['user_id']))
	{
		return true;
	}
	return false;
}



if($conn)
{
	header('location:login_access.php');
}else{

$message = '';

$success = '';

if(isset($_POST['save_button']))
{
	$formdata = array();

	if(empty($_POST['email']))
	{
		$message .= '<li>Email Address is required</li>';
	}
	else
	{
		if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
		{
			$message .= '<li>Invalid Email Address</li>';
		}
		else
		{
			$formdata['email'] = trim($_POST['email']);
		}
	}


	if(empty($_POST['pwd']))
	{
		$message .= '<li>Password is required</li>';
	}
	else
	{
		$formdata['pwd'] = trim($_POST['pwd']);
	}

	if(empty($_POST['uname']))
	{
		$message .= '<li>User Name is required</li>';
	}
	else
	{
		$formdata['uname'] = trim($_POST['uname']);
	}

	if(empty($_POST['Cresidence']))
	{
		$message .= '<li>User Address Detail is required</li>';
	}
	else
	{
		$formdata['Cresidence'] = trim($_POST['Cresidence']);
	}

	if(empty($_POST['Contact_no']))
	{
		$message .= '<li>User Address Detail is required</li>';
	}
	else
	{
		$formdata['Contact_no'] = $_POST['Contact_no'];
	}
	if(empty($_POST['Course']))
	{
		$message .= '<li>Password is required</li>';
	}
	else
	{
		$formdata['Course'] = trim($_POST['Course']);
	}
	if(empty($_POST['Gender']))
	{
		$message .= '<li>Password is required</li>';
	}
	else
	{
		$formdata['Gender'] = trim($_POST['Gender']);
	}

	$formdata['user_profile'] = $_POST['hidden_user_profile'];

	if(!empty($_FILES['user_profile']['uname']))
	{
		$img_name = $_FILES['user_profile']['uname'];
		$img_type = $_FILES['user_profile']['type'];
		$tmp_name = $_FILES['user_profile']['tmp_name'];
		$fileinfo = @getimagesize($tmp_name);
		$width = $fileinfo[0];
		$height = $fileinfo[1];
		$image_size = $_FILES['user_profile']['size'];
		$img_explode = explode(".", $img_name);
		$img_ext = strtolower(end($img_explode));
		$extensions = ["jpeg", "png", "jpg"];
		if(in_array($img_ext, $extensions))
		{
			if($image_size <= 2000000)
			{
				if($width == 225 && $height == 225)
				{
					$new_img_name = time() . '-' . rand() . '.'  . $img_ext;

					if(move_uploaded_file($tmp_name, "upload/" . $new_img_name))
					{
						$formdata['user_profile'] = $new_img_name;
					}
				}
				else
				{
					$message .= '<li>Image dimension should be within 225 X 225</li>';
				}
			}
			else
			{
				$message .= '<li>Image size exceeds 2MB</li>';
			}
		}
		else
		{
			$message .= '<li>Invalid Image File</li>';
		}
	}

	if($message == '')
	{
		$data = array(
			':uname'			=>	$formdata['uname'],
			':Cresidence'			=>	$formdata['Cresidence'],
			':Contact_no'		=>	$formdata['Contact_no'],
			':uname'			=>	$formdata['uname'],
			':email'	=>	$formdata['email'],
			':pwd'		=>	$formdata['pwd'],
			':Course'		=>	$formdata['Course'],
			':Gender'		=>	$formdata['Gender'],
			':user_updated_on'		=>	get_date_time($connect),
			':user_unique_id'		=>	$_SESSION['user_id']
		);

		$query = "
		UPDATE lms_user 
            SET uname = :uname, 
            Cresidence = :Cresidence, 
            Contact_no = :Contact_no, 
            user_profile = :user_profile, 
            email = :email, 
            pwd = :pwd,
            Course = :Course,
            Gender = :Gender, 
            user_updated_on = :user_updated_on 
            WHERE user_unique_id = :user_unique_id
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		$success = 'Data Change Successfully';
	}
}


$query = "
	SELECT * FROM student 
	WHERE STUDENT_ID = '".$_SESSION['user_id']."'
";

$result = $conn->query($query);


}
?>

<div class="d-flex align-items-center justify-content-center mt-5 mb-5" style="min-height:700px;">
	<div class="col-md-6">
		<?php 
		if($message != '')
		{
			echo '<div class="alert alert-danger"><ul>'.$message.'</ul></div>';
		}

		if($success != '')
		{
			echo '<div class="alert alert-success">'.$success.'</div>';
		}
		?>
		<div class="card">
			<div class="card-header">Profile</div>
			<div class="card-body">
			<?php 
			foreach($result as $row)
			{
			?>
				<form method="POST" enctype="multipart/form-data">
					<div class="mb-3">
						<label class="form-label">Email address</label>
						<input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" />
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" name="pwd" id="pwd" class="form-control" value="<?php echo $row['pwd']; ?>" />
					</div>
					<div class="mb-3">
						<label class="form-label">NAME</label>
						<input type="text" name="uname" id="uname" class="form-control" value="<?php echo $row['uname']; ?>" />
					</div>
					<div class="mb-3">
						<label class="form-label">Contact No.</label>
						<input type="text" name="Contact_no" id="Contact_no" class="form-control" value="<?php echo $row['Contact_no']; ?>" />
					</div>
					<div class="mb-3">
						<label class="form-label">User Address</label>
						<textarea name="Cresidence" id="Cresidence" class="form-control"><?php echo $row['Cresidence']; ?></textarea>
					</div>
					<div class="mb-3">
						<label class="form-label">Course</label>
						<textarea name="Course" id="Course" class="form-control"><?php echo $row['Course']; ?></textarea>
					</div>
					<div class="mb-3">
						<label class="form-label">Gender</label>
						<textarea name="Gender" id="Gender" class="form-control"><?php echo $row['Gender']; ?></textarea>
					</div>
					<div class="mb-3">
						<label class="form-label">User Photo</label><br />
						<input type="file" name="user_profile" id="user_profile" />
						<br />
						<span class="text-muted">Only .jpg & .png image allowed. Image size must be 225 x 225</span>
						<br />
						<input type="hidden" name="hidden_user_profile" value="<?php echo $row['user_profile']; ?>" />
						<img src="upload/<?php echo $row['user_profile']; ?>" width="100" class="img-thumbnail" />
					</div>
					<div class="text-center mt-4 mb-2">
						<input type="submit" name="save_button" class="btn btn-primary" value="Save" />
					</div>
				</form>

			<?php
			}
			?>
			</div>
		</div>
	</div>
</div>


<?php 
session_start();
include 'db_conn.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (empty($email)) {
		header("Location: staff_login.php?error=Email is required");
	}else if (empty($password)){
		header("Location: staff_login.php?error=Password is required&email=$email");
	}else {
		$stmt = $conn->prepare("SELECT * FROM admin WHERE email=?");
		$stmt->execute([$email]);
		

		if ($stmt->rowCount() === 1) {
			$user = $stmt->fetch();

			$user_id = $user['Admin_ID'];
			$user_email = $user['email'];
			$user_password = $user['Password'];
			$user_full_name = $user['Name'];

			if ($email === $user_email) {
				if (password_verify($password, $user_password)) {
					$_SESSION['user_id'] = $user_id;
					$_SESSION['user_email'] = $user_email;
					$_SESSION['user_full_name'] = $user_full_name;
					header("Location: staff_internshiplisting.php");

				}else {
					header("Location: staff_login.php?error=Incorect User name or password&email=$email");
				}
			}else {
				header("Location: staff_login.php?error=Incorect User name or password&email=$email");
			}
		}else {
			header("Location: staff_login.php?error=Incorect User name or password&email=$email");
		}
	}
}


<?php
session_start();

    $conn = new mysqli('localhost', 'root', '', 'ims');
        

           	 $id = $_SESSION['user_id'];
           	 print_r($id);
    		 $user_name = $_SESSION['user_full_name'];

if(!$conn){
	echo "connection failed";
}
else{


	$rating1 = $_POST['star1'];
	print_r($rating1);

if (isset($_POST['submit'])){


	
		$user_review		=	$_POST["user_review"];
		print_r($user_review);
	
	
		$que1 = $_POST['question1'];
		print_r($que1);
	
		$que2 = $_POST['question2'];
		print_r($que1);

		$date = date("Y/m/d");


	$stmt = mysqli_stmt_init($conn); //initialize connection to statement

	$query = "INSERT INTO student_review_table (STUDENT_ID, user_name, rating_question1, rating_question2, user_rating, user_review, datetime) 
	VALUES (?, ?, ?, ?, ?,?,?)";

	mysqli_stmt_prepare($stmt, $query);
	mysqli_stmt_bind_param($stmt, 'sssssss', $id, $user_name, $que1, $que2, $rating1, $user_review, $date);
	$insert = mysqli_stmt_execute($stmt);



	if(!$insert){
		echo "couldnt insert";
	}else{
		echo "works fine";
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
		

}


}



?>
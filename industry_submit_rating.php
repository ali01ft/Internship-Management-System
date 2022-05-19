
<?php
		$server = "localhost";
        $username = "root";
        $password = "";
        $database = "ims";

        $conn = mysqli_connect($server, $username, $password, $database);
        

        

if(!$conn){
	echo "connection failed";
}
else{


	$rating1 = $_POST['star1'];

if (isset($_POST['submit'])){


		$user_name		=	$_POST["user_name"];
	
		$user_review		=	$_POST["user_review"];
	
	
		$que1 = $_POST['question1'];
	
		$que2 = $_POST['question2'];

		$date = date("Y/m/d");


	$stmt = mysqli_stmt_init($conn); //initialize connection to statement

	$query = "INSERT INTO industry_review_table (user_name, rating_question1, rating_question2, user_rating, user_review, datetime) 
	VALUES (?, ?, ?, ?, ?,?)";

	mysqli_stmt_prepare($stmt, $query);
	mysqli_stmt_bind_param($stmt, 'ssssss', $user_name, $que1, $que2, $rating1, $user_review, $date);
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
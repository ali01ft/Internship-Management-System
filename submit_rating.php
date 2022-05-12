<?php
$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

if(isset($_POST["rating_data"]))
{

	
		$name		=>	$_POST["user_name"],
		$rate1	=>	$_POST["rating_question1"],
		$rate2	=>	$_POST["rating_question2"],
		$ratedata		=>	$_POST["rating_data"],
		$review		=>	$_POST["user_review"],
		$time			=>	time()
	);
	//(user_name, rating_question1, rating_question2, user_rating, user_review, datetime)
	//(:user_name, :rating_question1, :rating_question2, :user_rating, :user_review, :datetime)"
	$query = "
	INSERT INTO review_table 
	(user_name, rating_question1, rating_question2, user_rating, user_review, datetime)
	VALUES ($name, $rate1, $rate2, $ratedata, $review, $time)";

	 mysqli_query($connect, $query);

	//$statement = $connect->prepare($query);

	//$statement->execute($data);

	echo "Your Review & Rating Successfully Submitted";

}
?>
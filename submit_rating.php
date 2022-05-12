<?php
$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

if(isset($_POST["rating_data"]))
{

	$data = array(
		':user_name'		=>	$_POST["user_name"],
		//':rating_question1'		=>	$_POST["rating_question1"],
		//':rating_question2'		=>	$_POST["rating_question2"],
		':user_rating'		=>	$_POST["rating_data"],
		':user_review'		=>	$_POST["user_review"],
		':datetime'			=>	time()
	);
	//(user_name, rating_question1, rating_question2, user_rating, user_review, datetime)
	//(:user_name, :rating_question1, :rating_question2, :user_rating, :user_review, :datetime)"
	$query = "
	INSERT INTO review_table 
	(user_name, user_rating, user_review, datetime) 
	VALUES (:user_name, :user_rating, :user_review, :datetime)";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo "Your Review & Rating Successfully Submitted";

}
?>
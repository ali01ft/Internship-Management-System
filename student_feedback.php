
<?php
$connect = new PDO("mysql:host=localhost;dbname=test", "root", "");

if(isset($_POST["rating_data"]))
{

	$data = array(
		'user_name'		=>	$_POST["user_name"],
		'user_rating'		=>	$_POST["rating_data"],
		'user_review'		=>	$_POST["user_review"],
		'datetime'			=>	time()
	);


	$rating = $data['user_rating'];
	print_r($rating);


	//$query = "
	//INSERT INTO review_table 
	//(user_name, user_rating, user_review, datetime) 
	//VALUES (:user_name, :user_rating, :user_review, :datetime)
	//";

	//$statement = $connect->prepare($query);

	//$statement->execute($data);

	//echo "Your Review & Rating Successfully Submitted";

	// header("Location:submit_rating.php"); 

}


if (isset($_POST['Submit'])){

		$user_name		=	$_POST["user_name"];
		$user_review		=	$_POST["user_review"];
		$que1 = $_POST['question1'];
		print_r($que1);
		$que2 = $_POST['question2'];
		print_r($que2);
		print_r($rating); 

}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Feedback Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>


<body>
        <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-address-book me-1"></i>Swinburne</div>
            <div class="list-group list-group-flush my-3">
                <a href="student_internshiplisting.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-project-diagram me-2"></i>Internship listing</a>
                  <a href="student_companylist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Company listing</a>                   
                <a href="student_dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Student Dashboard</a>
                <a href="student_logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

    <div class="container">
    	<h1 class="mt-5 mb-5">Feedback Page</h1>
    	<div class="card">
    		<div class="card-header">Comapany Name</div>
    		<div class="card-body">
    			<div class="row">
    				
    			
                    <div class="modal-header">
                        <h5 class="modal-title">Feedback</h5>
                    </div>
                         
                        

                    <form action = "submit_rating.php" method = "POST">
                    <div class="modal-body">

                        <h4 class="text-center mt-2 mb-4">
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                        </h4>
                        	<input type="hidden" id="star1" name="star1" value="asdas">
                        <div class="form-group">
                            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                        </div>

                         
                        <div class="form-group">
                 								<div>
                                <p>Did You enjoy your internship experience?</p>
                                <div class="rating_question1">
                                    <input type="radio" name="question1" id="radio1" value="Yes">
                                    <label for="radio1">Yes</label>
                                    <input type="radio" name="question1" id="radio2" value="No">
                                    <label for="radio2">No</label>
                                </div>
                                
                                <p>Would you recommend this company for other interns?</p>
                               
                                    <div class="rating_question2" >
                                        <input type="radio" name="question2" id="radio3" value="Yes">
                                        <label for="radio3">Yes</label>
                                        <input type="radio" name="question2" id="radio4" value="No">
                                        <label for="radio4">No</label>      
                                    </div>      
                                            
                                </div>
                           
                            <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                        </div>
                        <div class="form-group text-center mt-4">
                        
                            <input type="submit" class="btn btn-primary" value="submit" name="submit" id="save_review">
                        </div>
                      
                    </div>
                  </form>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div>
</body>
</html>


	      	
    
<script>
	
		var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');


        document.getElementById("star1").value = rating_data;



    });

  $('#save_review').click(function(){

      var user_name = $('#user_name').val();
       

        var user_review = $('#user_review').val();
       

     
       var user_rating2 = document.getElementsByName('question2');

        if(user_name == '' || user_review == '' || rating_data =='')
        {
            alert("Please Fill all Field");
            return false;
        }
        else
        {
            $.ajax({
               url:"submit_rating.php",
                type:"POST",
                data:{rating_data:rating_data},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            });
        }

 });
	const setStep = step => {
    document.querySelectorAll(".step-content").forEach(element => element.style.display = "none");
    document.querySelector("[data-step='" + step + "']").style.display = "block";
    document.querySelectorAll(".steps .step").forEach((element, index) => {
        index < step-1 ? element.classList.add("complete") : element.classList.remove("complete");
        index == step-1 ? element.classList.add("current") : element.classList.remove("current");
    });
};
document.querySelectorAll("[data-set-step]").forEach(element => {
    element.onclick = event => {
        event.preventDefault();
        setStep(parseInt(element.dataset.setStep));
    };
});
<?php if (!empty($_POST)): ?>
setStep(4);
<?php endif; ?>

   

</script>

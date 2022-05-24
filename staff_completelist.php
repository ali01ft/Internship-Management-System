<?php


// This is the code which brings out pending list for approval
                                    $query2 = "SELECT applicants.appID, student.STUDENT_ID, student.NAME, student.COURSE, jobs.Job_Title, industry.COMPANY_NAME, jobs.Category, jobs.Vacancy, applicants.Proof, industry.CONTACT_NO, applicants.Status
                                        from applicants
                                        inner join student on student.STUDENT_ID = applicants.STUDENT_ID
                                        inner join jobs on jobs.Job_ID = applicants.Job_ID
                                        inner join industry on industry.REGIS_NO=jobs.REGIS_NO
                                        where applicants.Status = 'Ending'";
                                    $query_run2 = mysqli_query($connection, $query2);
                                   




                         if(isset($_POST['Apply2'])) {
                                 $fID = $_POST['Apply2'];  // approve
                                 print_r($fID);

                                $apply2 = " UPDATE applicants
                                  SET Status='Ended'
                                 WHERE appID ='$fID'";       // updating confirmation status

                                 mysqli_query($connection, $apply2);    //Excecute query

                                 //updating the status in student table

                                  $que2 = "SELECT * from applicants where appID='$fID'";
                                 $que_run2 = mysqli_query($connection, $que2);
                                  $info2 = mysqli_fetch_assoc($que_run2);
                                 $stu_info2 = $info2['STUDENT_ID'];

                                 $enroll = " UPDATE student
                                                SET ENROLL='Ended'
                                                WHERE STUDENT_ID ='$stu_info2'"; 
   
                                                $trial =  mysqli_query($connection, $enroll);    //Excecute query



                                $fdetails = "SELECT * FROM `forhistory` f inner join applicants a on a.STUDENT_ID = f.STUDENT_ID
                                            where a.STUDENT_ID = '$stu_info2'  and a.Status = 'Ended' and a.appID = '$fID'";


                                $fdata = mysqli_query($connection, $fdetails);

                                 if ($fdata) {

                                        foreach ($fdata as $x) {

                                            print_r($x);
                                            $app = $x['appID'];
                                            $stat = $x['ENROLL'];
                                            $jobstate = $x['Status'];
                                            print_r($jobstate);
                                            $stu_info2 = $x['STUDENT_ID'];
                                        }
                                    }

                                else{
                                    echo "didnt work";
                                }


                                $stmt = mysqli_stmt_init($conn); //initialize connection to statement

                                $run = "INSERT INTO student_review_table (STUDENT_ID, user_name, rating_question1, rating_question2, user_rating, user_review, datetime) 
                                VALUES (?, ?, ?, ?, ?,?,?)";

                                mysqli_stmt_prepare($stmt, $run);
                                mysqli_stmt_bind_param($stmt, 'sssssss', $id, $user_name, $que1, $que2, $rating1, $user_review, $date);
                                $insert = mysqli_stmt_execute($stmt);



                                if(!$insert){
                                    echo "couldnt insert";
                                }else{
                                    echo "works fine";
                                }

                                mysqli_stmt_close($stmt);
                                mysqli_close($conn);









                                               //  header("Location:staff_approval.php");
                                              
                                    }else{

                                        if(isset($_POST['Cancel2'])) {
                                         $fID = $_POST['Cancel2'];  // approve
                                           print_r($fID);

                                           //update application table
                                             $apply2 = " UPDATE applicants
                                             SET Status ='Confirmed'
                                             WHERE appID ='$fID'";       // updating confirmation status
           
                                            $y =    mysqli_query($connection, $apply2);    //Excecute query

                                          

                                              //update student table

                                          $que2 = "SELECT * from applicants where appID='$fID'";
                                          $que_run2 = mysqli_query($connection, $que2);
                                           $info2 = mysqli_fetch_assoc($que_run2);
                                          $stu_info2 = $info2['STUDENT_ID'];

                                           $apply2 = " UPDATE student
                                             SET ENROLL='Confirmed'
                                              WHERE STUDENT_ID ='$stu_info2'";       // updating confirmation status
           
                                            $t =   mysqli_query($connection, $apply2);    //Excecute query

                                                
                                           // header("Location:staff_approval.php");
                                                        
                                                          
                                                    }
                                                     
                                            }










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


?>
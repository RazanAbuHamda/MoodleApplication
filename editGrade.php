<?php
require_once('DbConect.php');
$sd= $_GET['student_id'];
//$sd = filter_input(INPUT_GET, 'student_id');
$sqlgr = "select * from grades where student_id ='" . $sd."'";
if ($result = mysqli_query($con, $sqlgr) and mysqli_num_rows($result) >0) {
    while ($row = mysqli_fetch_array($result)){
        $student_id = $row['student_id'];
        $course_id = $row['course_id'];
        $old_grade = $row['grade'];
        if(isset($_POST['addGrades'])){
        $updateGraded = "UPDATE grades set grade ='".$_POST['newGrade']."' where student_id ='".$student_id."' and "
                ."course_id = '".$course_id."'";
        if(mysqli_query($con, $updateGraded)){
            header('Location:addGrades.php');
        }  
    }
       
    }
    
    mysqli_free_result($result);

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Grades</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>
        <div class="wrap-login100">
            <label style = "font-size: 30px ; font-weight: bold; text-align: center;">Add Student Grades: </label>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" method="POST">
                    <table class="table">
                        <thead  class=" text-primary">
                        <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                            student_id
                        </th>
                        <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                            course_id
                        </th>
                        <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                            Old Grade
                        </th>
                        <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                            New Grade
                        </th>
                        </thead>
                        <tbody>

                        <form class="login100-form validate-form" method="post" action= "adminLogIn.php">
                            <td>
                                <div>
                                    <input class="input100" type="text" name="sid" value = "<?php echo $student_id ;?>">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input class="input100" type="text" name="cid" value = "<?php echo $course_id ;?>">
                                </div>
                            </td><!-- comment -->
                            <td>
                                <div>
                                    <input class="input100" type="text" name="gr" value = "<?php echo $old_grade ;?>">
                                </div>
                            </td>

                            <td>
                                <div>
                                    <input name="newGrade" placeholder="New Grade">
                                </div></td>
                                
                               
       
                        </tbody>
                    </table>
                                 <div>
                                    <input class = "login100-form-btn" name = "addGrades" type = "submit" value = "add Grades">
                                </div>           
 </form>
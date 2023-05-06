<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Grades</title>
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
                <form method="Get" action="">
                    <table class="table">
                        <thead  class=" text-primary">
                        <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                            student_id
                        </th>
                        <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                            course
                        </th>
                        <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                            grade
                        </th>
                        <th style="font-weight: 400; font-size: 22px; color: #9c27b0">

                        </th>
                        </thead>
                        <tbody>
                            <?php
                            session_start();
                            require_once('DbConect.php');
                            if (isset($_SESSION['id'])) {
                                $inid = $_SESSION['id'];
                            } else {
                                echo "No ";
                            }
                            $updateGraded = "SELECT * from grades gr join courses cr on gr.course_id = cr.id and cr.teacher_id =" . $_SESSION['id'];

//                            echo "Id Session " . $_SESSION['id'];
                            if ($result = mysqli_query($con, $updateGraded)) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row['student_id'] . "</td>";
                                        echo "<td>" . $row['course_id'] .
                                        "</td>";
                                        echo "<td>" . $row['grade'] . "</td>";
                                        
//                                    echo "<td>" . "<input type='text' name='input_grade' placeholder='" . 'inseret grade' . "' />" . "</td>";
                            echo "<td><a href='editGrade.php?student_id=". $row['student_id'] ."'>upadte grade</a></td>";


                                   echo "</tr>";
                                }
                                echo "</table>";
//                                echo '<div class = "container-login100-form-btn">
//                                                                        <button class = "login100-form-btn" name = "addGrades">
//                                                                        Add Grades
//                                                                        </button>
//                                                                        </div>';
                            } else {
                                echo "No records matching your query were found.";
                            }
                        } else {
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                        }

                        if (filter_input(INPUT_POST, ' addGrades')) {

                            $query = "UPDATE grades SET grade= '" . filter_input(INPUT_POST, 'input_grade') . " ' WHERE student_id = '" . $row['student_id'] . "'";
                            mysqli_query($con, $query);
                        }
                        ?>
                    </tbody>
                </table>
                    </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $(' .js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
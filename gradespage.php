<!DOCTYPE html>
<html lang="en">
    <head>
        <title>View Student Grades</title>
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
            <label style = "font-size: 30px ; font-weight: bold; text-align: center;">view Student Grades: </label>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead  class=" text-primary">
                    <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                        course_id
                    </th>
<!--                    <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                        name
                    </th>-->
                    <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                        grade
                    </th>
                    </thead>
                    <tbody>
                        <?php
                        session_start();
                        require_once('DbConect.php');
                        if (isset($_SESSION['semail'])) {
                            $inemail = $_SESSION['semail'];
                        } else {
                            echo "No ";
                        }

                        $sql = "SELECT * FROM grades INNER JOIN students ON grades.student_id =students.id WHERE students.email='" . $_SESSION['semail']."'";
                        mysqli_prepare($con, $sql);
//                        echo $_SESSION['semail'];
                        if (!mysqli_query($con, $sql)) {
                            echo("Error description: " . mysqli_error($con));
                        }

                        if ($result = mysqli_query($con, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['course_id'] . "</td>";
//                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['grade'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
// Free result set
                                mysqli_free_result($result);
                            } else {
                                echo "No records matching your query were found.";
                            }
                        } else {
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                        }
                        ?>
                    </tbody>
                </table>
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
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
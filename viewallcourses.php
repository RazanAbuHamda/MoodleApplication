


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>view all Courses</title>
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
            <label style = "font-size: 30px ; font-weight: bold; text-align: center;">view all Courses with their Teachers: </label>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead  class=" text-primary">
                    <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                        Teacher ID
                    </th>
                    <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                        Teacher Name
                    </th>
                    <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                        Course Name
                    </th>
                    <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                        Course ID
                    </th>
                    </thead>
                    <tbody>
                        <?php
                        require_once('DbConect.php');

                        $sql = "SELECT courses.name as cn , teachers.name as tn ,teacher_id ,courses.id FROM courses, teachers where teachers.id = " . 'courses.teacher_id';
                        if ($result = mysqli_query($con, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['teacher_id'] . "</td>";
                                    echo "<td>" . $row['tn'] . "</td>";
                                    echo "<td>" . $row['cn'] . "</td>";
                                    echo "<td>" . $row['id'] . "</td>";
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

// Close connection
                        mysqli_close($con);
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
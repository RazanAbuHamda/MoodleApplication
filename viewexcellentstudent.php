


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>view Excellent Students</title>
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
            <label style = "font-size: 30px ; font-weight: bold; text-align: center;">view all Students: </label>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead  class=" text-primary">
                    <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                        ID
                    </th>
                    <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                        Name
                    </th>
                    <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                        Email
                    </th>
                    <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                        Course id 
                    </th>
                    <th style="font-weight: 400; font-size: 22px; color: #9c27b0">
                        Grade
                    </th>
                    </thead>
                    <tbody>
                        <?php
                        require_once("DbConect.php");
                        $sql = "SELECT * from students join grades where students.id = grades.student_id and grades.grade='A+'";
                        $result = mysqli_query($con, $sql);
                        $rowNum = mysqli_num_rows($result);
                        if ($rowNum > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['course_id']; ?></td>
                                    <td><?php echo $row['grade']; ?></td>
                                </tr>
                                <?php
                            }
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Page</title>
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

        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <!-- <form class="login100-form validate-form" action="validate.php" method="post"> -->
                    <span class="login100-form-title">
                        About Admin
                    </span>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="insertTeacher" onclick="location = 'teacherSignUp.php'">
                            Insert Teachers
                        </button>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" name="viewallteachers" onclick="location = 'viewallteachers.php'">
                                View All Teachers
                            </button></div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" name="studentSignUp" onclick="location = 'studentSignUp.php'">
                                Insert Students
                            </button></div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" name="addNewCourse" onclick="location = 'addNewCourse.php'">
                                Insert Courese
                            </button></div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" name="viewallcourses" onclick="location = 'viewallcourses.php'">
                                View All Courses
                            </button></div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" name="Excellant" onclick="location = 'viewexcellentstudent.php'">
                                Excellant Students
                            </button></div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" name="viewallstudents" onclick="location = 'viewallstudents.php'">
                                View All Students
                            </button></div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" name="logout" onclick="location = 'logout.php'">
                                Logout
                            </button>
                        </div>
                        </form>
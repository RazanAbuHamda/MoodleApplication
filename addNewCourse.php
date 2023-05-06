<?php
require_once('DbConect.php');
$id = "";

if (isset($_POST['send'])) {
    $teacherId = $_POST['teacher_id'];
    $name = $_POST['course_name'];
//    echo $name . "      " . $teacherId . "<br>";
    $query = " select * from courses where teacher_id=" . $teacherId . " and name = '" . $name . "'";
    $result = mysqli_query($con, $query);

    if (mysqli_fetch_assoc($result)) {
        echo "This course is Found with the teacher!";
    } else {
        if ($name == 'Computer science 142') {
            $id = "10001";
        } elseif ($name == 'Computer science 143') {
            $id = "10002";
        } elseif ($name == 'Computer science 190M') {
            $id = "10003";
        } elseif ($name == 'Informatics 100') {
            $id = "10004";
        }
        $sqlAdd = "INSERT INTO courses (id , name , teacher_id) values('" . $id . "','" . $name . "','" .
                $teacherId . "')";
        if (mysqli_query($con, $sqlAdd)) {
            echo "Course Added Successfully .";
            header("adminpage.php");
        }
    }
}
?>
<html>

    <head> 
        <title>Add New Course</title>
        <style>
            * {box-sizing: border-box}

            /* Full-width input fields */
            input[type=text], input[type=password] {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
            }

            input[type=text]:focus, input[type=password]:focus {
                background-color: #ddd;
                outline: none;
            }

            hr {
                border: 1px solid #f1f1f1;
                margin-bottom: 25px;
            }

            /* Set a style for all buttons */
            button {
                background-color: #04AA6D;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }

            button:hover {
                opacity:1;
            }

            /* Extra styles for the cancel button */
            .cancelbtn {
                padding: 14px 20px;
                background-color: #f44336;
            }

            /* Float cancel and signup buttons and add an equal width */
            .cancelbtn, .signupbtn {
                float: left;
                width: 50%;
            }

            /* Add padding to container elements */
            .container {
                padding: 16px;
            }

            /* Clear floats */
            .clearfix::after {
                content: "";
                clear: both;
                display: table;
            }
            .styled-select select {
                background: transparent;
                width: 268px;
                padding: 5px;
                font-size: 16px;
                line-height: 1;
                border: 1;
                border-radius: 0;
                height: 34px;
                -webkit-appearance: none;
            }

            /* Change styles for cancel button and signup button on extra small screens */
            @media screen and (max-width: 300px) {
                .cancelbtn, .signupbtn {
                    width: 100%;
                }
            }


        </style>
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
                    <form action="" method="POST">
                        <div class="container">
                            <h1>Add new Course</h1>
                            <p>Please fill in this form to add a new course</p>
                            <hr>

                            <label>Choose a Course Name:</label>
                            <br>
                            <div class="styled-select">
                                <select name="course_name">
                                    <option value="">Computer science 142</option>
                                    <option value="">Computer science 143</option>
                                    <option value="">Computer science 190M</option>
                                    <option value="">informatics 100</option>
                                </select>
                                <br> <br>
                            </div>
                            <label>Choose a Teacher Id:</label>
                            <br>
                            <div class="styled-select">
                                <select name="teacher_id">
                                    <option value="">1234</option>
                                    <option value="">5678</option>
                                    <option value="">9012</option>
                                </select>
                                <br><br>
                            </div>

                        </div>
                        <br><br><br>

                        <div>
                            <input class = "login100-form-btn" name = "send" type = "submit" value = "add Course">
                        </div>    
                    </form>
                </div></div></div>

    </body>


</html>

<?php
require_once("DbConect.php");
session_start();

if (isset($_POST['send'])) {
    if (empty($_POST['pswd']) || empty($_POST['id']) || empty($_POST['name']) || strlen($_POST['pswd']) < '7') {
        header("location:teacherSignUp.php");
    } else {
        // Receiving the values entered and storing
        // in the variables
        // Data sanitization is done to prevent
        // SQL injections
        $Password = mysqli_real_escape_string($con, $_POST['pswd']);
        $id = mysqli_real_escape_string($con, $_POST['id']);
        $name = mysqli_real_escape_string($con, $_POST['name']);

        $query = " select * from teachers where id ='" . $id . "'";
        $result = mysqli_query($con, $query);

        if (mysqli_fetch_assoc($result)) {
            echo "Teacher is already signed up !";
        } else {
            $Hash = password_hash($Password, PASSWORD_DEFAULT);
            $query = " INSERT INTO teachers values ('$id', '$name', '$Hash')";
            $result = mysqli_query($con, $query);
            echo "sucssessfully added";
            header("location:teacherLogIn.php");
            mysqli_close($con);
        }
    }
}
?>
<html>
    <head> 
        <title>Teacher Sign Up</title>
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
                    <form style="border:1px solid #ccc" method = 'post'>
                        <div class="container">
                            <h1>Sign Up</h1>
                            <p>Please fill in this form to create an account.</p>
                            <hr>

                            <label><b>Id</b></label>
                            <input type="text" placeholder="Enter Id" name="id" required>

                            <label><b>Name</b></label>
                            <input type="text" placeholder="Enter Name" name="name" required>

                            <label><b>Password</b></label>
                            <input type="text" placeholder="Enter Password" name="pswd" required>


                            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                            <div>
                                <button type="submit" class="signupbtn login100-form-btn" name = "send">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div></div></div>

    </body>


</html>
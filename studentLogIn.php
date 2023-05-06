
<?php
session_start();
require_once('DbConect.php');
//هدول في حالة الكوكي محفوظة او الادمن لسا داخل السيشن تلقائيا بيروح ع الداش بورد بدون ما يعمل تسجيل دخول
//توجيه تلقائي ع اخر بيانات مسجلة
if (isset($_COOKIE['semail']) and isset($_SESSION['semail']) and!isset($_POST['logout']) || isset($_POST['remember'])) {
    header("Location:studentpage.php");
}
$_SESSION['semail'] = "";
if (isset($_POST['send'])) {

    if (!empty($_POST['semail']) and!empty($_POST['pswd'])) {
        $studentEmail = "select * from students where email ='" . $_POST['semail'] . "'";
        $result = mysqli_query($con, $studentEmail);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emaildbs = $row['email'];
                $passdbs = $row['password'];
                echo "the input : " . $_POST['semail'] . $_POST['pswd'];

                echo "    ///from database : " . $row['email'] . $row['password'];
            }
            $email = mysqli_real_escape_string($con, $_POST['semail']);
            $pass = mysqli_real_escape_string($con, $_POST['pswd']);
            $verify = password_verify($pass, $passdbs);
            if ($emaildbs == $email and $verify) {
                if (isset($_POST['remember'])) {
                    setcookie("semail", $email, time() + 3600);
                    setcookie("password", $pass, time() + 3600);
                }
                if (!isset($_POST['remember'], $_COOKIE['semail'], $_COOKIE['password'])) {
                    $_COOKIE['semailRem'] = null;
                    $_COOKIE['passRem'] = null;
                    setcookie("semailRem", "", time() - 3600);
                    setcookie("passRem", "", time() - 3600);
                }
                $_SESSION['semail'] = $email;
                header("Location:studentpage.php");
            } else {
                $error = "Incorrect email or password";
            }
        } else {
            $error = "Invalid student email";
        }
    } else {
        $error = "ERROR : empty fields";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Student LogIn Page</title>
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
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="images/img-01.png" alt="IMG">
                    </div>

                    <form class="login100-form validate-form" action = 'studentLogIn.php' method = 'post'>
                        <span class="login100-form-title">
                            Student Login
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="semail" placeholder="Email"
                                   <?php if (isset($_COOKIE['semailRem'])) { ?> value=<?php
                                       echo $_COOKIE['semailRem'];
                                   }
                                   ?>>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="pswd" placeholder="Password"
                                   <?php if (isset($_COOKIE['passRem'])) { ?> value=<?php
                                       echo $_COOKIE['passRem'];
                                   }
                                   ?>>

                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
<?php echo isset($error) ? $error : ""; ?>
                            <button class="login100-form-btn" name = "send">
                                Login
                            </button>
                        </div>
                        <div class="container-login100-form-btn">

                            <button class="login100-form-btn" name="logout" onclick="location = 'logout.php'">
                                Logout
                            </button>
                        </div>

                        <div class="text-center p-t-12">
                            <span class="txt1">
                                Forgot
                            </span>
                            <a class="txt2" href="#">
                                Username / Password?
                            </a>
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" onclick="location = 'index.php'">
                                Go Back
                            </button>
                            <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                <input type="checkbox" checked="checked" name= 'remember'/>
                                <div class="control__indicator"></div>
                            </label>

                            <div class="text-center p-t-136">
                                <a class="txt2" href="studentSignup.php">
                                    Create your Account
                                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true" ></i>
                                </a>
                            </div>

                    </form>
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


<?php
session_start();
require_once('DbConect.php');
//هدول في حالة الكوكي محفوظة او الادمن لسا داخل السيشن تلقائيا بيروح ع الداش بورد بدون ما يعمل تسجيل دخول
//توجيه تلقائي ع اخر بيانات مسجلة
if (isset($_COOKIE['email']) and isset($_SESSION['email']) and!isset($_POST['logout']) || isset($_POST['remember'])) {
    header("Location:adminpage.php");
}
if (isset($_POST['send'])) {
    if (!empty($_POST['email']) and!empty($_POST['pswd'])) {
        $adminEmail = "select * from admin where email ='" . $_POST['email'] . "'";
        $result = mysqli_query($con, $adminEmail);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emaildbs = $row['email'];
                $passdbs = $row['password'];
                echo "the input : " . $_POST['email'] . $_POST['pswd'];

                echo "    ///from database : " . $row['email'] . $row['password'];
            }
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $pass = mysqli_real_escape_string($con, $_POST['pswd']);
            $verify = password_verify($pass, $passdbs);
            if ($emaildbs == $email and $verify) {
                if (isset($_POST['remember'])) {
                    setcookie("semail", $email, time() + 3600);
                    setcookie("password", $pass, time() + 3600);
                }
                if (!isset($_POST['remember'], $_COOKIE['email'], $_COOKIE['password'])) {
                    $_COOKIE['emailRem'] = null;
                    $_COOKIE['passRem'] = null;
                    setcookie("emailRem", "", time() - 3600);
                    setcookie("passRem", "", time() - 3600);
                }
                $_SESSION['email'] = $email;
                header("Location:adminpage.php");
            } else {
                $error = "Incorrect email or password";
            }
        } else {
            $error = "Invalid admin email";
        }
    } else {
        $error = "ERROR : empty fields";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Admin LogIn Page</title>
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
<?php ?>
                    <form class="login100-form validate-form" method="post" action= "adminLogIn.php">
                        <span class="login100-form-title">
                            Admin Login
                        </span>


                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="email" placeholder="Email " <?php if (isset($_COOKIE['emailRem'])) { ?> value=<?php echo $_COOKIE['emailRem'];
}
?>>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>                     
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Password is required">
                            <input class="input100" type="password" name="pswd" placeholder="Password" <?php if (isset($_COOKIE['passRem'])) { ?> value=<?php echo $_COOKIE['passRem'];
}
?>>

                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
<?php echo isset($error) ? $error : ""; ?>
                            <button class="login100-form-btn" name ="send">
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
                                email / Password?
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
                                <a class="txt2" href="#">
                                    Create your Account
                                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
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
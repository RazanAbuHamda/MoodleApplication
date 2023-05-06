<!--  
 - Programming by: Razan Rami Abu hamda
 - Date: 23/5/2021
 - Time: 12:52 pm
-->
<?php
session_start();
session_unset();
session_destroy();

//  if (isset($_COOKIE['email'], $_COOKIE['password'])) {
//      setcookie("email", $_COOKIE['email'], time() + 3600);
//      setcookie("password", $_COOKIE['password'], time() + 3600);
//      $_COOKIE['email'] = null;
//      setcookie("email", "", time() - 3600);
//      $_COOKIE['password'] = null;
//      setcookie("password", "", time() - 3600);
//      header("Location:index.php");
//      exit();
//  }
//  if (isset($_COOKIE['semail'], $_COOKIE['password'])) {
//     setcookie("semail", $_COOKIE['semail'], time() + 3600);
//     setcookie("password", $_COOKIE['password'], time() + 3600);
//     $_COOKIE['semail'] = null;
//     setcookie("semail", "", time() - 3600);
//     $_COOKIE['password'] = null;
//     setcookie("password", "", time() - 3600);

header("Location:index.php");
exit();

// }
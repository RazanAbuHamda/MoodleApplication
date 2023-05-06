<?php

$con = mysqli_connect("localhost", "root", "");
if ($con->connect_error) {
    die("Failed Connection with Database" . $con->connect_error);
}

$db_selected = mysqli_select_db($con, 'Project');
if (!$db_selected) {
    // If we couldn't, then it either doesn't exist, or we can't see it.
    $sql = 'CREATE DATABASE Project';

    if (mysqli_query($con, $sql)) {
        echo "Database Project created successfully\n";
    } else {
        echo 'Error creating database: ' . mysql_error() . "\n";
    }
} else {
    $con = mysqli_connect("localhost", "root", "", "Project");
    if ($con->connect_error) {
        die("Failed Connection with Database" . $con->connect_error);
    }
//     include 'tables.php';
}
?>

<?php

require_once('DbConect.php');
// to create all tables to inseret valuse in it .
$studentsTable = "CREATE TABLE students (
    id varchar (20)  primary key ,
    name varchar(30) not null ,
    email varchar(60) ,
    password varchar(100) not null

)";
mysqli_query($con, $studentsTable);


$teachersTable = "CREATE TABLE teachers (
    id VARCHAR(20) PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    password VARCHAR(100)
    )";
mysqli_query($con, $teachersTable);


$adminTable = "CREATE TABLE admin (
    id VARCHAR(20) PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    password VARCHAR(100)
    )";
mysqli_query($con, $adminTable);


$coursesTable = "CREATE TABLE courses (
    id varchar (20)  primary key ,
    name varchar(30) not null ,
    teacher_id varchar(20) not null,
    FOREIGN KEY (teacher_id) REFERENCES teachers(id)

)";
mysqli_query($con, $coursesTable);

$gradesTable = "CREATE TABLE grades (
    student_id varchar (20) ,
    course_id varchar(20) not null,
    grade varchar(2), 
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)

)";
mysqli_query($con, $gradesTable);

$id = "123";
$name = "Bart";
$email = "bart@fox.com";
$Hash = password_hash("12345678", PASSWORD_DEFAULT);
$sql1 = "INSERT into students (id,name, email,password) values ('$id','$name','$email','$Hash')";
mysqli_query($con, $sql1);


$id = "456";
$name = "Milhouse";
$email = "Milhouse@fox.com";
$Hash = password_hash("12345678", PASSWORD_DEFAULT);
$sql1 = "INSERT into students (id,name, email,password) values ('$id','$name','$email','$Hash')";
mysqli_query($con, $sql1);


$id = "888";
$name = "Lisa";
$email = "lisa@fox.com";
$Hash = password_hash("12345678", PASSWORD_DEFAULT);
$sql1 = "INSERT into students (id,name, email,password) values ('$id','$name','$email','$Hash')";
mysqli_query($con, $sql1);


$id = "404";
$name = "Ralph";
$email = "ralph@fox.com";
$Hash = password_hash("12345678", PASSWORD_DEFAULT);
$sql1 = "INSERT into students (id,name, email,password) values ('$id','$name','$email','$Hash')";
mysqli_query($con, $sql1);


$id = "1234";
$name = "Krabapple";
$Hash = password_hash("12345678", PASSWORD_DEFAULT);
$sql2 = "INSERT into teachers (id,name,password) values ('$id','$name','$Hash')";
mysqli_query($con, $sql2);



$id = "5678";
$name = "Hoover";
$Hash = password_hash("12345678", PASSWORD_DEFAULT);
$sql2 = "INSERT into teachers (id,name,password) values ('$id','$name','$Hash')";
mysqli_query($con, $sql2);

$id = "9012";
$name = "Stepp";
$Hash = password_hash("12345678", PASSWORD_DEFAULT);
$sql2 = "INSERT into teachers (id,name,password) values ('$id','$name','$Hash')";
mysqli_query($con, $sql2);


$id = "10001";
$name = "Computer Science 142";
$teacher_id = "1234";
$sql3 = "INSERT into courses (id,name, teacher_id) values ('$id','$name','$teacher_id')";
mysqli_query($con, $sql3);


$id = "10002";
$name = "Computer Science 143";
$teacher_id = "5678";
$sql3 = "INSERT into courses (id,name, teacher_id) values ('$id','$name','$teacher_id')";
mysqli_query($con, $sql3);

$id = "10003";
$name = "Computer Science 190M";
$teacher_id = "9012";
$sql3 = "INSERT into courses (id,name, teacher_id) values ('$id','$name','$teacher_id')";
mysqli_query($con, $sql3);

$id = "10004";
$name = "Computer Science";
$teacher_id = "1234";
$sql3 = "INSERT into courses (id,name, teacher_id) values ('$id','$name','$teacher_id')";
mysqli_query($con, $sql3);



$id = "1111";
$name = "Admin";
$email = "admin@gmail.com";
$Hash = password_hash("Admin111", PASSWORD_DEFAULT);
$sql5 = "INSERT into admin (id,name, email, password) values ('$id','$name','$email','$Hash')";
mysqli_query($con, $sql5);



$student_id = "123";
$course_id = "10001";
$grade = "B-";
$sql4 = "INSERT into grades (student_id,course_id, grade) values ('$student_id','$course_id','$grade')";
mysqli_query($con, $sql4);

$student_id = "123";
$course_id = "10002";
$grade = "C";
$sql4 = "INSERT into grades (student_id,course_id, grade) values ('$student_id','$course_id','$grade')";
mysqli_query($con, $sql4);

$student_id = "456";
$course_id = "10001";
$grade = "B+";
$sql4 = "INSERT into grades (student_id,course_id, grade) values ('$student_id','$course_id','$grade')";
mysqli_query($con, $sql4);

$student_id = "888";
$course_id = "10002";
$grade = "A+";
$sql4 = "INSERT into grades (student_id,course_id, grade) values ('$student_id','$course_id','$grade')";
mysqli_query($con, $sql4);

$student_id = "888";
$course_id = "10003";
$grade = "A+";
$sql4 = "INSERT into grades (student_id,course_id, grade) values ('$student_id','$course_id','$grade')";
mysqli_query($con, $sql4);

$student_id = "404";
$course_id = "10004";
$grade = "D+";
$sql4 = "INSERT into grades (student_id,course_id, grade) values ('$student_id','$course_id','$grade')";
mysqli_query($con, $sql4);





echo "Tables Created Successfully.";


<?php
$email= $_POST['email'];
$fname = $_POST['fname'];
$lname= $_POST['lname'];
$no= $_POST['number'];
$pass = $_POST['pwd'];
$plans = $_POST['plans'];
//PHP Connection

$host = 'localhost';
$username = 'id2463452_admin';
$password = 'admin';
$db = 'id2463452_db_project';

$table = 'users_tbl';
date_default_timezone_set('Asia/Kolkata');
$datee=date("Y-m-d");
$con = mysqli_connect($host, $username, $password, $db) or die("Could not connect to the database.");
$query = "SELECT * FROM `users_tbl` WHERE `email`='$email' ";
$query_run = mysqli_query($con,$query);
if (mysqli_fetch_assoc($query_run))
 { mysqli_query($con, "UPDATE `users_tbl` SET `plan`='$plans',`register_date`='$datee' WHERE `email`='$email'") or die(mysqli_error($con));}
else{
$insert = mysqli_query($con, "INSERT INTO $table(`fname`, `lname`, `no`, `email`, `password`,`plan`,`register_date`) VALUES('$fname','$lname','$no','$email','$pass','$plans','$datee')") or die(mysqli_error($con));
header('Location: index.php');
}

mysqli_close($con);
?>
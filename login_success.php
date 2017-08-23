<?php
session_start();

$mysql_hostname = "localhost";
$mysql_username = "id2463452_admin";
$mysql_password = "admin";
$mysql_database = "id2463452_db_project";

$db = mysqli_connect($mysql_hostname,$mysql_username, $mysql_password,$mysql_database)
or die("Something is broken");

$name = $_POST['uname'];
$pass = $_POST['pwd'];

$query = mysqli_query($db, "Select * from users_tbl where email = '$name' and password = '$pass' ") or die('Not working');

if($query_row=mysqli_fetch_assoc($query))
{
$_SESSION["uname"] = $name;
$_SESSION["fname"]=$query_row['fname'];
$_SESSION["plan"]=$query_row['plan'];
header('Location: index.php');

}
else
{
echo 'You are not registered with us! Register yourself asap <a href="membership.php">here.</a>';
}

?>
<?php 

$host = "localhost";
$username = "root";
$password = "";
$database = "addbyb_db";

$con = mysqli_connect("$host","$username","$password", "$database");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if(!$con)
{
    header("Location: ../errors/db_error.php");
    die();
};

?>
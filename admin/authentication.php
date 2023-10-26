<?php
session_start();
include('config/db_con.php');

if(!isset($_SESSION['auth'])) 
{
    $_SESSION['massage-home'] = "Login to Access Dashboard";
    header("Location : ../login.php");
    exit(0);
} 
else if($_SESSION == ''){
    header("Location : ../login.php");
}
else 
{
    
    // if($_SESSION['role_as'] != "1") {
    //     $_SESSION['massage'] = "You are not authorised as Admin";
    //     header("Location : ../login.php");
    //     exit(0);
    // }
    // else($_SESSION['role_as'] != "0") {
    //     $_SESSION['massage-home'] = "You are not authorised as Admin";
    //     header("Location : ../index.php");
    //     exit(0);
    // }
}

?>

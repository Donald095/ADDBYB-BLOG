<?php
session_start();
include('config/db_con.php');

    $post_id = $_REQUEST['post_id'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $website = $_REQUEST['website'];
    $message = $_REQUEST['message'];
    $query = "INSERT INTO `comment`(`POST_ID`, `NAME`, `EMAIL`, `WEBSITE`, `MESSAGE`) VALUES  ('$post_id','$name','$email','$website','$message')";
    $query_run = mysqli_query($con, $query); 

    if ($query_run) 
    {
        echo "Successfully";
    } 
    else {
        echo "Failed to execute query.";
    }    



?>
<?php
session_start();
include('admin/authentication.php');

if(isset($_POST['contact_submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $query = "INSERT INTO contact (name,email,phone_no,subject,message) VALUES ('$name','$email','$phone_no','$subject','$message')";
    $query_run = mysqli_query($con, $query); 

    if ($query_run) 
    {
        $_SESSION["massage"] = "Mail Sand Successfully.";
        header("Location: contact.php");
        exit(0);
    } 
    else {
        $_SESSION["massage"] = "something want wrong.";
        header("Location: contact.php");
        exit(0);
    }    

}

?>
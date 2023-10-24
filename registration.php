<?php
session_start();
include ('admin/config/db_con.php');

if (isset($_POST["register_btn"])) {
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($con, $_POST["cpassword"]);

    if ($password == $confirm_password) {
        $checkemail = "SELECT email FROM users WHERE email='$email'";
        $checkemail_run = mysqli_query($con, $checkemail);
        if (mysqli_num_rows($checkemail_run) > 0) {
            $_SESSION["massage"] ="You have already registered your email id..!";
            header("Location: register.php");
            exit(0);
        } 
        else {
            $user_query = "INSERT INTO users (name,email,username,password) VALUES ('$name','$email','$username','$password')";
            $user_query_run = mysqli_query($con, $user_query);
            if ($user_query_run) {
                $_SESSION["massage"] = "Registered Successfully..!";
                header("Location: login.php");
                exit(0);
            } 
            else {
                $_SESSION["massage"] = "something want wrong..!";
                header("Location: register.php");
                exit(0);
            }
        }
    } 
    else {
        $_SESSION["massage"] = "Password and Confirm Password dese not match..!";
        header("Location: register.php");
        exit(0);
    }
} 
else {
    header("Location: register.php");
    exit(0);
}

?>

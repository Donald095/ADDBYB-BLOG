<?php
include ('authentication.php');


if(isset($_POST['add_post']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_Keywords = $_POST['meta_Keywords'];
    $status = $_POST['status'];
    $image = $_FILES['image']['name'];
    $image_extention = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extention;
    $query = "INSERT INTO posts (category_id,name,slug,description,image,meta_title,meta_description,meta_Keywords,status) VALUES ('$category_id','$name','$slug','$description','$filename','$meta_title','$meta_description','$meta_Keywords','$status')";
    $query_run = mysqli_query($con, $query); 

    if ($query_run) 
    {
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/'.$filename);
        $_SESSION["massage"] = "Post Added Successfully.";
        header("Location: add-post.php");
        exit(0);
    } 
    else {
        $_SESSION["massage"] = "something want wrong.";
        header("Location: add-post.php");
        exit(0);
    }    
}


if(isset($_POST['add_category']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_Keywords = $_POST['meta_Keywords'];
    $navbar_status = $_POST['navbar_status'];
    $status = $_POST['status'];

    $query = "INSERT INTO categories (name,slug,description,meta_title,meta_description,meta_Keywords,navbar_status,status) VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_Keywords','$navbar_status','$status')";
    $query_run = mysqli_query($con, $query); 
    if ($query_run) {
        $_SESSION["massage"] = "Category Added Successfully.";
        header("Location: add-category.php");
        exit(0);
    } 
    else {
        $_SESSION["massage"] = "something want wrong.";
        header("Location: add-category.php");
        exit(0);
    }    
}


if(isset($_POST['add_admin']))
{
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($con, $_POST["cpassword"]);
    $role_as = mysqli_real_escape_string($con, $_POST['role_as']);
    $status = mysqli_real_escape_string($con,$_POST['status']);
    if($password == $confirm_password) {
        $checkemail = "SELECT email FROM users WHERE email='$email'";
        $checkemail_run = mysqli_query($con, $checkemail);
        if (mysqli_num_rows($checkemail_run) > 0) {
            $_SESSION["massage"] ="You have already registered your email id.";
            header("Location: add-admin.php");
            exit(0);
    }
    else{
        $query = "INSERT INTO users (name,email,username,password,role_as,status) VALUES ('$name','$email','$username','$password','$role_as','$status')";
        $query_run = mysqli_query($con, $query);    
        if ($query_run) {
            $_SESSION["massage"] = "Admin/Users Added Successfully.";
            header("Location: view-register.php");
            exit(0);
        } 
        else {
            $_SESSION["massage"] = "something want wrong.";
            header("Location: view-register.php");
            exit(0);
        }
    }
}
else {
    $_SESSION["massage"] = "Password and Confirm Password dese not match.";
    header("Location: view-register.php");
    exit(0);
}

}
else {
 $_SESSION["massage"] = "something want wrong.";
    header("Location: view-register.php");
    exit(0);
}

?>
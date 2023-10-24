<?php
include ('authentication.php');

if(isset($_POST['update_post']))
{
   $post_id = $_POST['post_id'];
   $name = $_POST['name'];
   $slug = $_POST['slug'];
   $description = $_POST['description'];
   $meta_title = $_POST['meta_title'];
   $meta_description = $_POST['meta_description'];
   $meta_Keywords = $_POST['meta_Keywords'];
   $image = $_FILES['image'];
   $status = $_POST['status'];
   $query = "UPDATE posts SET category_id ='$category_id', name='$name', slug='$slug', description='$description', image='$image', meta_title='$meta_title', meta_description='$meta_description', meta_Keywords='$meta_Keywords', status='$status'
              WHERE id='$post_id' ";
    $query_run = mysqli_query($con, $query);    
    if($query_run)
    {
       $_SESSION['massage'] ="Updated Successfully";
       header('Location: view-post.php');
       exit(0);

    }    
}
if(isset($_POST['update_category']))
{
   $category_id = $_POST['category_id'];
   $name = $_POST['name'];
   $slug = $_POST['slug'];
   $description = $_POST['description'];
   $meta_title = $_POST['meta_title'];
   $meta_description = $_POST['meta_description'];
   $meta_Keywords = $_POST['meta_Keywords'];
   $navbar_status = $_POST['navbar_status'];
   $status = $_POST['status'];
   $query = "UPDATE categories SET name='$name', slug='$slug', description='$description', meta_title='$meta_title', meta_description='$meta_description', meta_Keywords='$meta_Keywords', navbar_status='$navbar_status', status='$status'
              WHERE id='$category_id' ";
    $query_run = mysqli_query($con, $query);    
    if($query_run)
    {
       $_SESSION['massage'] ="Updated Successfully";
       header('Location: view-category.php');
       exit(0);

    }    
}
if(isset($_POST['update_user']))
   {
       $user_id = $_POST['user_id'];
       $name = $_POST['name'];
       $email = $_POST['email'];
       $username = $_POST['username'];
       $password = $_POST['password'];
       $role_as = $_POST['role_as'];
       $status = $_POST['status'];
       $query = "UPDATE users SET name='$name', email='$email', username='$username', password='$password', role_as='$role_as', status='$status'
                  WHERE id='$user_id' ";
        $query_run = mysqli_query($con, $query);    
        if($query_run)
        {
           $_SESSION['massage'] ="Updated Successfully";
           header('Location: view-register.php');
           exit(0);
   
        }    
   }

?>
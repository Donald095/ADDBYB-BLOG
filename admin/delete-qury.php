<?php
   include ('authentication.php');
  

   if(isset($_POST['post_delete']))
   {
       $post_delete = $_POST['post_delete'];
       $query = "DELETE FROM posts WHERE id='$post_delete' ";
       $query_run = mysqli_query($con, $query);    
       if($query_run)
       {
          $_SESSION['massage'] ="Permanently Deleted Successfully.";
          header('Location: view-post.php');
          exit(0);
       }    
   }
   if(isset($_POST['category_delete']))
   {
       $category_delete = $_POST['category_delete'];
       $query = "DELETE FROM categories WHERE id='$category_delete' ";
       $query_run = mysqli_query($con, $query);    
       if($query_run)
       {
          $_SESSION['massage'] ="Permanently Deleted Successfully.";
          header('Location: view-category.php');
          exit(0);
       }    
   }
   if(isset($_POST['post_trash']))
   {
       $post_trash = $_POST['post_trash'];
       $query = "UPDATE posts SET status='2' WHERE id='$post_trash' ";
       //$query = "DELETE FROM categories WHERE id='$category_id' ";
       $query_run = mysqli_query($con, $query);    
       if($query_run)
       {
          $_SESSION['massage'] ="Post Deleted Successfully.";
          header('Location: view-post.php');
          exit(0);
       }    
   }
   if(isset($_POST['user_delete']))
   {
       $user_id = $_POST['user_delete'];
       $query = "DELETE FROM users WHERE id='$user_id' ";
       $query_run = mysqli_query($con, $query);    
       if($query_run)
       {
          $_SESSION['massage'] ="User/Admin Deleted Successfully.";
          header('Location: view-register.php');
          exit(0);
       }    
   }
?>
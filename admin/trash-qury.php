<?php
   include ('authentication.php');
   if(isset($_POST['category_trash']))
   {
       $category_trash = $_POST['category_trash'];
       $query = "UPDATE categories SET status='2' WHERE id='$category_trash' ";
       //$query = "DELETE FROM categories WHERE id='$category_id' ";
       $query_run = mysqli_query($con, $query);    
       if($query_run)
       {
          $_SESSION['massage'] ="Category Deleted Successfully.";
          header('Location: view-category.php');
          exit(0);
       }    
   }
  
   if(isset($_POST['category_active']))
   {
       $category_active = $_POST['category_active'];
       $query = "UPDATE categories SET status='1' WHERE id='$category_active' ";
       //$query = "DELETE FROM categories WHERE id='$category_id' ";
       $query_run = mysqli_query($con, $query);    
       if($query_run)
       {
          $_SESSION['massage'] ="Category Added Successfully.";
          header('Location: trash-category.php');
          exit(0);
       }    
   }
   
   if(isset($_POST['post_active']))
   {
       $post_active = $_POST['post_active'];
       $query = "UPDATE posts SET status='1' WHERE id='$post_active' ";
       //$query = "DELETE FROM categories WHERE id='$category_id' ";
       $query_run = mysqli_query($con, $query);    
       if($query_run)
       {
          $_SESSION['massage'] ="Post Added Successfully.";
          header('Location: trash-post.php');
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
?>
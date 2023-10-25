<?php
include ('authentication.php');


if(isset($_POST['update_slider']))
{
   $slider_id = $_POST['slider_id'];
   $id = $_POST['id'];
   $title = $_POST['title'];
   $description = $_POST['description'];
   $status = $_POST['status'];
   $image = $_FILES['image']['name'];
   $image_extention = pathinfo($image, PATHINFO_EXTENSION);
   $filename = time().'.'.$image_extention;
   $query = "UPDATE slider SET category_id='$id', title='$title', description='$description', status='$status', image='$filename'
              WHERE id='$slider_id' ";
    $query_run = mysqli_query($con, $query);    
    if($query_run)
    {
      move_uploaded_file($_FILES['image']['tmp_name'], '../images/sliders/'.$filename);
       $_SESSION['massage'] ="Updated Successfully";
       header('Location: view-slider.php');
       exit(0);

    }    
}

if(isset($_POST['add_slider']))
{ 
    $category_id = $_POST['category_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $image = $_FILES['image']['name'];
    $image_extention = pathinfo($image, PATHINFO_EXTENSION);
    $imagename = time().'.'.$image_extention;
    $query = "INSERT INTO slider (category_id,title,description,status,image) VALUES ('$category_id','$title','$description','$status','$imagename')";
    $query_run = mysqli_query($con, $query); 

    if ($query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/sliders/'.$imagename);
        $_SESSION["massage"] = "Slider Added Successfully.";
        header("Location: add-slider.php");
        exit(0);
    } 
    else {
        $_SESSION["massage"] = "something want wrong.";
        header("Location: add-slider.php");
        exit(0);
    }    
}

?>
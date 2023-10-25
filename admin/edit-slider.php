<?php
   include ('layout/header.php');
   include ('layout/side-bar.php');
   ?>
<main id="main" class="main min-vh-100">
   <div class="pagetitle">
      <h1>Slider</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Slider</li>
         </ol>
      </nav>
   </div>
   <?php include ('massage.php'); ?>
   <section class="section">
      <div class="row">
         <div class="col-lg-12 ">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title p-0 m-0">Edit Slider</h5>
               </div>
               <div class="card-body">
                <?php

                if(isset($_GET['id']))
                {
                    $slider_id = $_GET['id']; 
                    $post_edit = "SELECT * FROM slider WHERE id='$slider_id'";
                    $post_run = mysqli_query($con, $post_edit);
                   
                    if(mysqli_num_rows($post_run) > 0)
                    {
                        $row = mysqli_fetch_array($post_run)
                        ?>

                  <form action="slider-query.php" method="POST" enctype="multipart/form-data" class="row align-items-end g-3 p-3 fs-8 ">
                  <input type="hidden" name="slider_id" value="<?=$row['id'];?>" class="form-control form-control-sm" id="id">

                  <div class="col-6">
                        <label for="name" class="form-label">Category Name</label>
                        <?php
                           $category = "SELECT * FROM categories WHERE status='1' ";
                           $category_run = mysqli_query($con,$category);
                           if(mysqli_num_rows($category_run) > 0)
                           {
                               ?>
                        <select name="id" class="form-select form-select-sm" required>
                           <option value="">--Select Category--</option>
                           <?php
                              foreach($category_run as $categoryitem)
                              {
                                ?>
                           <option value="<?= $categoryitem['id']?>" <?= $categoryitem['id'] == $row['category_id'] ? 'selected' : ''?>>
                           <?= $categoryitem['name']?>
                        </option>
                           <?php
                              }
                              ?>
                        </select>
                        <?php
                           }
                           else
                           {
                            ?>
                        <select name="status" class="form-select form-select-sm">
                           <option value="">No Category </option>
                        </select><?php
                           }
                           ?>
                     </div>
                     <div class="col-6">
                        <label for="name" class="form-label ">Slider Name</label>
                        <input type="text" name="title" value="<?=$row['title'];?>" class="form-control form-control-sm" id="name">
                     </div>
                     
                     <div class="col-12">
                        <label for="description" class="form-label">Slider Description</label>
                        <textarea type="text" name="description" value="<?=$row['description'];?>" class="form-control form-control-sm" rows="4"> <?=$row['description'];?></textarea>
                     </div>
                     
                     <div class="col-6">
                     <label for="image" class="form-label">Upload Slider Image</label>
                        <input type="file" name="image" value="<?=$row['image'];?>" class="form-control form-control-sm" id="image">
                        <?php
                            $filename = "../images/sliders/" .$row['image'];
                            $imgSrc = file_exists($filename) ? $filename : "../uploads/posts/noimage.png";?>
                            <img width="50px" height="29px" src=<?php echo $imgSrc?>
                            ?>
                     </div>
                     <div class="col-6">
                        <label for="status" class="form-label">Status </label>
                        <select id="status"  name="status" class="form-select form-select-sm">
                           <option value="" selected>--Select Status--</option>
                           <option value="1" <?= $row['status'] == '1' ? 'selected':'' ?>>Active</option>
                           <option value="0" <?= $row['status'] == '0' ? 'selected':'' ?>>Inactive</option>
                        </select>
                        <span class=" w-100 d-block" style="height:29px"></span>
                     </div>
                     <div class="col-12 text-center">
                        <button type="submit" name="update_slider" class="btn btn-success btn-sm btn-rounded">Update Slider</button>
                     </div>
                  </form>
                  <?php
                  }
                          }
                          else
                          {
                              ?>
                              <h4>No Record Found</h4>
                              <?php
                          }
                    
                ?>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
</main>
<?php include 'layout/footer.php'?>
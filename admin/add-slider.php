<?php
   include ('authentication.php');
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
                  <h5 class="card-title p-0 m-0">Add Slider</h5>
               </div>
               <div class="card-body">  
                  <form action="slider-query.php" method="POST" enctype="multipart/form-data" class="row align-items-end g-3 p-3 fs-8 ">
                  <div class="col-6">
                  <label for="name" class="form-label ">Category Name</label>
                        <?php
                           $category = "SELECT * FROM categories WHERE status='1' ";
                           $category_run = mysqli_query($con,$category);
                           if(mysqli_num_rows($category_run) > 0)
                           {
                               ?>
                        <select name="category_id" class="form-select form-select-sm" required>
                           <option value="">--Select Category--</option>
                           <?php
                              foreach($category_run as $categoryitem)
                              {
                                  ?>
                           <option value="<?= $categoryitem['id']?>"><?= $categoryitem['name']?></option>
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
                        <input type="text" name="title" class="form-control form-control-sm" id="name" required>
                     </div>
                     
                   
                     <div class="col-12">
                        
                        <label for="description" class="form-label">Slider Description</label>
                         <textarea type="text" name="description" class="form-control form-control-sm" rows="4"> </textarea>
                     </div>
                  
                     <div class="col-6">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" name="image" aria-describedby="image" class="form-control form-control-sm" id="image" required>
                        <small id="image" class="form-text text-muted">Size should be in 700*435 px.</small>

                     </div>
                     <div class="col-6">
                        <label for="status" class="form-label">Status </label>
                        <select id="status"  name="status" aria-describedby="status" class="form-select form-select-sm" required>
                           <option value="" selected>--Select Status--</option>
                           <option value="1">Active</option>
                           <option value="0">Inactive</option>
                        </select>
                        <small id="status" class="form-text text-muted">Please select active.</small>
                     </div>
                     <div class="col-12 text-center">
                        <button type="submit" name="add_slider" class="btn btn-success btn-sm btn-rounded">Add Slider</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
</main>
<?php include 'layout/footer.php'?>
<?php
   include ('layout/header.php');
   include ('layout/side-bar.php');
   ?>
<main id="main" class="main min-vh-100">
   <div class="pagetitle">
      <h1>Post</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Post</li>
         </ol>
      </nav>
   </div>
   <?php include ('massage.php'); ?>
   <section class="section">
      <div class="row">
         <div class="col-lg-12 ">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title p-0 m-0">Add Post</h5>
               </div>
               <div class="card-body">
                  <form action="add-qury.php" method="POST" enctype="multipart/form-data" class="row align-items-end g-3 p-3 fs-8 ">
                     <div class="col-12">
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
                        <label for="name" class="form-label ">Post Name</label>
                        <input type="text" name="name" class="form-control form-control-sm" id="name" required>
                     </div>
                     <div class="col-6">
                        <label for="slug" class="form-label">Post Slug (URL)</label>
                        <input type="text" name="slug" class="form-control form-control-sm" id="slug">
                     </div>
                     <div class="col-12">
                        <label for="description" class="form-label">Post Description</label>
                        <textarea type="text" name="description" class="form-control form-control-sm" rows="4"> </textarea>
                     </div>
                     <div class="form-text title mt-5">
                        <h5 class="card-title p-0 m-0"> This Area will be SCO Purpose</h5>
                     </div>
                     <div class="col-12">
                        <label for="meta_title" class="form-label">Meta Title</label>
                        <input type="text"  name="meta_title" maxlength="250"class="form-control form-control-sm" id="meta_title">
                     </div>
                     <div class="col-6">
                        <label for="description" class="form-label">Meta Description</label>
                        <textarea type="text" name="meta_description" class="form-control form-control-sm" rows="4"> </textarea>
                     </div>
                     <div class="col-6">
                        <label for="meta_Keywords" class="form-label">Meta Keywords</label>
                        <textarea type="text" name="meta_Keywords" class="form-control form-control-sm" rows="4"> </textarea>
                     </div>
                     <div class="col-6">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control form-control-sm" id="image">
                     </div>
                     
                     <div class="col-6">
                        <label for="status" class="form-label">Post Status </label>
                        <select id="status"  name="status" class="form-select form-select-sm">
                           <option value="" selected>--Select Status--</option>
                           <option value="1">Active</option>
                           <option value="0">Inactive</option>
                        </select>
                     </div>
                    
                     <div class="col-12 text-center">
                        <button type="submit" name="add_post" class="btn btn-success btn-sm btn-rounded">Add Post</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<?php include 'layout/footer.php'?>
<?php
   include ('layout/header.php');
   include ('layout/side-bar.php');
   ?>
<main id="main" class="main min-vh-100">
   <div class="pagetitle">
      <h1>Category</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Category</li>
         </ol>
      </nav>
   </div>
   <?php include ('massage.php'); ?>
   <section class="section">
      <div class="row">
         <div class="col-lg-12 ">
            <div class="card">
               <div class="card-header">
                  <h5 class="card-title p-0 m-0">Edit Category</h5>
               </div>
               <div class="card-body">
                <?php

                if(isset($_GET['id']))
                {
                    $category_id = $_GET['id']; 
                    $category_edit = "SELECT * FROM categories WHERE id='$category_id'";
                    $category_run = mysqli_query($con, $category_edit);
                    $num = mysqli_num_rows($category_run);
                    if($num > 0)
                    {
                        while($row = mysqli_fetch_array($category_run))
                        {
                        ?>
                  <form action="update-qury.php" method="POST" enctype="multipart/form-data" class="row align-items-end g-3 p-3 fs-8 ">
                  <input type="hidden" name="category_id" value="<?=$row['id'];?>" class="form-control form-control-sm" id="id">
                     <div class="col-6">
                        <label for="name" class="form-label ">Category Name</label>
                        <input type="text" name="name" value="<?=$row['name'];?>" class="form-control form-control-sm" id="name">
                     </div>
                     <div class="col-6">
                        <label for="slug" class="form-label">Category Slug (URL)</label>
                        <input type="text" name="slug" value="<?=$row['slug'];?>" class="form-control form-control-sm" id="slug">
                     </div>
                     <div class="col-12">
                        <label for="description" class="form-label">Category Description</label>
                        <textarea type="text" name="description" value="<?=$row['description'];?>" class="form-control form-control-sm" rows="4"> <?=$row['description'];?></textarea>
                     </div>
                     <div class="col-12">
                        <label for="meta_title" class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" value="<?=$row['meta_title'];?>" class="form-control form-control-sm" id="meta_title">
                     </div>
                     <div class="col-12">
                        <label for="description" class="form-label">Meta Description</label>
                         <textarea type="text" name="meta_description" class="form-control form-control-sm" rows="4"><?=$row['meta_description'];?></textarea>
                     </div>
                     <div class="col-12">
                        <label for="meta_Keywords" class="form-label">Meta Keywords</label>
                         <textarea type="text" name="meta_Keywords" class="form-control form-control-sm" rows="4"><?=$row['meta_Keywords'];?></textarea>
                     </div>

                     <div class="col-4">
                     <label for="image" class="form-label">Upload Image</label>
                        <input type="file" name="image" value="<?=$row['image'];?>"  class="form-control form-control-sm" id="image">
                        <?php
                            $filename = "../uploads/category/" .$row['image'];
                            $imgSrc = file_exists($filename) ? $filename : "../uploads/posts/noimage.png";?>
                            <img width="50px" height="29px" src=<?php echo $imgSrc?>
                            ?>
                     </div>
                     <div class="col-4">
                        <label for="navbar_status" class="form-label">Navbar Status </label>
                        <select id="navbar_status"  name="navbar_status" class="form-select form-select-sm">
                           <option value="" selected>--Select Navbar Status--</option>
                           <option value="1" <?= $row['navbar_status'] == '1' ? 'selected':'' ?>>Active</option>
                           <option value="0" <?= $row['navbar_status'] == '0' ? 'selected':'' ?>>Inactive</option>
                        </select>
                        <span class=" w-100 d-block" style="height:29px"></span>
                     </div>
                     <div class="col-4">
                        <label for="status" class="form-label">Status </label>
                        <select id="status"  name="status" class="form-select form-select-sm">
                           <option value="" selected>--Select Status--</option>
                           <option value="1" <?= $row['status'] == '1' ? 'selected':'' ?>>Active</option>
                           <option value="0" <?= $row['status'] == '0' ? 'selected':'' ?>>Inactive</option>
                        </select>
                        <span class=" w-100 d-block" style="height:29px"></span>
                     </div>
                     <div class="col-12 text-center">
                        <button type="submit" name="update_category" class="btn btn-success btn-sm btn-rounded">Update Category</button>
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
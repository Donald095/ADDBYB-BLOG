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
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="card-title p-0 m-0">View Slider</h5>
                  <a href="add-slider.php" class="btn btn-primary btn-sm btn-rounded">Add Slider</a>
               </div>
               <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered list-tbl caption-top text-center">
                  <caption><small >List of Slider</small></caption>
                     <thead class="table-light">
                        <tr class="text-Secondary">
                           <th class="align-middle">SR. No.</th>
                           <th>Title</th>
                           <th>Category Name</th>
                           <th>Description</th>
                           <th>Image</th>
                           <th>Status</th>
                           <th>Edit</th>
                           <th>Delete</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $query = "SELECT sld.*, category.name AS category_name FROM slider sld, categories category WHERE category.id = sld.category_id AND sld.status IN(0,1) ORDER BY id desc";
                           $query_run = mysqli_query($con, $query);
                           if(mysqli_num_rows($query_run) > 0)
                           { 
                              $id=0;         
                              foreach( $query_run as $row)
                              {
                                 $id=$id+1; 
                               ?>
                        <tr>
                           <td class="align-middle"><?= $id ?>.</td>
                           <td class="align-middle"><?= $row['title']; ?></td>
                           <td class="align-middle"><?= $row['category_name']; ?></td>
                           <td class="align-middle"><?= $row['description']; ?></td>
                           <td class="align-middle">
                           <?php
                            $filename = "../images/sliders/" .$row['image'];
                            $imgSrc = file_exists($filename) ? $filename : "../uploads/posts/noimage.png";?>
                            <img width="50px" src=<?php echo $imgSrc?>
                            ?>
                           </td>

                           <td class="align-middle">
                           <?php
                           if($row['status'] == '1')
                                 { 
                                    $name = 'Active'; 
                                    echo "<span class='badge rounded-pill badge-success d-inline-block'>$name </span>";
                                
                                 }
                                 elseif($row['status'] == '0')
                                 { 
                                    $name = 'Inactive'; 
                                    echo "<span class='badge badge-warning rounded-pill d-inline-block'>$name</span>";
                                 }
                                 ?>
                           </td>
                           
                           <td class="align-middle"><a href="edit-slider.php?id=<?=$row['id'];?>" class="btn btn-success btn-sm btn-rounded py-0 px-2">Edit</a></td>
                           <td class="align-middle">
                           <form action="delete-qury.php" method="POST" class="m-0">  
                           <button type="submit" name="post_trash" value="<?=$row['id'];?>" class="btn btn-danger btn-sm btn-rounded py-0 px-2">Delete</button>
                           </form>
                        </td>
                        </tr>

                        <?php
                           }
                           
                           }
                           else
                           {
                           ?>
                        <tr>
                           <td colspan="6"> No Record Found.</td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                  </table>
                 </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
</main>


<?php include 'layout/footer.php'?>
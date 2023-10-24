<?php
   include ('authentication.php');
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
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="card-title p-0 m-0">Trash Category</h5>
                  <a href="view-category.php" class="btn btn-primary btn-sm btn-rounded">View Category</a>
               </div>
               <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered list-tbl caption-top text-center">
                  <caption><small >List of Trash</small></caption>
                  <thead class="table-light">
                        <tr class="text-Secondary">
                           <th rowspan="2" class="align-middle">SR. No.</th>
                           <th rowspan="2" class="align-middle w-25">Name</th>
                           <th rowspan="2" class="align-middle w-25">Description</th>
                           <th rowspan="2" class="align-middle w-25">Status</th>
                           <th colspan="2" class="align-middle w-25">Edit</th>
                          
                        </tr>
                        <tr class="text-Secondary">
                        <th class="align-middle">Active</th>
                           <th class="align-middle">Permanently Delete</th>
                          
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $query = "SELECT * FROM categories WHERE status = 2";
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
                           <td class="align-middle"><?= $row['name']; ?></td>
                       
                           <td class="align-middle"><?= $row['description']; ?></td>
                           
                           <td class="align-middle">
                           <?php
                           if($row['status'] == '2')
                                 { 
                                     $name = 'Trash'; 
                                    echo "<span class='badge rounded-pill bg-danger d-inline-block'>$name </span>";
                                
                                 }
                                
                                 ?>
                           </td>
                           
                        
                           <td class="align-middle">
                           <form action="trash-qury.php" method="POST">  
                           <button type="submit" name="category_active" value="<?=$row['id'];?>" class="btn btn-success btn-sm btn-rounded py-0 px-2">Active</button>
                           </form>
                        </td>
                        <td class="align-middle">
                           <form action="delete-qury.php" method="POST">  
                           <button type="submit" name="category_delete" value="<?=$row['id'];?>" class="btn btn-danger btn-sm btn-rounded py-0 px-2">Delete</button>
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
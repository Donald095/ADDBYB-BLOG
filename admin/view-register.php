<?php
   include ('authentication.php');
   include ('layout/header.php');
   include ('layout/side-bar.php');
   ?>
<main id="main" class="main min-vh-100">
   <div class="pagetitle">
      <h1>Users</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
         </ol>
      </nav>
   </div>
   <?php include ('massage.php'); ?>
   <section class="section">
      <div class="row">
         <div class="col-lg-12 ">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="card-title p-0 m-0">Registered Users</h5>
                  <a href="add-admin.php" class="btn btn-primary btn-sm btn-rounded">Add Admin</a>
               </div>
               <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered list-tbl caption-top text-center">
                  <caption><small >List of Users</small></caption>
                     <thead class="table-light">
                        <tr class="text-Secondary">
                           <th class="align-middle">SR. No.</th>
                           <th>Name</th>
                           <th>Email id</th>
                           <th>User Name</th>
                           <th>Role</th>
                           <th>Status</th>
                           <th>Edit</th>
                           <th>Delete</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $query = "SELECT * FROM users";
                           $query_run = mysqli_query($con, $query);
                           if(mysqli_num_rows($query_run) > 0)
                           { 
                              $counter=0;         
                              foreach( $query_run as $row)
                              {
                                 $counter=$counter+1; 
                               ?>
                              
                        <tr>
                           <td class="align-middle"><?= $counter ?>.</td>
                           <td class="align-middle"><?= $row['name']; ?></td>
                           <td class="align-middle"><?= $row['email']; ?></td>
                           <td class="align-middle"><?= $row['username']; ?></td>
                           <td class="align-middle">
                              <?php
                                 if($row['role_as'] == '1')
                                 {
                                    echo 'Admin';
                                 
                                 }
                                 elseif($row['role_as'] == '0')
                                 {
                                    echo 'User';
                                 }
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
                           <td class="align-middle"><a href="edit-register.php?id=<?=$row['id'];?>" class="btn btn-success btn-sm btn-rounded py-0 px-2">Edit</a></td>
                           <td class="align-middle">
                           <form action="delete-qury.php" method="POST">  
                           <button type="submit" name="user_delete" id="myAlert" value="<?=$row['id'];?>" class="btn btn-danger btn-sm btn-rounded py-0 px-2">Delete</button>
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
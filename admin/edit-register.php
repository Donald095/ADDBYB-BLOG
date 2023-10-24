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
               <div class="card-header">
                  <h5 class="card-title p-0 m-0">Edit Users</h5>
               </div>
               <div class="card-body">
                <?php

                if(isset($_GET['id']))
                {
                    $user_id = $_GET['id']; 
                    $users = "SELECT * FROM users WHERE id='$user_id'";
                    $users_run = mysqli_query($con,$users);

                    if(mysqli_num_rows( $users_run ) > 0)
                    {
                        foreach($users_run as $user)
                        {
                        ?>
                      
                       
                  <form action="update-qury.php" method="POST" class="row align-items-end g-3 p-3 fs-8 ">
                  <input type="hidden" name="user_id" value="<?=$user['id'];?>" class="form-control form-control-sm" id="id">
                     <div class="col-6">
                        <label for="name" class="form-label ">Name</label>
                        <input type="text" name="name" value="<?=$user['name'];?>" class="form-control form-control-sm" id="name">
                     </div>
                     <div class="col-6">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text"  name="username" value="<?=$user['username'];?>" class="form-control form-control-sm" id="user_name">
                     </div>
                     <div class="col-6">
                        <label for="email" class="form-label">Email Id</label>
                        <input type="email"  name="email" value="<?=$user['email'];?>" class="form-control form-control-sm" id="email">
                     </div>
                     <div class="col-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"  name="password" value="<?=$user['password'];?>" class="form-control form-control-sm" id="password">
                     </div>
                     <div class="col-6">
                        <label for="role_as" class="form-label">Role As </label>
                        <select id="role_as"  name="role_as" class="form-select form-select-sm">
                           <option value="" selected>--Select Role--</option>
                           <option value="1" <?= $user['role_as'] == '1' ? 'selected':'' ?>>Admin</option>
                           <option value="0" <?= $user['role_as'] == '0' ? 'selected':'' ?>>User</option>
                        </select>
                     </div>
                     <div class="col-6">
                        <label for="status" class="form-label">Status </label>
                        <select id="status"  name="status" class="form-select form-select-sm">
                           <option value="" selected>--Select Status--</option>
                           <option value="1" <?= $user['status'] == '1' ? 'selected':'' ?>>Active</option>
                           <option value="0" <?= $user['status'] == '0' ? 'selected':'' ?>>Inactive</option>
                        </select>
                     </div>
                     <div class="col-12 text-center">
                        <button type="submit" name="update_user" class="btn btn-success btn-sm btn-rounded">Update User</button>
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
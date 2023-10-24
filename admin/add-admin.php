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
                  <h5 class="card-title p-0 m-0">Add Admin/Users</h5>
               </div>
               <div class="card-body">  
                  <form action="add-qury.php" method="POST" class="row align-items-end g-3 p-3 fs-8 ">
                  <input type="hidden" name="user_id" class="form-control form-control-sm" id="id">
                     <div class="col-6">
                        <label for="name" class="form-label ">Name</label>
                        <input type="text" name="name" class="form-control form-control-sm" id="name" required>
                     </div>
                     <div class="col-6">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text"  name="username" class="form-control form-control-sm" id="user_name" required>
                     </div>
                     <div class="col-6">
                        <label for="email" class="form-label">Email Id</label>
                        <input type="email"  name="email" class="form-control form-control-sm" id="email" required>
                     </div>
                     <div class="col-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"  name="password" class="form-control form-control-sm" id="password" required>
                     </div>
                     <div class="col-6">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password"  name="cpassword" class="form-control form-control-sm" id="password" required>
                     </div>
                     <div class="col-6">
                        <label for="role_as" class="form-label">Role As </label>
                        <select id="role_as"  name="role_as" class="form-select form-select-sm">
                           <option value="" selected>--Select Role--</option>
                           <option value="1">Admin</option>
                           <option value="0">User</option>
                        </select>
                     </div>
                     <div class="col-6">
                        <label for="status" class="form-label">Status </label>
                        <select id="status"  name="status" class="form-select form-select-sm">
                           <option value="" selected>--Select Status--</option>
                           <option value="1">Active</option>
                           <option value="0">Inactive</option>
                        </select>
                     </div>
                     <div class="col-12 text-center">
                        <button type="submit" name="add_admin" class="btn btn-success btn-sm btn-rounded">Add Admin</button>
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
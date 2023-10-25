<?php
   include ('layout/header.php');
   include ('layout/side-bar.php');
   ?>
<main id="main" class="main min-vh-100">
   <div class="pagetitle">
      <h1>Welcome To Admin Panel</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
         </ol>
      </nav>
   </div>
   <?php include ('massage.php'); ?>
   <section class="section dashboard pt-5">
      <div class="row">
         <div class="col-lg-12">
            <div class="row">
               <div class="col-lg-4 col-md-6">
                  <div class="card info-card sales-card">
                     <div class="card-body">
                        <h5 class="card-title text-center">Active Users</h5>
                        <div class="d-flex align-items-center justify-content-center">
                           <div class="card-icon text-success rounded-circle d-flex align-items-center justify-content-center">
                              <i class="fa fa-user-plus"></i>
                           </div>
                           <div class="ps-3">
                            <?php
                            $query = "SELECT COUNT(id) as data FROM users  WHERE role_as= 0 AND status = 1";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            { 
                              foreach($query_run as $row)
                              { 
                               ?>
                               <h6><?= $row['data']?></h6>
                            <?php
                           }
                           
                           }
                           else
                           {
                           ?> 
                           <h6>No User </h6>

                            <?php
                           }
                           ?>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="card info-card sales-card">
                     <div class="card-body">
                        <h5 class="card-title text-center">Inactive Users</h5>
                        <div class="d-flex align-items-center justify-content-center">
                           <div class="card-icon text-danger rounded-circle d-flex align-items-center justify-content-center">
                              <i class="fa fa-user-times"></i>
                           </div>
                           <div class="ps-3">
                           <?php
                            $query = "SELECT COUNT(id) as data FROM users WHERE role_as= 0 AND status = 0";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            { 
                              foreach($query_run as $row)
                              { 
                               ?>
                               <h6><?= $row['data']?></h6>
                            <?php
                           }
                           
                           }
                           else
                           {
                           ?> 
                           <h6>No User </h6>

                            <?php
                           }
                           ?>
                            
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="card info-card sales-card">
                     <div class="card-body">
                        <h5 class="card-title text-center">Active Admin</h5>
                        <div class="d-flex align-items-center justify-content-center">
                           <div class="card-icon text-primary rounded-circle d-flex align-items-center justify-content-center">
                              <i class="fa fa-user-secret"></i>
                           </div>
                           <div class="ps-3">
                           <?php
                            $query = "SELECT COUNT(id) as data FROM users WHERE role_as = 1 AND status = 1";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            { 
                              foreach($query_run as $row)
                              { 
                               ?>
                               <h6><?= $row['data']?></h6>
                            <?php
                           }
                           
                           }
                           else
                           {
                           ?> 
                           <h6>No User </h6>

                            <?php
                           }
                           ?>
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="card info-card sales-card">
                     <div class="card-body">
                        <h5 class="card-title text-center">Active Category</h5>
                        <div class="d-flex align-items-center justify-content-center">
                           <div class="card-icon text-info rounded-circle d-flex align-items-center justify-content-center">
                              <i class="fa fa-plus-square-o"></i>
                           </div>
                           <div class="ps-3">
                           <?php
                            $query = "SELECT COUNT(id) as data FROM categories WHERE status = 1";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            { 
                              foreach($query_run as $row)
                              { 
                               ?>
                               <h6><?= $row['data']?></h6>
                            <?php
                           }
                           
                           }
                           else
                           {
                           ?> 
                           <h6>No User </h6>

                            <?php
                           }
                           ?>
                            
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="card info-card sales-card">
                     <div class="card-body">
                        <h5 class="card-title text-center">Publish Blogs</h5>
                        <div class="d-flex align-items-center justify-content-center">
                           <div class="card-icon text-warning  rounded-circle d-flex align-items-center justify-content-center">
                              <i class="fa fa-rss-square"></i>
                           </div>
                           <div class="ps-3">
                           <?php
                            $query = "SELECT COUNT(id) as data FROM posts WHERE status = 1";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            { 
                              foreach($query_run as $row)
                              { 
                               ?>
                               <h6><?= $row['data']?></h6>
                            <?php
                           }
                           
                           }
                           else
                           {
                           ?> 
                           <h6>No User </h6>

                            <?php
                           }
                           ?>
                            
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="card info-card sales-card">
                     <div class="card-body">
                        <h5 class="card-title text-center">Contact Us</h5>
                        <div class="d-flex align-items-center justify-content-center">
                           <div class="card-icon text-secondary rounded-circle d-flex align-items-center justify-content-center">
                              <i class="fa fa-envelope"></i>
                           </div>
                           <div class="ps-3">
                           <?php
                            $query = "SELECT COUNT(id) as data FROM contact ";
                            $query_run = mysqli_query($con, $query);
                            if(mysqli_num_rows($query_run) > 0)
                            { 
                              foreach($query_run as $row)
                              { 
                               ?>
                               <h6><?= $row['data']?></h6>
                            <?php
                           }
                           
                           }
                           else
                           {
                           ?> 
                           <h6>No User </h6>

                            <?php
                           }
                           ?>
                            
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               

            </div>
         </div>
      </div>
   </section>
   <section class="quotes">
      <div class="container py-5">
         <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-12 col-xl-10">
               <figure class="bg-light p-4"
                  style="border-left: .35rem solid #f38b1b; border-top: 1px solid #eee; border-right: 1px solid #eee; border-bottom: 1px solid #eee;">
                  <i class="fa fa-quote-left fa-2x mb-4" style="color: #fcdb5e;"></i>
                  <blockquote class="blockquote pb-2">
                     <p>
                        Your time is limited, so don't waste it living someone else's life. Don't be trapped by dogma -
                        which is living with the results of other people's thinking. Don't let the noise of others'
                        opinions drown out your own inner voice. And most important, have the courage to follow your
                        heart and intuition.
                     </p>
                  </blockquote>
                  <figcaption class="blockquote-footer mb-0">
                     Steve Jobs in <cite title="Source Title">Source Title</cite>
                  </figcaption>
               </figure>
            </div>
         </div>
      </div>
   </section>
   
</main>
<?php include 'layout/footer.php'?>
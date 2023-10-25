<?php include('config/db_con.php'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Blogs - ADDBYB Digital Marketing Pvt. Ltd</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <link href="images/favicon.ico" rel="icon">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="css/owl.carousel.min.css" rel="stylesheet">
      <link href="css/bootstrap.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
   </head>
   <body>
      <div class="bg-secondary">
         <div class="container-lg">
            <div class="row align-items-center">
               <div class="col-12">
                  <div class="d-flex justify-content-between">
                     <div class="bg-primary text-white text-center py-2" style="width: 100px;">Tranding</div>
                     <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 120px); padding-left: 90px;">
                     <?php
                           $query = "SELECT * FROM posts WHERE status = 1 ";
                           $query_run = mysqli_query($con, $query);
                           if(mysqli_num_rows($query_run) > 0)
                           { 
                              foreach( $query_run as $row)
                              {
                               ?>


                        <div class="text-truncate"><a class="text-white" href=""> <?= substr($row['description'], 0, 90) ?>....
                     </a></div>
                        <?php
                           }
                           
                           }
                           else
                           {
                           ?>
                        <div class="text-truncate"><a class="text-white" href="">No data found</a></div>

                        <?php
                           }
                           ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="bg-light navbar-light">
         <div class="container-lg p-0 mb-3">
            <nav class="navbar navbar-expand-lg">
               <div class="row align-items-center">
                  <div class="col-8">
                     <a href="" class="navbar-brand d-block d-lg-none">
                     <img src="images/main-logo-01.png" class="img-fluid" alt="main logo" />
                     </a>
                  </div>
                  <div class="col-1"></div>
                  <div class="col-2">
                     <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                  </div>
                  <div class="col-1"></div>
               </div>
               <div class="collapse navbar-collapse  px-0 px-lg-3" id="navbarCollapse">
                  <div class="row align-items-center justify-content-between">
                     <div class="col-lg-2">
                        <a href="" class="navbar-brand d-none d-lg-block">
                        <img src="images/main-logo-01.png" class="img-fluid" alt="main logo" />
                        </a>
                     </div>
                     <div class="col-lg-10">
                        <div class="navbar-nav mr-auto py-0 justify-content-center">
                           <a href="index.php" class="nav-item nav-link active">Home</a>
                           <a href="category.php" class="nav-item nav-link">Categories</a>
                           <a href="single.php" class="nav-item nav-link">Single Blog</a>
                           <a href="contact.php" class="nav-item nav-link">Contact</a>
                           <?php if(isset($_SESSION['auth_user'])) : ?>
                           <div class="nav-item dropdown">
                              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                              <?= $_SESSION['auth_user']['user_name'];?>
                              </a>
                              <div class="dropdown-menu rounded-0 m-0">
                                 <a href="#" class="dropdown-item">Profile</a>
                                 <form action="allcode.php" method="POST">
                                    <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                                 </form>
                              </div>
                           </div>
                           <?php else : ?>
                           <a href="login.php" class="nav-item nav-link">Login</a>
                           <a href="register.php" class="nav-item nav-link">Create Account</a>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </nav>
         </div>
      </div>
      <!-- Navbar End -->
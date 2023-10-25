<?php
   include ('authentication.php');
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Website CMS - Dashboard</title>
  <link href="images/favicon.ico" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="images/logo.png" alt="">
      </a>
      <i class="fa fa-bars toggle-sidebar-btn"></i>
    </div>
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Donald Singh</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Donald Singh</h6>
              <span>Admin</span>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="fa  fa-user-circle-o"></i>
                <span>My Profile</span>
              </a>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
          
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="fa fa-cog"></i>
                <span>Account Settings</span>
              </a>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="fa fa-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <!-- <li>
                <form action="allcode.php" method="POST">
                  <button type="submit" name="logout_btn" class="dropdown-item d-flex align-items-center"><i class="bi bi-box-arrow-right"></i><span>Sign Out</span></button>
                </form>
            </li> -->
          </ul>
        </li>
      </ul>
    </nav>
  </header>
  <!-- End Header -->
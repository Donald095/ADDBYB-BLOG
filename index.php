<?php
   session_start();
   include('layout/header.php');
   include('massage-home.php');
   
   ?>
<!-- Top News Slider Start -->
<div class="container-lg-fluid py-3">
   <div class="container-lg">
      <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
         <?php
            $query = "SELECT * FROM categories WHERE status='1,0' ORDER BY id DESC";
            $query_run = mysqli_query($con, $query);
            if(mysqli_num_rows($query_run) > 0)
            { 
               foreach( $query_run as $row)
               { 
                ?>
         <div class="d-flex">
            <?php
               $filename = "uploads/category/" .$row['image'];
               $imgSrc = file_exists($filename) ? $filename : "../uploads/posts/noimage.png";?>
            <img style="width: 80px; height: 80px; object-fit: cover;" src=<?php echo $imgSrc?>
               ?>
            <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
               <a class="text-secondary font-weight-semi-bold" href="view-category.php?id=<?=$row['id'];?>">
               <strong> <?= $row['name']; ?></strong><br>
               <?= $row['description']; ?>
               </a>
            </div>
         </div>
         <?php
            }
            
            }
            else
            {
            ?>
         <div class="d-flex">
            <img style="width: 80px; height: 80px; object-fit: cover;" src="uploads/posts/noimage.png">
            <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
               <a class="text-secondary font-weight-semi-bold" href="#">
                  <strong>No Title Found.</strong><br>
                  <p>No Description Found.</p>
               </a>
            </div>
         </div>
         <?php
            }
            ?>
      </div>
   </div>
</div>
<!-- Top News Slider End -->
<!-- Main News Slider Start -->
<div class="container-lg-fluid py-3">
   <div class="container-lg">
      <div class="row">
         <div class="col-lg-8">
            <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
               <?php
                  $query = "SELECT sld.*, category.name AS category_name FROM slider sld, categories category WHERE category.id = sld.category_id AND sld.status=1 ORDER BY id desc";
                  $query_run = mysqli_query($con, $query);
                  if (mysqli_num_rows($query_run) > 0) {
                      foreach ($query_run as $row) {
                          ?>
               <div class="position-relative overflow-hidden" style="height: 435px;">
                  <?php
                     $filename = "images/sliders/" . $row['image'];
                     $imgSrc = file_exists($filename) ? $filename : "../uploads/posts/noimage.png"; ?>
                  <img class="img-fluid h-100" style="object-fit: cover;" src=<?php echo $imgSrc ?> ?>
                  <div class="overlay">
                     <div class="mb-1">
                        <a class="text-white" href="">
                        <?= $row['category_name']; ?>
                        </a>
                        <span class="px-2 text-white">/</span>
                        <a class="text-white" href="">
                        <?php
                           $date = strtotime($row['created_at']);
                           // $date= date_create('2008-09-22');
                           echo date("F d, Y", $date);
                           
                           ?>
                        </a>
                     </div>
                     <a class="h2 m-0 text-white font-weight-bold" href="">
                     <?= $row['title']; ?>
                     </a>
                  </div>
               </div>
               <?php
                  }
                  
                  } else {
                  ?>
               <div class="position-relative overflow-hidden" style="height: 435px;">
                  <img class="img-fluid h-100" src="img/news-700x435-2.jpg" style="object-fit: cover;">
                  <div class="overlay">
                     <div class="mb-1">
                        <a class="text-white" href="">Technology</a>
                        <span class="px-2 text-white">/</span>
                        <a class="text-white" href="">January 01, 2045</a>
                     </div>
                     <a class="h2 m-0 text-white font-weight-bold" href="">Sanctus amet sed amet ipsum lorem. Dolores et erat et elitr sea sed</a>
                  </div>
               </div>
               <?php
                  }
                  ?>
               <!-- <div class="position-relative overflow-hidden" style="height: 435px;">
                  <img class="img-fluid h-100" src="img/news-700x435-2.jpg" style="object-fit: cover;">
                  <div class="overlay">
                      <div class="mb-1">
                          <a class="text-white" href="">Technology</a>
                          <span class="px-2 text-white">/</span>
                          <a class="text-white" href="">January 01, 2045</a>
                      </div>
                      <a class="h2 m-0 text-white font-weight-bold" href="">Sanctus amet sed amet ipsum lorem. Dolores et erat et elitr sea sed</a>
                  </div>
                  </div> -->
            </div>
         </div>
         <div class="col-lg-4">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
               <h3 class="m-0">Categories</h3>
               <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            </div>
            <?php
               $cat_data = mysqli_query($con, "SELECT * FROM `categories` WHERE STATUS = '1' ORDER BY `id` DESC LIMIT 0,4");
               while ($row = mysqli_fetch_assoc($cat_data)) {
                   ?>
            <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
               <?php
                  $filename = "uploads/category/" . $row['image'];
                  $imgSrc = file_exists($filename) ? $filename : "uploads/posts/noimage.png"; ?>
               <img class="img-fluid w-100 h-100" style="object-fit: cover;" src=<?php echo $imgSrc ?> ?>
               <a href=""
                  class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
               <?= $row['name'] ?>
               </a>
            </div>
            <?php } ?>
            <!-- <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
               <img class="img-fluid w-100 h-100" src="img/cat-500x80-2.jpg" style="object-fit: cover;">
               <a href=""
                   class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                   Technology
               </a>
               </div>
               <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
               <img class="img-fluid w-100 h-100" src="img/cat-500x80-3.jpg" style="object-fit: cover;">
               <a href=""
                   class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                   Entertainment
               </a>
               </div>
               <div class="position-relative overflow-hidden" style="height: 80px;">
               <img class="img-fluid w-100 h-100" src="img/cat-500x80-4.jpg" style="object-fit: cover;">
               <a href=""
                   class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                   Sports
               </a>
               </div> -->
         </div>
      </div>
   </div>
</div>
<!-- Main News Slider End -->
<!-- Featured News Slider Start -->
<div class="container-lg-fluid py-3">
   <div class="container-lg">
      <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
         <h3 class="m-0">Featured</h3>
         <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
      </div>
      <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
         <?php
            $cat_data = mysqli_query($con, "SELECT * FROM `categories` WHERE STATUS = '1' ORDER BY `id` DESC ");
            while ($row = mysqli_fetch_assoc($cat_data)) {
                $cat_id = $row['id'];
            
                $post_data = mysqli_query($con, "SELECT * FROM `posts` WHERE `category_id` = '" . $cat_id . "' ORDER BY `id` DESC");
                while ($post_da = mysqli_fetch_assoc($post_data)) {
                    ?>
         <div class="position-relative overflow-hidden" style="height: 300px;">
            <img class="img-fluid w-100 h-100" src="uploads/posts/<?= $post_da['image'] ?>"
               style="object-fit: cover;">
            <div class="overlay">
               <div class="mb-1" style="font-size: 13px;">
                  <a class="text-white" target="_blank" href="post_detail.php?id=<?= $post_da['id'] ?>">
                  <?= $row['name'] ?>
                  </a>
                  <span class="px-1 text-white">/</span>
                  <a class="text-white" href="post_detail.php?id=<?= $post_da['id'] ?>">
                  <?= date('F  d, Y', strtotime($post_da['created_at'])) ?>
                  </a>
               </div>
               <a class="h4 m-0 text-white" target="_blank" href="post_detail.php?id=<?= $post_da['id'] ?>">
               <?= $post_da['name'] ?>
               </a>
            </div>
         </div>
         <?php }
            } ?>
      </div>
   </div>
</div>
</div>
<!-- Featured News Slider End -->
<!-- Category News Slider Start -->
<div class="container-lg-fluid">
   <div class="container-lg">
      <div class="row">
         <?php
            $cat_data = mysqli_query($con, "SELECT * FROM `categories` WHERE STATUS = '1' ORDER BY `id` DESC");
            $cat_num_rows = mysqli_num_rows($cat_data);
            
            for ($j = 0; $j < 4; $j++) {
                $row = mysqli_fetch_assoc($cat_data);
                $cat_id = $row['id'];
            
                $check_post_data = mysqli_query($con, "SELECT * FROM `posts` WHERE `category_id` = '" . $cat_id . "'");
                $check_num_rows = mysqli_num_rows($check_post_data);
                if ($check_num_rows == 0) {
                    continue;
                }
            
            
                ?>
         <div class="col-lg-6 py-3">
            <div class="bg-light py-2 px-4 mb-3">
               <h3 class="m-0">
                  <?= $row['name'] ?>
               </h3>
            </div>
            <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
               <?php
                  $post_data = mysqli_query($con, "SELECT * FROM `posts` WHERE `category_id` = '" . $cat_id . "' ORDER BY `id` DESC LIMIT 0,4");
                  $num_rows = mysqli_num_rows($post_data);
                  
                  for ($i = 0; $i < $num_rows; $i++) {
                      $post_da = mysqli_fetch_assoc($post_data);
                      ?>
               <div class="position-relative">
                  <img class="img-fluid w-100" src="uploads/posts/<?= $post_da['image'] ?>"
                     style="object-fit: cover;">
                  <div class="overlay position-relative bg-light">
                     <div class="mb-2" style="font-size: 13px;">
                        <a target="_blank" href="post_detail.php?id=<?= $post_da['id'] ?>">
                        <?= $row['name'] ?>
                        </a>
                        <span class="px-1">/</span>
                        <span>
                        <?= date('F  d, Y', strtotime($post_da['created_at'])) ?>
                        </span>
                     </div>
                     <a target="_blank" class="h4 m-0" href="post_detail.php?id=<?= $post_da['id'] ?>">
                     <?= $post_da['name'] ?>
                     </a>
                     <p class="m-0">
                        <?= substr($post_da['description'], 0, 30) ?>....
                     </p>
                  </div>
               </div>
               <?php } ?>
            </div>
         </div>
         <?php } ?>
         <!-- <div class="col-lg-6 py-3">
            <div class="bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Technology</h3>
            </div>
            <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                <div class="position-relative">
                    <img class="img-fluid w-100" src="img/news-500x280-4.jpg" style="object-fit: cover;">
                    <div class="overlay position-relative bg-light">
                        <div class="mb-2" style="font-size: 13px;">
                            <a href="">Technology</a>
                            <span class="px-1">/</span>
                            <span>January 01, 2045</span>
                        </div>
                        <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
                <div class="position-relative">
                    <img class="img-fluid w-100" src="img/news-500x280-5.jpg" style="object-fit: cover;">
                    <div class="overlay position-relative bg-light">
                        <div class="mb-2" style="font-size: 13px;">
                            <a href="">Technology</a>
                            <span class="px-1">/</span>
                            <span>January 01, 2045</span>
                        </div>
                        <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
                <div class="position-relative">
                    <img class="img-fluid w-100" src="img/news-500x280-6.jpg" style="object-fit: cover;">
                    <div class="overlay position-relative bg-light">
                        <div class="mb-2" style="font-size: 13px;">
                            <a href="">Technology</a>
                            <span class="px-1">/</span>
                            <span>January 01, 2045</span>
                        </div>
                        <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
            </div>
            </div> -->
      </div>
   </div>
</div>
</div>
<!-- Category News Slider End -->
<!-- Category News Slider Start -->
<!-- <div class="container-lg-fluid">
   <div class="container-lg">
       <div class="row">
           <div class="col-lg-6 py-3">
               <div class="bg-light py-2 px-4 mb-3">
                   <h3 class="m-0">Entertainment</h3>
               </div>
               <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                   <div class="position-relative">
                       <img class="img-fluid w-100" src="img/news-500x280-6.jpg" style="object-fit: cover;">
                       <div class="overlay position-relative bg-light">
                           <div class="mb-2" style="font-size: 13px;">
                               <a href="">Technology</a>
                               <span class="px-1">/</span>
                               <span>January 01, 2045</span>
                           </div>
                           <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                       </div>
                   </div>
                   <div class="position-relative">
                       <img class="img-fluid w-100" src="img/news-500x280-5.jpg" style="object-fit: cover;">
                       <div class="overlay position-relative bg-light">
                           <div class="mb-2" style="font-size: 13px;">
                               <a href="">Technology</a>
                               <span class="px-1">/</span>
                               <span>January 01, 2045</span>
                           </div>
                           <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                       </div>
                   </div>
                   <div class="position-relative">
                       <img class="img-fluid w-100" src="img/news-500x280-4.jpg" style="object-fit: cover;">
                       <div class="overlay position-relative bg-light">
                           <div class="mb-2" style="font-size: 13px;">
                               <a href="">Technology</a>
                               <span class="px-1">/</span>
                               <span>January 01, 2045</span>
                           </div>
                           <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-lg-6 py-3">
               <div class="bg-light py-2 px-4 mb-3">
                   <h3 class="m-0">Sports</h3>
               </div>
               <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                   <div class="position-relative">
                       <img class="img-fluid w-100" src="img/news-500x280-3.jpg" style="object-fit: cover;">
                       <div class="overlay position-relative bg-light">
                           <div class="mb-2" style="font-size: 13px;">
                               <a href="">Technology</a>
                               <span class="px-1">/</span>
                               <span>January 01, 2045</span>
                           </div>
                           <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                       </div>
                   </div>
                   <div class="position-relative">
                       <img class="img-fluid w-100" src="img/news-500x280-2.jpg" style="object-fit: cover;">
                       <div class="overlay position-relative bg-light">
                           <div class="mb-2" style="font-size: 13px;">
                               <a href="">Technology</a>
                               <span class="px-1">/</span>
                               <span>January 01, 2045</span>
                           </div>
                           <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                       </div>
                   </div>
                   <div class="position-relative">
                       <img class="img-fluid w-100" src="img/news-500x280-1.jpg" style="object-fit: cover;">
                       <div class="overlay position-relative bg-light">
                           <div class="mb-2" style="font-size: 13px;">
                               <a href="">Technology</a>
                               <span class="px-1">/</span>
                               <span>January 01, 2045</span>
                           </div>
                           <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   </div> -->
</div>
<!-- Category News Slider End -->
<!-- News With Sidebar Start -->
<div class="container-lg-fluid py-3">
   <div class="container-lg">
      <div class="row">
         <div class="col-lg-8">
            <div class="row mb-3">
               <div class="col-12">
                  <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                     <h3 class="m-0">Latest</h3>
                     <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                  </div>
               </div>
               <?php
                  $query = "SELECT blog.*, category.name AS category_name FROM posts blog, categories category WHERE category.id = blog.category_id AND blog.status=1 LIMIT 0,2";
                  $query_run = mysqli_query($con, $query);
                  if(mysqli_num_rows($query_run) > 0)
                  { 
                     foreach( $query_run as $row)
                     { 
                      ?>
               <div class="col-lg-6">
                  <div class="position-relative mb-3">
                     <?php
                        $filename = "uploads/posts/" .$row['image'];
                        $imgSrc = file_exists($filename) ? $filename : "uploads/posts/noimage.png";?>
                     <img class="img-fluid w-100"  style="object-fit: cover; height:230px;" src=<?php echo $imgSrc?>
                        ?>
                     <div class="overlay position-relative bg-light">
                        <div class="mb-2" style="font-size: 14px;">
                           <a href=""><?= $row['category_name']; ?></a>
                           <span class="px-1">/</span>
                           <span><?php
                              $date = strtotime($row['created_at']);
                              // $date= date_create('2008-09-22');
                              echo date("F d, Y", $date);
                              
                              ?></span>
                        </div>
                        <a class="h4" href=""><?= $row['name']; ?></a>
                        <p class="m-0">  <?= substr($row['description'], 0, 100) ?>....
                        </p>
                     </div>
                  </div>
               </div>
               <?php
                  }
                  
                  }
                  else
                  {
                  ?>
               <div class="col-lg-6">
                  <div class="position-relative mb-3">
                     <img class="img-fluid w-100" src="uploads/posts/noimage.png" style="object-fit: cover;">
                     <div class="overlay position-relative bg-light">
                        <div class="mb-2" style="font-size: 14px;">
                           <a href="">No Category</a>
                           <span class="px-1">/</span>
                           <span>No Date</span>
                        </div>
                        <a class="h4" href="">No Title</a>
                        <p class="m-0">No Description
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="position-relative mb-3">
                     <img class="img-fluid w-100" src="uploads/posts/noimage.png" style="object-fit: cover;">
                     <div class="overlay position-relative bg-light">
                        <div class="mb-2" style="font-size: 14px;">
                           <a href="">No Category</a>
                           <span class="px-1">/</span>
                           <span>No Date</span>
                        </div>
                        <a class="h4" href="">No Title</a>
                        <p class="m-0">No Description
                        </p>
                     </div>
                  </div>
               </div>
               <?php
                  }
                  ?>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="row">

                  <?php
                  $query = "SELECT blog.*, category.name AS category_name FROM posts blog, categories category WHERE category.id = blog.category_id AND blog.status=1 LIMIT 0,4";
                  $query_run = mysqli_query($con, $query);
                  if(mysqli_num_rows($query_run) > 0)
                  { 
                     foreach( $query_run as $row)
                     { 
                      ?>
                     <div class="col-lg-6">
                        <div class="d-flex mb-3">
                           <?php
                        $filename = "uploads/posts/" .$row['image'];
                        $imgSrc = file_exists($filename) ? $filename : "uploads/posts/noimage.png";?>
                     <img class="img-fluid w-100" style="width: 100px; height: 100px; object-fit: cover;" src=<?php echo $imgSrc?>
                        ?>
                           <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                              style="height: 100px;">
                              <div class="mb-1" style="font-size: 13px;">
                                 <a href=""><?= $row['category_name']; ?></a>
                                 <span class="px-1">/</span>
                                 <span><?php
                              $date = strtotime($row['created_at']);
                              echo date("F d, Y", $date);
                              
                              ?></span>
                              </div>
                              <a class="h6 m-0" href=""><?= $row['name']; ?></a>
                           </div>
                        </div>
                     </div>
                     <?php
                  }
                  }
                  else
                  {
                  ?>
                     <div class="col-lg-6">
                        <div class="d-flex mb-3">
                           <img src="uploads/posts/noimage.png" style="width: 100px; height: 100px; object-fit: cover;">
                           <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                              style="height: 100px;">
                              <div class="mb-1" style="font-size: 13px;">
                                 <a href="">No Category Name</a>
                                 <span class="px-1">/</span>
                                 <span>No Date</span>
                              </div>
                              <a class="h6 m-0" href="">No Title</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="d-flex mb-3">
                           <img src="uploads/posts/noimage.png" style="width: 100px; height: 100px; object-fit: cover;">
                           <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                              style="height: 100px;">
                              <div class="mb-1" style="font-size: 13px;">
                                 <a href="">No Category Name</a>
                                 <span class="px-1">/</span>
                                 <span>No Date</span>
                              </div>
                              <a class="h6 m-0" href="">No Title</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="d-flex mb-3">
                           <img src="uploads/posts/noimage.png" style="width: 100px; height: 100px; object-fit: cover;">
                           <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                              style="height: 100px;">
                              <div class="mb-1" style="font-size: 13px;">
                                 <a href="">No Category Name</a>
                                 <span class="px-1">/</span>
                                 <span>No Date</span>
                              </div>
                              <a class="h6 m-0" href="">No Title</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="d-flex mb-3">
                           <img src="uploads/posts/noimage.png" style="width: 100px; height: 100px; object-fit: cover;">
                           <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                              style="height: 100px;">
                              <div class="mb-1" style="font-size: 13px;">
                                 <a href="">No Category Name</a>
                                 <span class="px-1">/</span>
                                 <span>No Date</span>
                              </div>
                              <a class="h6 m-0" href="">No Title</a>
                           </div>
                        </div>
                     </div>
                     <?php
                  }
                  ?>
                  </div>
               </div>
            </div>
            <div class="row mb-3">
               <div class="col-12">
                  <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                     <h3 class="m-0">Popular</h3>
                     <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                  </div>
               </div>
               <?php
                  $query = "SELECT blog.*, category.name AS category_name FROM posts blog, categories category WHERE category.id = blog.category_id AND blog.status=1 LIMIT 0,2";
                  $query_run = mysqli_query($con, $query);
                  if(mysqli_num_rows($query_run) > 0)
                  { 
                     foreach( $query_run as $row)
                     { 
                      ?>
               <div class="col-lg-6">
                  <div class="position-relative mb-3">
                     <?php
                        $filename = "uploads/posts/" .$row['image'];
                        $imgSrc = file_exists($filename) ? $filename : "uploads/posts/noimage.png";?>
                     <img class="img-fluid w-100"  style="object-fit: cover; height:230px;" src=<?php echo $imgSrc?>
                        ?>
                     <div class="overlay position-relative bg-light">
                        <div class="mb-2" style="font-size: 14px;">
                           <a href=""><?= $row['category_name']; ?></a>
                           <span class="px-1">/</span>
                           <span><?php
                              $date = strtotime($row['created_at']);
                              // $date= date_create('2008-09-22');
                              echo date("F d, Y", $date);
                              
                              ?></span>
                        </div>
                        <a class="h4" href=""><?= $row['name']; ?></a>
                        <p class="m-0">  <?= substr($row['description'], 0, 100) ?>....
                        </p>
                     </div>
                  </div>
               </div>
               <?php
                  }
                  
                  }
                  else
                  {
                  ?>
               <div class="col-lg-6">
                  <div class="position-relative mb-3">
                     <img class="img-fluid w-100" src="uploads/posts/noimage.png" style="object-fit: cover;">
                     <div class="overlay position-relative bg-light">
                        <div class="mb-2" style="font-size: 14px;">
                           <a href="">No Category</a>
                           <span class="px-1">/</span>
                           <span>No Date</span>
                        </div>
                        <a class="h4" href="">No Title</a>
                        <p class="m-0">No Description
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="position-relative mb-3">
                     <img class="img-fluid w-100" src="uploads/posts/noimage.png" style="object-fit: cover;">
                     <div class="overlay position-relative bg-light">
                        <div class="mb-2" style="font-size: 14px;">
                           <a href="">No Category</a>
                           <span class="px-1">/</span>
                           <span>No Date</span>
                        </div>
                        <a class="h4" href="">No Title</a>
                        <p class="m-0">No Description
                        </p>
                     </div>
                  </div>
               </div>
               <?php
                  }
                  ?>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="row">

                  <?php
                  $query = "SELECT blog.*, category.name AS category_name FROM posts blog, categories category WHERE category.id = blog.category_id AND blog.status=1 LIMIT 0,4";
                  $query_run = mysqli_query($con, $query);
                  if(mysqli_num_rows($query_run) > 0)
                  { 
                     foreach( $query_run as $row)
                     { 
                      ?>
                     <div class="col-lg-6">
                        <div class="d-flex mb-3">
                           <?php
                        $filename = "uploads/posts/" .$row['image'];
                        $imgSrc = file_exists($filename) ? $filename : "uploads/posts/noimage.png";?>
                     <img class="img-fluid w-100" style="width: 100px; height: 100px; object-fit: cover;" src=<?php echo $imgSrc?>
                        ?>
                           <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                              style="height: 100px;">
                              <div class="mb-1" style="font-size: 13px;">
                                 <a href=""><?= $row['category_name']; ?></a>
                                 <span class="px-1">/</span>
                                 <span><?php
                              $date = strtotime($row['created_at']);
                              echo date("F d, Y", $date);
                              
                              ?></span>
                              </div>
                              <a class="h6 m-0" href=""><?= $row['name']; ?></a>
                           </div>
                        </div>
                     </div>
                     <?php
                  }
                  }
                  else
                  {
                  ?>
                     <div class="col-lg-6">
                        <div class="d-flex mb-3">
                           <img src="uploads/posts/noimage.png" style="width: 100px; height: 100px; object-fit: cover;">
                           <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                              style="height: 100px;">
                              <div class="mb-1" style="font-size: 13px;">
                                 <a href="">No Category Name</a>
                                 <span class="px-1">/</span>
                                 <span>No Date</span>
                              </div>
                              <a class="h6 m-0" href="">No Title</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="d-flex mb-3">
                           <img src="uploads/posts/noimage.png" style="width: 100px; height: 100px; object-fit: cover;">
                           <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                              style="height: 100px;">
                              <div class="mb-1" style="font-size: 13px;">
                                 <a href="">No Category Name</a>
                                 <span class="px-1">/</span>
                                 <span>No Date</span>
                              </div>
                              <a class="h6 m-0" href="">No Title</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="d-flex mb-3">
                           <img src="uploads/posts/noimage.png" style="width: 100px; height: 100px; object-fit: cover;">
                           <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                              style="height: 100px;">
                              <div class="mb-1" style="font-size: 13px;">
                                 <a href="">No Category Name</a>
                                 <span class="px-1">/</span>
                                 <span>No Date</span>
                              </div>
                              <a class="h6 m-0" href="">No Title</a>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="d-flex mb-3">
                           <img src="uploads/posts/noimage.png" style="width: 100px; height: 100px; object-fit: cover;">
                           <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                              style="height: 100px;">
                              <div class="mb-1" style="font-size: 13px;">
                                 <a href="">No Category Name</a>
                                 <span class="px-1">/</span>
                                 <span>No Date</span>
                              </div>
                              <a class="h6 m-0" href="">No Title</a>
                           </div>
                        </div>
                     </div>
                     <?php
                  }
                  ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4 pt-3 pt-lg-0">
            <!-- Social Follow Start -->
            <div class="pb-3">
               <div class="bg-light py-2 px-4 mb-3">
                  <h3 class="m-0">Follow Us</h3>
               </div>
               <div class="d-flex mb-3">
                  <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                     style="background: #39569E;">
                  <small class="fa fa-facebook-f mr-2"></small><small>12,345 Fans</small>
                  </a>
                  <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                     style="background: #52AAF4;">
                  <small class="fa fa-twitter mr-2"></small><small>12,345 Followers</small>
                  </a>
               </div>
               <div class="d-flex mb-3">
                  <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                     style="background: #0185AE;">
                  <small class="fa fa-linkedin mr-2"></small><small>12,345 Connects</small>
                  </a>
                  <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                     style="background: #C8359D;">
                  <small class="fa fa-instagram mr-2"></small><small>12,345 Followers</small>
                  </a>
               </div>
               <div class="d-flex mb-3">
                  <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                     style="background: #DC472E;">
                  <small class="fa fa-youtube mr-2"></small><small>12,345 Subscribers</small>
                  </a>
                  <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                     style="background: #1AB7EA;">
                  <small class="fa fa-vimeo mr-2"></small><small>12,345 Followers</small>
                  </a>
               </div>
            </div>
            <!-- Social Follow End -->
            <!-- Newsletter Start -->
            <div class="pb-3">
               <div class="bg-light py-2 px-4 mb-3">
                  <h3 class="m-0">Newsletter</h3>
               </div>
               <div class="bg-light text-center p-4 mb-3">
                  <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                  <div class="input-group" style="width: 100%;">
                     <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                     <div class="input-group-append">
                        <button class="btn btn-primary">Sign Up</button>
                     </div>
                  </div>
                  <small>Sign Up and Subscribe</small>
               </div>
            </div>
            <!-- Newsletter End -->
            <!-- Ads Start -->
            <div class="mb-3 pb-3">
               <a href=""><img class="img-fluid" src="images/blog-01.jpg" alt=""></a>
            </div>
            <!-- Ads End -->
            <!-- Popular News Start -->
            <div class="pb-3">
               <div class="bg-light py-2 px-4 mb-3">
                  <h3 class="m-0">Tranding</h3>
               </div>
               <?php
                  $cat_data = mysqli_query($con, "SELECT * FROM `categories` WHERE STATUS = '1' ORDER BY `id` DESC ");
                  while ($row = mysqli_fetch_assoc($cat_data)) {
                      $cat_id = $row['id'];
                  
                      $post_data = mysqli_query($con, "SELECT * FROM `posts` WHERE `category_id` = '" . $cat_id . "' ORDER BY `id` DESC LIMIT 0,4");
                      while ($post_da = mysqli_fetch_assoc($post_data)) {
                          ?>
               <div class="d-flex mb-3">
                  <img src="uploads/posts/<?= $post_da['image'] ?>" style=" width: 100px; height: 100px;
                     object-fit: cover;">
                  <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                     style="height: 100px;">
                     <div class="mb-1" style="font-size: 13px;">
                        <a target="_blank" href="post_detail.php?id=<?= $post_da['id'] ?>">
                        <?= $row['name'] ?>
                        </a>
                        <span class="px-1">/</span>
                        <span>
                        <?= date('F  d, Y', strtotime($post_da['created_at'])) ?>
                        </span>
                     </div>
                     <a class="h6 m-0" target="_blank" href="post_detail.php?id=<?= $post_da['id'] ?>">
                     <?= $post_da['name'] ?>
                     </a>
                  </div>
               </div>
               <?php }
                  } ?>
            </div>
            <!-- Popular News End -->
         </div>
      </div>
   </div>
</div>

<!-- News With Sidebar End -->
<?php include('layout/footer.php') ?>
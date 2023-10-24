<?php
   include ('authentication.php');
   include ('layout/header.php');
   include ('layout/side-bar.php');
   ?>
<main id="main" class="main min-vh-100">
   <div class="pagetitle">
      <h1>Contact Us</h1>
      <nav>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Contact</li>
         </ol>
      </nav>
   </div>
   <?php include ('massage.php'); ?>
   <section class="section">
      <div class="row">
         <div class="col-lg-12 ">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="card-title p-0 m-0">Registered Mail Us</h5>
                  <a href="#" class="btn btn-success btn-sm btn-rounded">Print</a>
               </div>
               <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered list-tbl caption-top text-center">
                  <caption><small >List of Contacts</small></caption>
                     <thead class="table-light">
                        <tr class="text-Secondary">
                           <th class="align-middle">SR. No.</th>
                           <th>Name</th>
                           <th>Email id</th>
                           <th>Phone Number</th>
                           <th>Subject</th>
                           <th>Message</th>
                           <th>Date</th>
                          
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $query = "SELECT * FROM contact";
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
                           <td class="align-middle"><?= $row['email']; ?></td>
                           <td class="align-middle"><?= $row['phone_no']; ?></td>
                           <td class="align-middle"><?= $row['subject']; ?></td>
                           <td class="align-middle"><?= $row['message']; ?></td>
                           <td class="align-middle">

                           <?php
                            $date = strtotime($row['created_at']);
                            echo date("d-m-Y", $date); ?>
                            
                        </td>
                        </tr>

                        <?php
                           }
                           
                           }
                           else
                           {
                           ?>
                        <tr>
                           <td colspan="7"> No Record Found.</td>
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

    <!-- Footer Start -->
    <footer class="bg-light pt-5">
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <img src="images/main-logo-01.png" class="img-fluid" alt="Footer logo" />
                </a>
                <p>ADDBYB Digital Marketing Pvt Ltd is here to guide you. Let's work together to make your digital dreams a reality.</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fa fa-facebook-f"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fa fa-linkedin"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fa fa-instagram"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Categories</h4>
                <div class="d-flex flex-wrap m-n1">
                <?php 
                    
                    $post_data = mysqli_query($con , 'SELECT * FROM `categories` ');
                    while ($row_cat = mysqli_fetch_array($post_data)) {
                    
                    ?>
                    <a href="" class="btn btn-sm btn-outline-secondary m-1"><?= $row_cat['name'] ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Blogs</h4>
                <div class="d-flex flex-wrap m-n1">
                    <?php 
                    
                    $post_data = mysqli_query($con , 'SELECT * FROM `posts` ');
                    while ($row = mysqli_fetch_array($post_data)) {
                    
                    ?>
                    <a href="" class="btn btn-sm btn-outline-secondary m-1"><?= $row['name'] ?></a>
                    <?php } ?>
                    
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Quick Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>About</a>
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Advertise</a>
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Privacy & policy</a>
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Terms & conditions</a>
                    <a class="text-secondary" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Contact</a>
                </div>
            </div>
        </div>
    </div>
    </footer>
 
    <div class="container-lg-fluid py-2">
        <p class="m-0 text-center">
            &copy; Copyrights 2023 <a href="#"> ADDBYB Digital Marketing Pvt. Ltd</a> all rights reserved.
            
        </p>
    </div>
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php include('layout/header.php') ?>;
<?php
$post_data = mysqli_query($con, "SELECT * FROM `posts` WHERE `id` = '" . $_GET['id'] . "'");
while ($post_nav = mysqli_fetch_assoc($post_data)) {
    $cat_id = $post_nav["category_id"];

    $cat_data = mysqli_query($con, "SELECT * FROM `categories` WHERE `id` = '" . $cat_id . "'");
    while ($row = mysqli_fetch_assoc($cat_data)) {



        ?>

        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="container">
                <nav class="breadcrumb bg-transparent m-0 p-0">
                    <a class="breadcrumb-item" href="#">Home</a>
                    <a class="breadcrumb-item" href="#">
                        <?= $row['name'] ?>
                    </a>
                    <a class="breadcrumb-item" href="#">
                        <?= $post_nav['name'] ?>
                    </a>
                    <!-- <span class="breadcrumb-item active">New Technology</span> -->
                </nav>
            </div>
        </div>
        <!-- Breadcrumb End -->
    <?php }
} ?>

<!-- News With Sidebar Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <?php

                    $post_data = mysqli_query($con, "SELECT * FROM `posts` WHERE `id` = '" . $_GET['id'] . "'");
                    while ($post_da = mysqli_fetch_assoc($post_data)) {

                        ?>
                        <img class="img-fluid w-100" src="uploads/posts/<?= $post_da['image'] ?>"
                            style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-3">
                                <a href="">
                                    <?= $post_da['name'] ?>
                                </a>
                                <span class="px-1">/</span>
                                <span>
                                    <?= date('F  d, Y', strtotime($post_da['created_at'])) ?>
                                </span>
                            </div>
                            <div>
                                <p>
                                    <?= $post_da['description'] ?>
                                </p>
                                <!-- <h3 class="mb-3">Est stet amet ipsum stet clita rebum duo</h3>
                                <p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut
                                    magna lorem. Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet
                                    amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at
                                    sanctus et. Ipsum sit gubergren dolores et, consetetur justo invidunt at et
                                    aliquyam ut et vero clita. Diam sea sea no sed dolores diam nonumy, gubergren
                                    sit stet no diam kasd vero.</p>
                                <p>Voluptua est takimata stet invidunt sed rebum nonumy stet, clita aliquyam dolores
                                    vero stet consetetur elitr takimata rebum sanctus. Sit sed accusam stet sit
                                    nonumy kasd diam dolores, sanctus lorem kasd duo dolor dolor vero sit et. Labore
                                    ipsum duo sanctus amet eos et. Consetetur no sed et aliquyam ipsum justo et,
                                    clita lorem sit vero amet amet est dolor elitr, stet et no diam sit. Dolor erat
                                    justo dolore sit invidunt.</p>
                                <h4 class="mb-3">Est dolor lorem et ea</h4>
                                <img class="img-fluid w-50 float-left mr-4 mb-2" src="img/news-500x280-1.jpg">
                                <p>Diam dolor est labore duo invidunt ipsum clita et, sed et lorem voluptua tempor
                                    invidunt at est sanctus sanctus. Clita dolores sit kasd diam takimata justo diam
                                    lorem sed. Magna amet sed rebum eos. Clita no magna no dolor erat diam tempor
                                    rebum consetetur, sanctus labore sed nonumy diam lorem amet eirmod. No at tempor
                                    sea diam kasd, takimata ea nonumy elitr sadipscing gubergren erat. Gubergren at
                                    lorem invidunt sadipscing rebum sit amet ut ut, voluptua diam dolores at
                                    sadipscing stet. Clita dolor amet dolor ipsum vero ea ea eos. Invidunt sed diam
                                    dolores takimata dolor dolore dolore sit. Sit ipsum erat amet lorem et, magna
                                    sea at sed et eos. Accusam eirmod kasd lorem clita sanctus ut consetetur et. Et
                                    duo tempor sea kasd clita ipsum et.</p>
                                <h5 class="mb-3">Est dolor lorem et ea</h5>
                                <img class="img-fluid w-50 float-right ml-4 mb-2" src="img/news-500x280-2.jpg">
                                <p>Diam dolor est labore duo invidunt ipsum clita et, sed et lorem voluptua tempor
                                    invidunt at est sanctus sanctus. Clita dolores sit kasd diam takimata justo diam
                                    lorem sed. Magna amet sed rebum eos. Clita no magna no dolor erat diam tempor
                                    rebum consetetur, sanctus labore sed nonumy diam lorem amet eirmod. No at tempor
                                    sea diam kasd, takimata ea nonumy elitr sadipscing gubergren erat. Gubergren at
                                    lorem invidunt sadipscing rebum sit amet ut ut, voluptua diam dolores at
                                    sadipscing stet. Clita dolor amet dolor ipsum vero ea ea eos. Invidunt sed diam
                                    dolores takimata dolor dolore dolore sit. Sit ipsum erat amet lorem et, magna
                                    sea at sed et eos. Accusam eirmod kasd lorem clita sanctus ut consetetur et. Et
                                    duo tempor sea kasd clita ipsum et. Takimata kasd diam justo est eos erat
                                    aliquyam et ut.</p> -->
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- News Detail End -->

                <!-- Comment List Start -->
                <div class="bg-light mb-3" style="padding: 30px;">
                <?php 
                    
                    $cmt = mysqli_query($con,'SELECT * FROM `comment` WHERE `POST_ID` = "'. $_GET["id"] .'"');
                    $rowcount = mysqli_num_rows($cmt)
                    
                    ?>
                
                    <h3 class="mb-4"><?= $rowcount ?> Comments</h3>
                      
                    <?php 
                    
                    $cmt = mysqli_query($con,'SELECT * FROM `comment` WHERE `POST_ID` = "'. $_GET["id"] .'"');
                    while ($row = mysqli_fetch_assoc($cmt)) {
                    
                    ?>
                    <div class="media mb-4">
                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                        <div class="media-body">
                            <h6><a href=""><?= $row['NAME'] ?></a> <small><i><?= date('d M Y', strtotime($row['ADDEDON'])) ?></i></small></h6>
                            <p><?= $row['MESSAGE'] ?></p>
                            <button class="btn btn-sm btn-outline-secondary">Reply</button>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- <div class="media">
                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                        <div class="media-body">
                            <h6><a href="">John Doe</a> <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                            <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
                                Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor
                                consetetur at sit.</p>
                            <button class="btn btn-sm btn-outline-secondary">Reply</button>
                             <div class="media mt-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6><a href="">John Doe</a> <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                                    <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor
                                        labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed
                                        eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet
                                        ipsum diam tempor consetetur at sit.</p>
                                    <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                </div>
                            </div> 
                        </div>
                    </div> -->
                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                <div class="bg-light mb-3" style="padding: 30px;">
                    <h3 class="mb-4">Leave a comment</h3>
                    <form method="post" id="comment_Form">
                        <input type="hidden" name="post_id" id="post_id" value="<?php echo $_GET['id'] ?>">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" class="form-control" name="website" id="website">
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <input type="button" onclick="submitData()" value="Leave a comment"
                                class="btn btn-primary font-weight-semi-bold py-2 px-3">
                        </div>
                    </form>
                </div>
                <!-- Comment Form End -->
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
                            <small class="fab fa-facebook-f mr-2"></small><small>12,345 Fans</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                            style="background: #52AAF4;">
                            <small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small>
                        </a>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                            style="background: #0185AE;">
                            <small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                            style="background: #C8359D;">
                            <small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small>
                        </a>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2"
                            style="background: #DC472E;">
                            <small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small>
                        </a>
                        <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2"
                            style="background: #1AB7EA;">
                            <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small>
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
                        <small>Sit eirmod nonumy kasd eirmod</small>
                    </div>
                </div>
                <!-- Newsletter End -->

                <!-- Ads Start -->
                <div class="mb-3 pb-3">
                    <a href=""><img class="img-fluid" src="img/news-500x280-4.jpg" alt=""></a>
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
                        <img src="uploads/posts/<?= $post_da['image'] ?>" style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
                            style="height: 100px;">
                            <div class="mb-1" style="font-size: 13px;">
                                <a target="_blank" href="post_detail.php?id=<?= $post_da['id'] ?>"> <?= $row['name'] ?></a>
                                <span class="px-1">/</span>
                                <span><?= date('F  d, Y', strtotime($post_da['created_at'])) ?></span>
                            </div>
                            <a class="h6 m-0" target="_blank" href="post_detail.php?id=<?= $post_da['id'] ?>"><?= $post_da['name'] ?></a>
                        </div>
                    </div>
                    <?php }
                  } ?>
                    
                </div>
                <!-- Popular News End -->

                <!-- Tags Start -->
                <div class="pb-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Blogs</h3>
                    </div>
                    <div class="d-flex flex-wrap m-n1">
                    <?php 
                    
                    $post_data = mysqli_query($con , 'SELECT * FROM `posts` ');
                    while ($row = mysqli_fetch_array($post_data)) {
                    
                    ?>
                    <a href="" class="btn btn-sm btn-outline-secondary m-1"><?= $row['name'] ?></a>
                    <?php } ?>
                    </div>
                </div>
                <!-- Tags End -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- News With Sidebar End -->
<script>

    function submitData() {
        var name = $('#name').val();
        var emailid = $('#email').val();
        var website = $('#website').val();
        var message = $('#message').val();
        var post_id = $('#post_id').val();
        atpos = emailid.indexOf("@");
        dotpos = emailid.lastIndexOf(".");
        if (name == '') {
            alert('Please enter Name');
            return false;
        } else if (emailid == '') {
            alert('Please enter Name');
            return false;
        } else if (atpos < 1 || (dotpos - atpos < 2)) {
            alert("Please enter correct Email Id");
            return false;
        } else if (website == '') {
            alert('Please enter website');
            return false;
        } else if (message == '') {
            alert('Please enter message');
            return false;
        } else if (post_id == '') {
            return false;
        } else {
            $.ajax({
                type: 'post',
                url: 'sentcomments.php',
                data: $('#comment_Form').serialize(),
                success: function (response) {
                    if (response == 'Successfully') {
                        alert('Thanks for Given arguments !!!');
                        window.location.reload();
                    } else {
                        alert('Something went wrong');
                    }

                }
            });
        }
    }

</script>

<?php include('layout/footer.php') ?>;
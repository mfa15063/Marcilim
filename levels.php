<?php include "header.php";
if ($uid < 1) $amount = 0;
else {
    $query = mysqli_query($conn, "SELECT amount FROM `user` where `id`='$uid'");
    $row = mysqli_fetch_assoc($query);
    $amount = $row['amount'];
}

if ($amount < 50){
    die;
    exit();
}

$lvl = $_GET['lvl'];
if ($amount >= 50 && $amount < 100) {
    $lvl == 1;
    $title = 'Ebay';
    $desc = 'Get loved up with eBay x Love Island';
    $img = 'ebay.png';
    $commission = 0.26;
} elseif ($amount >= 100 && $amount < 500) {
    $lvl == 2;
    $title = 'Walmart';
    $desc = 'Get loved up with Walmart';
    $img = 'walmart.png';
    $commission = 0.30;
} elseif ($amount >= 500 && $amount < 1000) {
    $lvl == 3;
    $title = 'Amazon';
    $desc = 'Get loved up with Amazon';
    $img = 'amazon.png';
    $commission = 0.35;
} elseif ($amount >= 1000 && $amount < 10000) {
    $lvl == 4;
    $title = 'Shopify';
    $desc = 'Get loved up with shopify';
    $img = 'shopify.webp';
    $commission = 0.50;
} elseif ($amount >= 10000) {
    $lvl == 5;
    $title = 'Contract Room';
    $desc = 'Get loved up with Contract Room';
    $img = 'contract.png';
    $commission = 0.50;
} 
?>



<link href="assets/css/commerce.css" rel="stylesheet">


<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up"><?= $title ?></h1>
                <h2 data-aos="fade-up" data-aos-delay="400"><?= $desc ?>
                </h2>

            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="assets/img/<?= $img ?>" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section>

<!-- End Hero -->
<div class="container">
    <div class="mt-3 text-primary">
        <h1 data-aos="fade-up">
            <center>All Products</center>
        </h1>
    </div>


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">

        <div class="container" data-aos="fade-up">


            <div class="testimonialsslider swiper">
                <div class="swiper-wrapper">
                    
                    <?php
                    include "api/functions.php";
                    foreach (GetTasks($uid, $lvl)['data'] as $key => $task) :
                        extract($task) ?> 
                        <div class="swiper-slide">
                            <div class="">
                                <div class="container d-flex justify-content-center">
                                    <figure class="card py-4 card-product-grid card-lg"> <a class="img-wrap" data-abc="true"> <img src="assets/img/Images/<?= $img ?>"> </a>
                                        <figcaption class="info-wrap">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-6"> <a href="#" class="title" data-abc="true"><?= $title ?></a> <span class="rated"><?= $cat ?></span> </div>
                                                <div class="col-md-6 col-xs-6">
                                                    <div class="rating text-right">
                                                        <?php for ($i = 0; $i < $rating; $i++) { ?>
                                                            <i class="fa fa-star"></i>
                                                        <?php } ?>

                                                        <br><span class="rated">
                                                            <?= $price ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </figcaption>

                                        <div class="bottom-wrap">
                                            <?php
                                            if (!empty($_POST)) {
                                                include "api/functions.php";
                                                TaskCompletion($_POST);
                                            }
                                            ?>
                                            <?php
                                            $time = strtotime($date);
                                            $task_date = date('Y-m-d', $time);
                                            $current_date = date('Y-m-d');
                                            $disabled = "";
                                            $btn_text = "Complete Task";
                                            $on_click = "onclick=\"taskComplete('$uid', '$price', '$commission', '$id', this)\" ";
                                            if ($task_date == $current_date) {
                                                $btn_text = "Task Completed";
                                                $disabled = "disabled";
                                                $on_click = "";
                                            }
                                            ?>
                                            <button type="submit" <?= $disabled ?> class="btn btn-primary float-right" <?= $on_click ?> data-abc="true"> <?= $btn_text ?>
                                            </button>

                                            <div class="price-wrap"> <a href="#" class="btn btn-warning float-left" data-abc="true"> Cancel
                                                </a> </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                    <?php endforeach; ?>

                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>

        </div>

    </section><!-- End Testimonials Section -->

</div>

<script>
    

    function taskComplete(uid, price, commission, task_id, elem = ".bg-dark") {
        let request_data = {};
        request_data['uid'] = uid;
        request_data['price'] = price;
        request_data['commission'] = commission;
        request_data['task_id'] = task_id;
        $.ajax({
            url: "api/order.php",
            type: "POST",
            dataType: "json",
            data: JSON.stringify(request_data),
            success: function(data) {
                console.log(data);
                if (!data.error) {
                    $(elem).attr('disabled', true);
                    $(elem).text("Task Completed");
                }
            },
            error: function(error) {
                console.log("Error:");
                console.log(error);
            }
        });
    }
</script>




<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Contact</h2>
            <p>Contact Us</p>
        </header>

        <div class="row gy-4">

            <div class="col-lg-6">

                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <p>A108 Adam Street,<br>New York, NY 535022</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-telephone"></i>
                            <h3>Call Us</h3>
                            <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-envelope"></i>
                            <h3>Email Us</h3>
                            <p>info@example.com<br>contact@example.com</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-clock"></i>
                            <h3>Open Hours</h3>
                            <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <form action="forms/contact.php" method="post" class="php-email-form">
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>

                        <div class="col-md-6 ">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>

                            <button type="submit">Send Message</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>

    </div>

</section><!-- End Contact Section -->

</main><!-- End #main -->

<script>
    $(document).ready(function() {
        $(".wish-icon i").click(function() {
            $(this).toggleClass("fa-heart fa-heart-o");
        });
    });
</script>

<?php

//option functions
// extract($_GET);
// if (isset($view)) {
// $path = "include/" . $view . ".php";
// if (file_exists($path)) {
// include($path);
// } else {
// echo "<div class='Erro rNot Fount'>Oops! Web page is not found.</div>";
// }
// } else {
// include "include/home.php";
// }
include "footer.php"; ?>
<?php include "header.php";
?>

<body background="assets/img/hero-bg.png">

    <style>
        .slider-mobile {
            width: 6rem;
            margin-top: 5px;
            margin-left: 0.3rem;
            padding-bottom: 3.5rem;
        }

        .carousel-inner img {
            border-radius: 10px;
        }

        .hand-mobile {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 10.4rem;
        }
    </style>

    <div class="container" style="margin-top: 8rem;">
        <div class="row m-0">
            <div class="col-6">
                <h5 class="mt-5">Download our App for better experience</h5>
                <a href="assets/Marcilim.apk" download class="btn btn-primary text-white"><i class="bi bi-download"></i> Download</a>
            </div>
            <div class="col-6">
                <div class="slider-mobile">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="assets/img/mobile (1).jpeg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/img/mobile (2).jpeg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/img/mobile (3).jpeg" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/img/mobile (4).jpeg" alt="Third slide">
                            </div>
                        </div>
                    </div>
                </div>
                <img class="hand-mobile" src="assets/img/mobile.png" width="100%" alt="">
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>
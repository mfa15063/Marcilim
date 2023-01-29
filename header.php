<?php include "forms/config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Marcilim</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/m logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <script>
        if (navigator.userAgent.indexOf("Mobile") != -1) {
            //   location.replace("https://mobile.marcilim.com/");
        }
    </script>
    <?php
    if (isset($_SESSION['user_id']))
        $uid = $_SESSION['user_id'];
    else
        $uid = 0;
    // echo $uid;
    // echo $_SESSION['user_id'];
    ?>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center">
                <img src="assets/img/m logo.png" alt="">
                <!-- <span>Eleven</span> -->
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <!-- <li><a class="nav-link scrollto active" href="index.php">Home</a></li> -->
                    <li><a class="nav-link scrollto" href="index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="about-us.php">About</a></li>
                    <!-- <li><a class="nav-link scrollto d-lg-none" href="download.php">Download</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="grab.php">GRAB</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                    <!-- <li><a href="blog.php">Blog</a></li> -->
                    <!-- <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul> -->
                    <li><a class="nav-link scrollto" href="contactus.php">Contact</a></li>
                    <?php if ($uid < 1) : ?>
                        <li><a class="getstarted scrollto" href="signin.php">Register</a></li>
                    <?php else : ?>
                        <li class="dropdown"><a href="#"><i class="bi bi-person-circle" style="font-size: x-large;"></i></a>
                            <ul>
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="team.php">My team</a></li>
                                <hr class="m-0">
                                <li><a href="logout.php?logout=user_id" >Sign Out</a></li>
                            </ul>
                        </li>
                    <?php endif ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
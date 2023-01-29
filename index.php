<?php
include "header.php";
include "api/functions.php";
if ($uid < 1) $amount = 0;
else $amount = GetAmount($uid)["amount"];
?> 

<link rel="stylesheet" media="screen" href="assets/css/particle.css">
<!-- count particles -->
<!-- <div class="count-particles">

</div> -->
<!-- ======= Hero Section ======= -->
<section id="hero" style="padding-top: 5.5%;" class="hero d-flex align-items-center">

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">Marcilim Limited is a Multinational-level apex institution for Retail
          market and
          investment.</h1>
        <!-- <h2 data-aos="fade-up" data-aos-delay="400">We are team of talented designers making websites with
                Bootstrap -->
        </h2>
        <div data-aos="fade-up" data-aos-delay="600">
          <div class="text-center text-lg-start">
            <a href="deposit.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
              <span>Deposit</span>
              <i class="bi bi-arrow-right"></i>
            </a>
            <a href="withdraw.php" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
              <span>Withdraw</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="assets/img/index.jpg" class="img-fluid" alt="">
      </div>
    </div>
  </div>

</section>

<!-- particles.js container -->
<div id="particles-js"></div>


<!-- End Hero -->

<!-- news -->
<div class="container mt-5">
  <div class="row">
    <div class="col-1"><img src="assets/img/favicon.png" alt="" height="30px" width="30px"></div>
    <div class="col-11 text-danger">
      <marquee width="100%" direction="left" height="100px">
        <b>NEWS!</b> Safe And Secure Crypto Currency Investment
        Cooperating with us, <b>News!</b> you receive the opportunities for improvement and development of your
        own mining
        and investments skills...
      </marquee>
    </div>
  </div>
</div>
<!-- news -->

<!-- slider -->
<div class="slider">
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <!-- <div class="carousel-indicators"> -->
    <!-- <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
    <!-- </div> -->
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="assets/img/slider (1).jpg" class="d-block w-100" alt="...">
        <!-- <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
            <div class="row">
              <div class="col-6"><button class="btn btn-outline-primary">Withdraw</button></div>
              <div class="col-6"><button class="btn btn-outline-success">Deposite</button></div>
            </div>
          </div> -->
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="assets/img/slider (2).jpg" class="d-block w-100" alt="...">
        <!-- <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div> -->
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="assets/img/slider (3).jpg" class="d-block w-100" alt="...">
        <!-- <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div> -->
      </div>
      <div class="carousel-item">
        <img src="assets/img/slider (4).jpg" class="d-block w-100" alt="...">
        <!-- <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div> -->
      </div>
    </div>
    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button> -->
  </div>
</div>
<!-- end slider -->


<!-- <main id="main"> -->
<!-- ======= About Section ======= -->
<!-- <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Who We Are</h3>
              <h2>Expedita voluptas omnis cupiditate totam eveniet nobis sint iste. Dolores est repellat corrupti
                reprehenderit.</h2>
              <p>
                Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor consequatur
                itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit voluptatum nam et est corrupti.
              </p>
              <div class="text-center text-lg-start">
                <a href="#"
                  class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Read More</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/b exchamge.jpg" class="img-fluid" alt="">
          </div>

        </div>
      </div> -->

<!-- </section> -->
<!-- End About Section -->

<!-- ======= Values Section ======= -->
<section id="values" class="values">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2 class="mt-4">Our Values</h2>
      <p>Company</p>
    </header>

    <div class="row">

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="box">
          <img src="assets/img/values-1.png" class="img-fluid" alt="">
          <h3><b>Company Profile</b></h3>
          <p>Marcilim Limited is a Multinational-level apex institution for Retail market and investment.Marcilim
            limited was established as an important pillar of the Financial Inclusion Strategy formulated by
            the UK company house in November 2010.Marcilim limited is committed to serving world at the bottom
            of the pyramid. Marcilim limited also provide financial and institutional services to strengthen
            and scale-up provision of sustainable and responsible access to finance to individuals, Marcilim
            Limited enhance income opportunity for economically poor and undeserved citizens and improve
            the lives of the poor.</p>
        </div>
      </div>

      <div class="col-lg-6 mt-6 mt-lg-6" data-aos="fade-up" data-aos-delay="400">
        <div class="box">
          <img src="assets/img/values-2.png" class="img-fluid" alt="">
          <h3><b>Promotion Rewards</b></h3>
          <p>You can get 12% at invitation <br>
            You can get 10% at First deposit <br>
            Get 45$ on 3 invites in a day with 100$ recharge <br>
            Get 160$ on 10 invites in a day with 100$ recharge <br>


            <!-- 
                        Story:-<br> THIS APP ALSO LINK WITH EBAY & AMAZON and pass order which is done by customers.
                        Same
                        but dekhny main different features and graffics.<br>

                        50$ recharge 1st level open <br>
                        Level 2 open with recharge 100$ To 500$<br>
                        Level 3 open with recharge 1000$ to 5000$<br>
                        Level 4 open with recharge 10000$ ,level opening reward. 1500$<br>
                        Level 5 open with 30000$ recharge level 5 opening reward 5000$<br>
                        Level 1: profit 0.26% per task 10 task in 1st room<br>
                        Level 2: profit 0.30% per task 15 task in 2nd room<br>
                        Level 3: profit 0.35% per task 20 task in a day<br>
                        Level 4: profit 0.50% per task 30 task in a day..<br>
                        Level 5 : Profit 0.50 per task 50 task in a day..</p> -->
        </div>
      </div>

      <!--<div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <img src="assets/img/values-3.png" class="img-fluid" alt="">
              <h3>Beginner Tutorial</h3>
              <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <img src="assets/img/hero-img.png" class="img-fluid" alt="">
              <h3>Invitation</h3>
              <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <img src="assets/img/features-2.png" class="img-fluid" alt="">
              <h3>Vip Events</h3>
              <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <img src="assets/img/features-3.png" class="img-fluid" alt="">
              <h3>financial</h3>
              <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p>
            </div>
          </div> -->
    </div>

  </div>

</section>

<!-- End Values Section -->

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
  <div class="container" data-aos="fade-up">

    <div class="row gy-4">

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-emoji-smile"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="2322" data-purecounter-duration="1" class="purecounter"></span>
            <p>Days Online</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="456382" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Accounts</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-headset" style="color: #15be56;"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="4217434" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Deposited</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="bi bi-people" style="color: #bb0852;"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="7053452" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Withdraw</p>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Counts Section -->

<!-- ======= Features Section ======= -->
<!-- <section id="features" class="features">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Features</h2>
          <p>Laboriosam et omnis fuga quis dolor direda fara</p>
        </header>

        <div class="row">

          <div class="col-lg-6">
            <img src="assets/img/bmobile.jpg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
            <div class="row align-self-center gy-4">

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Eos aspernatur rem</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Facilis neque ipsa</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Volup amet voluptas</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Rerum omnis sint</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Alias possimus</h3>
                </div>
              </div>

              <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                <div class="feature-box d-flex align-items-center">
                  <i class="bi bi-check"></i>
                  <h3>Repellendus mollitia</h3>
                </div>
              </div>

            </div>
          </div> -->

<!-- </div> -->
<!-- / row -->

<!-- Feature Tabs -->
<!-- <div class="row feture-tabs" data-aos="fade-up">
          <div class="col-lg-6">
            <h3>Neque officiis dolore maiores et exercitationem quae est seda lidera pat claero</h3> -->

<!-- Tabs -->
<!-- <ul class="nav nav-pills mb-3">
              <li>
                <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Saepe fuga</a>
              </li>
              <li>
                <a class="nav-link" data-bs-toggle="pill" href="#tab2">Voluptates</a>
              </li>
              <li>
                <a class="nav-link" data-bs-toggle="pill" href="#tab3">Corrupti</a>
              </li> -->
<!-- </ul> -->
<!-- End Tabs -->

<!-- Tab Content -->
<!-- <div class="tab-content">

              <div class="tab-pane fade show active" id="tab1">
                <p>Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque
                  consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
                </div>
                <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non
                  eveniet magni quaerat nemo et.</p>
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Incidunt non veritatis illum ea ut nisi</h4>
                </div>
                <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure
                  molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et
                  perferendis.</p>
              </div>End Tab 1 Content

              <div class="tab-pane fade show" id="tab2">
                <p>Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque
                  consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
                </div>
                <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non
                  eveniet magni quaerat nemo et.</p>
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Incidunt non veritatis illum ea ut nisi</h4>
                </div>
                <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure
                  molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et
                  perferendis.</p> -->
<!-- </div> -->
<!-- End Tab 2 Content -->
<!-- 
              <div class="tab-pane fade show" id="tab3">
                <p>Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque
                  consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
                </div>
                <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non
                  eveniet magni quaerat nemo et.</p>
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Incidunt non veritatis illum ea ut nisi</h4>
                </div>
                <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure
                  molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et
                  perferendis.</p> -->
<!-- </div> -->
<!-- End Tab 3 Content -->
<!-- 
            </div>

          </div>

          <div class="col-lg-6">
            <img src="assets/img/features-2.png" class="img-fluid" alt="">
          </div>

        </div> -->
<!-- End Feature Tabs -->

<!-- Feature Icons -->
<!-- <div class="row feature-icons" data-aos="fade-up">
          <h3>Ratione mollitia eos ab laudantium rerum beatae quo</h3>

          <div class="row">

            <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
              <img src="assets/img/features-3.png" class="img-fluid p-4" alt="">
            </div>

            <div class="col-xl-8 d-flex content">
              <div class="row align-self-center gy-4">

                <div class="col-md-6 icon-box" data-aos="fade-up">
                  <i class="ri-line-chart-line"></i>
                  <div>
                    <h4>Corporis voluptates sit</h4>
                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                  </div>
                </div>

                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="ri-stack-line"></i>
                  <div>
                    <h4>Ullamco laboris nisi</h4>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                  </div>
                </div>

                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="ri-brush-4-line"></i>
                  <div>
                    <h4>Labore consequatur</h4>
                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                  </div>
                </div>

                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="ri-magic-line"></i>
                  <div>
                    <h4>Beatae veritatis</h4>
                    <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                  </div>
                </div>

                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="ri-command-line"></i>
                  <div>
                    <h4>Molestiae dolor</h4>
                    <p>Et fuga et deserunt et enim. Dolorem architecto ratione tensa raptor marte</p>
                  </div>
                </div>

                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                  <i class="ri-radar-line"></i>
                  <div>
                    <h4>Explicabo consectetur</h4>
                    <p>Est autem dicta beatae suscipit. Sint veritatis et sit quasi ab aut inventore</p>
                  </div>
                </div>

              </div>
            </div>

          </div> -->

<!-- </div> -->
<!-- End Feature Icons -->

<!-- </div> -->

<!-- </section> -->
<!-- End Features Section -->

<!-- ======= Services Section ======= -->
<!-- <section id="services" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Business hall</h2>
          <p>Business hall</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue">
              <img src="assets/img/EBAY.png" height="100px" width="250px" alt="">
              <i class="ri-discuss-line icon"></i>
              <h3>ebay</h3>
              <p>Entry limit: 0.00 <br>
                Level limit: LV 1 <br>
                Daily order: 50 <br>
                Commission rate: 0.26%</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-box orange">
              <img src="assets/img/walmart.png" height="100px" width="250px" alt="">
              <i class="ri-discuss-line icon"></i>
              <h3>walmart</h3>
              <p>
                Entry limit: 500.00 <br>
                Level limit: LV 2 <br>
                Daily order: 55 <br>
                Commission rate: 0.28%</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-box green">
              <img src="assets/img/amazon.png" height="100px" width="250px" alt="">
              <i class="ri-discuss-line icon"></i>
              <h3>Amazon</h3>
              <p>Entry limit: 2,000.00<br>
                Level limit: LV 3<br>
                Daily order: 60<br>
                Commission rate: 0.3%
              </p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-box red">
              <img src="assets/img/logo.png" height="100px" width="250px" alt="">
              <i class="ri-discuss-line icon"></i>
              <h3>Merci Lim</h3>
              <p>Entry limit: 5,000.00<br>
                Level limit: LV 4<br>
                Daily order: 65 <br>
                Commission rate: 0.32%
              </p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-box purple">
              <img src="assets/img/contract.png" height="100px" width="250px" alt="">
              <i class="ri-discuss-line icon"></i>
              <h3>Contract room</h3>
              <p>Entry limit: 5,000.00<br>
                Level limit: LV 5<br>
                Daily order: 75<br>
                Commission rate: 0.34%
              </p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
            <div class="service-box pink">
              <img src="assets/img/contract.png" height="100px" width="250px" alt="">
              <i class="ri-discuss-line icon"></i>
              <h3>Contract room</h3>
              <p>
                Entry limit: 10,000.00<br>
                Level limit: LV 6<br>
                Daily order: 80<br>
                Commission rate: 0.36%</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
            <div class="service-box pink">
              <img src="assets/img/contract.png" height="100px" width="250px" alt="">
              <i class="ri-discuss-line icon"></i>
              <h3>Contract room</h3>
              <p>Entry limit: 30,000.00<br>
                Level limit: LV 7<br>
                Daily order: 90<br>
                Commission rate: 0.4%</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
            <div class="service-box pink">
              <img src="assets/img/contract.png" height="100px" width="250px" alt="">
              <i class="ri-discuss-line icon"></i>
              <h3>Contract room</h3>
              <p>Entry limit: 80,000.00<br>
                Level limit: LV 8<br>
                Daily order: 100<br>
                Commission rate: 0.45%</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>

      </div>

    </section> -->
<!-- End Services Section -->

<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Business hall</h2>
      <p>Business hall</p>
    </header>

    <div class="row gy-4" data-aos="fade-left">

      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
        <div class="box">
          <h3 style="color: #07d5c0;">Level 1</h3>
          <div class="price"><sup>$</sup>50<span></span></div>
          <img src="assets/img/ebay.png" class="img-fluid" alt="">
          <ul>
            <li><i class="bi bi-shield-check text-success m-2"></i>Just open 1st level</li>
            <li><i class="bi bi-shield-check text-success m-2"></i>Profit 0.26% per task</li>
            <li><i class="bi bi-shield-check text-success m-2"></i>10 task in 1st room</li>
            <!-- <li class="na">Pharetra massa</li> -->
          </ul>
          <?php if ($amount >= 50 && $amount < 100) : ?>
            <div class=""> <a href="levels.php?lvl=1" class="btn-buy">Buy Now</a></div>
          <?php endif ?>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="box">
          <!-- <span class="featured">Featured</span> -->
          <h3 style="color: #65c600;">Level 2</h3>
          <div class="price"><sup>$</sup>100<span></span></div>
          <img src="assets/img/walmart.png" class="img-fluid" alt="">
          <ul>
            <li><i class="bi bi-shield-check text-success m-2"></i>Level 2 open with recharge 100$</li>
            <li><i class="bi bi-shield-check text-success m-2"></i>Profit 0.30% per task</li>
            <li><i class="bi bi-shield-check text-success m-2"></i>15 Task in 2nd room</li>
          </ul>

          <?php if ($amount >= 100 && $amount < 500) : ?>
            <a href="levels.php?lvl=2" class="btn-buy">Buy Now</a>

          <?php endif; ?>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
        <div class="box">
          <h3 style="color: #ff901c;">Level 3</h3>
          <div class="price"><sup>$</sup>500-1000<span></span></div>
          <img src="assets/img/amazon.png" class="img-fluid" alt="">
          <ul>
            <li><i class="bi bi-shield-check text-success m-2"></i>Level 3 open with recharge 500$</li>
            <li><i class="bi bi-shield-check text-success m-2"></i> Profit 0.35% per task</li>
            <li><i class="bi bi-shield-check text-success m-2"></i>20 task in a day</li>
            <!-- <li class="na">Pharetra massa</li>
                        <li class="na">Massa ultricies mi</li> -->
          </ul>
          <?php if ($amount >= 500 && $amount < 1000) : ?>
            <a href="levels.php?lvl=3" class="btn-buy">Buy Now</a>
          <?php endif ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
        <div class="box">
          <h3 style="color: #ff0071;">Level 4</h3>
          <div class="price"><sup>$</sup>1000-10000<span></span></div>
          <img src="assets/img/shopify.webp" class="img-fluid" alt="">
          <ul>
            <li><i class="bi bi-shield-check text-success m-2"></i>Level 4 open with recharge 1000$</li>
            <li><i class="bi bi-shield-check text-success m-2"></i>Profit 0.40% per task</li>
            <li><i class="bi bi-shield-check text-success m-2"></i>30 Task in a day</li>
            <!-- <li class="na">Massa ultricies mi</li> -->
            <!-- <li class="na">Massa ultricies mi</li> -->
          </ul>
          <?php if ($amount >= 1000 && $amount < 10000) : ?>
            <a href="levels.php?lvl=4" class="btn-buy">Buy Now</a>
          <?php endif ?>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
        <div class="box">
          <h3 style="color: #ff0071;">Level 5</h3>
          <div class="price"><sup>$</sup>10000<span></span></div>
          <img src="assets/img/contract.png" class="img-fluid" alt="">
          <ul>
            <li><i class="bi bi-shield-check text-success m-2"></i>Level 5 open with recharge 10000$</li>
            <li><i class="bi bi-shield-check text-success m-2"></i>Profit 0.50% per task</li>
            <li><i class="bi bi-shield-check text-success m-2"></i>30 Task in a day</li>
            <!-- <li class="na">Massa ultricies mi</li> -->
          </ul>
          <?php if ($amount >= 10000) : ?>
            <a href="levels.php?lvl=5" class="btn-buy">Buy Now</a>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>

  </div>

</section><!-- End Pricing Section -->


<!-- ======= Portfolio Section ======= -->
<!-- <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Portfolio</h2>
          <p>Check our latest work</p>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="App 2"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="Card 2"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="Web 2"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="App 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="Card 1"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="Card 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery"
                    class="portfokio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div> -->

<!-- </section> -->
<!-- End Portfolio Section -->

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Testimonials</h2>
      <p>What they are saying about us</p>
    </header>

    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="testimonial-item">
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
            For the target group, the result is worth taking care of until the airline takes over.
              of the accusers
              which, even more times it needs, needs some level and. Some faintness, but always a smile.
            </p>
            <div class="profile mt-auto">
              <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
              <h4>Ceo &amp; Founder</h4>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
            However, during the export period, I was suffering from the evils that I had to work hard
              I was in trouble
              Whose wishes would be, I would wish, there are some of ours, let us run away from the rush, I will read the soul's fault.
            </p>
            <div class="profile mt-auto">
              <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
            For unless you force the export of a few hairs, which are large, of which there is none, you force me to come
              least
              At the time of the work that I was doing at home, I was wondering who would be the least.
            </p>
            <div class="profile mt-auto">
              <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
              <h4>Store Owner</h4>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
            For I was fleeing from the pain of pain, and there is no fault in the export of many
              wants
              For the least pain of the family, I will forgive them, and they are great souls, who would labor with pain
              I will come
            </p>
            <div class="profile mt-auto">
              <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
            Whom some of them are that I will read they were I was in some rage I will forgive our time
              for the fault
              there is no fault in the work of the two houses; let no hair escape him;
              what
            </p>
            <div class="profile mt-auto">
              <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
              <h3>John Larson</h3>
              <h4>Entrepreneur</h4>
            </div>
          </div>
        </div><!-- End testimonial item -->

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>

</section><!-- End Testimonials Section -->

<!-- ======= Team Section ======= -->
<section id="team" class="team">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Team</h2>
      <p>Our hard working team</p>
    </header>

    <div class="row gy-4">

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="member">
          <div class="member-img">
            <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Walter White</h4>
            <span>Chief Executive Officer</span>
            <p>He wants or because he runs away and and. The pleasure or the time of the pains itself is held either. He himself
              exercise by right, for the least physical and pleasure.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
        <div class="member">
          <div class="member-img">
            <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Sarah Jhonson</h4>
            <span>Product Manager</span>
            <p>Where to be repulsed because that It is him and the accusers flees and takes nothing small
              of the body
              But with pleasure, which neither the mind nor the wise rejects.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
        <div class="member">
          <div class="member-img">
            <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>William Anderson</h4>
            <span>CTO</span>
            <p>In fact, everyone will have a consequence. Happiness will be pursued by those who leave trouble. pleasures
              for either
              the architect is further dismayed by the manner of the trouble.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
        <div class="member">
          <div class="member-img">
            <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Amanda Jepson</h4>
            <span>Accountant</span>
            <p>The pleasure of things does not gain distinction of mind and abandons the pleasure of the heart. Because or something
              and pain
              so that we can perform our services.</p>
          </div>
        </div>
      </div>

    </div>

  </div>

</section><!-- End Team Section -->

<!-- ======= Clients Section ======= -->
<section id="clients" class="clients">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Our Clients</h2>
      <p>All services at times</p>
    </header>

    <div class="clients-slider swiper">
      <div class="swiper-wrapper align-items-center">
        <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

</section><!-- End Clients Section -->

<!-- ======= Recent Blog Posts Section ======= -->
<!-- <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Blog</h2>
          <p>Recent posts form our Blog</p>
        </header>

        <div class="row">

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Tue, September 15</span>
              <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit</h3>
              <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                  class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-2.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Fri, August 28</span>
              <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
              <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                  class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-3.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Mon, July 11</span>
              <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
              <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                  class="bi bi-arrow-right"></i></a>
            </div>
          </div>

        </div>

      </div> -->

<!-- </section> -->
<!-- End Recent Blog Posts Section -->

<?php
$qq = mysqli_query($conn, "SELECT * FROM `admin`");
// echo "SELECT * FROM `user` WHERE `id` = '$user_id'";
if ($row = mysqli_fetch_assoc($qq))
  extract($row);
?>

<div class="hero" style="height: fit-content;">
  <div class="container">
    <section id="contact" class="contact">
  
      <div class="container mt-5" data-aos="fade-up">
  
        <header class="section-header pt-5">
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
  
                  <p>Chandos Business Center, 87 warwick street, Leamington Spa,<br>England , CV32 4RJ</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p><?= $whatsapp ?></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p><?= $email ?></p>
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
  
    </section>
  </div>
</div>
</main><!-- End #main -->
<!-- scripts -->
<script src="particles.js"></script>
<script src="assets/js/app.js"></script>

<!-- stats.js -->
<!-- <script src="assets/js/lib/stats.js"></script> -->
<script>
  var count_particles, stats, update;
  stats = new Stats;
  stats.setMode(0);
  stats.domElement.style.position = 'absolute';
  stats.domElement.style.left = '0px';
  stats.domElement.style.top = '0px';
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector('.js-count-particles');
  update = function() {
    stats.begin();
    stats.end();
    if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
      count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
    }
    requestAnimationFrame(update);
  };
  requestAnimationFrame(update);
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
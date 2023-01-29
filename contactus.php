

<?php include "header.php"; ?>
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
<?php include "footer.php"; ?>
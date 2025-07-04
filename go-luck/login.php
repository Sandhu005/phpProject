<?php
include("header.php");
?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/img/education/showcase-1.webp);">
      <div class="container position-relative">
        <h1>Contact</h1>
        <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Contact</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- login Section -->
    <section id="contact" class="contact section">

      <!-- login Form Section -->
      <div class="container form-container">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-10">
            <div class="contact-form-wrapper">
              <h2 class="text-center mb-4">Enter Your Credentials!</h2>

              <form action="forms/contact.php" method="post" class="php-email-form">
                <div class="row g-3 flex-column align-items-center">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-with-icon">
                        <i class="bi bi-envelope"></i>
                        <input type="email" class="form-control" name="email" placeholder="Email Address" required="">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-with-icon">
                        <i class="bi bi-text-left"></i>
                        <input type="password" class="form-control" name="pwd" placeholder="Your Password" required="">
                      </div>
                    </div>
                  </div>

                  <!-- <div class="col-12">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div> -->

                  <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary btn-submit">Login</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

<?php
include("footer.php");
?>
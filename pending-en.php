<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Include the CSS files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/fonts/flaticon.css" />
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="assets/css/animate.min.css" />
  <link rel="stylesheet" href="assets/css/slick.css" />
  <link rel="stylesheet" href="assets/css/slick-theme.css" />
  <link rel="stylesheet" href="assets/css/magnific-popup.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/dark.css" />
  <link rel="stylesheet" href="assets/css/responsive.css" />

  <style>
    .custom-navbar {
      background-color: #4c6170;
    }

    .pending-message {
      text-align: center;
      margin-top: 50px;
    }

    .pending-message h2 {
      color: #4c6170;
    }

    .pending-message p {
      color: #6c757d;
    }
  </style>

  <title>Account Pending</title>
  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
</head>

<body data-bs-spy="scroll" data-bs-offset="70">
  <!-- Loader and Navbar sections remain unchanged -->

  <!-- Add this script to check if the user is logged in -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var authToken = localStorage.getItem("authToken");
      if (!authToken) {
        window.location.href = "/login.php";
      }
    });
  </script>

  <!-- Pending Account Section Start -->
  <section class="contact-section pt-100 pb-100 mb-5">
    <div class="container">
      <div class="pending-message">
        <h2>Your Account is Pending</h2>
        <p>
          Thank you for registering. Your account is currently under review.
          We will notify you once your account is activated.
        </p>
      </div>
    </div>
  </section>
  <!-- Pending Account Section End -->

  <!-- Testimonial Section Start -->
  <section id="testimonial" class="testimonial-section">
    <div class="container-fluid">
      <div class="section-title">
        <span>Initiative by</span>
        <h2>Idea and Creativity</h2>
        <p>
          The collaboration of minds and the desire to design an application
          that helps cancer patients and doctors around the world to design,
          develop, maintain, and seek the best for it.
        </p>
      </div>
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-5">
          <div class="testimonial-slider owl-carousel owl-theme">
            <div class="testimonial-item">
              <img
                src="assets/img/app-landing/testimonial/client-img.png"
                alt="client image" />

              <div class="client-info">
                <h3>Tariq Mohammed Bin Kalban</h3>
                <span>Idea, Design, Programming, Follow-up, Testing</span>
              </div>
            </div>

            <div class="testimonial-item">
              <img
                src="assets/img/app-landing/testimonial/client-img-three2.png"
                alt="client image" />

              <div class="client-info">
                <h3>Ahmed Taha</h3>
                <span>Control Panel and API Programmer</span>
              </div>
            </div>

            <div class="testimonial-item">
              <img
                src="assets/img/app-landing/testimonial/client-img-three.png"
                alt="client image" />

              <div class="client-info">
                <h3>Ahmed Majid El-Sayed Farag</h3>
                <span>App Developer and UI Programmer</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="testimonial-shape">
        <img src="assets/img/shape/1.png" alt="shape" />
        <img src="assets/img/shape/2.png" alt="shape" />
        <img src="assets/img/shape/3.png" alt="shape" />
        <img src="assets/img/shape/4.png" alt="shape" />
        <img src="assets/img/shape/5.png" alt="shape" />
      </div>
    </div>
  </section>
  <!-- Testimonial Section End -->

  <!-- Footer Section Start -->
  <footer class="footer-area">
    <div class="copyright-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <center>
              <p>
                © All rights reserved <a target="_blank">for We Can App</a>
              </p>
            </center>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Back to Top -->
  <div class="top-btn">
    <i class="flaticon-startup"></i>
  </div>

  <!-- Include the JS files -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.ajaxchimp.min.js"></script>
  <script src="assets/js/form-validator.min.js"></script>
  <script src="assets/js/contact-form-script.js"></script>
  <script src="assets/js/slick.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

</html>
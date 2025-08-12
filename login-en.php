<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Include the CSS files -->
  <link rel="stylesheet" href="assets/css/bootstrap.rtl.min.css" />
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
  <link rel="stylesheet" href="assets/css/rtl.css" />

  <style>
    .form-group input,
    .form-group select,
    .form-group textarea {
      border: 1px solid #dee2e6;
      border-radius: 5px;
      padding: 10px;
      width: 100%;
      box-sizing: border-box;
      background-color: #fff;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      outline: 2px solid #b0b3b5;
    }

    .custom-navbar {
      background-color: #4c6170;
    }

    #errorMessages {
      color: #dc3545;
      margin-bottom: 15px;
    }

    #successMessage {
      color: #28a745;
      margin-bottom: 15px;
    }
  </style>

  <title>Login</title>
  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
</head>

<body data-bs-spy="scroll" data-bs-offset="70">
  <!-- Loader and Navbar sections remain unchanged -->

  <!-- Login Form Section Start -->
  <section class="contact-section pt-100 pb-100">
    <div class="container">
      <div class="section-title">
        <h2>Login</h2>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="contact-form">
            <div id="errorMessages"></div>
            <div id="successMessage"></div>
            <form id="loginForm">
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  required
                  placeholder="Email"
                  dir="auto" />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  name="password"
                  id="password"
                  required
                  placeholder="Password"
                  dir="auto" />
              </div>
              <button
                type="submit"
                class="default-btn w-100"
                style="
                    background-color: rgb(76, 97, 112);
                    text-align: center;
                    color: white;
                    border-radius: 5px;
                  ">
                Login
              </button>
            </form>
            <div style="text-align: center; margin-top: 20px">
              <a href="/hospital-en.php" class="register-btn">If you're not registered, click here to sign up</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Login Form Section End -->

  <!-- Footer Section Start -->
  <footer class="footer-area">
    <div class="copyright-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p>© All rights reserved by WeCanApp</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section End -->

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

  <script>
    $(document).ready(function() {
      $("#loginForm").on("submit", function(event) {
        event.preventDefault();

        var formData = {
          email: $("#email").val(),
          password: $("#password").val(),
        };

        $.ajax({
          url: "https://admin.wecan.click/api/login",
          type: "POST",
          data: JSON.stringify(formData),
          contentType: "application/json",
          headers: {
            Accept: "application/json",
          },
          success: function(response) {
            if (response.status) {
              // Store the token securely
              localStorage.setItem("authToken", response.data.token);

              // Show success message
              $("#successMessage").html("Login successful");
              $("#errorMessages").html(""); // Clear any previous error messages

              // Redirect to home page after a short delay
              if (response.data.account_status === "pending") {
                window.location.href = "/pending-en.php";
              } else {
                // Redirect to home page after a short delay
                window.location.href = "/home-en.php";
              }
            } else {
              $("#errorMessages").html(response.message);
              $("#successMessage").html(""); // Clear any previous success message
            }
          },
          error: function(xhr, status, error) {
            var errorMessage = "";
            if (xhr.responseJSON && xhr.responseJSON.errors) {
              $.each(xhr.responseJSON.errors, function(key, value) {
                errorMessage += value[0] + "<br>";
              });
            } else if (xhr.responseJSON && xhr.responseJSON.message) {
              errorMessage = xhr.responseJSON.message;
            } else {
              errorMessage =
                "An error occurred during login. Please try again.";
            }
            $("#errorMessages").html(errorMessage);
            $("#successMessage").html(""); // Clear any previous success message
          },
        });
      });
    });
  </script>
</body>

</html>
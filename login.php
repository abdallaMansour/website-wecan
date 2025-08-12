<!DOCTYPE html>
<html lang="ar" dir="rtl">

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
      outline: 2px solid #ec1f1f;
    }

    .custom-navbar {
      background-color: #ec1f1f;
    }

    #errorMessages {
      color: #dc3545;
      margin-bottom: 15px;
    }

    #successMessage {
      color: #28a745;
      margin-bottom: 15px;
    }
    
    label {
      justify-content: center;
      display: flex;
    }
    
    input {
        text-align: center;
    }
    
    .contact-section .contact-form {
        margin-top: 40px;
        padding: 40px !important;
    }
    
    .footer-area .copyright-area {
    border-top: 1px solid #F3A524 !important;
    }
  </style>

  <title>تسجيل الدخول</title>
  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
</head>

<body data-bs-spy="scroll" data-bs-offset="70">
  <!-- Loader and Navbar sections remain unchanged -->

  <!-- Login Form Section Start -->
  <section class="contact-section pt-100 pb-100">
    <div class="container">
        <img src="https://wecan.click/assets/img/logo.png" alt="" style="display: flex; justify-content: center; margin-bottom: 20px; margin-left: auto; margin-right: auto;" />
      <div class="section-title" style="margin-bottom: 0px;">
        <h2 style="margin-bottom: 0px;">تسجيل الدخول</h2>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="contact-form">
            <div id="errorMessages"></div>
            <div id="successMessage"></div>
            <form id="loginForm">
              <div class="form-group">
                <label for="email"> البريد الالكتروني</label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  required
                  placeholder="البريد الالكتروني"
                  dir="auto"
                  oninput="this.dir = this.value && /[^\u0000-\u007F]/.test(this.value) ? 'rtl' : 'ltr'" />
              </div>
              <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input
                  type="password"
                  name="password"
                  id="password"
                  required
                  placeholder="كلمة المرور"
                  dir="auto"
                  oninput="this.dir = this.value && /[^\u0000-\u007F]/.test(this.value) ? 'rtl' : 'ltr'" />
              </div>
              <button
                type="submit"
                class="default-btn w-100"
                style="
                    height: 50px;
                    background-color: #ec1f1f;
                    text-align: center;
                    color: white;
                    border-radius: 5px;
                  ">
                تسجيل الدخول
              </button>
            </form>
            <div style="text-align: center; margin-top: 20px">
              <a href="hospital.php" class="register-btn">إذا لم تكن مسجلاً، انقر هنا للتسجيل</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Login Form Section End -->

  <!-- Footer Section Start -->
  <footer class="footer-area" style="background-color: #ec1f1f;">
    <div class="copyright-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p>© جميع الحقوق محفوظة لتطبيق نستطيع</p>
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
          fcm_token: "hospital",
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
              console.log("res", response);
              localStorage.setItem("authToken", response.data.token);

              // Show success message
              $("#successMessage").html("تم تسجيل الدخول بنجاح");
              $("#errorMessages").html(""); // Clear any previous error messages
              if (response.data.account_status === "pending") {
                window.location.href = "pending.php";
              } else {
                // Redirect to home page after a short delay
                window.location.href = "home.php";
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
                "حدث خطأ أثناء تسجيل الدخول. يرجى المحاولة مرة أخرى.";
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
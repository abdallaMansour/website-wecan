<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

    .file-upload {
      border: 1px solid #dee2e6;
      border-radius: 5px;
      text-align: center;
      padding: 20px;
      cursor: pointer;
      background-color: #fff;
    }

    .file-upload input[type="file"] {
      display: none;
    }

    .file-upload:hover {
      background-color: #f8f9fa;
    }

    .file-upload img {
      max-width: 100%;
      max-height: 200px;
      display: block;
      margin-top: 10px;
    }

    .custom-navbar {
      background-color: #4c6170;
    }

    .hospital-sec {
      margin-top: 1em;
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
  <title>الملف الشخصي للمستشفى</title>
  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
</head>

<body data-bs-spy="scroll" data-bs-offset="70">
  <div class="loader-content">
    <div class="d-table">
      <div class="d-table-cell">
        <div class="spinner">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Navbar Area Start -->
  <nav class="navbar navbar-expand-md navbar-light navbar-area custom-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="assets/img/logo.png" alt="logo" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="/">الرئيسية</a>
            <!-- Changed href="#home" to href="/" -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#features">المميزات</a>
            <!-- Changed href="#features" to href="/#features" -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#screenshots">نظرة على التطبيق</a>
            <!-- Changed href="#screenshots" to href="/#screenshots" -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#pricing">ما ننصحك به</a>
            <!-- Changed href="#pricing" to href="/#pricing" -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#testimonial">مبادرة من</a>
            <!-- Changed href="#testimonial" to href="/#testimonial" -->
          </li>
        </ul>
        <div class="navbar-btn">
          <a href="index-en.php">English</a>
        </div>
        <div class="navbar-btn">
          <a href="/login.php">تسجيل الخروج</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- Navbar Area End -->

  <!-- Profile Form Section Start -->
  <section class="contact-section pt-100 pb-100 hospital-sec">
    <div class="container">
      <div class="section-title">
        <h2>الملف الشخصي للمستشفى</h2>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="contact-form" style="margin-top: 1rem !important">
            <div id="errorMessages"></div>
            <div id="successMessage"></div>
            <form id="hospitalProfileForm" method="POST">
              <div class="row">
                <div class="">
                  <div class="form-group">
                    <label for="hospitalName">اسم المستشفى</label>
                    <input
                      type="text"
                      name="hospital_name"
                      id="hospitalName"
                      required
                      placeholder="اسم المستشفى" />
                  </div>
                </div>
                <div class="">
                  <div class="form-group">
                    <label for="hospitalLogo">شعار المستشفى</label>
                    <div
                      class="file-upload"
                      onclick="document.getElementById('hospitalLogo').click();">
                      <input
                        type="file"
                        name="hospital_logo"
                        id="hospitalLogo"
                        accept="image/*"
                        onchange="previewImage(event)" />
                      <p>انقر للتحميل أو اسحب وأفلت</p>
                      <p>SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                      <img id="preview" src="#" alt="معاينة الصورة" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="userName">الاسم الكامل</label>
                    <input
                      type="text"
                      name="user_name"
                      id="userName"
                      placeholder="الاسم الكامل"
                      required />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">البريد الالكتروني</label>
                    <input
                      type="email"
                      name="email"
                      id="email"
                      required
                      placeholder="البريد الالكتروني" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="phone">رقم التواصل</label>
                    <input
                      type="tel"
                      name="contact_number"
                      id="phone"
                      required
                      placeholder="رقم التواصل" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="country">الدولة</label>
                    <select id="country" name="country_id" required>
                      <option value="">اختر الدولة</option>
                      <!-- Country options will be populated dynamically -->
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="city">المدينة</label>
                    <input
                      type="text"
                      id="city"
                      name="city"
                      required
                      placeholder="ادخل المدينة" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="accountStatus">حالة الحساب</label>
                    <input
                      type="text"
                      id="accountStatus"
                      name="account_status"
                      readonly />
                  </div>
                </div>
                <div class="">
                  <button
                    type="submit"
                    class="default-btn w-100"
                    style="
                        background-color: rgb(76, 97, 112);
                        text-align: center;
                        color: white;
                        border-radius: 5px;
                      ">
                    تحديث الملف الشخصي
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Profile Form Section End -->

  <!-- Footer Section Start -->
  <footer class="footer-area">
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
    function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.getElementById("preview");
        output.src = reader.result;
        output.style.display = "block";
      };
      reader.readAsDataURL(event.target.files[0]);
    }

    $(document).ready(function() {
      var locale = $("html").attr("lang") === "en" ? "en" : "ar";
      var authToken = localStorage.getItem("authToken");

      if (!authToken) {
        window.location.href = "/login.php";
        return;
      }

      // Fetch countries
      $.ajax({
        url: "https://admin.wecan.click/api/countries",
        method: "GET",
        headers: {
          "Accept-Language": locale,
        },
        success: function(response) {
          var countrySelect = $("#country");
          var countries = response.data;

          $.each(countries, function(index, country) {
            countrySelect.append(
              $("<option>", {
                value: country.id,
                text: country.name,
              })
            );
          });

          // After populating countries, fetch hospital profile
          fetchHospitalProfile();
        },
        error: function(xhr, status, error) {
          console.error("Error fetching countries:", error);
          $("#errorMessages").html(
            "حدث خطأ أثناء تحميل قائمة الدول. يرجى المحاولة مرة أخرى."
          );
        },
      });

      function fetchHospitalProfile() {
        $.ajax({
          url: "https://admin.wecan.click/api/profile",
          method: "GET",
          headers: {
            Authorization: "Bearer " + authToken,
            "Accept-Language": locale,
          },
          success: function(response) {
            if (response.status) {
              var hospitalData = response.data;
              $("#hospitalName").val(hospitalData.hospital_name);
              $("#userName").val(hospitalData.user_name);
              $("#email").val(hospitalData.email);
              $("#phone").val(hospitalData.contact_number);
              $("#country").val(hospitalData.country_id);
              $("#city").val(hospitalData.city);
              $("#accountStatus").val(hospitalData.account_status);

              if (hospitalData.hospital_logo) {
                $("#preview")
                  .attr(
                    "src",
                    "https://admin.wecan.click/storage/" +
                    hospitalData.hospital_logo
                  )
                  .show();
              }
            } else {
              $("#errorMessages").html("Failed to fetch hospital profile.");
            }
          },
          error: function(xhr, status, error) {
            console.error("Error fetching hospital profile:", error);
            $("#errorMessages").html(
              "حدث خطأ أثناء تحميل الملف الشخصي. يرجى المحاولة مرة أخرى."
            );
          },
        });
      }
      $("#hospitalProfileForm").on("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
          url: "https://admin.wecan.click/api/profile",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          headers: {
            Authorization: "Bearer " + authToken,
            "Accept-Language": locale,
          },
          success: function(response) {
            if (response.status) {
              $("#successMessage").html(response.message);
              $("#errorMessages").html("");
            } else {
              $("#errorMessages").html(response.message);
              $("#successMessage").html("");
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
                "حدث خطأ أثناء تحديث الملف الشخصي. يرجى المحاولة مرة أخرى.";
            }
            $("#errorMessages").html(errorMessage);
            $("#successMessage").html("");
          },
        });
      });

      // Function to handle logout
      function logout() {
        $.ajax({
          url: "https://admin.wecan.click/api/logout",
          type: "POST",
          headers: {
            Authorization: "Bearer " + authToken,
            "Accept-Language": locale,
          },
          success: function(response) {
            if (response.status) {
              localStorage.removeItem("authToken");
              window.location.href = "/login.php";
            } else {
              $("#errorMessages").html("Failed to logout. Please try again.");
            }
          },
          error: function(xhr, status, error) {
            console.error("Error logging out:", error);
            $("#errorMessages").html(
              "حدث خطأ أثناء تسجيل الخروج. يرجى المحاولة مرة أخرى."
            );
          },
        });
      }

      // Attach logout function to logout button
      $(".navbar-btn a:contains('تسجيل الخروج')").on("click", function(e) {
        e.preventDefault();
        logout();
      });
    });
  </script>
</body>

</html>
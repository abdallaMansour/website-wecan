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
            display: none;
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

    <title>تسجيل الطبيب</title>

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
                        <a class="nav-link active" href="index.php#home">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#features">المميزات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#screenshots">نظرة على التطبيق</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#pricing">ما ننصحك به</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#testimonial">مبادرة من</a>
                    </li>
                </ul>

                <div class="navbar-btn">
                    <a href="index-en.php">English</a>
                </div>
                <div class="navbar-btn">
                    <a href="doctor-login.php">تسجيل دخول الطبيب</a>
                </div>
                <div class="navbar-btn">
                    <a href="login.php">تسجيل الدخول</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar Area End -->

    <!-- Registration Form Section Start -->

    <section class="contact-section pt-100 pb-100 hospital-sec">
        <div class="container">
            <div class="section-title">
                <h2>تسجيل الطبيب</h2>
            </div>

            <!-- doctor inputs [name, profile_picture, email, password, contact_number, experience_years, hospital_id, country_id] -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form" style="margin-top: 1rem !important">
                        <div id="errorMessages"></div>
                        <div id="successMessage"></div>
                        <form id="hospitalForm" method="POST">
                            <div class="row">
                                <div class="">
                                    <div class="form-group">
                                        <label for="name">اسم الطبيب</label>

                                        <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            required
                                            placeholder="اسم الطبيب" />
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <label for="profile_picture">الصورة الشخصية</label>

                                        <div
                                            class="file-upload"
                                            onclick="document.getElementById('profile_picture').click();">
                                            <input
                                                type="file"
                                                name="profile_picture"
                                                id="profile_picture"
                                                accept="image/*"
                                                required
                                                onchange="previewImage(event)" />
                                            <p>اضافة صورة شخصية</p>
                                            <p>SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                            <img id="preview" src="#" alt="Image Preview" />
                                        </div>
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
                                        <label for="password">كلمة المرور</label>
                                        <input
                                            type="password"
                                            name="password"
                                            id="password"
                                            required
                                            placeholder="كلمة المرور" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contact_number">رقم الهاتف</label>

                                        <input
                                            type="tel"
                                            name="contact_number"
                                            id="contact_number"
                                            required
                                            placeholder="رقم الهاتف" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">اختر الدولة</label>

                                        <select id="country" name="country_id" required>
                                            <option value="">اختر الدولة</option>
                                            <!-- Country options will be populated dynamically -->
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hospital">اختر المستشفى</label>
                                        <select id="hospital" name="hospital_id" required>
                                            <option value="">اختر المستشفى</option>
                                            <!-- Hospital options will be populated dynamically -->
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="experience_years">سنوات الخبرة</label>

                                        <input
                                            type="number"
                                            id="experience_years"
                                            name="experience_years"
                                            required
                                            placeholder="سنوات الخبرة" />
                                    </div>
                                </div>

                                <!-- ... existing code ... -->
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
                                        إرسال
                                    </button>
                                </div>
                                <!-- ... existing code ... -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Form Section End -->

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

    <!-- Add this new script to fetch countries and populate the select -->

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
                },
                error: function(xhr, status, error) {
                    console.error("Error html countries:", error);
                    $("#errorMessages").html(
                        "حدث خطأ أثناء تحميل قائمة الدول. يرجى المحاولة مرة أخرى."
                    );
                },
            });

            $.ajax({
                url: "https://admin.wecan.click/api/hospitals",
                method: "GET",
                headers: {
                    "Accept-Language": locale,
                },
                success: function(response) {
                    var hospitalSelect = $("#hospital");
                    var hospitals = response.data;

                    $.each(hospitals, function(index, hospital) {
                        hospitalSelect.append(
                            $("<option>", {
                                value: hospital.id,
                                text: hospital.name,
                            })
                        );
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error html hospitals:", error);
                    $("#errorMessages").html(
                        "حدث خطأ أثناء تحميل قائمة المستشفيات. يرجى المحاولة مرة أخرى."
                    );
                },
            });

            $("#hospitalForm").on("submit", function(event) {
                event.preventDefault();

                var formData = new FormData(this);

                formData.append("show_info_to_patients", 1);
                formData.append("preferred_language", "ar");

                $.ajax({
                    url: "https://admin.wecan.click/api/register-doctor",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status) {
                            // Store the token securely
                            localStorage.setItem("authToken", response.data.token);

                            // Show success message
                            $("#successMessage").html(response.message);
                            $("#errorMessages").html(""); // Clear any previous error messages

                            // Redirect to home page after a short delay
                            setTimeout(function() {
                                window.location.href = "http://hospital.wecan.ae/login?hospital=" + response.data.hospital_id;
                            }, 2000);
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
                            errorMessage = "حدث خطأ أثناء التسجيل. يرجى المحاولة مرة أخرى.";
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
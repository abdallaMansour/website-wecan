<?php include 'layouts/header-en.php' ?>

<!-- Registration Form Section Start -->

<section class="contact-section pt-100 pb-100 hospital-sec" style="margin-top: 100px !important">
    <div class="container">
        <div class="section-title">
            <h2>Doctor Registration</h2>
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
                                    <label for="name">Doctor Name</label>

                                    <input
                                        type="text"
                                        name="name"
                                        id="name"
                                        required
                                        placeholder="Doctor Name" />
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label for="profile_picture">Profile Picture</label>

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
                                        <p>Add Profile Picture</p>
                                        <p>SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                        <img id="preview" src="#" alt="Image Preview" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>

                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        required
                                        placeholder="Email" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input
                                        type="password"
                                        name="password"
                                        id="password"
                                        required
                                        placeholder="Password" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_number">Contact Number</label>

                                    <input
                                        type="tel"
                                        name="contact_number"
                                        id="contact_number"
                                        required
                                        placeholder="Contact Number" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                        <label for="country">Select Country</label>

                                    <select id="country" name="country_id" required>
                                        <option value="">Select Country</option>
                                        <!-- Country options will be populated dynamically -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hospital">Select Hospital</label>
                                    <select id="hospital" name="hospital_id" required>
                                        <option value="">Select Hospital</option>
                                        <!-- Hospital options will be populated dynamically -->
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="experience_years">Experience Years</label>

                                    <input
                                        type="number"
                                        id="experience_years"
                                        name="experience_years"
                                        required
                                        placeholder="Experience Years" />
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
                                    Submit
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
                    <p>© All rights reserved for We Can App</p>
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
                    "An error occurred while loading the country list. Please try again."
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
                    "An error occurred while loading the hospitals list. Please try again."
                );
            },
        });

        $("#hospitalForm").on("submit", function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            formData.append("show_info_to_patients", 1);
            formData.append("preferred_language", "en");

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
                            window.location.href = "http://hospital.wecan.ae/login"
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
                        errorMessage = "An error occurred while registering. Please try again.";
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
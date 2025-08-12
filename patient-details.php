<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>تفاصيل المريض</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap"
    rel="stylesheet" />
  <style>
    body {
      font-family: "Cairo", sans-serif;
    }

    .tab-button.active {
      background-color: #e2e8f0;
      /* Tailwind's bg-gray-200 */
    }
  </style>
</head>

<body class="bg-gray-100">
  <div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">تفاصيل المريض</h1>

    <!-- Info Table -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
      <h2 class="text-xl font-semibold mb-4">معلومات المريض</h2>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <p class="font-semibold">الاسم:</p>
          <p id="patientName"></p>
        </div>
        <div>
          <p class="font-semibold">البريد الإلكتروني:</p>
          <p id="patientEmail"></p>
        </div>
        <div>
          <p class="font-semibold">رقم الهاتف:</p>
          <p id="patientPhone"></p>
        </div>
        <div>
          <p class="font-semibold">العنوان:</p>
          <p id="patientAddress"></p>
        </div>
      </div>
    </div>

    <!-- Tabs -->
    <div class="fi-resource-relation-managers flex flex-col gap-y-6">
      <nav
        class="fi-tabs flex max-w-full gap-x-1 overflow-x-auto mx-auto rounded-xl bg-white p-2 shadow-sm ring-1 ring-gray-950/5 mb-4"
        aria-label="Tabs"
        role="tablist">
        <button
          class="fi-tabs-item group flex items-center gap-x-2 rounded-lg px-3 py-2 text-sm font-medium outline-none transition duration-75 tab-button active"
          role="tab"
          aria-selected="true"
          data-tab="medications">
          الأدوية
        </button>
        <button
          class="fi-tabs-item group flex items-center gap-x-2 rounded-lg px-3 py-2 text-sm font-medium outline-none transition duration-75 tab-button"
          role="tab"
          aria-selected="false"
          data-tab="chemotherapy">
          العلاج الكيميائي
        </button>
        <button
          class="fi-tabs-item group flex items-center gap-x-2 rounded-lg px-3 py-2 text-sm font-medium outline-none transition duration-75 tab-button"
          role="tab"
          aria-selected="false"
          data-tab="appointments">
          المواعيد
        </button>
        <button
          class="fi-tabs-item group flex items-center gap-x-2 rounded-lg px-3 py-2 text-sm font-medium outline-none transition duration-75 tab-button"
          role="tab"
          aria-selected="false"
          data-tab="food">
          الغذاء
        </button>
        <button
          class="fi-tabs-item group flex items-center gap-x-2 rounded-lg px-3 py-2 text-sm font-medium outline-none transition duration-75 tab-button"
          role="tab"
          aria-selected="false"
          data-tab="health-report">
          التقرير الصحي
        </button>
      </nav>
    </div>

    <!-- Tab Content -->
    <div id="tabContent" class="bg-white shadow-md rounded-lg p-6">
      <!-- Content will be loaded here -->
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      const patientEmail = new URLSearchParams(window.location.search).get(
        "email"
      );
      const authToken = localStorage.getItem("authToken");

      function fetchPatientInfo() {
        $.ajax({
          url: `https://admin.wecan.click/api/get-patient-by-email?email=${patientEmail}`,
          type: "get",
          headers: {
            Authorization: "Bearer " + authToken,
          },
          success: function(response) {
            if (response.status) {
              $("#patientName").text(response.data.name);
              $("#patientEmail").text(response.data.email);
              $("#patientPhone").text(response.data.phone);
              $("#patientAddress").text(response.data.address);
            }
          },
          error: function(xhr) {
            console.error("Error fetching patient info:", xhr.responseText);
          },
        });
      }

      function loadTabContent(tabName) {
        $.ajax({
          url: `tab-components/${tabName}.php`,
          type: "get",
          success: function(response) {
            $("#tabContent").html(response);
            if (
              typeof window[
                `init${tabName.charAt(0).toUpperCase() + tabName.slice(1)}Tab`
              ] === "function"
            ) {
              window[
                `init${tabName.charAt(0).toUpperCase() + tabName.slice(1)}Tab`
              ]();
            }
          },
          error: function(xhr) {
            console.error(`Error loading ${tabName} tab:`, xhr.responseText);
          },
        });
      }

      $(".tab-button").on("click", function() {
        $(".tab-button").removeClass("active").attr("aria-selected", "false");
        $(this).addClass("active").attr("aria-selected", "true");
        loadTabContent($(this).data("tab"));
      });

      fetchPatientInfo();
      loadTabContent("medications"); // Load default tab
    });
  </script>
</body>

</html>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>التقرير الصحي</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ar.js"></script>
    <style>
      body {
        padding-right: 250px; /* Adjust for sidebar width */
        font-family: "Cairo", sans-serif;
      }

      @media (max-width: 768px) {
        body {
          padding-right: 0;
        }
        .sidebar {
          width: 100%;
          height: auto;
          position: relative;
        }
        .sidebar ul {
          display: flex;
          flex-direction: row;
          justify-content: space-around;
        }
      }
    </style>
  </head>

  <body class="bg-gray-100">
    <!-- Sidebar -->
    <div
      id="main-sidebar"
      class="w-64 bg-gray-800 text-white p-4 fixed top-0 right-0 h-full z-30"
    >
      <ul>
        <li class="mb-2">
          <a href="/home.php" class="block p-2 hover:bg-gray-700 rounded"
            >الصفحة الرئيسية</a
          >
        </li>
        <li class="mb-2">
          <a href="/chat.php" class="block p-2 hover:bg-gray-700 rounded"
            >الدردشة</a
          >
        </li>
        <li class="nav-item">
          <a
            href="/attached-patients.php"
            class="block p-2 hover:bg-gray-700 rounded"
            >المرضى المرتبطين</a
          >
        </li>
        <li class="nav-item mb-2">
          <a href="/profile.php" class="block p-2 hover:bg-gray-700 rounded">
            الحساب الشخصي</a
          >
        </li>
        <li class="mb-2">
          <a
            href="#"
            class="block p-2 hover:bg-gray-700 rounded"
            id="logout-link"
            >تسجيل الخروج</a
          >
        </li>
      </ul>
    </div>
    <div id="healthReportTab" class="container mx-auto px-4 py-8">
      <h2 class="text-2xl font-semibold mb-6">التقرير الصحي</h2>
      <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200 text-gray-700">
          <tr>
            <th
              class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider"
            >
              العنوان
            </th>
            <th
              class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider"
            >
              اسم الطبيب
            </th>
            <th
              class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider"
            >
              التاريخ والوقت
            </th>
            <th
              class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider"
            >
              التعليمات
            </th>
            <th
              class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider"
            >
              الملاحظات
            </th>
            <th
              class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider"
            >
              الإجراءات
            </th>
          </tr>
        </thead>
        <tbody id="healthReportTableBody" class="divide-y divide-gray-200">
          <!-- Health reports will be dynamically added here -->
        </tbody>
      </table>
      <button
        id="addHealthReportBtn"
        class="mt-6 px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300"
      >
        إضافة تقرير صحي جديد
      </button>
    </div>

    <!-- Modal for adding/editing health reports -->
    <div
      id="healthReportModal"
      class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden"
    >
      <div
        class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white"
      >
        <h3 id="modalTitle" class="text-lg font-semibold mb-4">
          إضافة تقرير صحي جديد
        </h3>
        <form id="healthReportForm">
          <input type="hidden" id="reportId" />
          <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700"
              >العنوان</label
            >
            <input
              type="text"
              id="title"
              name="title"
              required
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
            />
          </div>
          <div class="mb-4">
            <label
              for="doctor_name"
              class="block text-sm font-medium text-gray-700"
              >اسم الطبيب</label
            >
            <input
              type="text"
              id="doctor_name"
              name="doctor_name"
              required
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
            />
          </div>
          <div class="mb-4">
            <label
              for="datetime"
              class="block text-sm font-medium text-gray-700"
              >التاريخ والوقت</label
            >
            <input
              type="text"
              id="datetime"
              name="datetime"
              required
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
            />
          </div>
          <div class="mb-4">
            <label
              for="instructions"
              class="block text-sm font-medium text-gray-700"
              >التعليمات</label
            >
            <textarea
              id="instructions"
              name="instructions"
              rows="3"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
            ></textarea>
          </div>
          <div class="mb-4">
            <label for="notes" class="block text-sm font-medium text-gray-700"
              >الملاحظات</label
            >
            <textarea
              id="notes"
              name="notes"
              rows="3"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
            ></textarea>
          </div>
          <div class="flex justify-end">
            <button
              type="button"
              id="closeModal"
              class="mr-2 px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400"
            >
              إلغاء
            </button>
            <button
              type="submit"
              class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600"
            >
              حفظ
            </button>
          </div>
        </form>
      </div>
    </div>

    <script type="module">
      import flatpickr from "https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/+esm";

      function initHealthReportTab() {
        const patientEmail = new URLSearchParams(window.location.search).get(
          "email"
        );
        const patientId = new URLSearchParams(window.location.search).get("id");
        const authToken = localStorage.getItem("authToken");
        const hospitalId = localStorage.getItem("hospitalId"); // Get hospital_id from local storage

        // Initialize flatpickr
        flatpickr("#datetime", {
          enableTime: true,
          dateFormat: "Y-m-d H:i:S",
          time_24hr: true,
          locale: "ar",
          disableMobile: "true",
          allowInput: true,
        });

        function fetchHealthReports() {
          $.ajax({
            url: `https://admin.wecan.click/api/patient-health-reports/${patientEmail}`,
            type: "GET",
            headers: {
              Authorization: `Bearer ${authToken}`,
            },
            success: function (response) {
              if (response.status) {
                populateHealthReports(response.data);
              }
            },
            error: function (xhr) {
              console.error("Error fetching health reports:", xhr.responseText);
            },
          });
        }

        function populateHealthReports(reports) {
          const tableBody = $("#healthReportTableBody");
          tableBody.empty();
          reports.forEach(function (report) {
            const row = `
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">${
                              report.title
                            }</td>
                            <td class="px-6 py-4 whitespace-nowrap">${
                              report.doctor_name
                            }</td>
                            <td class="px-6 py-4 whitespace-nowrap">${new Date(
                              report.datetime
                            ).toLocaleString("ar-EG")}</td>
                            <td class="px-6 py-4">${
                              report.instructions || "-"
                            }</td>
                            <td class="px-6 py-4">${report.notes || "-"}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button class="text-indigo-600 hover:text-indigo-900 edit-report" data-report='${JSON.stringify(
                                  report
                                )}'>تعديل</button>
                                <button class="mr-2 text-red-600 hover:text-red-900 delete-report" data-id="${
                                  report.id
                                }">حذف</button>
                            </td>
                        </tr>
                    `;
            tableBody.append(row);
          });
        }

        function showModal(title, report = null) {
          $("#modalTitle").text(title);
          if (report) {
            $("#reportId").val(report.id);
            $("#title").val(report.title);
            $("#doctor_name").val(report.doctor_name);
            $("#datetime").val(report.datetime);
            $("#instructions").val(report.instructions);
            $("#notes").val(report.notes);
          } else {
            $("#healthReportForm")[0].reset();
            $("#reportId").val("");
          }
          $("#healthReportModal").removeClass("hidden");
        }

        function hideModal() {
          $("#healthReportModal").addClass("hidden");
        }

        function addHealthReport(formData) {
          formData.append("user_id", patientId);
          $.ajax({
            url: "https://admin.wecan.click/api/hospital/patient-health-reports",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
              Authorization: `Bearer ${authToken}`,
            },
            success: function (response) {
              console.log("Health report added successfully", response);
              hideModal();
              fetchHealthReports();
            },
            error: function (xhr) {
              console.error("Error adding health report:", xhr.responseText);
              alert("Error: " + xhr.responseText);
            },
          });
        }

        function updateHealthReport(reportId, formData) {
          formData.append("_method", "PUT");
          formData.append("hospital_id", hospitalId); // Append hospital_id to formData

          $.ajax({
            url: `https://admin.wecan.click/api/hospital/patient-health-reports/${reportId}`,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
              Authorization: `Bearer ${authToken}`,
            },
            success: function (response) {
              console.log("Health report updated successfully", response);
              hideModal();
              fetchHealthReports();
            },
            error: function (xhr) {
              console.error("Error updating health report:", xhr.responseText);
              alert("Error: " + xhr.responseText);
            },
          });
        }

        function deleteHealthReport(reportId) {
          $.ajax({
            url: `https://admin.wecan.click/api/patient-health-reports/${reportId}`,
            type: "DELETE",
            headers: {
              Authorization: `Bearer ${authToken}`,
            },
            success: function (response) {
              if (response.status === true) {
                fetchHealthReports();
                alert(response.message);
              } else {
                console.error(
                  "Error deleting health report:",
                  response.message
                );
                alert("Error: " + response.message);
              }
            },
            error: function (xhr) {
              console.error("Error deleting health report:", xhr.responseText);
              alert("Error: " + xhr.responseText);
            },
          });
        }

        $("#addHealthReportBtn").on("click", function () {
          showModal("إضافة تقرير صحي جديد");
        });

        $("#closeModal").on("click", hideModal);

        $("#healthReportForm").on("submit", function (e) {
          e.preventDefault();
          const reportId = $("#reportId").val();
          const formData = new FormData();
          formData.append("title", $("#title").val());
          formData.append("doctor_name", $("#doctor_name").val());
          formData.append("datetime", $("#datetime").val());
          formData.append("instructions", $("#instructions").val());
          formData.append("notes", $("#notes").val());
          formData.append("user_id", patientId);
          formData.append("show", true);

          if (reportId) {
            updateHealthReport(reportId, formData);
          } else {
            addHealthReport(formData);
          }
        });

        $("#healthReportTableBody").on("click", ".edit-report", function () {
          const report = $(this).data("report");
          showModal("تعديل التقرير الصحي", report);
        });

        $("#healthReportTableBody").on("click", ".delete-report", function () {
          const reportId = $(this).data("id");
          if (confirm("هل أنت متأكد من حذف هذا التقرير الصحي؟")) {
            deleteHealthReport(reportId);
          }
        });

        fetchHealthReports();
      }

      $(document).ready(function () {
        initHealthReportTab();
      });
    </script>
  </body>
</html>

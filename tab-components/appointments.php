<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>إدارة المواعيد</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
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

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
      <h2 class="text-2xl font-semibold mb-6">المواعيد</h2>
      <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200 text-gray-700">
          <tr>
            <th
              class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider"
            >
              التاريخ والوقت
            </th>
            <th
              class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider"
            >
              اسم الطبيب
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
        <tbody id="appointmentsTableBody" class="divide-y divide-gray-200">
          <!-- Appointments will be dynamically added here -->
        </tbody>
      </table>
      <button
        id="addAppointmentBtn"
        class="mt-6 px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300"
      >
        إضافة موعد جديد
      </button>
    </div>

    <!-- Modal for adding/editing appointments -->
    <div
      id="appointmentModal"
      class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden"
    >
      <div
        class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white"
      >
        <h3 id="modalTitle" class="text-lg font-semibold mb-4">
          إضافة موعد جديد
        </h3>
        <form id="appointmentForm">
          <input type="hidden" id="appointmentId" />
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

      function initAppointmentsTab() {
        const patientEmail = new URLSearchParams(window.location.search).get(
          "email"
        );
        const patientId = new URLSearchParams(window.location.search).get("id");
        const authToken = localStorage.getItem("authToken");
        let dateTimePicker = null;

        function initializeFlatpickr() {
          if (dateTimePicker) {
            dateTimePicker.destroy();
          }
          const datetimeInput = document.getElementById("datetime");
          if (datetimeInput) {
            dateTimePicker = flatpickr("#datetime", {
              enableTime: true,
              dateFormat: "Y-m-d H:i:S",
              time_24hr: true,
              locale: "ar",
              disableMobile: "true",
              allowInput: true,
              minDate: "today",
            });
          }
        }

        function fetchAppointments() {
          $.ajax({
            url: `https://admin.wecan.click/api/patient-appointments/${patientEmail}`,
            type: "GET",
            headers: {
              Authorization: `Bearer ${authToken}`,
            },
            success: function (response) {
              if (response.status) {
                populateAppointments(response.data);
              }
            },
            error: function (xhr) {
              console.error("Error fetching appointments:", xhr.responseText);
            },
          });
        }

        function populateAppointments(appointments) {
          const tableBody = $("#appointmentsTableBody");
          tableBody.empty();
          appointments.forEach(function (appointment) {
            const row = `
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">${new Date(
                appointment.datetime
              ).toLocaleString("ar-EG")}</td>
              <td class="px-6 py-4 whitespace-nowrap">${
                appointment.doctor_name
              }</td>
              <td class="px-6 py-4">${appointment.instructions || "-"}</td>
              <td class="px-6 py-4">${appointment.notes || "-"}</td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <button class="text-indigo-600 hover:text-indigo-900 edit-appointment" data-id="${
                  appointment.id
                }">تعديل</button>
                <button class="mr-2 text-red-600 hover:text-red-900 delete-appointment" data-id="${
                  appointment.id
                }">حذف</button>
              </td>
            </tr>
          `;
            tableBody.append(row);
          });
        }

        function showModal(title, appointment = null) {
          $("#modalTitle").text(title);
          if (appointment) {
            $("#appointmentId").val(appointment.id);
            $("#doctor_name").val(appointment.doctor_name);
            $("#datetime").val(appointment.datetime);
            $("#instructions").val(appointment.instructions);
            $("#notes").val(appointment.notes);
          } else {
            $("#appointmentForm")[0].reset();
            $("#appointmentId").val("");
          }
          $("#appointmentModal").removeClass("hidden");
          initializeFlatpickr();
        }

        function hideModal() {
          $("#appointmentModal").addClass("hidden");
          if (dateTimePicker) {
            dateTimePicker.destroy();
            dateTimePicker = null;
          }
        }

        $("#addAppointmentBtn").on("click", function () {
          showModal("إضافة موعد جديد");
        });

        $("#closeModal").on("click", hideModal);

        $("#appointmentForm").on("submit", function (e) {
          e.preventDefault();
          const appointmentId = $("#appointmentId").val();
          const appointmentData = {
            doctor_name: $("#doctor_name").val(),
            datetime: $("#datetime").val(),
            instructions: $("#instructions").val(),
            notes: $("#notes").val(),
            user_id: patientId,
            show: true,
          };

          const url = appointmentId
            ? `https://admin.wecan.click/api/hospital/appointments/${appointmentId}`
            : "https://admin.wecan.click/api/hospital-appointments";
          const method = appointmentId ? "PUT" : "POST";

          $.ajax({
            url: url,
            type: method,
            headers: {
              Authorization: `Bearer ${authToken}`,
              "Content-Type": "application/json",
            },
            data: JSON.stringify(appointmentData),
            success: function (response) {
              console.log("Appointment saved successfully", response);
              hideModal();
              fetchAppointments();
            },
            error: function (xhr) {
              console.error("Error saving appointment:", xhr.responseText);
              alert("Error: " + xhr.responseText);
            },
          });
        });

        $("#appointmentsTableBody").on(
          "click",
          ".edit-appointment",
          function () {
            const appointmentId = $(this).data("id");
            $.ajax({
              url: `https://admin.wecan.click/api/appointments/${appointmentId}`,
              type: "GET",
              headers: {
                Authorization: `Bearer ${authToken}`,
              },
              success: function (response) {
                if (response.status === true) {
                  showModal("تعديل الموعد", response.data);
                } else {
                  console.error(
                    "Error fetching appointment data:",
                    response.message
                  );
                }
              },
              error: function (xhr) {
                console.error(
                  "Error fetching appointment data:",
                  xhr.responseText
                );
              },
            });
          }
        );

        $("#appointmentsTableBody").on(
          "click",
          ".delete-appointment",
          function () {
            const appointmentId = $(this).data("id");
            if (confirm("هل أنت متأكد من حذف هذا الموعد؟")) {
              $.ajax({
                url: `https://admin.wecan.click/api/appointments/${appointmentId}`,
                type: "DELETE",
                headers: {
                  Authorization: `Bearer ${authToken}`,
                },
                success: function (response) {
                  if (response.status === true) {
                    fetchAppointments();
                    alert(response.message);
                  } else {
                    console.error(
                      "Error deleting appointment:",
                      response.message
                    );
                    alert("Error: " + response.message);
                  }
                },
                error: function (xhr) {
                  console.error(
                    "Error deleting appointment:",
                    xhr.responseText
                  );
                  alert("Error: " + xhr.responseText);
                },
              });
            }
          }
        );

        fetchAppointments();
      }

      $(document).ready(function () {
        initAppointmentsTab();
      });
    </script>
  </body>
</html>

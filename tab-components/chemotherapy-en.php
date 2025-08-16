<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chemotherapy - We Can</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets-en/css/bootstrap.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="../assets-en/fonts/flaticon.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="../assets-en/css/owl.carousel.min.css">
    <!-- Owl Carousel Theme Default CSS -->
    <link rel="stylesheet" href="../assets-en/css/owl.theme.default.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="../assets-en/css/animate.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="../assets-en/css/slick.css">
    <!-- Slick Theme CSS -->
    <link rel="stylesheet" href="../assets-en/css/slick-theme.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="../assets-en/css/magnific-popup.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="../assets-en/css/style.css">
    <!-- Dark CSS -->
    <link rel="stylesheet" href="../assets-en/css/dark.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../assets-en/css/responsive.css">
    
    <!-- Favicon Link -->
    <link rel="icon" type="image/png" href="../assets-en/img/favicon.png">
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
      class="w-64 bg-gray-800 text-white p-4 fixed top-0 left-0 h-full z-30"
    >
      <ul>
        <li class="mb-2">
          <a href="/home.php" class="block p-2 hover:bg-gray-700 rounded"
            >Home</a
          >
        </li>

        <li class="mb-2">
          <a href="/chat.php" class="block p-2 hover:bg-gray-700 rounded"
            >Chat</a
          >
        </li>
        <li class="nav-item">
          <a
            href="/attached-patients.php"
            class="block p-2 hover:bg-gray-700 rounded"
            >Attached Patients</a
          >
        </li>
        <li class="nav-item mb-2">
          <a href="/profile-en.php" class="block p-2 hover:bg-gray-700 rounded">
            Profile
          </a>
        </li>
        <li class="mb-2">
          <a
            href="#"
            class="block p-2 hover:bg-gray-700 rounded"
            id="logout-link"
            >Logout</a
          >
        </li>
      </ul>
    </div>
    <div id="appointmentsTab" class="container mx-auto px-4 py-8">
      <h2 class="text-2xl font-semibold mb-6">Chemotherapy</h2>
      <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200 text-gray-700">
          <tr>
            <th
              class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider"
            >
              Date and Time
            </th>
            <th
              class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider"
            >
              Doctor's Name
            </th>
            <th
              class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider"
            >
              Instructions
            </th>
            <th
              class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider"
            >
              Notes
            </th>
            <th
              class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider"
            >
              Actions
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
        Add New Appointment
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
          Add New Appointment
        </h3>
        <form id="appointmentForm">
          <input type="hidden" id="appointmentId" />
          <div class="mb-4">
            <label
              for="doctor_name"
              class="block text-sm font-medium text-gray-700"
              >Doctor's Name</label
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
              >Date and Time</label
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
              >Instructions</label
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
              >Notes</label
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
              Cancel
            </button>
            <button
              type="submit"
              class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600"
            >
              Save
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
              ).toLocaleString("en-US")}</td>
              <td class="px-6 py-4 whitespace-nowrap">${
                appointment.doctor_name
              }</td>
              <td class="px-6 py-4">${appointment.instructions || "-"}</td>
              <td class="px-6 py-4">${appointment.notes || "-"}</td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <button class="text-indigo-600 hover:text-indigo-900 edit-appointment" data-id="${
                  appointment.id
                }">Edit</button>
                <button class="mr-2 text-red-600 hover:text-red-900 delete-appointment" data-id="${
                  appointment.id
                }">Delete</button>
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
        }

        function hideModal() {
          $("#appointmentModal").addClass("hidden");
        }

        $("#addAppointmentBtn").on("click", function () {
          showModal("Add New Appointment");
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
                  showModal("Edit Appointment", response.data);
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
            if (confirm("Are you sure you want to delete this appointment?")) {
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

        // Initialize flatpickr on the datetime input
        flatpickr("#datetime", {
          enableTime: true,
          dateFormat: "Y-m-d H:i:S",
          time_24hr: true,
          locale: "en",
          disableMobile: "true",
          allowInput: true,
          minDate: "today",
        });

        fetchAppointments();
      }

      $(document).ready(function () {
        initAppointmentsTab();
      });
    </script>
  </body>
</html>

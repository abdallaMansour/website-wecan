<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Connected Patients</title>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
    rel="stylesheet" />

  <style>
    :root {
      --primary-color: #007bff;
      --secondary-color: #6c757d;
      --success-color: #28a745;
      --danger-color: #dc3545;
      --warning-color: #ffc107;
    }

    body {
      font-family: "Inter", sans-serif;
      background-color: #f8f9fa;
      padding-left: 250px;
    }

    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      width: 250px;
      background-color: #343a40;
      padding: 20px;
      color: white;
      z-index: 1000;
    }

    .content {
      margin-left: 100px;
      padding: 20px;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .card-header {
      background-color: var(--primary-color);
      color: white;
      border-radius: 15px 15px 0 0 !important;
    }

    .table th {
      background-color: #f8f9fa;
    }

    .btn-action {
      padding: 0.25rem 0.5rem;
      font-size: 0.875rem;
    }

    @media (max-width: 768px) {
      body {
        padding-left: 0;
      }

      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .content {
        margin-left: 0;
      }
    }
  </style>
</head>

<body>
  <div class="flex w-full">
    <div
      id="main-sidebar"
      class="w-64 bg-gray-800 text-white p-4 ease-in-out fixed top-0 left-0 h-full z-30">
      <ul>
        <li class="mb-2">
          <a href="/home.php" class="block p-2 hover:bg-gray-700 rounded">Home</a>
        </li>
        <li class="mb-2">
          <a href="/chat.php" class="block p-2 hover:bg-gray-700 rounded">Chat</a>
        </li>
        <li class="nav-item">
          <a
            href="/attached-patients.php"
            class="nav-link block p-2 hover:bg-gray-700 rounded">Connected Patients</a>
        </li>
        <li class="nav-item mb-2">
          <a
            href="/profile-en.php"
            class="block p-2 hover:bg-gray-700 rounded">
            Profile
          </a>
        </li>
        <li class="mb-2">
          <a
            href="#"
            class="block p-2 hover:bg-gray-700 rounded"
            id="logout-link">Logout</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="content">
    <h1 class="mb-4">Connected Patients</h1>

    <div class="card">
      <div class="card-header">
        <h2>Patient List</h2>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Country</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="patientsTableBody">
              <!-- Patient rows will be dynamically added here -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      // Check for authentication
      const authToken = localStorage.getItem("authToken");
      if (!authToken) {
        window.location.href = "/index.php";
      }

      // Fetch and display patients
      function fetchPatients() {
        $.ajax({
          url: "https://admin.wecan.click/api/attachments",
          type: "GET",
          headers: {
            Authorization: "Bearer " + authToken,
          },
          success: function(response) {
            if (response.status) {
              displayPatients(response.data.patients);
            }
          },
          error: function(xhr) {
            console.error("Error fetching patient data:", xhr.responseText);
          },
        });
      }

      function displayPatients(patients) {
        const tableBody = $("#patientsTableBody");
        tableBody.empty();
        patients.forEach(function(patient) {
          const row = `
              <tr>
                <td>${patient.name}</td>
                <td>${patient.email}</td>
                <td>${patient.phone || "Not available"}</td>
                <td>${patient.country || "Not available"}</td>
                <td>
                  <button class="btn btn-primary btn-sm btn-action view-btn" data-id="${
                    patient.id
                  }" data-email="${patient.email}">
                    <i class="fas fa-eye"></i> View
                  </button>
                  <button class="btn btn-danger btn-sm btn-action detach-btn" data-id="${
                    patient.id
                  }" data-email="${patient.email}">
                    <i class="fas fa-unlink"></i> Detach
                  </button>
                </td>
              </tr>
            `;
          tableBody.append(row);
        });
      }

      // View patient details
      $(document).on("click", ".view-btn", function() {
        const patientId = $(this).data("id");
        const patientEmail = $(this).data("email");
        window.location.href = `/patient-details-en.php?id=${patientId}&email=${patientEmail}`;
      });

      // Detach patient
      $(document).on("click", ".detach-btn", function() {
        const patientId = $(this).data("id");
        const patientEmail = $(this).data("email");
        if (confirm("Are you sure you want to detach this patient?")) {
          $.ajax({
            url: `https://admin.wecan.click/api/detach-patient/${patientId}?email=${patientEmail}`,
            type: "POST",
            headers: {
              Authorization: "Bearer " + authToken,
            },
            success: function(response) {
              if (response.status) {
                alert("Successfully detached");
                fetchPatients();
              }
            },
            error: function(xhr) {
              alert("Error during detachment: " + xhr.responseText);
            },
          });
        }
      });

      // Logout functionality
      $("#logout-link").on("click", function(e) {
        e.preventDefault();
        localStorage.removeItem("authToken");
        window.location.href = "/index.php";
      });

      // Initial fetch of patients
      fetchPatients();
    });
  </script>
</body>

</html>
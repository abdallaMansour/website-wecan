<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>المرتبطين - الصفحة الرئيسية</title>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Inter:wght@100..900&display=swap"
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
      background-color: #f8f9fa;
      padding-left: 250px;
      /* Adjust for sidebar width */
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

    .summary-card {
      text-align: center;
      background-color: var(--primary-color);
      color: white;
    }

    .summary-card .card-title {
      font-size: 1.2rem;
      margin-bottom: 0.5rem;
    }

    .summary-card .card-text {
      font-size: 2rem;
      font-weight: bold;
    }

    .attachment-item {
      border: 1px solid #dee2e6;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 15px;
      background-color: white;
    }

    .attachment-status {
      font-weight: bold;
      padding: 5px 10px;
      border-radius: 20px;
      display: inline-block;
      margin-bottom: 10px;
    }

    .status-pending {
      background-color: var(--warning-color);
      color: black;
    }

    .status-approved {
      background-color: var(--success-color);
      color: white;
    }

    .btn-action {
      padding: 5px 10px;
      font-size: 0.9rem;
    }

    #newRequestBtn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      font-size: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    #newRequestForm {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1000;
      width: 90%;
      max-width: 500px;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 999;
      display: none;
    }

    #newRequestForm {
      display: none;
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

      .sidebar ul {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
      }

      .container {
        margin-top: 20px;
      }
    }
  </style>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const authToken = localStorage.getItem("authToken");
      if (!authToken) {
        window.location.href = "/index.php";
      }
    });
  </script>
</head>

<body>
  <!-- Include Sidebar -->
  <div class="flex w-full">
    <div
      id="main-sidebar"
      class="w-64 bg-gray-800 text-white p-4 ease-in-out fixed top-0 left-0 h-full z-30">
      <ul>
        <li class="mb-2">
          <a href="/home.php" class="block p-2 hover:bg-gray-700 rounded">الصفحة الرئيسية</a>
        </li>
        <li class="mb-2">
          <a href="/chat.php" class="block p-2 hover:bg-gray-700 rounded">الدردشة</a>
        </li>
        <!--
            <li class="mb-2">
              <a
                href="/patients.php"
                class="block p-2 hover:bg-gray-700 rounded"
                >المرضى</a
              >
            </li>
            <li class="mb-2">
              <a
                href="/doctors.php"
                class="block p-2 hover:bg-gray-700 rounded"
                >الأطباء</a
              >
            </li>
            <li class="mb-2">
              <a
                href="/appointments.php"
                class="block p-2 hover:bg-gray-700 rounded"
                >المواعيد</a
              >
            </li>
                 -->

        <li class="nav-item mb-2">
          <a
            href="/attached-patients.php"
            class="nav-link block p-2 hover:bg-gray-700 rounded">المرضى المرتبطين</a>
        </li>
        <li class="nav-item mb-2">
          <a href="/profile.php" class="block p-2 hover:bg-gray-700 rounded">
            الحساب الشخصي</a>
        </li>
        <li class="mb-2">
          <a
            href="#"
            class="block p-2 hover:bg-gray-700 rounded"
            id="logout-link">تسجيل الخروج</a>
        </li>
      </ul>
    </div>

    <div class="container mt-5">
      <h1 class="mb-4 text-center">المرتبطين</h1>

      <!-- New Cards for اجمالي المرضى and اجمالي الاطباء -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div
          class="fi-wi-stats-overview-stat relative rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
          <div class="grid gap-y-2">
            <div class="flex items-center gap-x-2">
              <span
                class="text-[15px] text-[rgb(75,79,81)] fi-wi-stats-overview-stat-label font-medium">
                اجمالي المرضى
              </span>
            </div>
            <div
              id="totalPatients"
              class="fi-wi-stats-overview-stat-value text-3xl font-semibold tracking-tight text-gray-950">
              0
            </div>
          </div>
        </div>
        <div
          class="fi-wi-stats-overview-stat relative rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
          <div class="grid gap-y-2">
            <div class="flex items-center gap-x-2">
              <span
                class="text-[15px] text-[rgb(75,79,81)] fi-wi-stats-overview-stat-label font-medium">
                اجمالي الاطباء
              </span>
            </div>
            <div
              id="totalDoctors"
              class="fi-wi-stats-overview-stat-value text-3xl font-semibold tracking-tight text-gray-950">
              0
            </div>
          </div>
        </div>
      </div>

      <button
        id="newRequestBtn"
        class="btn btn-primary"
        type="button"
        title="إضافة طلب جديد">
        <i class="fas fa-plus"></i>
      </button>

      <!-- Table for Attachments -->
      <div class="mt-5">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="py-2 px-4">الاسم</th>
                <th class="py-2 px-4">البريد الإلكتروني</th>
                <th class="py-2 px-4">نوع الحساب</th>
                <th class="py-2 px-4">الحالة</th>
                <th class="py-2 px-4">الإجراءات</th>
              </tr>
            </thead>
            <tbody id="attachmentsTableBody">
              <!-- Rows will be appended here by JavaScript -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="overlay" id="overlay"></div>
  <div id="newRequestForm">
    <div class="card">
      <div class="card-header bg-[#4C6170]">
        <h2>إرسال طلب ارتباط جديد</h2>
      </div>
      <div class="card-body">
        <form id="attachmentForm">
          <div class="mb-3">
            <label for="emailInput" class="form-label">البريد الإلكتروني</label>
            <input
              type="email"
              class="form-control"
              id="emailInput"
              required />
          </div>
          <div class="mb-3">
            <label for="typeSelect" class="form-label">النوع</label>
            <select class="form-select" id="typeSelect" required>
              <option value="doctor">طبيب</option>
              <option value="patient">مريض</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary bg-[#4C6170]">
            إرسال طلب الارتباط
          </button>
          <button
            type="button"
            class="btn btn-secondary"
            id="cancelRequestBtn">
            إلغاء
          </button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      function fetchAttachments() {
        $.ajax({
          url: "https://admin.wecan.click/api/attachments",
          type: "GET",
          headers: {
            Authorization: "Bearer " + localStorage.getItem("authToken"),
          },
          success: function(response) {
            if (response.status) {
              displayAttachments(
                response.data.doctors,
                "#doctorsList",
                "doctor"
              );
              displayAttachments(
                response.data.patients,
                "#patientsList",
                "patient"
              );
              updateSummary(
                response.data.doctors.length,
                response.data.patients.length
              );
              populateAttachmentsTable(
                response.data.doctors,
                response.data.patients
              );
            }
          },
          error: function(xhr) {
            console.error("Error fetching attachments:", xhr.responseText);
          },
        });
      }

      function displayAttachments(attachments, listId, type) {
        const list = $(listId);
        list.empty();
        attachments.forEach(function(attachment) {
          const statusClass =
            attachment.pivot.status === "pending" ?
            "status-pending" :
            "status-approved";
          const statusText =
            attachment.pivot.status === "pending" ?
            "قيد الانتظار" :
            "تمت الموافقة";
          const item = `
              <div class="attachment-item">
                <h5>${attachment.name}</h5>
                <p>${attachment.email}</p>
                <span class="attachment-status ${statusClass}">${statusText}</span>
                <div class="mt-2">
                  ${
                    attachment.pivot.status === "pending"
                      ? `<button class="btn btn-success btn-action approve-btn" data-email="${attachment.email}" data-type="${type}">
                      <i class="fas fa-check"></i> الموافقة
                    </button>`
                      : ""
                  }
                  <button class="btn btn-danger btn-action cancel-btn" data-email="${
                    attachment.email
                  }" data-type="${type}">
                    <i class="fas fa-times"></i> إلغاء الارتباط
                  </button>
                </div>
              </div>
            `;
          list.append(item);
        });
      }

      function updateSummary(doctorsCount, patientsCount) {
        $("#totalDoctors").text(doctorsCount);
        $("#totalPatients").text(patientsCount);
      }

      function populateAttachmentsTable(doctors, patients) {
        const tableBody = $("#attachmentsTableBody");
        tableBody.empty();

        const allAttachments = [...doctors, ...patients];
        allAttachments.forEach(function(attachment) {
          const statusClass =
            attachment.pivot.status === "pending" ?
            "text-yellow-500" :
            "text-green-500";
          const statusText =
            attachment.pivot.status === "pending" ?
            "قيد الانتظار" :
            "تمت الموافقة";
          const row = `
              <tr>
                <td class="py-2 px-4 border-b">${attachment.name}</td>
                <td class="py-2 px-4 border-b">${attachment.email}</td>
                <td class="py-2 px-4 border-b">${
                  attachment.account_type === "patient" ? "مريض" : "طبيب"
                }</td>

                <td class="py-2 px-4 border-b ${statusClass}">${statusText}</td>
                <td class="py-2 px-4 border-b">
                  ${
                    attachment.pivot.status === "pending"
                      ? `<button class="btn btn-success btn-action approve-btn" data-email="${attachment.email}" data-type="${attachment.account_type}">
                      <i class="fas fa-check"></i> الموافقة
                    </button>`
                      : ""
                  }
                  <button class="btn btn-danger btn-action cancel-btn" data-email="${
                    attachment.email
                  }" data-type="${attachment.account_type}">
                    <i class="fas fa-times"></i> إلغاء الارتباط
                  </button>
                </td>
              </tr>
            `;
          tableBody.append(row);
        });
      }

      $("#attachmentForm").on("submit", function(e) {
        e.preventDefault();
        const email = $("#emailInput").val();
        const type = $("#typeSelect").val();

        let url =
          type === "doctor" ?
          "https://admin.wecan.click/api/attach/doctor-to-hospital" :
          "https://admin.wecan.click/api/attach/hospital-to-patient";

        $.ajax({
          url: url,
          type: "POST",
          headers: {
            Authorization: "Bearer " + localStorage.getItem("authToken"),
            Accept: "application/json",
            "Content-Type": "application/json",
          },
          data: JSON.stringify({
            data_email: email,
          }),
          success: function(response) {
            if (response.status) {
              alert("تم إرسال طلب الارتباط بنجاح");
              hideNewRequestForm();
              fetchAttachments();
            }
          },
          error: function(xhr) {
            alert("حدث خطأ أثناء إرسال طلب الارتباط: " + xhr.responseText);
          },
        });
      });

      $(document).on("click", ".approve-btn", function() {
        const email = $(this).data("email");
        const type = $(this).data("type");

        $.ajax({
          url: "https://admin.wecan.click/api/approve-attachment",
          type: "POST",
          headers: {
            Authorization: "Bearer " + localStorage.getItem("authToken"),
          },
          data: {
            user_email: email,
            type: type,
          },
          success: function(response) {
            if (response.status) {
              alert("تمت الموافقة على الارتباط بنجاح");
              fetchAttachments();
            }
          },
          error: function(xhr) {
            alert("حدث خطأ أثناء الموافقة على الارتباط: " + xhr.responseText);
          },
        });
      });

      $(document).on("click", ".cancel-btn", function() {
        const email = $(this).data("email");
        const type = $(this).data("type");

        if (confirm(`هل أنت متأكد من رغبتك في إلغاء الارتباط مع ${email}?`)) {
          // Implement cancellation logic here
          alert(`تم إلغاء الارتباط مع ${email} (${type})`);
          fetchAttachments();
        }
      });

      $("#newRequestBtn").on("click", showNewRequestForm);
      $("#cancelRequestBtn").on("click", hideNewRequestForm);

      function showNewRequestForm() {
        $("#newRequestForm").show();
        $("#overlay").show();
      }

      function hideNewRequestForm() {
        $("#newRequestForm").hide();
        $("#overlay").hide();
        $("#attachmentForm")[0].reset();
      }

      fetchAttachments();
    });
  </script>
</body>

</html>
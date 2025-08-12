<!-- food.php -->
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
<div id="foodTab">
  <h2 class="text-xl font-semibold mb-4">الغذاء</h2>
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th
          class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
        >
          اسم الطعام
        </th>
        <th
          class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
        >
          التعليمات
        </th>
        <th
          class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
        >
          الملاحظات
        </th>
        <th
          class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
        >
          الإجراءات
        </th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200" id="foodTableBody">
      <!-- Food items will be dynamically added here -->
    </tbody>
  </table>
  <button
    id="addFoodBtn"
    class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
  >
    إضافة طعام جديد
  </button>
</div>

<!-- Food Modal -->
<div id="foodModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
  <div
    class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
  >
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <span
      class="hidden sm:inline-block sm:align-middle sm:h-screen"
      aria-hidden="true"
      >&#8203;</span
    >
    <div
      class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
    >
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
            <h3
              class="text-lg leading-6 font-medium text-gray-900"
              id="modalTitle"
            >
              إضافة طعام جديد
            </h3>
            <div class="mt-2">
              <input
                type="text"
                id="foodName"
                placeholder="اسم الطعام"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              />
              <textarea
                id="instructions"
                placeholder="التعليمات"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                rows="3"
              ></textarea>
              <textarea
                id="notes"
                placeholder="الملاحظات"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                rows="3"
              ></textarea>
              <label for="attachments" class="block mt-1">المرفقات</label>
              <input
                type="file"
                id="attachments"
                multiple
                class="mt-1 block w-full"
              />
              <div class="mt-1">
                <input type="checkbox" id="show" checked />
                <label for="show">إظهار للمريض</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button
          id="saveFoodBtn"
          class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-600 sm:ml-3 sm:w-auto sm:text-sm"
        >
          حفظ
        </button>
        <button
          id="cancelFoodBtn"
          class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:w-auto sm:text-sm"
        >
          إلغاء
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  function initFoodTab() {
    const datetimeInputs = document.querySelectorAll(".flatpickr-calendar");
    datetimeInputs.forEach(input => input.remove());
    const patientEmail = new URLSearchParams(window.location.search).get(
      "email"
    );
    const patientId = new URLSearchParams(window.location.search).get("id");
    const authToken = localStorage.getItem("authToken");
    const hospitalId = localStorage.getItem("hospitalId"); // Get hospital_id from local storage

    let foodData = [];

    function fetchFoodInfo() {
      $.ajax({
        url: `https://admin.wecan.click/api/patient-foods/${patientEmail}`,
        type: "GET",
        headers: {
          Authorization: "Bearer " + authToken,
        },
        success: function (response) {
          if (response.status) {
            foodData = response.data;
            populateFood(foodData);
          }
        },
        error: function (xhr) {
          console.error("Error fetching food information:", xhr.responseText);
        },
      });
    }

    function populateFood(foods) {
      const tableBody = $("#foodTableBody");
      tableBody.empty();
      foods.forEach(function (food) {
        const isHospital = food.is_hospital;
        const row = `
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">${food.food_name}</td>
            <td class="px-6 py-4 whitespace-nowrap">${food.instructions}</td>
            <td class="px-6 py-4 whitespace-nowrap">${food.notes}</td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              ${
                !isHospital
                  ? `<span class="text-gray-500">غير قابل للتعديل</span>`
                  : `<button class="text-indigo-600 hover:text-indigo-900 edit-food" data-id="${food.id}">تعديل</button>
                     <button class="ml-2 text-red-600 hover:text-red-900 delete-food" data-id="${food.id}">حذف</button>`
              }
            </td>
          </tr>
        `;
        tableBody.append(row);
      });
    }

    $("#addFoodBtn").on("click", function () {
      $("#foodModal").removeClass("hidden");
      $("#modalTitle").text("إضافة طعام جديد");
      clearModalFields();
    });

    $("#foodTableBody").on("click", ".edit-food", function () {
      const foodId = $(this).data("id");
      const food = foodData.find((f) => f.id === foodId);
      if (food) {
        populateModalFields(food);
        $("#foodModal").removeClass("hidden");
        $("#modalTitle").text("تعديل طعام");
      }
    });

    $("#foodTableBody").on("click", ".delete-food", function () {
      const foodId = $(this).data("id");
      if (confirm("هل أنت متأكد من حذف هذا الطعام؟")) {
        deleteFood(foodId);
      }
    });

    $("#saveFoodBtn").on("click", function () {
      const foodData = {
        food_name: $("#foodName").val(),
        instructions: $("#instructions").val(),
        notes: $("#notes").val(),
        show: $("#show").is(":checked"),
      };

      const attachments = $("#attachments")[0].files;
      const formData = new FormData();
      for (const key in foodData) {
        formData.append(key, foodData[key]);
      }
      for (let i = 0; i < attachments.length; i++) {
        formData.append("attachments[]", attachments[i]);
      }

      if ($("#modalTitle").text() === "إضافة طعام جديد") {
        addFood(formData);
      } else {
        updateFood(formData);
      }
    });

    $("#cancelFoodBtn").on("click", function () {
      $("#foodModal").addClass("hidden");
    });

    function clearModalFields() {
      $("#foodName").val("");
      $("#instructions").val("");
      $("#notes").val("");
      $("#attachments").val("");
      $("#show").prop("checked", true);
      $("#foodModal").removeData("foodId");
    }

    function populateModalFields(food) {
      $("#foodName").val(food.food_name);
      $("#instructions").val(food.instructions);
      $("#notes").val(food.notes);
      $("#show").prop("checked", food.show);
      $("#foodModal").data("foodId", food.id);
    }

    function addFood(formData) {
      formData.append("user_id", patientId);
      $.ajax({
        url: "https://admin.wecan.click/api/patient-foods/hospital",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        headers: {
          Authorization: "Bearer " + authToken,
        },
        success: function (response) {
          if (response.status) {
            alert("تمت إضافة الطعام بنجاح");
            $("#foodModal").addClass("hidden");
            fetchFoodInfo();
          }
        },
        error: function (xhr) {
          console.error("Error adding food:", xhr.responseText);
          alert("حدث خطأ أثناء إضافة الطعام");
        },
      });
    }

    function updateFood(formData) {
      const foodId = $("#foodModal").data("foodId");
      formData.append("_method", "PUT");
      formData.append("hospital_id", hospitalId); // Append hospital_id to formData

      $.ajax({
        url: `https://admin.wecan.click/api/patient-foods/${foodId}/hospital`,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        headers: {
          Authorization: "Bearer " + authToken,
        },
        success: function (response) {
          if (response.status) {
            alert("تم تحديث الطعام بنجاح");
            $("#foodModal").addClass("hidden");
            fetchFoodInfo();
          }
        },
        error: function (xhr) {
          console.error("Error updating food:", xhr.responseText);
          alert("حدث خطأ أثناء تحديث الطعام");
        },
      });
    }

    function deleteFood(foodId) {
      $.ajax({
        url: `https://admin.wecan.click/api/patient-foods/${foodId}`,
        type: "DELETE",
        headers: {
          Authorization: "Bearer " + authToken,
        },
        success: function (response) {
          if (response.status) {
            alert("تم حذف الطعام بنجاح");
            fetchFoodInfo();
          }
        },
        error: function (xhr) {
          console.error("Error deleting food:", xhr.responseText);
          alert("حدث خطأ أثناء حذف الطعام");
        },
      });
    }

    fetchFoodInfo();
  }
</script>

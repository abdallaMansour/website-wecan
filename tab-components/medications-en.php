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
        <a
          href="/profile-en.php"
          class="block p-2 hover:bg-gray-700 rounded"
        >
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
  <!-- medications.php -->
  <div id="medicationsTab">
    <h2 class="text-xl font-semibold mb-4">Medications</h2>
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th
            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Drug Name
          </th>
          <th
            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Frequency
          </th>
          <th
            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Per
          </th>
          <th
            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Actions
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200" id="medicationsTableBody">
        <!-- Medications will be dynamically added here -->
      </tbody>
    </table>
    <button
      id="addMedicationBtn"
      class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
    >
      Add New Medication
    </button>
  </div>
  
  <!-- Popup Modal -->
  <div id="medicationModal" class="hidden fixed z-50 inset-0 overflow-y-auto">
      <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <div class="fixed inset-0 transition-opacity" aria-hidden="true">
              <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
          <div class="inline-block align-bottom bg-white rounded-lg text-right overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
              <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                  <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modalTitle">Add New Medication</h3>
                  <div class="space-y-4">
                      <div>
                          <label for="drugName" class="block text-sm font-medium text-gray-700">Drug Name</label>
                          <input type="text" id="drugName" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                      </div>
                      <div>
                          <label for="frequency" class="block text-sm font-medium text-gray-700">Frequency</label>
                          <input type="number" id="frequency" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                      </div>
                      <div>
                          <label for="frequencyPer" class="block text-sm font-medium text-gray-700">Per</label>
                          <select id="frequencyPer" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                              <option value="day">Day</option>
                              <option value="week">Week</option>
                              <option value="month">Month</option>
                          </select>
                      </div>
                      <div>
                          <label for="instructions" class="block text-sm font-medium text-gray-700">Instructions</label>
                          <textarea id="instructions" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                      </div>
                      <div>
                          <label for="duration" class="block text-sm font-medium text-gray-700">Duration (in days)</label>
                          <input type="number" id="duration" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                      </div>
                      <div>
                          <label for="drugImage" class="block text-sm font-medium text-gray-700">Drug Image</label>
                          <input type="file" id="drugImage" accept="image/*" class="mt-1 block w-full">
                      </div>
                      <div class="flex items-center">
                          <input type="checkbox" id="show" checked class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                          <label for="show" class="mr-2 block text-sm text-gray-900">Show to Patient</label>
                      </div>
                  </div>
              </div>
              <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                  <button id="saveMedicationBtn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                      Save
                  </button>
                  <button id="cancelMedicationBtn" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                      Cancel
                  </button>
              </div>
          </div>
      </div>
  </div>
  <script>
    function initMedicationsTab() {
       const datetimeInputs = document.querySelectorAll(".flatpickr-calendar");
      datetimeInputs.forEach(input => input.remove());
      const patientEmail = new URLSearchParams(window.location.search).get(
        "email"
      );
      const patientId = new URLSearchParams(window.location.search).get("id");
      const authToken = localStorage.getItem("authToken");
      const hospitalId = localStorage.getItem("hospitalId"); // Get hospital_id from local storage
      let medicationsData = [];
  
      function fetchMedications() {
        $.ajax({
          url: `https://admin.wecan.click/api/patient-medications/${patientEmail}`,
          type: "get",
          headers: {
            Authorization: "Bearer " + authToken,
          },
          success: function (response) {
            if (response.status) {
              medicationsData = response.data; // Store the fetched medications
              populateMedications(medicationsData);
            }
          },
          error: function (xhr) {
            console.error("Error fetching medications:", xhr.responseText);
          },
        });
      }
  
      function populateMedications(medications) {
        const tableBody = $("#medicationsTableBody");
        tableBody.empty();
        medications.forEach(function (medication) {
          const isHospital = medication.is_hospital;
          const row = `
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">${medication.drug_name}</td>
            <td class="px-6 py-4 whitespace-nowrap">${medication.frequency}</td>
            <td class="px-6 py-4 whitespace-nowrap">${
              medication.frequency_per
            }</td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              ${
                !isHospital
                  ? `<span class="text-gray-500">Not Editable</span>`
                  : `<button class="text-indigo-600 hover:text-indigo-900 edit-medication" data-id="${medication.id}">Edit</button>
                 <button class="ml-2 text-red-600 hover:text-red-900 delete-medication" data-id="${medication.id}">Delete</button>`
              }
              <button class="ml-2 text-blue-600 hover:text-blue-900 view-image" data-image="${
                medication.drug_image
              }">View Image</button>
            </td>
          </tr>
        `;
          tableBody.append(row);
        });
      }
  
      $("#addMedicationBtn").on("click", function () {
        $("#medicationModal").removeClass("hidden");
        $("#modalTitle").text("Add New Medication");
        clearModalFields();
      });
  
      $("#medicationsTableBody").on("click", ".edit-medication", function () {
        const medicationId = $(this).data("id");
        const medication = medicationsData.find((med) => med.id === medicationId);
        if (medication) {
          populateModalFields(medication);
          $("#medicationModal").removeClass("hidden");
          $("#modalTitle").text("Edit Medication");
        }
      });
  
      $("#medicationsTableBody").on("click", ".delete-medication", function () {
        const medicationId = $(this).data("id");
        if (confirm("Are you sure you want to delete this medication?")) {
          deleteMedication(medicationId);
        }
      });
  
      $("#medicationsTableBody").on("click", ".view-image", function () {
        const imageUrl = $(this).data("image");
        if (imageUrl) {
          window.open(imageUrl, "_blank");
        } else {
          alert("No image available for this medication.");
        }
      });
  
      $("#saveMedicationBtn").on("click", function () {
        const medicationData = {
          drug_name: $("#drugName").val(),
          frequency: $("#frequency").val(),
          frequency_per: $("#frequencyPer").val(),
          instructions: $("#instructions").val(),
          duration: $("#duration").val(),
          show: $("#show").is(":checked"),
        };
  
        const drugImage = $("#drugImage")[0].files[0];
        const formData = new FormData();
        for (const key in medicationData) {
          formData.append(key, medicationData[key]);
        }
        if (drugImage) {
          formData.append("drug_image", drugImage);
        }
  
        if ($("#modalTitle").text() === "Add New Medication") {
          addMedication(formData);
        } else {
          updateMedication(formData);
        }
      });
  
      $("#cancelMedicationBtn").on("click", function () {
        $("#medicationModal").addClass("hidden");
      });
  
      function clearModalFields() {
        $("#drugName").val("");
        $("#frequency").val("");
        $("#frequencyPer").val("day");
        $("#instructions").val("");
        $("#duration").val("");
        $("#drugImage").val("");
        $("#show").prop("checked", true);
        $("#medicationModal").removeData("medicationId");
        $("#currentImage").attr("src", "").hide();
      }
  
      function populateModalFields(medication) {
        $("#drugName").val(medication.drug_name);
        $("#frequency").val(medication.frequency);
        $("#frequencyPer").val(medication.frequency_per);
        $("#instructions").val(medication.instructions);
        $("#duration").val(medication.duration);
        $("#show").prop("checked", medication.show);
        $("#medicationModal").data("medicationId", medication.id);
  
        // Display current image
        if (medication.drug_image) {
          $("#currentImage").attr("src", medication.drug_image).show();
        } else {
          $("#currentImage").attr("src", "").hide();
        }
      }
  
      function addMedication(formData) {
        formData.append("user_id", patientId);
        $.ajax({
          url: "https://admin.wecan.click/api/hospital-medications",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          headers: {
            Authorization: "Bearer " + authToken,
          },
          success: function (response) {
            if (response.status) {
              alert("Medication added successfully");
              $("#medicationModal").addClass("hidden");
              fetchMedications();
            }
          },
          error: function (xhr) {
            console.error("Error adding medication:", xhr.responseText);
            alert("An error occurred while adding the medication");
          },
        });
      }
  
      function updateMedication(formData) {
        const medicationId = $("#medicationModal").data("medicationId");
        formData.append("_method", "PUT");
        formData.append("hospital_id", hospitalId); // Append hospital_id to formData
        $.ajax({
          url: `https://admin.wecan.click/api/hospital/medications/${medicationId}`,
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          headers: {
            Authorization: "Bearer " + authToken,
          },
          success: function (response) {
            if (response.status) {
              alert("Medication updated successfully");
              $("#medicationModal").addClass("hidden");
              fetchMedications();
            }
          },
          error: function (xhr) {
            console.error("Error updating medication:", xhr.responseText);
            alert("An error occurred while updating the medication");
          },
        });
      }
  
      function deleteMedication(medicationId) {
        $.ajax({
          url: `https://admin.wecan.click/api/medications/${medicationId}`,
          type: "DELETE",
          headers: {
            Authorization: "Bearer " + authToken,
          },
          success: function (response) {
            if (response.status) {
              alert("Medication deleted successfully");
              fetchMedications();
            }
          },
          error: function (xhr) {
            console.error("Error deleting medication:", xhr.responseText);
            alert("An error occurred while deleting the medication");
          },
        });
      }
  
      fetchMedications();
    }
  </script>
<!-- notes.php -->
<div id="notesTab">
  <h2 class="text-xl font-semibold mb-4">الملاحظات</h2>
  <form id="notesForm" class="space-y-4">
    <div>
      <label for="patientNotes" class="block text-sm font-medium text-gray-700"
        >ملاحظات المريض</label
      >
      <textarea
        id="patientNotes"
        name="patientNotes"
        rows="5"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
      ></textarea>
    </div>
    <button
      type="submit"
      class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
    >
      حفظ الملاحظات
    </button>
  </form>
</div>

<script>
  function initNotesTab() {
    const patientEmail = new URLSearchParams(window.location.search).get(
      "email"
    );
    const authToken = localStorage.getItem("authToken");

    function fetchNotes() {
      $.ajax({
        url: `https://admin.wecan.click/api/patients/${patientEmail}/notes`,
        type: "get",
        headers: {
          Authorization: "Bearer " + authToken,
        },
        success: function (response) {
          if (response.status) {
            populateNotes(response.data);
          }
        },
        error: function (xhr) {
          console.error("Error fetching notes:", xhr.responseText);
        },
      });
    }

    function populateNotes(notes) {
      $("#patientNotes").val(notes);
    }

    $("#notesForm").on("submit", function (e) {
      e.preventDefault();
      updateNotes();
    });

    function updateNotes() {
      const data = {
        notes: $("#patientNotes").val(),
      };

      $.ajax({
        url: `https://admin.wecan.click/api/patients/${patientEmail}/notes`,
        type: "PUT",
        headers: {
          Authorization: "Bearer " + authToken,
        },
        data: data,
        success: function (response) {
          if (response.status) {
            alert("تم تحديث الملاحظات بنجاح");
          }
        },
        error: function (xhr) {
          console.error("Error updating notes:", xhr.responseText);
          alert("حدث خطأ أثناء تحديث الملاحظات");
        },
      });
    }

    fetchNotes();
  }
</script>

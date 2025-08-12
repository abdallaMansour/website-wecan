<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>شاشة الدردشة مع الاطباء والمرضى المرتبطين</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body class="bg-gray-100 font-sans">
  <div class="flex flex-col h-screen">
    <!-- Navbar -->
    <div class="bg-white shadow p-4">
      <h1 class="text-2xl font-bold">الدردشة مع الاطباء والمرضى المرتبطين</h1>
    </div>

    <div class="flex flex-1 overflow-hidden">
      <!-- Main Sidebar (Toggleable) -->
      <div
        id="main-sidebar"
        class="w-64 bg-gray-800 text-white p-4 transform -translate-x-full transition-transform duration-300 ease-in-out fixed top-0 left-0 h-full z-30">
        <ul>
          <li class="mb-2">
            <a href="home.php" class="block p-2 hover:bg-gray-700 rounded">الصفحة الرئيسية</a>
          </li>
          <!--
            <li class="mb-2">
              <a
                href="patients.php"
                class="block p-2 hover:bg-gray-700 rounded"
                >المرضى</a
              >
            </li>
            <li class="mb-2">
              <a
                href="doctors.php"
                class="block p-2 hover:bg-gray-700 rounded"
                >الأطباء</a
              >
            </li>
            <li class="mb-2">
              <a
                href="appointments.php"
                class="block p-2 hover:bg-gray-700 rounded"
                >المواعيد</a
              >
            </li>
                 -->
          <li class="nav-item">
            <a href="profile.php" class="nav-link"> الحساب الشخصي</a>
          </li>
          <li class="mb-2">
            <a
              href="#"
              class="block p-2 hover:bg-gray-700 rounded"
              id="logout-link">تسجيل الخروج</a>
          </li>
        </ul>
      </div>

      <!-- Chat Rooms Sidebar (Always Visible) -->
      <div class="w-64 bg-white border-r border-gray-200 p-4 overflow-y-auto">
        <h3 class="text-xl font-semibold mb-4">غرف الدردشة</h3>
        <div id="chat-rooms" class="space-y-2">
          <!-- Chat rooms will be dynamically added here -->
        </div>
      </div>

      <div class="flex-1 flex flex-col">
        <div id="chat-container" class="flex-1 p-4 overflow-y-auto">
          <div class="bg-white rounded-lg shadow-md h-full flex flex-col">
            <div class="bg-[#4C6170] text-white p-4 rounded-t-lg">
              <h3 id="chat-room-title" class="text-xl font-semibold">
                الدردشة
              </h3>
            </div>
            <div
              id="chat-messages"
              class="flex-1 overflow-y-auto p-4 space-y-4">
              <!-- Messages will be dynamically added here -->
            </div>
            <div class="p-4 border-t bg-gray-100">
              <form id="chat-form" class="flex">
                <input
                  type="text"
                  id="message-input"
                  class="flex-1 border rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#e2f4fe] ml-[5px]"
                  placeholder="اكتب رسالتك هنا..." />
                <button
                  type="submit"
                  class="bg-[#4C6170] text-white px-4 py-2 rounded-lg hover:bg-[#5C7280] focus:outline-none focus:ring-2 focus:ring-blue-500 active:bg-[#3B4E5A]">
                  <i class="fas fa-paper-plane"></i> إرسال
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Toggle button for main sidebar -->
  <button
    id="toggle-sidebar"
    class="fixed top-4 left-4 z-40 bg-gray-800 text-white p-2 rounded-full focus:outline-none focus:ring-2 focus:ring-gray-600">
    <i class="fas fa-bars"></i>
  </button>

  <script>
    const chatRooms = document.getElementById("chat-rooms");
    const chatContainer = document.getElementById("chat-container");
    const chatMessages = document.getElementById("chat-messages");
    const chatForm = document.getElementById("chat-form");
    const messageInput = document.getElementById("message-input");
    const chatRoomTitle = document.getElementById("chat-room-title");
    let currentChatRoomId = null;
    let currentPage = 1;
    const perPage = 50;

    function fetchChatRooms() {
      fetch(
          "https://admin.wecan.click/api/chat/user-rooms?user_type=hospital", {
            headers: {
              Authorization: "Bearer " + localStorage.getItem("authToken"),
            },
          }
        )
        .then((response) => response.json())
        .then((data) => {
          chatRooms.innerHTML = "";
          data.forEach((room, index) => {
            const roomElement = document.createElement("a");
            roomElement.classList.add(
              "flex",
              "items-center",
              "p-2",
              "hover:bg-gray-100",
              "rounded"
            );

            let userName = "";
            let userImage = "";
            if (room.doctor) {
              userName = `Doctor: ${room.doctor.name}`;
              userImage = room.doctor.profile_picture_path;
            } else if (room.patient) {
              userName = `Patient: ${room.patient.name}`;
              userImage = room.patient.profile_picture_path;
            }

            if (userImage) {
              const imgElement = document.createElement("img");
              imgElement.src = userImage;
              imgElement.alt = userName;
              imgElement.classList.add(
                "w-10",
                "h-10",
                "rounded-full",
                "mr-3"
              );
              roomElement.appendChild(imgElement);
            }

            const textNode = document.createTextNode(userName);
            roomElement.appendChild(textNode);

            roomElement.href = "#";
            roomElement.id = `chat-room-${room.id}`;
            roomElement.addEventListener("click", () => {
              selectChatRoom(room.id, userName);
            });
            chatRooms.appendChild(roomElement);

            // Open the first chat by default
            if (index === 0) {
              selectChatRoom(room.id, userName);
            }
          });
        })
        .catch((error) => console.error("Error fetching chat rooms:", error));
    }

    function selectChatRoom(roomId, roomName) {
      currentChatRoomId = roomId;
      chatRoomTitle.textContent = roomName;
      chatContainer.style.display = "block";
      fetchMessages();

      // Highlight the selected chat room
      document.querySelectorAll("#chat-rooms a").forEach((el) => {
        el.classList.remove("bg-blue-100");
      });
      document
        .getElementById(`chat-room-${roomId}`)
        .classList.add("bg-blue-100");
    }

    function fetchMessages() {
      fetch(
          `https://admin.wecan.click/api/chat/room-messages?chat_room_id=${currentChatRoomId}&page=${currentPage}&per_page=${perPage}`, {
            headers: {
              Authorization: "Bearer " + localStorage.getItem("authToken"),
            },
          }
        )
        .then((response) => response.json())
        .then((data) => {
          chatMessages.innerHTML = "";
          data.data.forEach((message) => {
            addMessageToChat(message);
          });
          chatMessages.scrollTop = chatMessages.scrollHeight;
        })
        .catch((error) => console.error("Error fetching messages:", error));
    }

    function addMessageToChat(message) {
      const messageElement = document.createElement("div");
      messageElement.classList.add(
        "p-2",
        "rounded-lg",
        "max-w-xs",
        "break-words"
      );

      if (message.user_id === "current_user_id") {
        messageElement.classList.add("bg-[#4C6170]", "text-white", "ml-auto");
      } else {
        messageElement.classList.add("bg-gray-200", "text-gray-800");
      }

      messageElement.textContent = message.message;
      chatMessages.appendChild(messageElement);
    }

    function sendMessage(message) {
      fetch("https://admin.wecan.click/api/chat/send-message", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + localStorage.getItem("authToken"),
          },
          body: JSON.stringify({
            chat_room_id: currentChatRoomId,
            message: message,
          }),
        })
        .then((response) => response.json())
        .then((data) => {
          addMessageToChat({
            message: message,
            user_id: "current_user_id",
          });
          chatMessages.scrollTop = chatMessages.scrollHeight;
        })
        .catch((error) => console.error("Error sending message:", error));
    }

    chatForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const message = messageInput.value.trim();
      if (message) {
        sendMessage(message);
        messageInput.value = "";
      }
    });

    document
      .getElementById("toggle-sidebar")
      .addEventListener("click", function() {
        document
          .getElementById("main-sidebar")
          .classList.toggle("-translate-x-full");
      });

    fetchChatRooms();
    setInterval(fetchMessages, 5000);

    document.addEventListener("DOMContentLoaded", function() {
      const authToken = localStorage.getItem("authToken");
      if (!authToken) {
        window.location.href = "index.php";
      }
    });
    document
      .getElementById("logout-link")
      .addEventListener("click", function(event) {
        event.preventDefault();
        localStorage.removeItem("authToken");
        window.location.href = "login.php";
      });
  </script>
</body>

</html>
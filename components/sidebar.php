<div class="sidebar">
  <ul>
    <li><a href="/home.php">الصفحة الرئيسية</a></li>
    <li><a href="/patients.php">المرضى</a></li>
    <li><a href="/doctors.php">الأطباء</a></li>
    <li><a href="/appointments.php">المواعيد</a></li>
    <li><a href="/settings.php">الإعدادات</a></li>
  </ul>
</div>

<style>
  .sidebar {
    width: 250px;
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    background-color: #343a40;
    padding-top: 20px;
  }

  .sidebar ul {
    list-style-type: none;
    padding: 0;
  }

  .sidebar ul li {
    padding: 10px;
    text-align: center;
  }

  .sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
  }

  .sidebar ul li a:hover {
    background-color: #495057;
  }

  @media (max-width: 768px) {
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
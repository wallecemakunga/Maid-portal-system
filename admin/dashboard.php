<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title> Dashboard</title>
  <link rel="stylesheet" href="../assets/css/dash.css"/>
  <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/popup_style.css">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <style>

img {
  border-radius: 5px 5px 0 0;
}
  </style>
</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class="bi bi-person-fill"></i>
      <span class="logo_name"><?php echo $_SESSION['usertype']; ?></span>
    </div>

    <ul class="nav-links">
      <li>
   <li>
        <a href="home.php">
          <i class="bi bi-calendar-check"></i>
          <span class="links_name">Home </span>
        </a>
      </li>

      <li>
        <div class="dropdown">
    <a href="#">
      <i class='bx bxs-user'></i>
      <span class="links_name">Maids</span>
    </a>
    <div class="dropdown-content">
      <a href="viewer.php">View Users</a>
      <a href="create.php">Add Maids</a>
      <a href="manage.php">Manage Maids</a>
    </div>
  </div>

      </li>
      <li>
        <a href="view_req.php">
        <i class='bx bx-search-alt'></i>
          <span class="links_name">Requests </span>
        </a>
      </li>

      <li>
        <a href="changepass.php">
          <i class="bi bi-key"></i>
          <span class="links_name">Change Password</span>
        </a>
      </li>

      <li class="log_out">
        <a href="../logout.php">
          <i class="bx bx-log-out"></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
  </div>

  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        
        <span class="dashboard">Dashboard</span>
      </div>

      <div class="profile-details">
        <span class="admin_name">Welcome: <?php echo $_SESSION['fname']; ?></span>
      </div>
    </nav>
  </section>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title> Dashboard</title>
  <link rel="stylesheet" href="assets/css/dashboard.css"/>
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/bootstrap.css">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="css/popup_style.css">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
   <link rel="icon" type="image/jpg" href="../irri.jpg">
 
</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class="bi bi-person-fill"></i>
      <span class="logo_name"><?php echo $_SESSION['usertype']; ?></span>
    </div>

    <ul class="nav-links">

      <li>
        <a href="navigation.php">
          <i class="bi bi-house"></i>
          <span class="links_name">Home</span>
        </a>
      </li>

      <li>
        <a href="search.php">
          <i class="bi bi-calendar-check"></i>
          <span class="links_name">Search Maid</span>
        </a>
      </li>

      <li>
        <a href="results.php">
          <i class='bx bxs-inbox'></i>
          <span class="links_name">Results</span>
        </a>
      </li>
      <li>
        <a href="available.php">
         <i class='bx bx-user'></i>
          <span class="links_name">View Maids</span>
        </a>
      </li>

      <li>
        <a href="changepass.php">
          <i class="bi bi-key"></i>
          <span class="links_name">Change Password</span>
        </a>
      </li>

      <li class="log_out">
        <a href="logout.php">
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
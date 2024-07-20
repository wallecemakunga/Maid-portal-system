<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
require_once("db.php");

$username = $_SESSION["username"];
$user_id_query = mysqli_query($connection, "SELECT user_id FROM users WHERE username = '$username'") or die('Error querying database');
$user_id_row = mysqli_fetch_array($user_id_query);
$user_id = $user_id_row['user_id'];

$q = mysqli_query($connection, "SELECT * FROM request WHERE user_id = '$user_id'") or die('Error querying database');
// Fetch requests specific to the logged-in user


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Request Results</title>
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/popup_style.css">
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
   <link rel="icon" type="image/jpg" href="images/1.jpg">
</head>
<body>
  
  <?php include("dashboard.php") ?>

  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <!-- CONTENTS -->
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <div class="row d-flex justify-content-center pt-5">
    <div class="col-md-6">
      <div class="card-header text-white">
        <center>
          <a class="nav-link" style="color:#ffff;">Request Results</a>
        </center>
      </div>
      <div class="card" style="box-shadow: 10px 10px 20px #888888;">
        <div class="card-body text-center">
          <?php
          if (mysqli_num_rows($q) > 0) {
              while ($row = mysqli_fetch_assoc($q)) {
                  $status = $row['status'];
                  $message = $row['message'];
                  ?>
                  <form action="request.php" method="POST" autocomplete="off">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="status">Status</label>
                          <input type="text" name="status" class="form-control" value="<?php echo htmlspecialchars($status); ?>" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="message">Message</label>
                          <textarea class="form-control" name="message" readonly><?php echo htmlspecialchars($message); ?></textarea>
                        </div>
                      </div>
                    </div>
                  </form>
                  <?php
              }
          } else {
              echo "<p>No requests found.</p>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>

</body>
<style type="text/css">
* {
  margin: 0px;
  padding: 0px;
}
body {
  margin-right: -270px;
}
.btn-outline-light {
}
.container-fluid {
  margin-left: 235px;
}
.navbar-expand-lg {
  background-color: floralwhite;
}
.card-header {
  background-color: dimgray;
}
body {
  margin-right: -270px;
  background-image: url(../image/3.jpg);
  background-position: cover;
  background-size: ;
}
</style>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login </title>

  <link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/css/form.css" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">
     <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                 <img src="images/1.jpg" style="width: 50px;">
                  <span class="d-none d-lg-block">ONLINE MAID PORTAL SYSTEM(OMPS)</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form action="index.php" method="post">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12 form-group">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12 form-group">
                      <button class="btn btn-primary w-100" type="submit" name="LOGIN">Login</button>
                    </div>

                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
                    </div>
                  </form>
                  <?php
if (isset($_POST["LOGIN"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Hash the password here

    $con = mysqli_connect("localhost", "root", "", "maid");

    // Check admin table
    $se = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' LIMIT 1";
    $run = mysqli_query($con, $se);

    if (mysqli_num_rows($run) > 0) {
        $result = mysqli_fetch_assoc($run);
       $fname = $result["username"];
        $id = $result["admin_id"];
        $role = $result["usertype"];

        session_start();
        $_SESSION["username"] = $fname;
        $_SESSION["fname"] = $fname;
         $_SESSION["admin_id"] = $id;
        $_SESSION["usertype"] = $role;

        if ($role == "admin") {
            header("location:admin/home.php");
        }
    } else {
        // Check users table
        $se = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
        $run = mysqli_query($con, $se);

        if (mysqli_num_rows($run) > 0) {
            $result = mysqli_fetch_assoc($run);
            $fname = $result["username"];
            $id = $result["User_id"];
            $role = $result["usertype"];

            session_start();
            $_SESSION["username"] = $fname;
            $_SESSION["fname"] = $fname;
            $_SESSION["User_id"] = $id;
            $_SESSION["usertype"] = $role;

            if ($role == "user") {
                header("location:navigation.php");
            }
        } else {
            echo "wrong password";
        }
    }
}
?>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->


  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
 

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <div class="footer">
    <center><P>Copyright &copy; 2024 Online Maid Portal System. All Rights Reserved
    </center>
</div>

</body>

</html>
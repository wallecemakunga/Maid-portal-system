<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register</title>

  <!-- Vendor CSS Files -->
  <link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/form.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/popup_style.css">


  <script>
 const currentDate = new Date();
const maxDate = new Date(currentDate.getFullYear() - 20, 11, 31);
const input = document.querySelector('input[name="dob"]');

input.max = maxDate.toISOString().split('T')[0];
</script>
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
                  <img src="images/1.jpg" alt="">
                  <span class="d-none d-lg-block">OMPS</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                  </div>

                  <form class="row g-3 needs-validation" action="register.php" method="post">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="fname" class="form-control" placeholder="Enter FullName" required>
                      <div class="invalid-feedback">Please enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="dob" class="form-label">Dob</label>
                      <input type="date" name="dob" class="form-control"  required max="<?php echo date('Y') - 20 ?>-12-31">
                      <div class="invalid-feedback">Please enter your Birthdate!</div>
                    </div>

                    <div class="col-12">
                      <label for="gender" class="form-label">Gender</label>
                      <select name="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                      </select>
                      <div class="invalid-feedback">Please select your gender!</div>
                    </div>

                    <div class="col-12">
                      <label for="phone" class="form-label">Phone Number</label>
                      <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                      <div class="invalid-feedback">Please enter a valid Phone Number!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>

                    <div class="col-12 form-group">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    

                    <div class="col-12">
                      <button class="btn btn-primary w-100"  type="submit" name="Register">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="index.php">Log in</a></p>
                    </div>
                  </form>
<?php
if (isset($_POST["Register"])) {
    $fname = $_POST["fname"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Hash the password with md5
    $user = 'user';

    $con = mysqli_connect("localhost", "root", "", "maid");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if full name or username already exists
    $check_query = "SELECT * FROM users WHERE full_name = '$fname' OR username = '$username'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Full name or username already exists
        echo "
            <div class='popup popup--icon -error js_error-popup popup--visible'>
                <div class='popup__background'></div>
                <div class='popup__content'>
                    <h3 class='popup__content__title'>Error</h3>
                    <p>Full name or Username already exists</p>
                    <p>
                        <a href=''><button class='button button--error' data-for='js_error-popup'>Close</button></a>
                    </p>
                </div>
            </div>";
    } else {
        // Proceed with the registration
        $sql = "INSERT INTO users 
                VALUES ('','$fname', '$dob', '$gender', '$phone', '$username', '$password', '$user')";
        $query = mysqli_query($con, $sql);

        if ($query) {
            echo "
                <div class='popup popup--icon -success js_success-popup popup--visible'>
                    <div class='popup__background'></div>
                    <div class='popup__content'>
                        <h3 class='popup__content__title'>Success</h3>
                        <p>Registration Successful</p>
                        <p>
                            <a href='navigation.php'><button class='button button--success' data-for='success'>Return to Home</button></a>
                        </p>
                    </div>
                </div>";
        } else {
            echo "
                <div class='popup popup--icon -error js_error-popup popup--visible'>
                    <div class='popup__background'></div>
                    <div class='popup__content'>
                        <h3 class='popup__content__title'>Error</h3>
                        <p>Registration Failed</p>
                        <p>
                            <a href=''><button class='button button--error' data-for='js_error-popup'>Close</button></a>
                        </p>
                    </div>
                </div>";
        }
    }

    // Close the database connection
    mysqli_close($con);
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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>

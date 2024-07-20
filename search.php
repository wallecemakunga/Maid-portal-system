<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location:index.php");
  exit();
  }
?>


<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="assets/css/popup_style.css">

    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
    <link rel="icon" type="image/jpg" href="images/1.jpg">
</head>
<body>
  <?php include ("dashboard.php")?>
  
  <div class="row d-flex justify-content-center pt-5">
    <div class="col-md-6">
      <div class="card-header text-white">
        <center>
        <a class="nav-link" style="color:#ffff; ">Search MAID</a></div>
        </center>
        <div class="card"style="box-shadow:10px 10px 20px #888888;">
          <div class="card-body text-center">
                    <!--FORM-->
              <form action="request.php" method="POST" autocomplete="off">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <select name="age" class="form-control" required >
                        <option>---Select Age group---</option>
                        <option value="15-25">15-25</option>
                        <option value="25-30">25-30</option>
                        <option value="35">35</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <select name="gender" class="form-control" required>
                        <option>---Select Gender---</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>
                </div>
                <!--end-->
                  <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                        <?php
                                    // Include database connection
                                    include "db.php";

                                    // Fetch distinct region values from 'maids' table
                                    $sql = "SELECT DISTINCT region FROM maids";
                                    $result = $connection->query($sql);

                                    // Display dropdown options for 'Region'
                                    echo '<select name="region" class="form-control" required>';
                                    echo '<option value="">---Select Region---</option>'; // Default option

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $region = $row["region"];
                                            echo '<option value="' . $region . '">' . $region . '</option>';
                                        }
                                    }

                                    echo '</select>';

                                    // Close database connection
                                    $connection->close();
                                    ?>
                                  
                        </select>
                      </div>
                    </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <?php
                                    // Include database connection
                                    include "db.php";

                                    // Fetch distinct region values from 'maids' table
                                    $sql = "SELECT DISTINCT specialization FROM maids";
                                    $result = $connection->query($sql);

                                    // Display dropdown options for 'Region'
                                    echo '<select name="specialization" class="form-control" required>';
                                    echo '<option value="">---Select specialization---</option>'; // Default option

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $specs = $row["specialization"];
                                            echo '<option value="' . $specs . '">' . $specs . '</option>';
                                        }
                                    }

                                    echo '</select>';

                                    // Close database connection
                                    $connection->close();
                                    ?>
                    </div>
                  </div>

                  
                  <div class="col-md-6">
                    <div class="form-group">
                       <?php
                                    // Include database connection
                                    include "db.php";

                                    // Fetch distinct region values from 'maids' table
                                    $sql = "SELECT DISTINCT experience FROM maids";
                                    $result = $connection->query($sql);

                                    // Display dropdown options for 'Region'
                                    echo '<select name="experience" class="form-control" required>';
                                    echo '<option value="">---Select experience---</option>'; // Default option

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $exp = $row["experience"];
                                            echo '<option value="' . $exp . '">' . $exp . ' years</option>';
                                        }
                                    }

                                    echo '</select>';

                                    // Close database connection
                                    $connection->close();
                                    ?>
                    </div>
                  </div>
                </div>
                </div>
                  <!--END-->
                  <!--end-->
                  <div class="row">
                    <div class="col-sm-6">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="submit" class="btn btn-info btn-block form-control" name="" value="Search">
                      </div>
                    </div>
                  </div>
                  </div>
               </form>
              </div>
            </div>
          </div>
        </div>
      </div>




</body>
<style type="text/css">
  
*{
  margin: 0px;
  padding: 0px;
}
body
{
  margin-right: -270px;
}

.btn-outline-light
{
  background-color:;
}
.container-fluid{
  margin-left: 235px;
}

.navbar-expand-lg{
  background-color: floralwhite;
}

.card-header{
  background-color: dimgray;
}

body
{
  margin-right: -270px;
  background-image: url(../image/3.jpg);
  background-position: cover;
  background-size: ;
}

</style> -->
</body>
</html>
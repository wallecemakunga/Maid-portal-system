<!DOCTYPE html>
<html>
<head>
  <title>Response Page</title>
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.css">
   <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="stylesheet" type="text/css" href="../assets/css/popup_style.css">
  <style>
    .row {
      margin-top: ;
    }
  </style>
</head>
<body>
<?php include("dashboard.php") ?>

<?php
if (isset($_GET['pat_id']) && isset($_GET['pat_name'])) {
    $pat_id = $_GET['pat_id'];
    $pat_name = $_GET['pat_name'];
?>
<div class="row d-flex justify-content-center pt-5">
    <div class="col-md-6">
        <div class="card-header text-white">
            <center>
                <a class="nav-link" style="color:#ffff;">Response</a>
            </center>
        </div>
        <div class="card" style="box-shadow:10px 10px 20px #888888;">
            <div class="card-body text-center">
                <!-- FORM -->
                <form action="action.php" method="GET">
                    <input type="hidden" name="pat_id" value="<?php echo $pat_id; ?>">
                    <input type="hidden" name="pat_name" value="<?php echo $pat_name; ?>">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="submit" class="btn btn-info btn-block form-control" name="action" value="ACCEPT">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="submit" class="btn btn-info btn-block form-control" name="action" value="DECLINE">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
} else {
    echo "Invalid parameters provided";
}
?>

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
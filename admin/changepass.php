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
  <title>CHANGE PASSWORD</title>
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/popup_style.css">
      <link rel="icon" type="image/jpg" href="images/1.jpg">
   
  <style>
    .row {
      margin-top: 40px;
    }
  </style>
</head>
<body>
  <?php include('dashboard.php')?>;
  <div class="container">
    <h1 style="text-align: center; color: gray"><strong><br></strong></h1>
    <body class="bg-light">
      <div class="container pt-1">
        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="card px-3 shadow">
              <div class="card-header">CHANGE PASSWORD</div>
              <form class="form-group pt-3" action="" method="post">
                <div class="form-group">
                  <input type="text" name="old" placeholder="Old Password " class="form-control" required>
                </div>

                <div class="form-group">
                  <input type="password" name="new" placeholder="New Password " class="form-control" required>
                </div>
                            
                <div class="form-group">                
                  <input type="password" name="new2" placeholder="Confirm Password " class="form-control" required>
                </div>

                <div class="form-group">
                  <input type="submit"  id="changebtn" name="change" value="Change password" class="btn btn-success mt-3">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

<?php
$connection = mysqli_connect('localhost', 'root', '','maid');
if(isset($_POST['change'])){
$old= md5($_POST["old"]);
$new=md5($_POST['new']);
$new2=md5($_POST['new2']);


$query= "SELECT * FROM admin WHERE username='".$_SESSION['username']."'";
$result = mysqli_query($connection,$query);
$chg = mysqli_fetch_array($result);
$pass=$chg['password'];


if($pass==$old){
  if($new==$new2){

    $query="UPDATE admin set password='$new' WHERE username='".$_SESSION['username']."'";
    $result = mysqli_query($connection,$query);

    echo" <div class='popup popup--icon -success js_success-popup popup--visible'>
    <div class='popup__background'></div>
    <div class='popup__content'>
    <h3 class='popup__content__title'>
    Success
    </h1>
    <p>Password Changed Successfully </p>
    <p><a href='home.php'><button class='button button--success' data-for='success'>Return to home Page</button></a></p>
    </div>
    </div>";

  }
  else{
    echo" <div class='popup popup--icon -error js_error-popup popup--visible'>
    <div class='popup__background'></div>
    <div class='popup__content'>
    <h3 class='popup__content__title'>
    Error 
    </h1>
    <p>Your Passwords Dont Match</p>
    <p><a href=''><button class='button button--error' data-for='js_error-popup'>Close</button></a></p>
    </div>
    </div>";
  }
}
else{
  echo" <div class='popup popup--icon -error js_error-popup popup--visible'>
  <div class='popup__background'></div>
  <div class='popup__content'>
  <h3 class='popup__content__title'>
  Error 
  </h1>
  <p> Old Password is Invalid</p>
  <p>
  <a href=''><button class='button button--error' data-for='js_error-popup'>Close</button></a>
  </p>
  </div>
  </div>";
}
}
?>

<div class="footer" style="margin-top: 70px;">
  <ul><center>Copyright &copy; 2024 MAID. All Rights Reserved</center></ul>
</div>
</body>
</html>
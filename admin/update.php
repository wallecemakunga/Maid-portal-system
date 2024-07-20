<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location:index.php");
  exit();
}

$id=$_GET['id'];

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
  <title>Message</title>
  <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/dash.css">
  <link rel="stylesheet" type="text/css" href="css/popup_style.css">
  <link rel="icon" type="image/jpg" href="images/1.jpg">

  <meta charset="utf-8">
  
</head>
<body>
  <?php include("dashboard.php")?>

<?php

$connection = mysqli_connect('localhost', 'root', '','maid');
if (!$connection){
    die("Connection Failed" . mysql_error());
}
  

  $select_db = mysqli_select_db($connection,'maid');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}


    $query ="SELECT * FROM users WHERE user_id = '$id' ";
    $result= mysqli_query($connection,$query);

    $row=mysqli_fetch_array($result);

  $fnameErr=$lnameErr=$cityErr=$mobilenoErr=$emailErr="";
    
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(!preg_match("/[A-Za-z]/", $_POST['fname'])){
        $fnameErr = "Not a valid Name.";
    }
    if(!preg_match("/[A-Za-z]/", $_POST['lname'])){
        $lnameErr = "Not a valid Name.";
    }
     
     if(!preg_match("/[0-9]/",$_POST['phone']) && strlen($_POST['phone'])!=10){
        $mobilenoErr="Not a valid phone number and Phone Number must contain 10 characters";
    }


    }


if (isset($_POST['submit'])) { 

if($fnameErr==""  && $cityErr=="" && $mobilenoErr=="" && $emailErr=="" ){
  $id=$_REQUEST['id'];

$query = "UPDATE users SET  Full_name='".$_POST['fname']."', dob='".$_POST['dob']."',
    username='".$_POST['username']."',Phone_number='".$_POST['phone']."' WHERE user_id='$id' ";

             $result = mysqli_query($connection,$query);
          if($result==true){

            echo" <div class='popup popup--icon -success js_success-popup popup--visible'>
          <div class='popup__background'></div>
          <div class='popup__content'>
            <h3 class='popup__content__title'>
              Success
            </h1>
            <p>  profile Successfully updated </p>
            <p>
            <a href='profile.php'><button class='button button--success' data-for='success'>Return to profile Page</button></a>
            </p>
          </div>
        </div>";
      }
}
}


?>

 <div class="container">
    <div class="jumbotron">
        <h1 style="text-align: center; color: gray"><strong><br></strong></h1>
                    <body class="bg-light">
        <div class="container pt-1">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card px-3 shadow">
                        <div class="card-header">EDIT PROFILE</div>
                        <form class="form-group pt-3" action="" id="form" method="post">
                            
                            <div class="form-group">                
                                <label>Full Name</label>
                                <input type="text" placeholder="Enter password" name="fname" class="form-control" required="required" id="name" value="<?php echo$row[1]; ?>">
                                      <?php echo "<h5>" .$fnameErr. "</h5>";  ?>
                            </div>
                             <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control"  value="<?php echo$row[3]; ?>"required="gender">
                            <option>---Select Gender---</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                            

                            <div class="form-group">                
                               <label>Date of Birth</label>
                               <input type="date"  name="dob" class="form-control" value="<?php echo$row[2]; ?>"><br/>

                            </div>
                            <div class="form-group">                
                               <label>Phone Number</label>
                               <input type="text"  name="phone" class="form-control" value="<?php echo$row[4]; ?>"><br/>
                                <?php echo "<h5>" .$mobilenoErr. "</h5>";  ?>

                            </div>
                            <div class="form-group">                
                               <label>Username</label>
                               <input type="text"  name="username" class="form-control" id="username"value="<?php echo$row[5]; ?>"><br/>

                            </div>
  

                            <div class="form-group">
                                <input type="submit"  id="registerbtn" name="submit" value="Update" class="btn btn-success mt-3">
                            </div>

                        </form>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>
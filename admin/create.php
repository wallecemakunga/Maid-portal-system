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
  <title>Add Maid</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/popup_style.css">
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
  <link rel="icon" type="image/jpg" href="images/1.jpg">

  <script type="text/javascript">
  function validateImage() {
    var formData = new FormData();
 
    var file = document.getElementById("img").files[0];
 
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        alert('Please select a valid image file');
        document.getElementById("img").value = '';
        return false;
    }
    if (file.size > 1024000) {
        alert('Max Upload size is 1MB only');
        document.getElementById("img").value = '';
        return false;
    }
    return true;
}
</script>
</head>
<body>
  <?php include ("dashboard.php")?>
  <?php
  if(isset($_POST['submit'])){
$img=$_POST["img"];
$name=$_POST['fname'];
$age=$_POST['age']; 
$gender=$_POST['gender'];
$spec=$_POST['specialization']; 
$region=$_POST['region'];
$exp=$_POST['experience'];
$desc=$_POST['description'];

$connection = mysqli_connect('localhost', 'root', '', 'maid');
$sql="INSERT INTO maids
VALUES('','$img','$name','$age','$gender','$spec','$region','$exp','$desc')";

$result = mysqli_query($connection,$sql);
if(!$result) 
        {  
            echo mysql_error();
        }
        
        else{
             echo" <div class='popup popup--icon -success js_success-popup popup--visible'>
          <div class='popup__background'></div>
          <div class='popup__content'>
            <h3 class='popup__content__title'>
              Success
            </h1>
            <p>  Added Successfully </p>
            <p>
            <a href='manage.php'><button class='button button--success' data-for='success'>Return to home Page</button></a>
            </p>
          </div>
        </div>";
    
        }

}
  ?>
  <div class="row d-flex justify-content-center pt-5">
    <div class="col-md-6">
      <div class="card-header text-white">
        <center>
        <a class="nav-link" style="color:#ffff; ">ADD MAID</a></div>
        </center>
        <div class="card"style="box-shadow:10px 10px 20px #888888;">
          <div class="card-body text-center">
                    <!--FORM-->
              <form action="create.php" method="POST" autocomplete="off">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="fname" placeholder="Enter Full Name" required="firstname">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="file" class="form-control" id="img" name="img" required="required" onchange="validateImage()" placeholder="Upload Image">
                      
                    </div>
                  </div>
                </div>
                <!--end-->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="number" class="form-control" name="age" placeholder="Enter Age " required="age"> 
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <select name="gender" class="form-control" required="gender">
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
                        <select name="region" class="form-control" required="region">
                          <option value="">Region</option>
                          <option value="Arusha">Arusha</option>  
                          <option value="Dar es Salaam">Dar es Salaam</option>
                          <option value="Dodoma">Dodoma</option>  
                          <option value="Iringa">Iringa</option> 
                          <option value="Kagera">Kagera</option>       
                          <option value="Kigoma">Kigoma</option>    
                          <option value="Kilimanjaro"> Kilimanjaro</option>      
                          <option value="Manyara"> Manyara</option>      
                          <option value="Mbeya">Mbeya</option>  
                          <option value="Morogoro"> Morogoro </option>  
                          <option value="Mtwara"> Mtwara  </option> 
                          <option value="Mwanza"> Mwanza </option>  
                          <option value="Njombe"> Njombe </option>  
                          <option value="Pemba"> Pemba  </option>
                          <option value="Pwani"> Pwani    </option>
                          <option value="Shinyanga"> Shinyanga </option>
                          <option value="Singida"> Singida  </option> 
                          <option value="Tabora"> Tabora  </option> 
                          <option value="Tanga"> Tanga    </option>
                          <option value="Zanzibar"> Zanzibar</option>
                        </select>
                      </div>
                    </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <select name="specialization" class="form-control" required="Specialization">
                        <option>---Select Specialization---</option>
                        <option value="Cooking">Cooking</option>
                        <option value="Washing and sweeping">Washing and sweeping</option>
                        <option value="Households">Households</option>
                        <option value="nursing">Baby nursing</option>
                      </select>
                    </div>
                  </div>

                  
                  <div class="col-md-6">
                    <div class="form-group">
                       <select name="experience" class="form-control" required="experience">
                        <option>---Select experience---</option>
                        <option value="0.5"> below one year</option>
                        <option value="1">one year</option>
                        <option value="2 ">2 years</option>
                        <option value="3 ">Above 3 years</option>
                      </select>
                    </div>
                  </div>
             

                  <div class="col-sm-12">
                    <div class="form-group">
                      <textarea name="description" class="form-control" placeholder="Fill details about maid" required="required"></textarea>
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
                        <input type="submit" class="btn btn-info btn-block form-control" name="submit" value="ADD">
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
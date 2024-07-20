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
<title>Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="../assets/css/home.css" type="text/css">
<link rel="stylesheet" href="../assets/css/view.css" type="text/css">
<link rel="stylesheet" type="text/css" href="../assets/css/popup_style.php">
<link rel="icon" type="image/jpg" href="images/1.jpg">

</head>
</head>

<body>
  <?php include("dashboard.php")?>

<div class="container">

<div class="header-left">

</div>


<div class="view">
<div class="left">

<?php
 $connection = mysqli_connect('localhost', 'root', '','maid');
 $select_db = mysqli_select_db($connection,'maid');


$maid_id=$_GET['id'];
$query="SELECT *FROM maids WHERE maid_id=$maid_id";
        $result = mysqli_query($connection,$query);
    while($row=mysqli_fetch_array($result))
        {
            $maid_img=$row[1];
            $maid_id=$row[0];
            $maid_name=$row[2];
            $maid_age=$row[3 ];
            $gender=$row[4];
            $maid_spec=$row[5];
            $maid_region=$row[6];
            $maid_exp=$row[7];
            $maid_dis=$row[8];
           ?>

            <div class="img">
          <p><img src="admin/uploads/<?php echo $row[1]; ?>" width="200px" height="200px"></p>
        </div>
        <div class="details">
            <b>Maid ID:</b>             <?php echo $maid_id;  ?><br/>
            <b>Name: </b>                 <?php echo $maid_name;  ?><br/>
            <b>Age:</b>                   <?php echo $maid_age;  ?><br/>
            <b>Gender:</b>                    <?php echo $gender?></br>
            <b>Specialization: </b>        <?php echo $maid_spec;  ?><br/>
            <b> Region:</b>      <?php echo $maid_region;  ?><br/>
              <b> Number of times she has worked: </b>  <?php echo $maid_exp;  ?> year<br/>
             
               
</div>

<div class="more"><b>OTHER INFORMATION</b></div>
<?php echo $maid_dis;  ?></br/>

</div>

<?php } 
?>

</div>
</div>
<div class="footer" style="margin-top: 70px;">
       <ul>
    
<center>Copyright &copy; 2024 Online Maid Portal System. All Rights Reserved</center>
</ul>

</div>
</body>
</html>
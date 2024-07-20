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
  <title>dashboard</title>
  <link rel="stylesheet" href="../assets/css/dash.css">
  <link href="../assets/css/home.css" rel="stylesheet">
  <link rel="icon" type="image/jpg" href="images/1.jpg">
</head>
<body>

  <?php include ("dashboard.php")?>
  <h1 align="center">ONLINE MAID PORTAL SYSTEM</h1> 
  <div class="img">
  </div>

  
  <div class="panel">
<?php
        $connection = mysqli_connect('localhost', 'root', '','maid');
        $select_db = mysqli_select_db($connection,'maid');  

        $sql="SELECT user_id FROM  users";
        $fetch=mysqli_query($connection, $sql);
        $count = $fetch->num_rows;
        ?>

     <div class="tile">
      <h2 align="center"> <?php echo"$count"; ?></h2>
       <h2 align="center">REG USERS</h2>
    </div>
          

                

<?php
        $connection = mysqli_connect('localhost', 'root', '','maid');
        $select_db = mysqli_select_db($connection,'maid');  

        $sql="SELECT maid_id FROM  maids";
        $fetch=mysqli_query($connection, $sql);
        $count = $fetch->num_rows;
        ?>
        
        <div class="tile3">
      <h2 align="center"> <?php echo"$count"; ?></h2>
       <h2 align="center">POSTED MAIDS</h2>
    </div>

    <?php
        $connection = mysqli_connect('localhost', 'root', '','maid');
        $select_db = mysqli_select_db($connection,'maid');  

        $sql="SELECT request_id FROM  request";
        $fetch=mysqli_query($connection, $sql);
        $count = $fetch->num_rows;
        ?>

        <div class="tile2">
      <h2 align="center"> <?php echo"$count"; ?></h2>
       <h2 align="center">RECEIVED REQUEST</h2>
    </div>
</body>
</html>
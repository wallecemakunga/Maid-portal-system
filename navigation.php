<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("location:index.php");
}
require_once("db.php");

?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>dashboard</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="css/home.css" type="text/css">
	<link rel="stylesheet" href="css/dash.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.css">
	<link rel="icon" type="image/jpg" href="images/1.jpg">
<style type="text/css">
    h1{
    font-weight: 600;
    text-align: center;
    background-color: #16a085;
    color: #fff;
    padding: 10px 0px;
    margin-top: 0;
} 
</style>	
</head>
<body>
	<?php include("dashboard.php")?>
	<div class="img">
	<h1 align="center">ONLINE MAID PORTAL SYSTEM</h1>
	
	  

	
<div class="main">

<div class="content-left">
 <h3 align="center"><p>ABOUT US</p></h3>
 <hr>
<img src="images/icon1.jpg">
<br>Imagine coming from work to find your house is clean as neat, fresh and welcoming you with food ready placed at your dinning table and all work done as it best as possible be.</br>
Our website offers such kind of maids who are the best in doing variety of  house works.
We conduct comprehensive interviews before recruiting the maids so as to provide you with trustworthy and hardworking maids. We  train  maids and test what services they are good to offer for your family.

<br>Through our website we offer you the chance to send specific requirements of the maid you want in <b>REQUEST MAID PAGE</b>. Also there is <b>SEARCH FOR MAID PAGE</b> where you can search for maids  and for any question,queries,comments and messages you can send it to us through <b>CONTACT US PAGE</b>.


<p>WELCOME TO OUR WORLD!</p>
</div>

<div class="content-right">
<h3>SERVICES WE OFFER</h3>
<hr>

<p style="float: left; text-align: center; width: 35%;  margin-bottom: 0.5em;"><img src="images/icon3.jpg" style="width: 90%">Cleaning the house</p>

<p style="float: right; text-align: center; width: 35%;  margin-bottom: 0.5em;"><img src="images/16.png" style="width: 90%">Cooking</p>

<p style="float: left; text-align: center; width: 35%;  margin-bottom: 0.5em;"><img src="images/17.png" style="width: 90%">Care for children</p>

<p style="float: right; text-align: center; width: 35%;  margin-bottom: 0.5em;"><img src="images/18.png" style="width: 90%">Washing clothes</p>

<p style="float: left; text-align: center; width: 35%;  margin-bottom: 0.5em;"><img src="images/19.jpeg" style="width: 90%">Care for elderly/disabled</p>


</div>
</div>
</body>
</html>

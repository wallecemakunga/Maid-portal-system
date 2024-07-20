<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
$username = $_SESSION["username"];

// Establish database connection
$connection = mysqli_connect('localhost', 'root', '', 'maid');
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch user_id from the database based on the username
$query = "SELECT user_id FROM users WHERE username = '$username'";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Error fetching user_id: " . mysqli_error($connection));
}
$user_row = mysqli_fetch_assoc($result);
$user_id = isset($user_row['user_id']) ? $user_row['user_id'] : null;
mysqli_free_result($result);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/home.css" type="text/css">
    <link rel="stylesheet" href="assets/css/view.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/popup_style.css">
    <link rel="icon" type="image/jpg" href="images/1.jpg">
</head>
<body>
    <?php include("dashboard.php") ?>

    <div class="container">
        <div class="header-left"></div>
        <div class="view">
            <div class="left">
                <?php
                $connection = mysqli_connect('localhost', 'root', '', 'maid');
                if (!$connection) {
                    die("Database connection failed: " . mysqli_connect_error());
                }

                if (isset($_GET['id'])) {
                    $maid_id = mysqli_real_escape_string($connection, $_GET['id']);
                    $query = "SELECT * FROM maids WHERE maid_id=$maid_id";
                    $result = mysqli_query($connection, $query);

                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {
                            $maid_img = $row[1];
                            $maid_id = $row[0];
                            $maid_name = $row[2];
                            $maid_age = $row[3];
                            $gender = $row[4];
                            $maid_spec = $row[5];
                            $maid_region = $row[6];
                            $maid_exp = $row[7];
                            $maid_dis = $row[8];
                ?>
                <div class="img">
                    <p><img src="admin/uploads/<?php echo $row[1]; ?>" width="200px" height="200px"></p>
                </div>
                <div class="details">
                    <b>Maid ID:</b> <?php echo htmlspecialchars($maid_id); ?><br/>
                    <b>Name: </b> <?php echo htmlspecialchars($maid_name); ?><br/>
                    <b>Age:</b> <?php echo htmlspecialchars($maid_age); ?><br/>
                    <b>Gender:</b> <?php echo htmlspecialchars($gender); ?><br/>
                    <b>Specialization: </b> <?php echo htmlspecialchars($maid_spec); ?><br/>
                    <b>Region:</b> <?php echo htmlspecialchars($maid_region); ?><br/>
                    <b>Number of times she has worked: </b> <?php echo htmlspecialchars($maid_exp); ?> years<br/>
                </div>
                <div class="more"><b>OTHER INFORMATION</b></div>
                <?php echo htmlspecialchars($maid_dis); ?><br/>
                <?php
                        }
                    } else {
                        echo "Error: " . mysqli_error($connection);
                    }
                } else {
                    echo "No maid ID provided.";
                }
                ?>
            </div>
            <div id="popup">
    <form action="select.php" method="post">
        <?php if(isset($maid_id)) { ?>
            <input type="hidden" name="maid_id" value="<?php echo htmlspecialchars($maid_id); ?>">
        <?php } ?>
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
        <p><input type="submit" name="submit" value="Book" id="submitbtn"></p>
    </form>
</div>

        </div>
    </div>

    <div class="footer" style="margin-top: 70px;">
        <ul>
            <center>Copyright &copy; 2024 Online Maid Portal System. All Rights Reserved</center>
        </ul>
    </div>
</body>
</html>

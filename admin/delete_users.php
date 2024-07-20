<?php
// Maid database connection
$maid_connection = mysqli_connect('localhost', 'root', '', 'maid');

if (!$maid_connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$delete_id = $_GET['id'];

$result = mysqli_query($maid_connection, "DELETE FROM users WHERE user_id=$delete_id");

if ($result) {
    header("Location: viewer.php");
} else {
    echo "Error: " . mysqli_error($maid_connection);
}
?>
<?php
// Maids database connection
$maids_connection = mysqli_connect('localhost', 'root', '', 'maid');

if (!$maids_connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$delete_id = $_GET['id'];

$result = mysqli_query($maids_connection, "DELETE FROM maids WHERE maid_id=$delete_id");

if ($result) {
    header("location:manage.php");
} else {
    echo "Error: " . mysqli_error($maids_connection);
}

mysqli_close($maids_connection); // Close the maids connection
?>
<!DOCTYPE html>
<html>
<head>
  <title>Select</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/popup_style.css">
</head>
<body>
<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

$connection = mysqli_connect('localhost', 'root', '', 'maid');
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    if (isset($_POST['maid_id'])) {
        $username = mysqli_real_escape_string($connection, $_SESSION['username']);
        $maid_id = mysqli_real_escape_string($connection, $_POST['maid_id']);

        // Check if the 'maid_id' parameter is valid
        if (!empty($maid_id) && is_numeric($maid_id)) {
            // Fetch the user_id and Phone_number using the username from the session
            $get_user_id_query = "SELECT user_id, Phone_number FROM users WHERE username = '$username'";
            $user_result = mysqli_query($connection, $get_user_id_query) or die('Error querying database: ' . mysqli_error($connection));

            if (mysqli_num_rows($user_result) > 0) {
                $user_row = mysqli_fetch_assoc($user_result);
                $user_id = $user_row['user_id'];
                $phone = $user_row['Phone_number']; // Ensure Phone_number column exists

                // Check if the user already has an active booking
                $check_booking_query = "SELECT * FROM request WHERE user_id = '$user_id' AND status = 'Pending'";
                $booking_result = mysqli_query($connection, $check_booking_query) or die('Error querying database: ' . mysqli_error($connection));

                if (mysqli_num_rows($booking_result) > 0) {
                    // User already has an active booking
                    echo "<div class='popup popup--icon -error js_error-popup popup--visible'>
                            <div class='popup__background'></div>
                            <div class='popup__content'>
                                <h3 class='popup__content__title'>Error</h3>
                                <p>You already have an active booking.</p>
                                <p>
                                    <a href='results.php'><button class='button button--error' data-for='error'>Return to Home Page</button></a>
                                </p>
                            </div>
                          </div>";
                } else {
                    // Insert the booking request into the database
                    $sql = "INSERT INTO request (user_id, maid_id, phone, status) VALUES ('$user_id', '$maid_id', '$phone', 'Pending')";
                    if (mysqli_query($connection, $sql)) {
                        echo" <div class='popup popup--icon -success js_success-popup popup--visible'>
    <div class='popup__background'></div>
    <div class='popup__content'>
    <h3 class='popup__content__title'>
    Success
    </h1>
    <p>Booking Successfully </p>
    <p><a href='results.php'><button class='button button--success' data-for='success'>Return to home Page</button></a></p>
    </div>
    </div>";
                        exit();
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                    }
                }
            } else {
                // The user does not exist
                echo "Invalid user ID.";
            }
        } else {
            // Invalid 'maid_id' parameter
            echo "Invalid maid ID.";
        }
    } else {
        // 'maid_id' parameter not set
        echo "No maid selected.";
    }
} else {
    // 'submit' button not clicked
    echo "No submission received.";
}

mysqli_close($connection);
?>
</body>
</html>

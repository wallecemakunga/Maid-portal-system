<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
    exit();
}

require_once("../db.php");

// Get the username of the logged-in user
$username = $_SESSION['username']; 

// Modify the SQL query to include a condition that checks if the doctor_id matches the username
$q = mysqli_query($connection, "SELECT request.request_id, users.username, maids.full_name AS maid_name , users.Phone_number,users.user_id
                                FROM request 
                                JOIN users ON request.user_id = users.user_id 
                                JOIN maids ON request.maid_id = maids.maid_id") or die(mysqli_error($connection));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Requests</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="../assets/css/app.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/argon.min.css"> 
    <link rel="stylesheet" type="text/css" href="../assets/libs/footable/footable.core.min.css"
    >
    <link rel="icon" type="image/jpg" href="images/1.jpg"> 
</head>

<body>
    <?php include("dashboard.php") ?>

    <div id="wrapper">
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Maid Request</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row"> 
                        <div class="col-12">
                            <div class="card-box">
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-12 text-sm-center form-inline">
                                            <div class="form-group mr-2" style="display:none">
                                                <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                    <option value="">Show all</option>
                                                    <option value="Discharged">Discharged</option>
                                                    <option value="OutPatients">OutPatients</option>
                                                    <option value="InPatients">InPatients</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="6">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-hide="phone">Request ID</th>
                                                <th data-toggle="true">Username</th>
                                                <th data-hide="phone">Maid Name</th>
                                                <th data-hide="phone">Phone Number</th>
                                                <th data-hide="phone">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($q)) {
                                            $request_id = $row['request_id'];
                                            $username = $row['username'];
                                            $maid_name = $row['maid_name'];
                                            $phone = $row['Phone_number'];
                                             $n=$row['user_id'];
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $request_id; ?></td>
                                                    <td><?php echo $username; ?></td>
                                                    <td><?php echo $maid_name; ?></td>
                                                    <td><?php echo $phone; ?></td>
                                                    <td>
                                                       <a href="response.php?action=accept&pat_id=<?php echo $n ?>&pat_name=<?php echo $username ?>" class="badge badge-success"><i class="mdi mdi-eye"></i> Action</a>
</td>
                                                </tr>
                                            </tbody>
                                        <?php 
                                            $cnt++;
                                        } 
                                        ?>
                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/js/vendor.min.js"></script>
        <script src="../assets/libs/footable/footable.all.min.js"></script>
        <script src="../assets/js/pages/foo-tables.init.js"></script>
        <script src="../assets/js/app.min.js"></script>
    </body>
</html>

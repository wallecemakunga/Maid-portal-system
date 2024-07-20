<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("location:index.php");
}
require_once("db.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Maids Records</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/app.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/argon.min.css">
<link rel="stylesheet" type="text/css" href="assets/libs/footable/footable.core.min.css">
</head>
<body>
  <?php include("dashboard.php")?>
<div id="wrapper">
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Maid Details</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title"></h4>
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-12 text-sm-center form-inline" >
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
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th data-toggle="true">Maids Name</th>
                                                <th data-hide="phone">Maids Age</th>
                                                 <th data-hide="phone">Maids Gender</th>
                                                 <th data-hide="phone">Maids Specialization</th>
                                                 <th data-hide="phone">Maids Region</th>
                                                 <th data-hide="phone">Maids Exeprience</th>
                                                <th data-hide="phone">Action</th>
                                            </tr>
                                        </thead>

                                            <?php
                                            //$age=$_POST['age'];
                                           // $gender=$_POST['gender'];
                                           $region=$_POST['region'];
                                            $specs=$_POST['specialization'];
                                           // $exp=$_POST['experience'];

                                            $q=mysqli_query($connection,"SELECT * FROM maids where region='$region' and specialization='$specs' " )or die('Error223');
                                            $cnt=1;
                                            while($row=mysqli_fetch_array($q)){
                                                $id = $row['maid_id'];
                                                $maid_name=$row['Full_name'];
                                                $maid_age=$row['age'];
                                                 $maid_gender=$row['gender']; 
                                                $maid_spec=$row['specialization'];
                                                $maid_region=$row['region'];
                                                $maid_exp=$row['experience'];
                                            ?>

                                            <tbody>
                                                <tr>
                                                    <td><?php echo $cnt;?></td>
                                                    <td><?php echo $maid_name?></td>
                                                    <td><?php echo $maid_age?>  Years</td>
                                                      <td><?php echo $maid_gender?></td>
                                                    <td><?php echo $maid_spec?></td>
                                                    <td><?php echo $maid_region?></td>
                                                    <td><?php echo $maid_exp?> years </td>
                                                  
                                                    
                                                     <td><a href="view.php?id=<?php echo $id?>&&pat_name=<?php echo $maid_name?>" class="badge badge-success"><i class="mdi mdi-eye"></i> View</a></td>
                                                </tr>
                                                </tbody>
                                            <?php  $cnt = $cnt +1 ; }?>
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
                                </div> <!-- end .table-responsive-->
                            </div> <!-- end card-box -->
                        </div> <!-- end col -->
                    </div>
                        <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->


        </div>
    </div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Footable js -->
    <script src="assets/libs/footable/footable.all.min.js"></script>

    <!-- Init js -->
    <script src="assets/js/pages/foo-tables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</div>
</div>
</div>
</body>
</html>

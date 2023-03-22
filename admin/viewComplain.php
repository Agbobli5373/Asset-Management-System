<!doctype html>
<html lang="en">
<?php

$title = "Update User" ?>
<?php require_once '../share/head.php'; ?>
<?php require_once '../config/dbConnect.php'; ?>

<?php
$id = $_GET['id'];
$sql = "SELECT *
          FROM `complain_tbl`
          JOIN user_tbl ON complain_tbl.user_id = user_tbl.user_id
          JOIN department_tbl ON complain_tbl.department_id = department_tbl.department_id
          JOIN asset_tbl ON complain_tbl.asset_id = asset_tbl.asset_id
          WHERE complain_id = '$id'";

$query = mysqli_query($connectionString, $sql) or die(mysqli_error($connectionString));
$eachComplain = mysqli_fetch_array($query);

$get_comaplain_Id = $eachComplain['complain_id'];
$get_asset = $eachComplain['asset_name'];
$get_complain_name =  $eachComplain['complain_detail'];
$get_user_department = $eachComplain['department_name'];
$get_user =  $eachComplain['username'];
$get_complain_createdDate = $eachComplain['complain_timestamp'];
$get_status ;
if($eachComplain['isResolve'] == 'YES'){
    $get_status = "Complain Resolved" ;
} else{
    $get_status = "Complain Pending" ;
}

?>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php require_once '../share/sidebar.php';  ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- end page title -->


                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Complain</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Complain</h4>

                                    <div class="table-responsive">
                                        <table class="table table-centered  $get_status = "Complain Resolved" ; mb-0">
                                            <thead>

                                            </thead>
                                            <tbody class="loadTable">
                                                <tr>
                                                    <td scope="col">Asset Name</td>
                                                    <td scope="col"><?php echo $get_asset ?></td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Asset Complain</td>
                                                    <td scope="col"><?php echo  $get_complain_name ?></td>
                                                </tr>

                                                <tr>
                                                    <td scope="col">Department</td>
                                                    <td scope="col"><?php echo  $get_user_department ?></td>
                                                </tr>

                                                <tr>
                                                    <td scope="col">User</td>
                                                    <td scope="col"><?php echo  $get_user ?></td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Complain Date</td>
                                                    <td scope="col"><?php echo  $get_complain_createdDate ?></td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Complain Status</td>
                                                    <td scope="col"><?php echo  $get_status ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- container-fluid -->
        </div>
        <!-- End Page-content -->



        <?php require_once '../share/footer.php'; ?>

    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <?php require_once("../share/script.php") ?>


</body>

</html>
<!doctype html>
<html lang="en">
<?php $title = "Requested Asset" ?>
<?php require_once '../share/head.php'; ?>
<?php require_once '../config/dbConnect.php'; ?>
<?php require_once '../api_calls/utils.php'; ?>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php require_once '../share/userSidebar.php';  ?>
        <?php $user_dp = $_COOKIE['department_id']; ?>


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Department Request</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">All request</h4>

                                    <div class="table-responsive">
                                        <table id="datatable-buttons" class="table table-striped table-centered table-nowrap mb-0 table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Asset Name</th>
                                                    <th scope="col">Department</th>
                                                    <th scope="col">Reason</th>
                                                    <th scope="col">Date Requestd</th>
                                                    <th scope="col">Status</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $counter = 1;
                                                $getRequest = mysqli_query($connectionString, "SELECT * FROM request_tbl
                                                                            JOIN department_tbl on request_tbl.department_id = department_tbl.department_id 
                                                                            WHERE request_tbl.department_id = '$user_dp'
                                                                            ORDER BY
                                                                            request_tbl.request_timestamp ASC") or die(mysqli_error($connectionString));
                                                while ($eachRequest = mysqli_fetch_array($getRequest)) {

                                        
                                                    $get_asset_name = $eachRequest['asset_name'];
                                                    $get_request_reason = $eachRequest['request_reason'];
                                                    $get_asset_department = $eachRequest['department_name'];
                                                    $get_asset_request_date = $eachRequest['request_timestamp'];
                                                    $get_request_status = $eachRequest["status"];
              

                                                ?>
                                                    <tr>
                                                        <td><b><?php echo $counter;   ?></b></td>
                                                        <td><?php echo $get_asset_name;  ?></td>
                                                      
                                                        <td><?php echo  $get_asset_department;  ?></td>
                                                        <td><?php echo   $get_request_reason;  ?></td>
                                                        <td><?php echo $get_asset_request_date;  ?></td>
                                                        <td> <?php echo $get_request_status ?>  </td>

                                                    </tr>


                                                <?php $counter++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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


        <script type='text/javascript'>
        $(document).ready(function() {



            alertify.set('notifier', 'position', 'top-right');

            $(document).on('click', '.btn-delete', function(e) {
                var id = $(this).attr('id');
                alertify.confirm("Are You Sure Want To Delete This Asset",
                    function() {
                        $.ajax({
                            url: '../api_calls/delete-asset.php',
                            type: 'POST',
                            data: {
                                id: id
                            },
                            success: function(res) {

                                if (res.trim() === 'success') {
                                    alertify.success("Deleted Successfully");
                                    window.location.href = 'getAssets.php';
                                } else {
                                    alertify.error("Something went wrong");
                                    console.log(res);
                                }

                            },
                            error: function(res) {
                                console.log(res);
                            }

                        });
                    },
                    function() {

                    }).set('labels', {
                    ok: 'Yes, Delete!',
                    cancel: 'Not Today'
                }).set('movable', 'true').setHeader('Delete user');
            })





        });

    </script> 


</body>


</html>
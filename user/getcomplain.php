<!doctype html>
<html lang="en">
<?php $title = "New Complain" ?>
<?php require_once '../share/head.php'; ?>
<?php require_once '../config/dbConnect.php'; ?>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php require_once '../share/userSidebar.php';  ?>


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
                                <h4 class="mb-0 font-size-18">New Complain</h4>



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
                                        <table id="datatable-buttons" class="table table-striped table-centered table-nowrap mb-0 table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Asset</th>
                                                    <th scope="col">Department</th>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Complain</th>
                                                    <th scope="col">Date Created</th>
                                                    <th scope="col">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $counter = 1;
                                                $id = $_COOKIE['department_id'] ;
                                                
                                                $query = mysqli_query($connectionString , "SELECT * FROM `department_tbl` WHERE department_id = $id")or die(mysqli_error($connectionString)) ;
                                                $department = mysqli_fetch_array($query);
                                                $department_name = $department['department_name'] ;
                                                echo $department_name ;
                                                $getComplains = mysqli_query($connectionString, "SELECT
                                                                                                 *
                                                                                                 FROM
                                                                                                `complain_tbl`
                                                                                                 JOIN user_tbl ON complain_tbl.user_id = user_tbl.user_id
                                                                                                 JOIN department_tbl ON complain_tbl.department_id = department_tbl.department_id
                                                                                                 JOIN asset_tbl ON complain_tbl.asset_id = asset_tbl.asset_id
                                                                                                 WHERE `isResolve` = 'NO' AND  department_tbl.department_id = '$id' 
                                                                                                 ORDER BY
                                                                                                 complain_tbl.complain_timestamp ASC")
                                                    or die(mysqli_error($connectionString));
                                                while ($eachComplain = mysqli_fetch_array($getComplains)) {

                                                    $get_comaplain_Id = $eachComplain['complain_id'];
                                                    $get_asset = $eachComplain['asset_name'];
                                                    $get_complain_name =  $eachComplain['complain_detail'];
                                                    $get_user_department = $eachComplain['department_name'];
                                                    $get_user =  $eachComplain['username'];
                                                    $get_complain_createdDate = $eachComplain['complain_timestamp'];


                                                ?>
                                                    <tr>
                                                        <td><b><?php echo $counter;   ?></b></td>
                                                        <td><?php echo $get_asset;  ?></td>
                                                        <td><?php echo $get_user_department;  ?></td>
                                                        <td><?php echo  $get_user;  ?></td>
                                                        <td><?php echo $get_complain_name;  ?></td>
                                                        <td><?php echo $get_complain_createdDate;  ?></td>
                                                        
                                                        <td>
                                                            <!--<a role="button" type="button" class="btn btn-outline-success btn-sm btn-edit" href="<?php echo 'updateUser.php?id=' . $get_user_Id; ?>" id="<?php echo $get_user_Id  ?>">Edit</a>
                           -->                              <button type="button" class="btn btn-outline-success btn-sm btn-resolve"  id="<?php echo $get_comaplain_Id  ?>">Resolve</button>
                              
                                                        </td>

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
            $(document).on('click', '.btn-resolve', function(e) {
                var id = $(this).attr('id');
                alertify.confirm("Are You Sure Want To Resolved this Complain",
                    function() {
                        $.ajax({
                            url: '../api_calls/user/resolve-complain.php',
                            type: 'POST',
                            data: {
                                id: id
                            },
                            success: function(res) {

                                if (res.trim() === 'resolved') {
                                    alertify.success("Complain Resolved Successfully");
                                    window.location.href='getcomplain.php'
                                    
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
                    ok: 'Yes, Resolve!',
                    cancel: 'Not Today'
                }).set('movable', 'true').setHeader('Resolve Complain');
            })





        });


        function fetchDepartments() {
            $('.loadTable').load('../api_calls/fetch-departments.php');
        }
    </script>




           
</body>


</html>
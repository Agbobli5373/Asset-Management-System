<!doctype html>
<html lang="en">

<?php $title = "Dashboard | Asset Management System"; ?>
<?php require_once '../share/head.php';  ?>
<?php require_once '../api_calls/counter.php' ?>

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

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-md-6 col-sm-12" >
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="font-size-14">Number of Stock</h5>
                                        </div>
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="dripicons-box"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <h4 class="m-0 align-self-center"><?php echo $stockNumber;  ?></h4>

                                    <p class="py-2"></p>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="font-size-14">Number of Department</h5>
                                        </div>
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="dripicons-briefcase"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <h4 class="m-0 align-self-center"><?php echo $departmentNumber;  ?></h4>
                                    <p class="py-2"></p>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="font-size-14">Number of Request</h5>
                                        </div>
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="dripicons-tags"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <h4 class="m-0 align-self-center"><?php echo $requestNumber;  ?></h4>
                                    <p class="py-2"></p>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="font-size-14">Number of Asserts</h5>
                                        </div>
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="dripicons-cart"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <h4 class="m-0 align-self-center"><?php echo $assetNumber;  ?></h4>

                                    <p class="py-2"></p>

                                </div>
                            </div>
                        </div>




                    </div>
                    <!-- end row -->


                    <div class="container d-flex justify-content-center mt-4">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-12 align-self-center">

                                <div class="row">
                                    <div class="col-12 col-lg-3">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mx-auto text-center">
                                                        <i class="fa fa-street-view fa-4x text-info"></i>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 text-center">
                                                        <p class="text-info">Add User</p>
                                                        <p class="text-secondary"></p>
                                                        <a class="btn btn-info mt-2 px-4" href="addUser.php">Click Here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mx-auto text-center">
                                                        <i class="fa fa-landmark fa-4x text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 text-center">
                                                        <p class="text-info">Add Category</p>
                                                        <p class="text-secondary"></p>
                                                        <a class="btn btn-warning mt-2 px-4" href="addCategory.php">Click Here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mx-auto text-center">
                                                        <i class="fa fa-building fa-4x text-success"></i>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 text-center">
                                                        <p class="text-info">Add Department</p>
                                                        <p class="text-secondary"></p>
                                                        <a class="btn btn-success mt-2 px-4" href="add-department.php">Click Here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col mx-auto text-center">
                                                        <i class="fa fa-book-reader fa-4x text-danger"></i>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 text-center">
                                                        <p class="text-info">Add Assert</p>
                                                        <p class="text-secondary"></p>
                                                        <a class="btn btn-danger mt-2 px-4" href="addAssert.php">Click Here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>








                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <?php require_once '../share/footer.php'; ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <?php require_once '../share/script.php'; ?>

</body>

</html>
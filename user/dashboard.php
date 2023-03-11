<!doctype html>
<html lang="en">

<?php $title = "Dashboard | Asset Management System"; ?>
<?php require_once '../share/head.php';  ?>

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
                                <h4 class="mb-0 font-size-18">Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="font-size-14">Number of Categories</h5>
                                        </div>
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="dripicons-box"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <h4 class="m-0 align-self-center"><?php echo 1;  ?></h4>

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
                                    <h4 class="m-0 align-self-center"><?php echo 2;  ?></h4>
                                    <p class="py-2"></p>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="font-size-14">Number of Demage Assert</h5>
                                        </div>
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="dripicons-tags"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <h4 class="m-0 align-self-center"><?php echo 4;  ?></h4>
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
                                    <h4 class="m-0 align-self-center"><?php echo 5;  ?></h4>

                                    <p class="py-2"></p>

                                </div>
                            </div>
                        </div>




                    </div>
                    <!-- end row -->


                    








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
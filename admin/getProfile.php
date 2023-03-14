<!doctype html>
<html lang="en">
<?php

$title = "Update User" ?>
<?php require_once '../share/head.php'; ?>
<?php require_once '../config/dbConnect.php'; ?>

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
                                <h4 class="mb-0 font-size-18">Admin Profile</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title"> <?php 
                                        echo $_COOKIE["username"] ;
                                    ?></h4>
                                     <h4 class="header-title"> <?php 
                                        echo $_COOKIE["email"] ;
                                    ?></h4>


                                    
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
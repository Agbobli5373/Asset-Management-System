
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Dashboard | Assert Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="An Assert Management System for Ho Technical University" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/htu.jpg">
        <!-- slick css -->
        <link href="assets/libs/slick-slider/slick/slick.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/slick-slider/slick/slick-theme.css" rel="stylesheet" type="text/css" />

        <!-- jvectormap -->
        <link href="assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

 <?php require_once 'sidebar.php';  ?>

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
                                        <h4 class="m-0 align-self-center"><?php  echo 1;  ?></h4>

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
                                        <h4 class="m-0 align-self-center"><?php  echo 4;  ?></h4>
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
                                        <h4 class="m-0 align-self-center"><?php  echo 5;  ?></h4>

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
                                        <a class="btn btn-info mt-2 px-4" href="add-student.php">Click Here</a>
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
                                        <p class="text-info">Add Categorie</p>
                                        <p class="text-secondary"></p>
                                        <a class="btn btn-warning mt-2 px-4" href="add-clearer.php">Click Here</a>
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
                                        <a class="btn btn-danger mt-2 px-4" href="add-programme.php">Click Here</a>
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

                
            <?php  require_once 'footer.php'; ?> 

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <script src="assets/libs/slick-slider/slick/slick.min.js"></script>

        <!-- Jq vector map -->
        <script src="assets/libs/jqvmap/jquery.vmap.min.js"></script>
        <script src="assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <script src="app.js"></script>

    </body>
</html>

                                
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


                              <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Students</h4>

                  
                    
                </div>
            </div>
        </div>     
        <!-- end page title -->

        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Add New Student</h4>
                       
                        
                        <form class="mt-4" id="add-student" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" class="form-control name" id="name" placeholder="Student Name"required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>

                                 <div class="col-md-6 mb-3">
                                    <label for="index_number">Index Number</label>
                                    <input type="text" name="index_number" class="form-control index-number" id="index_number" placeholder="Index Number"required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                               </div> 
                                 <div class="row">
                                  <div class="col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control email" id="email" placeholder="Email"required>
                                        <div class="valid-feedback">
                                         Looks good!
                                        </div>
                                  </div>
    
                                    <div class="col-md-6 mb-3">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" name="phone" class="form-control phone" id="phone" placeholder="Phone Number"required>
                                        <div class="valid-feedback">
                                         Looks good!
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

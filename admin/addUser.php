                                <!doctype html>
                                <html lang="en">
                               <?php $title = "Add User" ?>
                               <?php require_once '../share/head.php'; ?>

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
                                                                <h4 class="mb-0 font-size-18">Users</h4>



                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end page title -->

                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-12 col-md-8">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <h4 class="header-title">Add New User</h4>


                                                                    <form class="mt-4" id="add-student" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-3">
                                                                                <label for="name">Full Name</label>
                                                                                <input type="text" name="name" class="form-control name" id="name" placeholder="User Name" required>
                                                                                <div class="valid-feedback">
                                                                                    Looks good!
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 mb-3">
                                                                                <label for="index_number">Department</label>
                                                                                <input type="text" name="department" class="form-control department" id="department" placeholder="Department" required>
                                                                                <div class="valid-feedback">
                                                                                    Looks good!
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-3">
                                                                                <label for="email">Email</label>
                                                                                <input type="email" name="email" class="form-control email" id="email" placeholder="Email" required>
                                                                                <div class="valid-feedback">
                                                                                    Looks good!
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 mb-3">
                                                                                <label for="phone">Phone Number</label>
                                                                                <input type="text" name="phone" class="form-control phone" id="phone" placeholder="Phone Number" required>
                                                                                <div class="valid-feedback">
                                                                                    Looks good!
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-3">
                                                                                <label for="password">Password</label>
                                                                                <input type="password" name="password" class="form-control password" id="password" placeholder="Password" required>
                                                                                <div class="valid-feedback">
                                                                                    Looks good!
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 mb-3">
                                                                                <label for="role">Role</label>
                                                                                <input type="text" name="phone" class="form-control phone" id="phone" placeholder="Role" required>
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
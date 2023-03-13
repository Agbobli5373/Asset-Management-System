                                <!doctype html>
                                <html lang="en">
                                <?php $title = "Add User" ?>
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


                                                                    <form class="mt-4" id="add-user" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-3">
                                                                                <label for="name">Full Name</label>
                                                                                <input type="text" name="name" class="form-control name" id="name" placeholder="User Name" required>
                                                                                <div class="valid-feedback">
                                                                                    Looks good!
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 mb-3">
                                                                                <label for="department">Department</label>
                                                                                <select class="form-control" id="department" name="department">

                                                                                    <?php

                                                                                    $get_departments = mysqli_query($connectionString, "SELECT * FROM department_tbl") or die(mysqli_error($connectionString));

                                                                                    while ($each_department = mysqli_fetch_array($get_departments)) {
                                                                                        $department_id = $each_department['department_id'];
                                                                                        $department_name = $each_department['department_name'];

                                                                                    ?>

                                                                                        <option value="<?php echo $department_id; ?>"><?php echo $department_name;  ?></option>


                                                                                    <?php  }    ?>


                                                                                </select>
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
                                                                                <select class="form-control" id="role" name="role">
                                                                                    <option>
                                                                                        user
                                                                                    </option>
                                                                                    <option>
                                                                                        admin
                                                                                    </option>
                                                                                </select>
                                                                                <div class="valid-feedback">
                                                                                    Looks good!
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <button class="btn btn-primary text-center" type="submit">Add User</button>

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
                                    <script type='text/javascript'>
                $(document).ready(function() {

                    alertify.set('notifier', 'position', 'top-right');
                    $('#add-user').submit(function(e) {
                        e.preventDefault();
                        var formdata = $(this).serialize();
                        if ($('.name').val() === '') {
                            alertify.error("Please Enter Name");
                        } else {

                            $.ajax({
                                url: '../api_calls/add-user.php',
                                type: 'POST',
                                data: formdata,
                                success: function(res) {
                                    if (res.trim() === "success") {
                                        $('.name').val('');
                                        $('.email').val('');
                                        $('.password').val('');
                                        alertify.success("Added Successfully");

                                    } else if (res.trim() === "already") {
                                        alertify.error("Name Exists Already");

                                    }

                                },
                                error: function(res) {
                                    console.log(res);
                                }

                            });

                        }

                    })



                });
            </script>


                                </body>

                                </html>
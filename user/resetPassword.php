<!doctype html>
<html lang="en">
<?php $title = "Reset Password" ?>
<?php require_once '../share/head.php'; ?>

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
                                <h4 class="mb-0 font-size-18">Reset Password</h4>



                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Reset Admin Password</h4>


                                    <form class="mt-4" id="reset-password" method="POST">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom01">Old Password</label>
                                                <input type="password" name="current-password" class="form-control current-password" id="validationCustom01" placeholder=" Type Current password" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom01">New Password</label>
                                                <input type="password" name="new-password" class="form-control new-password" id="validationCustom01" placeholder="Type new password" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                        </div>

                                        <button class="btn btn-primary text-center" type="submit">Reset Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->



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
                    $('#reset-password').submit(function(e) {
                        e.preventDefault();
                        var formdata = $(this).serialize();
                        if ($('.current-password').val() === '') {
                            alertify.error("Please Enter Name");
                        } else {
                           
                            $.ajax({
                                url: '../api_calls/reset-password.php',
                                type: 'POST',
                                data: formdata,
                                success: function(res) {
                                    console.log(res)
                                    if (res.trim() === "success") {
                                        $('.current-password').val('');
                                        $('.new-password').val('');
                                        alertify.success("Password Reset Successfully");

                                    } else if (res.trim() === "not_match") {
                                        alertify.error("Incorreect current password");

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
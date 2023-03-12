<!doctype html>
<html lang="en">
<?php $title = "Add Asset Category" ?>
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

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Asset Categories</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Add New Category</h4>


                                    <form class="mt-4" id="add-category" method="POST">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom01">Name</label>
                                                <input type="text" name="category_name" class="form-control category-name" id="validationCustom01" placeholder="category Name" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                        </div>

                                        <button class="btn btn-primary text-center" type="submit">Add Category</button>
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
                    $('#add-category').submit(function(e) {
                        e.preventDefault();
                        var formdata = $(this).serialize();
                        if ($('.category-name').val() === '') {
                            alertify.error("Please Enter Name");
                        } else {

                            $.ajax({
                                url: '../api_calls/add-category.php',
                                type: 'POST',
                                data: formdata,
                                success: function(res) {
                                    if (res.trim() === "success") {
                                        $('.category-name').val('');
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
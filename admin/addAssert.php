<!doctype html>
<html lang="en">
<?php $title = "Add Asset " ?>
<?php require_once '../share/head.php'; ?>
<?php require_once('../config/dbConnect.php') ?>

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
                                <h4 class="mb-0 font-size-18">Assets</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Add New Asset</h4>


                                    <form class="mt-4" id="add-asset" method="POST">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name">Name of the Asset</label>
                                                <input type="text" name="name" class="form-control name" id="name" placeholder="Asset Name" required>
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
                                                <label for="category">Category</label>
                                                <select class="form-control" id="category" name="category">

                                                    <?php

                                                    $get_categorys = mysqli_query($connectionString, "SELECT * FROM category_tbl") or die(mysqli_error($connectionString));

                                                    while ($each_category = mysqli_fetch_array($get_categorys)) {
                                                        $category_id = $each_category['category_id'];
                                                        $category_name = $each_category['category_name'];

                                                    ?>

                                                        <option value="<?php echo $category_id; ?>"><?php echo $category_name;  ?></option>


                                                    <?php  }    ?>


                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="price">Price of the Asset</label>
                                                <input type="number" name="price" class="form-control price" id="price" placeholder="Price" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="depreciate">Depreciate Percentage</label>
                                                <input type="number" name="depreciate" class="form-control depreciate" id="depreciate" placeholder="Depreciate" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="depreciate">Asset Quantity</label>
                                                <input type="number" name="quantity" class="form-control quantity" id="quantity" placeholder="quantity" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-md-12 mb-3">

                                            <label for="remark">Details</label>
                                            <input type="text" name="detail" class="form-control detail" id="detail" placeholder="Asset Details" required>
                                            <div class="valid-feedback">
                                                Looks good!

                                            </div>
                                        </div>

                                        <button class="btn btn-primary text-center" type="submit">Add Asset</button>
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
                    $('#add-asset').submit(function(e) {
                        e.preventDefault();
                        var formdata = $(this).serialize();
                        if ($('.name').val() === '') {
                            alertify.error("Please Enter Name");
                        } else {

                            $.ajax({
                                url: '../api_calls/add-asset.php',
                                type: 'POST',
                                data: formdata,
                                success: function(res) {
                                    if (res.trim() === "success") {
                                        $('.name').val('');
                                        $('.price').val('');
                                        $('.depreciate').val('');
                                        $('.quantity').val('');
                                        $('.detail').val('');
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
<!doctype html>
<html lang="en">
<?php

$title = "Add asset" ?>
<?php require_once '../share/head.php'; ?>
<?php require_once '../config/dbConnect.php'; ?>
<?php
$sql = "SELECT * From asset_tbl 
                where asset_id =" . $_GET['id'];

$query = mysqli_query($connectionString, $sql);
while ($eachAsset = mysqli_fetch_array($query)) {
    $get_asset_Id = $eachAsset['asset_id'];
    $get_asset_name = $eachAsset['asset_name'];
    $get_asset_price = $eachAsset['asset_price'];
    $get_asset_depreciated = $eachAsset['depreciated_rate'];
    $get_asset_quantity = $eachAsset['asset_quantity'];
    $get_asset_detail = $eachAsset['details'];
}

?>

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
                                <h4 class="mb-0 font-size-18">assets</h4>



                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Update Asset</h4>


                                    <form class="mt-4" id="update-asset" method="POST">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name">Name of the Asset</label>
                                                <input type="text" name="name" class="form-control name" id="name" placeholder="Asset Name" value="<?php echo $get_asset_name ?>" required>
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
                                                <input type="number" name="price" class="form-control price" id="price" value="<?php echo $get_asset_price ?>" placeholder="Price" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="depreciate">Depreciate Percentage</label>
                                                <input type="number" name="depreciate" class="form-control depreciate" id="depreciate" value="<?php echo $get_asset_depreciated ?>" placeholder="Depreciate" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="depreciate">Asset Quantity</label>
                                                <input type="number" name="quantity" class="form-control quantity" id="quantity" value="<?php echo $get_asset_quantity ?>" placeholder="quantity" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-md-12 mb-3">

                                            <label for="remark">Details</label>
                                            <input type="text" name="detail" class="form-control detail" id="detail" value="<?php echo $get_asset_detail ?>" placeholder="Asset Details" required>
                                            <div class="valid-feedback">
                                                Looks good!

                                            </div>
                                        </div>
                                        <input type="number" hidden name="asset_id" value="<?php echo $_GET['id'] ?>" />
                                        <button class="btn btn-outline-primary waves-effect waves-light" type="submit">Update</button>
                                        <a role="button" type="button" class="btn btn-outline-secondary waves-effec" href="getAssets.php">Close</a>
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
                    $('#update-asset').submit(function(e) {
                        e.preventDefault();
                        var formdata = $(this).serialize();
                        if ($('.name').val() === '') {
                            alertify.error("Please Enter Name");
                        } else {
                            console.log("something going on");

                            $.ajax({
                                url: '../api_calls/update-asset.php',
                                type: 'POST',
                                data: formdata,
                                success: function(res) {
                                    console.log(res);
                                    if (res.trim() === "success") {
                                        alertify.success("asset updated Successfully");
                                        window.location.href = 'getAssets.php';

                                    } else if (res.trim() === "already") {
                                        alertify.error("Email Exists Already");

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
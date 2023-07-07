<!doctype html>
<html lang="en">
<?php $title = "Assert Request" ?>
<?php require_once '../share/head.php'; ?>
<?php require_once('../config/dbConnect.php') ?>

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
                                <h4 class="mb-0 font-size-18">Asset Request</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Make Request</h4>


                                    <form class="mt-4" id="add-request" method="POST">
                                        <div class="row">
                                        <div class="col-md-6 mb-3">
                                                <label for="name">Name of the Asset</label>
                                                <select class="form-control" id="asset" name="asset_name">

                                                    <?php

                                                    $get_stocks = mysqli_query($connectionString, "SELECT * FROM stock_tbl Where `product_quantity` > 0 ") or die(mysqli_error($connectionString));
                                                    
                                                    while ($each_product = mysqli_fetch_array($get_stocks)) {
                                                        $product_id = $each_product['product_id'];
                                                        $product_name = $each_product['product_name'];
                                                        $product_price = $each_product['product_price'];
                                                        $product_category = $each_product['product_category'];
                                                        $product_qty = $each_product['product_quantity'];

                                                    ?>

                                                        <option value="<?php echo $product_name; ?>"><?php echo $product_name ;  ?></option>


                                                    <?php  }    ?>


                                                </select>                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom01">Reason for the request</label>
                                                <input type="text" name="reason" class="form-control reason" id="validationCustom01" placeholder="Reason for the Asset" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>


                                        <button class="btn btn-primary text-center" type="submit">Send</button>
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
                    $('#add-request').submit(function(e) {
                        e.preventDefault();
                        var formdata = $(this).serialize();
                        if ($('.asset_name').val() === '') {
                            alertify.error("Please Enter Asset Name");
                        } else {
                            $.ajax({
                                url: '../api_calls/user/make-request.php',
                                type: 'POST',
                                data: formdata,
                                success: function(res) {
                                    if (res.trim() === "success") {
                                        $('.asset-name').val('');
                                        alertify.success("Request Sent Successfully");
                                        window.location.href = 'viewRequest.php';

                                    } else if (res.trim() === "already") {
                                        alertify.error("Request Sent Already");

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
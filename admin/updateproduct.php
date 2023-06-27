<!doctype html>
<html lang="en">
<?php $title = "Add Product to Stock " ?>
<?php require_once '../share/head.php'; ?>
<?php require_once('../config/dbConnect.php') ?>
<?php 
 $get_product_Id = $_GET["id"] ;
 $getStocks = mysqli_query($connectionString, "SELECT * FROM stock_tbl WHERE product_id = '$get_product_Id'") or die(mysqli_error($connectionString));
    $eachproduct = mysqli_fetch_array($getStocks);
    $get_product_name = $eachproduct['product_name'];
    $get_product_quantity = $eachproduct['product_quantity'];
    $get_product_price = $eachproduct['product_price'];
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

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Stock</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Add New Product</h4>


                                    <form class="mt-4" id="add-asset" method="POST">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name">Name of the Product</label>
                                                <input type="text" name="name" class="form-control name" value="<?php echo $get_product_name ?>" id="name" placeholder="Product Name" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="depreciate">Product Quantity</label>
                                                <input type="number" name="quantity" class="form-control quantity" value="<?php echo $get_product_quantity ?> id="quantity" placeholder="quantity" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
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
                                                <input type="number" name="price" class="form-control price" value="<?php echo $get_product_price ?> id="price" placeholder="Price" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>

                                        </div>
                                       
                                  

                                        <button class="btn btn-primary text-center" type="submit">Update Item</button>
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
                                url: '../api_calls/update-stock.php',
                                type: 'POST',
                                data: formdata,
                                success: function(res) {
                                    console.log(res);
                                    if (res.trim() === "success") {
                                        $('.name').val('');
                                        $('.price').val('');
                                        $('.quantity').val('');
                                        //$('.detail').val('');
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
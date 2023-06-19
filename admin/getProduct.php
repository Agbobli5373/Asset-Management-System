<!doctype html>
<html lang="en">
<?php $title = "Stocks" ?>
<?php require_once '../share/head.php'; ?>
<?php require_once '../config/dbConnect.php'; ?>
<?php require_once '../api_calls/utils.php'; ?>

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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">All Items in the Stock</h4>
                                    <div class="table-responsive">
                                        <table id="datatable-buttons" class="table table-striped table-centered table-nowrap mb-0 table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Qty</th>
                                                    <th scope="col">Date Created</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $counter = 1;
                                                $getStocks = mysqli_query($connectionString, "SELECT * FROM stock_tbl 
                                                                            JOIN category_tbl on stock_tbl.category_id = category_tbl.category_id 
                                                                            WHERE stock_tbl.product_quantity > 0
                                                                            ") or die(mysqli_error($connectionString));
                                                while ($eachproduct = mysqli_fetch_array($getStocks)) {

                                                    $get_product_Id = $eachproduct['product_id'];
                                                    $get_product_name = $eachproduct['product_name'];
                                                    $get_product_category = $eachproduct['category_name'];
                                                    $get_product_price = $eachproduct['product_price'];
                                                    $get_product_quantity = $eachproduct['product_quantity'];
                                                    $get_product_createdDate = $eachproduct['product_timestamp'];
              

                                                ?>
                                                    <tr>
                                                        <td><b><?php echo $counter;   ?></b></td>
                                                        <td><?php echo $get_product_name;  ?></td>
                                                        <td><?php echo $get_product_category;  ?></td>
                                                        <td><?php echo   $get_product_price;  ?></td>
                                                        <td><?php echo   $get_product_quantity;  ?></td>
                                                        <td><?php echo $get_product_createdDate;  ?></td>
                                                        <td>
                                                            <a role="button" type="button" class="btn btn-outline-success btn-sm btn-edit" href="<?php echo 'updateproduct.php?id='.$get_product_Id ; ?>" id="<?php echo $get_product_Id  ?>">Edit</a>
                                                            <button type="button" class="btn btn-outline-danger btn-sm btn-delete" id="<?php echo $get_product_Id  ?>">Delete</button>
                                                        </td>

                                                    </tr>


                                                <?php $counter++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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

            $(document).on('click', '.btn-delete', function(e) {
                var id = $(this).attr('id');
                alertify.confirm("Are You Sure Want To Delete This product",
                    function() {
                        $.ajax({
                            url: '../api_calls/delete-stock.php',
                            type: 'POST',
                            data: {
                                id: id
                            },
                            success: function(res) {

                                if (res.trim() === 'success') {
                                    alertify.success("Deleted Successfully");
                                    window.location.href = 'getProduct.php';
                                } else {
                                    alertify.error("Something went wrong");
                                    console.log(res);
                                }

                            },
                            error: function(res) {
                                console.log(res);
                            }

                        });
                    },
                    function() {

                    }).set('labels', {
                    ok: 'Yes, Delete!',
                    cancel: 'Not Today'
                }).set('movable', 'true').setHeader('Delete Product');
            })





        });

    </script> 


</body>


</html>
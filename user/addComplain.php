<!doctype html>
<html lang="en">
<?php $title = "Add Asset Category" ?>
<?php require_once '../share/head.php'; ?>
<?php  
      require_once '../config/dbConnect.php';
      $get_asset_id = $_GET['id'];
      $asset_name_sql = " SELECT * FROM asset_tbl WHERE `asset_id` = '$get_asset_id'" ;
      $get_asset_name = mysqli_query($connectionString , $asset_name_sql) or die(mysqli_error($connectionString));
      $get_asset = mysqli_fetch_array($get_asset_name) ;
      $name = $get_asset['asset_name'] ;

?>

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
                                <h4 class="mb-0 font-size-18">Complain</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Add New Complain</h4>


                                    <form class="mt-4" id="add-complain" method="POST">
                                    <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <input type="text" name="asset_id" hidden class="form-control asset-name" id="validationCustom01" placeholder="" value="<?php echo $get_asset_id; ?>">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom01">Asset Name</label>
                                                <input type="text" name="asset_name" disabled class="form-control asset-name" id="validationCustom01" placeholder="" value="<?php echo $name; ?>">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="validationCustom01">Complain Detail</label>
                                                <input type="text" name="detail" class="form-control complain" id="validationCustom01" placeholder="Write complain here" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary text-center" type="submit">Send Complain</button>
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
                    $('#add-complain').submit(function(e) {
                        e.preventDefault();
                        var formdata = $(this).serialize();
                        if ($('.name').val() === '') {
                            alertify.error("Please Enter Name");
                        } else {

                            $.ajax({
                                url: '../api_calls/user/make-complain.php',
                                type: 'POST',
                                data: formdata,
                                success: function(res) {
                                    console.log(res);
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
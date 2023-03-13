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

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Users</h4>



                            </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">All Users</h4>

                                    <div class="table-responsive">
                                        <table id="datatable-buttons" class="table table-striped table-centered table-nowrap mb-0 table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Full Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Department</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Date Created</th>
                                                    <th scope="col">Password</th>
                                                    <th scope="col">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $counter = 1;
                                                $getUsers = mysqli_query($connectionString, "SELECT * FROM user_tbl join department_tbl on user_tbl.department_id = department_tbl.department_id 
                                                                       ORDER BY user_tbl.user_id ASC") or die(mysqli_error($connectionString));
                                                while ($eachUser = mysqli_fetch_array($getUsers)) {

                                                    $get_user_Id = $eachUser['user_id'];
                                                    $get_user_name = $eachUser['username'];
                                                    $get_user_email = $eachUser['email'];
                                                    $get_user_department = $eachUser['department_name'];
                                                    $get_user_role = $eachUser['role'];
                                                    $get_user_createdDate = $eachUser['timestamp'];
                                                    $get_user_password = $eachUser['password'];

                                                ?>
                                                    <tr>
                                                        <td><b><?php echo $counter;   ?></b></td>
                                                        <td><?php echo $get_user_name;  ?></td>
                                                        <td><?php echo $get_user_email;  ?></td>
                                                        <td><?php echo  $get_user_department;  ?></td>
                                                        <td><?php echo $get_user_role;  ?></td>
                                                        <td><?php echo $get_user_createdDate;  ?></td>
                                                        <td><?php echo $get_user_password;  ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-success btn-sm btn-edit" id="<?php echo $get_user_Id  ?>">Edit</button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm btn-delete" id="<?php echo $get_user_Id  ?>">Delete</button>
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
                    <!-- sample modal content -->
                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myModalLabel">Edit category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="" id="edit-category" method="POST">
                                        <input type="hidden" name="depart_id" value="" id="depart_id">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="edit-category-name">Name</label>
                                                <input type="text" name="category_name" class="form-control edit-category-name" id="edit-category-name" placeholder="category Name" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>


                                        </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Update</button>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->





                    <?php require_once '../share/footer.php'; ?>

                </div>
                <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->



            <!-- Right bar overlay-->
            <div class="rightbar-overlay"></div>

            <?php require_once("../share/script.php") ?>


            <!--    <script type='text/javascript'>
        $(document).ready(function() {

            fetchcategorys();

            alertify.set('notifier', 'position', 'top-right');


            $(document).on('click', '.btn-edit', function(e) {


                var id = $(this).attr('id');
                $('#depart_id').val(id);

                $.ajax({
                    url: '../api_calls/get-category-details.php',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(res) {

                        $('.edit-category-name').val(res.name);
                        $('#myModal').modal('show');
                        console.log(res);
                    },
                    error: function(res) {
                        console.log(res);
                    }

                });
            })

            $('#edit-category').submit(function(e) {
                e.preventDefault();
                var formdata = $(this).serialize();

                if ($('.edit-category-name').val() === '') {
                    alertify.error("Please Enter Name");
                } else {

                    $.ajax({
                        url: '../api_calls/update-category-details.php',
                        type: 'POST',
                        data: formdata,
                        success: function(res) {

                            if (res === "success") {
                                alertify.success("Updated Successfully");
                                $('#myModal').modal('hide');
                                fetchcategorys();

                            } else if (res === "already") {
                                alertify.error("Name Exists Already");

                            }
                        },
                        error: function(res) {
                            console.log(res);
                        }

                    });

                }

            });



            $(document).on('click', '.btn-delete', function(e) {
                var id = $(this).attr('id');
                alertify.confirm("Are You Sure Want To Delete This category",
                    function() {
                        $.ajax({
                            url: '../api_calls/delete-category.php',
                            type: 'POST',
                            data: {
                                id: id
                            },
                            success: function(res) {

                                if (res.trim() === 'success') {
                                    alertify.success("Deleted Successfully");
                                    fetchcategorys();
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
                }).set('movable', 'true').setHeader('Delete category');
            })





        });


        function fetchcategorys() {
            $('.loadTable').load('../api_calls/fetch-categorys.php');
        }
    </script> -->


</body>


</html>
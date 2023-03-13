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
                                                            <a role="button" type="button" class="btn btn-outline-success btn-sm btn-edit" href="<?php echo 'updateUser.php?id='.$get_user_Id ; ?>" id="<?php echo $get_user_Id  ?>">Edit</a>
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


            $(document).on('click', '.btn-edit', function(e) {


                var id = $(this).attr('id');
                $('#depart_id').val(id);

                $.ajax({
                    url: '../api_calls/get-user-details.php',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(res) {

                        $('.edit-user-name').val(res.name);
                        $('#myModal').modal('show');
                        console.log(res);
                    },
                    error: function(res) {
                        console.log(res);
                    }

                });
            })

            $('#edit-user').submit(function(e) {
                e.preventDefault();
                var formdata = $(this).serialize();

                if ($('.edit-user-name').val() === '') {
                    alertify.error("Please Enter Name");
                } else {

                    $.ajax({
                        url: '../api_calls/update-user-details.php',
                        type: 'POST',
                        data: formdata,
                        success: function(res) {

                            if (res === "success") {
                                alertify.success("Updated Successfully");
                                $('#myModal').modal('hide');
                                fetchusers();

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
                alertify.confirm("Are You Sure Want To Delete This user",
                    function() {
                        $.ajax({
                            url: '../api_calls/delete-user.php',
                            type: 'POST',
                            data: {
                                id: id
                            },
                            success: function(res) {

                                if (res.trim() === 'success') {
                                    alertify.success("Deleted Successfully");
                                    fetchusers();
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
                }).set('movable', 'true').setHeader('Delete user');
            })





        });


        function fetchusers() {
            $('.loadTable').load('../api_calls/fetch-users.php');
        }
    </script> -->


</body>


</html>
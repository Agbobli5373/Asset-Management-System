<!doctype html>
<html lang="en">
<?php $title = "Users" ?>
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
                                    window.location.href = 'getUsers.php';
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

    </script> 


</body>


</html>
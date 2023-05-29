<!doctype html>
<html lang="en">

<?php $title = "Dashboard | Asset Management System"; ?>
<?php require_once '../share/head.php';  ?>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        
        <?php require_once '../share/userSidebar.php';  ?>
        <?php
        require_once '../config/dbConnect.php';
        require_once '../api_calls/counter.php';
        ?>

        <?php
        $id = $_COOKIE["user_id"];
        $sql = "SELECT * FROM `user_tbl` 
                JOIN `department_tbl` 
                ON `user_tbl.department_id` = `department_tbl.department_id`
                WHERE `user_id` = '$id';
               ";

        $query = mysqli_query($connectionString, $sql) or die(mysqli_error($connectionString));
        $profile = mysqli_fetch_array($query);

        $username = $profile['username'];
        $email =$profile['email'];
        $department = $profile['department_name'];
        $role =$profile['role'];
        $createdDate= $profile['timestamp'];
        ?>


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Complain</h4>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">USER PROFILE</h4>

                                    <div class="table-responsive">
                                        <table class="table table-centered  mb-0">
                                            <thead>

                                            </thead>
                                            <tbody class="loadTable">
                                                <tr>
                                                    <td scope="col">User Name</td>
                                                    <td scope="col"><?php echo $username ?></td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">User Email</td>
                                                    <td scope="col"><?php echo  $email ?></td>
                                                </tr>

                                                <tr>
                                                    <td scope="col">Department</td>
                                                    <td scope="col"><?php echo  $department ?></td>
                                                </tr>

                                                <tr>
                                                    <td scope="col">User Role</td>
                                                    <td scope="col"><?php echo  $role ?></td>
                                                </tr>
                                                <tr>
                                                    <td scope="col">Date User Created</td>
                                                    <td scope="col"><?php echo  $createdDate ?></td>
                                                </tr>
                                                

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <?php require_once '../share/footer.php'; ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <?php require_once '../share/script.php'; ?>

</body>

</html>
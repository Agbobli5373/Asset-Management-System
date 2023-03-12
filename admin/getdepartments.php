<!doctype html>
<html lang="en">
<?php $title = "Add User" ?>
<?php require_once '../share/head.php'; ?>

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
                                <h4 class="mb-0 font-size-18">Departments</h4>



                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                   
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">All Departments</h4>

                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Date Created</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="loadTable">

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
            <!-- sample modal content -->
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">Edit Department</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="" id="edit-department" method="POST">
                                <input type="hidden" name="depart_id" value="" id="depart_id">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="edit-department-name">Name</label>
                                        <input type="text" name="department_name" class="form-control edit-department-name" id="edit-department-name" placeholder="Department Name" required>
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


    <script type='text/javascript'>
        $(document).ready(function() {

            fetchDepartments();

            alertify.set('notifier', 'position', 'top-right');
            $('#edit-department').submit(function(e) {
                e.preventDefault();
                var formdata = $(this).serialize();

                if ($('.edit-department-name').val() === '') {
                    alertify.error("Please Enter Name");
                } else {

                    $.ajax({
                        url: 'api_calls/update-department-details.php',
                        type: 'POST',
                        data: formdata,
                        success: function(res) {

                            if (res === "success") {
                                alertify.success("Updated Successfully");
                                $('#myModal').modal('hide');
                                fetchDepartments();

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


            $(document).on('click', '.btn-edit', function(e) {


                var id = $(this).attr('id');

                $('#depart_id').val(id);

                $.ajax({
                    url: 'api_calls/get-department-details.php',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    success: function(res) {

                        $('.edit-department-name').val(res.name);
                        $('#myModal').modal('show');
                    },
                    error: function(res) {
                        console.log(res);
                    }

                });
            })


            $(document).on('click', '.btn-delete', function(e) {
                var id = $(this).attr('id');
                alertify.confirm("Are You Sure Want To Delete This Department",
                    function() {
                        $.ajax({
                            url: 'api_calls/delete-department.php',
                            type: 'POST',
                            data: {
                                id: id
                            },
                            success: function(res) {

                                if (res === 'success') {
                                    alertify.success("Deleted Successfully");
                                    fetchDepartments();
                                } else {
                                    alertify.error("Something went wrong");
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
                }).set('movable', 'true').setHeader('Delete Department');
            })





        });


        function fetchDepartments() {
            $('.loadTable').load('../api_calls/fetch-departments.php');
        }
    </script>


</body>


</html>
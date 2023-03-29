
<?php 
  if($_COOKIE['role']  != 'admin'){
    header("Location: ../index.php");
    exit() ;
  }

  require_once '../api_calls/counter.php' ;
?>
<header id="page-topbar">
       <div class="navbar-header">
           <div class="d-flex">
               <!-- LOGO -->
               <div class="navbar-brand-box">
                   <a href="dashboard.php" class="logo logo-dark">
                       <span class="logo-sm">
                           <img src="../assets/images/htu.jpg" alt="" height="40">
                       </span>
                       <span class="logo-lg">
                           <img src="../assets/images/htu.jpg" alt="" height="60">
                       </span>
                   </a>

                   <a href="dashboard.php" class="logo logo-light">
                       <span class="logo-sm">
                           <img src="../assets/images/htu.jpg" alt="" height="40">
                       </span>
                       <span class="logo-lg">
                           <span style="font-weight: bold;color: white;font-size: 1.7em;">A.M.S</span>
                       </span>
                   </a>
               </div>

               <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                   <i class="mdi mdi-backburger"></i>
               </button>

               <!-- App Search-->
               <form class="app-search d-none d-lg-block">
                   <div class="position-relative">
                       <input type="text" class="form-control" placeholder="Search...">
                       <span class="mdi mdi-magnify"></span>
                   </div>
               </form>
           </div>

           <div class="d-flex">

               <div class="dropdown d-inline-block d-lg-none ml-2">
                   <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="mdi mdi-magnify"></i>
                   </button>
                   <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                       <form class="p-3">
                           <div class="form-group m-0">
                               <div class="input-group">
                                   <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                   <div class="input-group-append">
                                       <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                   </div>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>



               <div class="dropdown d-none d-lg-inline-block ml-1">
                   <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                       <i class="mdi mdi-fullscreen"></i>
                   </button>
               </div>

               <div class="dropdown d-inline-block">
                   <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <img class="rounded-circle header-profile-user" src="../assets/images/users/avatar-1.jpg" alt="Header Avatar">
                       <span class="d-none d-sm-inline-block ml-1"><?php echo $_COOKIE['username']  ?></span>
                       <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                   </button>
                   <div class="dropdown-menu dropdown-menu-right">
                       <!-- item-->

                       <a class="dropdown-item" href="getProfile.php"><i class="fa fa-user font-size-16 align-middle mr-1"></i> Profile</a>
                  
                       <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                   </div>
               </div>

           </div>
       </div>
   </header>









   <!-- ========== Left Sidebar Start ========== -->
   <div class="vertical-menu">

       <div data-simplebar class="h-100">

           <!--- Sidemenu -->
           <div id="sidebar-menu">
               <!-- Left Menu Start -->
               <ul class="metismenu list-unstyled" id="side-menu">
                   <li class="menu-title">Menu</li>

                   <li>
                       <a href="dashboard.php" class="waves-effect">
                           <i class="mdi mdi-monitor-dashboard"></i>
                           <span>Dashboard</span>
                       </a>
                   </li>
                   <li>
                       <a href="javascript: void(0);" class="has-arrow waves-effect">
                           <i class="fa fa-user"></i>
                           <span>Users</span>
                       </a>
                       <ul class="sub-menu" aria-expanded="false">
                           <li><a href="../admin/getUsers.php">Users</a></li>
                           <li><a href="../admin/addUser.php">Add User</a></li>
                       </ul>
                   </li>
                   <li>
                       <a href="javascript: void(0);" class="has-arrow waves-effect">
                           <i class="fa fa-landmark "></i>
                           <span>Assert</span>
                       </a>
                       <ul class="sub-menu" aria-expanded="false">
                           <li><a href="../admin/getAssets.php">Assets</a></li>
                           <li><a href="../admin/addAssert.php">Add Asset</a></li>
                       </ul>
                   </li>
                   <li>
                       <a href="javascript: void(0);" class="has-arrow waves-effect">
                           <i class="fa fa-building"></i>
                           <span>Department</span>
                       </a>
                       <ul class="sub-menu" aria-expanded="false">
                           <li><a href="../admin/getDepartments.php">Department</a></li>
                           <li><a href="../admin/addDepartment.php">Add Department</a></li>

                       </ul>
                   </li>
                   <li>
                       <a href="javascript: void(0);" class="has-arrow waves-effect">
                           <i class="fa fa-building"></i>
                           <span>Asset Category</span>
                       </a>
                       <ul class="sub-menu" aria-expanded="false">
                           <li><a href="../admin/getCategory.php">Category</a></li>
                           <li><a href="../admin/addCategory.php">Add Category</a></li>

                       </ul>
                   </li>
                   <li>
                       <a href="../admin/viewRequest.php" class="waves-effect">
                           <i class="fa fa-landmark"></i>
                           <span>Assets Request</span>
                       </a>
                   </li>
                   <li>
                       <a href="javascript: void(0);" class="has-arrow waves-effect">
                           <i class="mdi mdi-file-document"></i>
                           <span>Complain</span>
                           
                                            <span class="avatar-sm rounded-circle p-1 px-2 bg-danger">
                                                <?php echo $complainNumber ?></span>
                                            
                           
                       </a>
                       <ul class="sub-menu" aria-expanded="false">
                           <li><a href="getComplain.php">New Complain</a></li>
                           <li><a href="getResolvedComplain.php">Resolved Complain</a></li>
                       </ul>
                   </li>


                   <li>
                       <a href="logout.php" class=" waves-effect">
                           <i class="mdi mdi-lock"></i>
                           <span>Logout</span>
                       </a>
                   </li>


           </div>
           <!-- Sidebar -->
       </div>
   </div>
   <!-- Left Sidebar End -->
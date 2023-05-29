<?php 
  if($_COOKIE['role']  != 'user'){
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
                       <a class="dropdown-item" href="resetPassword.php"><i class="fa fa-unlock-alt  font-size-16 align-middle mr-1"></i> Reset Password</a>
                     <!--   <a class="dropdown-item" href="getProfile.php"><i class="fa fa-user font-size-16 align-middle mr-1"></i> Profile</a>
-->
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
                       <a href="../user/dashboard.php" class="waves-effect">
                           <i class="mdi mdi-monitor-dashboard"></i>
                           <span>Dashboard</span>
                       </a>
                   </li>
                   <li>
                       <a href="../user/departmentAsset.php" class="waves-effect">
                           <i class="fa fa-landmark"></i>
                           <span>Department Asserts</span>
                       </a>
                   </li>

                   <li>
                       <a href="javascript: void(0);" class="has-arrow waves-effect">
                           <i class="fa fa-landmark"></i>
                           <span>Request</span>
                       </a>
                       <ul class="sub-menu" aria-expanded="false">
                           <li><a href="../user/viewRequest.php">Assets Request</a></li>
                           <li><a href="../user/requestAsset.php">Request New Asset</a></li>
                       </ul>
                   </li>

                   <li>
                       <a href="javascript: void(0);" class="has-arrow waves-effect">
                           <i class="mdi mdi-file-document"></i>
                           <span>Complain</span>
                       </a>
                       <ul class="sub-menu" aria-expanded="false">
                           <li><a href="../user/getcomplain.php">New Complain</a></li>
                           <li><a href="../user/getResolvedComplain.php">Resolved Complain</a></li>
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
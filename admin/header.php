<?php
session_start();
require_once '../connect-database/config.php';
// if (!isset($_SESSION['user_login'])) {
//   $_SESSION['error'] = 'ກາລຸນາເຂົ້າສູ່ລະບົບ!';
//   header("location: login.php");
// }
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="./css/Table.css">
    <link rel="stylesheet" href="./css/Table.customer.css">

</head>
<style>
    body,
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Times New Roman', 'Saysettha OT', sans-serif;
        font-weight: bold;
    }
</style>


<!-- <body  data-topbar="dark"> -->

<body data-layout="vertical-menu" data-topbar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar" class="isvertical-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.svg" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-sm.svg" alt="" height="22"> <span class="logo-txt">ໜ້າຫຼັກ</span>
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.svg" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-sm.svg" alt="" height="22"> <span class="logo-txt">ໜ້າຫຼັກ</span>
                            </span>
                        </a>

                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- Search -->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="ຄົ້ນຫາ...">
                            <span class="bx bx-search"></span>
                        </div>
                    </form>

                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block d-lg-none">
                        <button type="button" class="btn header-item" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-sm" data-feather="search"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                            <form class="p-2">
                                <div class="search-box">
                                    <div class="position-relative">
                                        <input type="text" class="form-control rounded bg-light border-0" placeholder="Search...">
                                        <i class="mdi mdi-magnify search-icon"></i>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <a href="List_user_apporve.php">
                            <?php
                            $stmt = $conn->query("SELECT count(*) FROM company WHERE InfoFull ='full'")->fetchColumn();
                            $stmts = $conn->query("SELECT count(*) FROM customer WHERE InfoFull ='full'")->fetchColumn();

                            $TotalCount =  $stmt +  $stmts;

                            ?>
                            <button type="button" class="btn header-item noti-icon" title="ລາຍການແຈ້ງເຕືອນຫ" id="page-header-notifications-dropdown">
                                <i class="icon-sm" data-feather="bell"></i>
                                <span class="noti-dot bg-danger rounded-pill"><?= $TotalCount ?></span>
                            </button>
                        </a>
                    </div>

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item light-dark" id="mode-setting-btn">
                            <i data-feather="moon" class="icon-sm layout-mode-dark"></i>
                            <i data-feather="sun" class="icon-sm layout-mode-light"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <a href="Account.php">
                            <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                            </button>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <a class="dropdown-item" href="contacts-profile.html"><i class='bx bx-user-circle text-muted font-size-18 align-middle me-1'></i> <span class="align-middle">My Account</span></a>
                            <a class="dropdown-item" href="apps-chat.html"><i class='bx bx-chat text-muted font-size-18 align-middle me-1'></i> <span class="align-middle">Chat</span></a>
                            <a class="dropdown-item" href="pages-faqs.html"><i class='bx bx-buoy text-muted font-size-18 align-middle me-1'></i> <span class="align-middle">Support</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="auth-lock-screen.html"><i class='bx bx-lock text-muted font-size-18 align-middle me-1'></i> <span class="align-middle">Lock screen</span></a>
                            <a class="dropdown-item" href="auth-logout.html"><i class='bx bx-log-out text-muted font-size-18 align-middle me-1'></i> <span class="align-middle">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-sm.svg" alt="" height="22"> <span class="logo-txt">ໜ້າຫຼັກ</span>
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-lg">
                        <img src="assets/images/logo-sm.svg" alt="" height="22"> <span class="logo-txt">ໜ້າຫຼັກ</span>
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.svg" alt="" height="22">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div data-simplebar class="sidebar-menu-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" data-key="t-menu">ເມນູ</li>
                        <li>
                            <a href="index.php">
                                <!-- <i class="bx bx-tachometer icon nav-icon"></i> -->
                                <i class="fa-solid fa-house icon nav-icon"></i>
                                <span class="menu-item" data-key="t-dashboards">ໜ້າບໍລິຫານຈັດການ</span>
                                <span class="badge rounded-pill bg-success">5+</span>
                            </a>
                        </li>

                        <li class="menu-title fw-bold" data-key="t-applications" style="color: black; font-size: 11px;">
                            ລາຍການເມນູຫຼັກ</li>
                        <li>
                            <a href="./Table_admin.php">
                                <i class="fa-solid fa-table-list icon nav-icon"></i>
                                <span class="menu-item" data-key="t-calendar">ຕາຕະລາງ ຜູ້ໃຊ້ງານ(ດູແລລະບົບ)</span>
                            </a>
                        </li>

                        <li>
                            <a href="./Table_customer.php">
                                <i class="fa-solid fa-table-list icon nav-icon"></i>
                                <span class="menu-item" data-key="t-calendar">ຕາຕະລາງ ຜູ້ໃຊ້ງານ(ຊອກວຽກ)</span>
                            </a>
                        </li>
                        <li>
                            <a href="./Table_company.php">
                                <i class="fa-solid fa-table-list icon nav-icon"></i>
                                <span class="menu-item" data-key="t-calendar">ຕາຕະລາງ ຜູ້ໃຊ້ງານ(ບໍລິສັດ)</span>
                            </a>
                        </li>
                        <li>
                            <a href="./Table_comment.php">
                                <i class="fa-solid fa-table-list icon nav-icon"></i>
                                <span class="menu-item" data-key="t-calendar">ຕາຕະລາງ ຄອມເມັ້ນ</span>
                            </a>
                        </li>
                        <li class="menu-title fw-bold" data-key="t-applications" style="color: black; font-size: 11px;">
                            ລາຍການຍອມຮັບຜູ້ໃຊ້ງານ (ຊອກວຽກ)</li>
                        <li>
                            <a href="./Table_customer_approve.php">
                                <i class="fa-solid fa-table-list icon nav-icon"></i>
                                <span class="menu-item" data-key="t-calendar">ຕາຕະລາງ ຜູ້ໃຊ້ງານ(ຊອກວຽກ)</span>
                            </a>
                        </li>
                        <li class="menu-title fw-bold" data-key="t-applications" style="color: black; font-size: 11px;">
                            ລາຍການຍັງບໍ່ໄດ້ຍອມຮັບຜູ້ໃຊ້ງານ (ຊອກວຽກ)</li>
                        <li>
                            <a href="./Table_customer_notapprove.php">
                                <i class="fa-solid fa-table-list icon nav-icon"></i>
                                <span class="menu-item" data-key="t-calendar">ຕາຕະລາງ ຜູ້ໃຊ້ງານ(ຊອກວຽກ)</span>
                            </a>
                        </li>
                        <li class="menu-title fw-bold" data-key="t-applications" style="color: blac; font-size: 11px;">
                            ລາຍການຍອມຮັບຜູ້ໃຊ້ງານ (ບໍລິສັດ)</li>
                        <li>
                            <a href="./Table_company_approved.php">
                                <i class="fa-solid fa-table-list icon nav-icon"></i>
                                <span class="menu-item" data-key="t-calendar">ຕາຕະລາງ ຜູ້ໃຊ້ງານ(ບໍລິສັດ)</span>
                            </a>
                        </li>
                        <li class="menu-title fw-bold" data-key="t-applications" style="color: black; font-size: 11px;">
                            ລາຍການຍັງບໍ່ໄດ້ຍອມຮັບຜູ້ໃຊ້ງານ (ບໍລິສັດ)</li>
                        <li>
                            <a href="./Table_company_notapproved.php">
                                <i class="fa-solid fa-table-list icon nav-icon"></i>
                                <span class="menu-item" data-key="t-calendar">ຕາຕະລາງ ຜູ້ໃຊ້ງານ(ບໍລິສັດ)</span>
                            </a>
                        </li>


                        <!-- <li>
                            <a href="apps-chat.html">
                                <i class="bx bx-chat icon nav-icon"></i>
                                <span class="menu-item" data-key="t-chat">Chat</span>
                                <span class="badge rounded-pill bg-danger" data-key="t-hot">Hot</span>
                            </a>
                        </li> -->
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
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
                                <h4 class="mb-0">ຍີນດີຕ້ອນຮັບ</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">ໜ້າຫຼັກ</a></li>
                                        <li class="breadcrumb-item active">ຍີນດີຕ້ອນຮັບເຂົ້າສູ່ໜ້າຫຼັກ</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-lg-2 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar">
                                                <span class="avatar-title bg-primary-subtle rounded">
                                                    <i class="mdi mdi-shopping-outline text-primary font-size-24"></i>
                                                </span>
                                            </div>
                                            <?php
                                            // $stmt = $conn->query("SELECT count(*) FROM customer WHERE Status='user'")->fetchColumn();
                                            // $total_customers = $conn->query("SELECT count(*) FROM customer")->fetchColumn();
                                            $user_customers = $conn->query("SELECT count(*) FROM customer WHERE Status='user'")->fetchColumn();
                                            ?>
                                            <!-- <p class="text-muted mt-4 mb-0">ຈຳນວນຜູ້ໃຊ້ງານ(ຊອກວຽກ)</p>
                                            <h4 class="mt-1 mb-0"><?php echo $stmt ? $stmt : 0 ?> <sup class="text-success fw-medium font-size-14"><i class="mdi mdi-arrow-down"></i> 10%</sup></h4> -->
                                            <p class="text-muted mt-4 mb-0">ຈຳນວນຜູ້ໃຊ້ງານ(ຊອກວຽກ)</p>
                                            <h4 class="mt-1 mb-0">
                                                <?php echo $user_customers ? $user_customers : 0 ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar">
                                                <span class="avatar-title bg-success-subtle rounded">
                                                    <i class="mdi mdi-eye-outline text-success font-size-24"></i>
                                                </span>
                                            </div>
                                            <?php
                                            $stmteee = $conn->query("SELECT count(*) FROM company WHERE Status='company'")->fetchColumn();

                                            ?>
                                            <p class="text-muted mt-4 mb-0">ຈຳນວນບໍລິສັດ</p>
                                            <h4 class="mt-1 mb-0"><?php echo $stmteee ? $stmteee : 0 ?></h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar">
                                                <span class="avatar-title bg-primary-subtle rounded">
                                                    <i class="mdi mdi-rocket-outline text-primary font-size-24"></i>
                                                </span>
                                            </div>
                                            <?php
                                            $stmt = $conn->query("SELECT count(*) FROM comment")->fetchColumn();

                                            ?>
                                            <p class="text-muted mt-4 mb-0">ຈຳນວນຄອມເມັ້ນ</p>
                                            <h4 class="mt-1 mb-0"><?php echo $stmt ? $stmt : 0 ?></h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar">
                                                <span class="avatar-title bg-success-subtle rounded">
                                                    <i class="mdi mdi-account-multiple-outline text-success font-size-24"></i>
                                                </span>
                                            </div>
                                            <?php
                                            $stmtses = $conn->query("SELECT count(*) FROM customer WHERE InfoFull = 'passed'")->fetchColumn();

                                            ?>
                                            <p class="text-muted mt-4 mb-0">ຈຳນວນຍອມຮັບຜູ້ໃຊ້ງານ(ຊອກວຽກ)</p>
                                            <h4 class="mt-1 mb-0"><?= $stmtses ? $stmtses : 0 ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar">
                                                <span class="avatar-title bg-primary-subtle rounded">
                                                    <i class="mdi mdi-rocket-outline text-primary font-size-24"></i>
                                                </span>
                                            </div>
                                            <?php
                                            $stmte = $conn->query("SELECT count(*) FROM company WHERE InfoFull = 'passed'")->fetchColumn();

                                            ?>
                                            <p class="text-muted mt-4 mb-0">ຈຳນວນຍອມຮັບບໍລິສັດ(ປະກາດວຽກ)</p>
                                            <h4 class="mt-1 mb-0"><?= $stmte ? $stmte : 0 ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
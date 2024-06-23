<?php
session_start();
require_once '../connect-database/config.php';
if (!isset($_SESSION['user_login'])) {
  $_SESSION['error'] = 'ກາລຸນາເຂົ້າສູ່ລະບົບ!';
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Finate - Job Portal Website Template Using Bootstrap 5" />
  <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive" />
  <meta name="author" content="hastech" />

  <title>Home Page E-Job</title>

  <!--== Favicon ==-->
  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon" />

  <!--== Google Fonts ==-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">


  <!--== Bootstrap CSS ==-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <!--== Icofont Icon CSS ==-->
  <link href="assets/css/icofont.css" rel="stylesheet" />
  <!--== Swiper CSS ==-->
  <link href="assets/css/swiper.min.css" rel="stylesheet" />
  <!--== Fancybox Min CSS ==-->
  <link href="assets/css/fancybox.min.css" rel="stylesheet" />
  <!--== Aos Min CSS ==-->
  <link href="assets/css/aos.min.css" rel="stylesheet" />

  <!--== Main Style CSS ==-->
  <link href="assets/css/style.css" rel="stylesheet" />

  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
  }
</style>

<body>
  <?php

  if (isset($_SESSION['user_login']))
    $user_id = $_SESSION['user_login'];
  // echo 'User ID' . $user_id;
  $stmt = $conn->query("SELECT * FROM customer WHERE ID = $user_id ");
  $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
  // Format date for input type="date"
  $formattedDateOfBirth = '';
  if (isset($user_data['DataOfBirth'])) {
    $timestamp = strtotime($user_data['DataOfBirth']);
    $formattedDateOfBirth = date('Y-m-d', $timestamp);
  }

  ?>

  <!--wrapper start-->
  <div class="wrapper">

    <!--== Start Header Wrapper ==-->
    <header class="header-area transparent">
      <div class="container">
        <div class="row no-gutter align-items-center position-relative">
          <div class="col-12">
            <div class="header-align">
              <div class="header-align-start">
                <div class="header-logo-area">
                  <a href="index.php">
                    <img class="logo-main" src="assets/img/logo-light.png" alt="Logo" />
                    <img class="logo-light" src="assets/img/logo-light.png" alt="Logo" />
                  </a>
                </div>
              </div>
              <div class="header-align-center">
                <div class="header-navigation-area position-relative">
                  <ul class="main-menu nav">
                    <li><a href="index.html"><span>ໜ້າຫຼັກ</span></a></li>
                    <li><a href="job.html"><span>ປະກາດວຽກ</span></a></li>

                    <li><a href="candidate.html"><span>ບໍລີສັດ</span></a></li>
                    <li><a href="about-us.html"><span>ກ່ຽວກັບ</span></a></li>
                    <li><a href="contact.html"><span>ຕິດຕໍ່</span></a></li>

                    <div class="dropdown">
                      <button class="dropdown-toggle btn btn-success p-3" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $user_data['Name'] ?>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">ກ່ຽວກັບຂ້ອຍ</a></li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="login.html">ອອກລະບົບ</a></li>
                      </ul>
                    </div>
                    <!-- <div class="header-align-end">
                      <div class="header-action-area">
                        <a class="btn-login" href="login.html"><span></span> ເຂົ້າສູ່ລະບົບ</a>
                        <button class="btn-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                          <i class="icofont-navigation-menu"></i>
                        </button>
                      </div>
                    </div> -->
                    <!-- <div class="header-align-end">
                      <div class="header-action-area">
                        <a class="btn-registration" href="registration.html"><span>+</span> ລົງທະບຽນ</a>
                        <button class="btn-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                          <i class="icofont-navigation-menu"></i>
                        </button>
                      </div>
                    </div> -->
                </div>
              </div>
            </div>
          </div>
    </header>
    <!--== End Header Wrapper ==-->
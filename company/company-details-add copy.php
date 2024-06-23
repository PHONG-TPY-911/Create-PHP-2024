<?php
session_start();
require_once '../connect-database/config.php';
require_once './get_districts.php';
require_once './get_village.php';


if (!isset($_SESSION['company_login'])) {
  $_SESSION['error'] = 'ກາລຸນາເຂົ້າສູ່ລະບົບ!';
  header("location: ../customer/login.php");
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

  <title>Resgister Form E-Job</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- use javascript  -->
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


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
</head>

<body>

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
                  <a href="index.html">
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

                    <div class="header-align-end">
                      <div class="header-action-area">
                        <div class="dropdown">
                          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            KAN CAFE
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="company-details.html">ຂໍ້ມູນບໍລິສັດ</a></li>
                            <li><a class="dropdown-item" href="#">ປະກາດວຽກ</a></li>
                            <li>
                              <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="login.html">ອອກລະບົບ</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
    </header>
    <!--== End Header Wrapper ==-->

    <main class="main-content">
      <!--== Start Page Header Area Wrapper ==-->
      <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
        <div class="container pt--0 pb--0">
          <div class="row">
            <div class="col-12">
              <div class="page-header-content">
                <h2 class="title">ຂໍ້ມູນບໍລິສັດ</h2>
                <nav class="breadcrumb-area">
                  <ul class="breadcrumb justify-content-center">
                    <li><a href="index.html">ໜ້າຫຼັກ</a></li>
                    <li class="breadcrumb-sep">//</li>
                    <li>ຂໍ້ມູນບໍລິສັດ</li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== End Page Header Area Wrapper ==-->
      <!-- check user login -->
      <?php

      if (isset($_GET['id'])) {
        $ID = $_GET['id'];
        echo 'User ID' . $ID;
        $stmt = $conn->query("SELECT * FROM company WHERE ID = $ID ");
        $stmt->execute();
        $company = $stmt->fetch(PDO::FETCH_ASSOC);
      }
      ?>

      <!--== Start Team Details Area Wrapper ==-->
      <section class="team-details-area">
        <form id="contact-form" enctype="multipart/form-data" action="./company_insert_data.php" method="POST">
          <input type="hidden" name="ID" value="<?= $company['ID'] ?>">
          <input type="hidden" name="Name_company" value="<?= $company['Name_company'] ?>">
          <input type="hidden" name="Email" value="<?= $company['Email'] ?>">
          <input type="hidden" name="Password" value="<?= $company['Password'] ?>">
          <input type="hidden" name="Status" value="<?= $company['Status'] ?>">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="team-details-wrap">
                  <div class="team-details-info">
                    <div class="thumb">
                      <img src="../folder-image-company/profile-company/<?= $company['Profile_picture'] ?>" width="130" height="130" alt="Image-HasTech">
                    </div>
                    <div class="content">
                      <h4 class="title"><?= $company['Name_company'] ? $company['Name_company'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></h4>
                      <h5 class="sub-title"><?= $company['Business_model'] ?></h5>
                      <ul class="info-list">
                        <li><i class="icofont-location-pin"></i> Vientiane, Laos</li>
                      </ul>
                    </div>
                  </div>
                  <div class="team-details-btn">

                    <input type="file" id="img" name="profile_picture" accept="image/*"> <br> <br>
                    <!-- <button type="button" class="btn-theme">ປ່ຽນຮູບ</button> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-7 col-xl-8">
                <div class="team-details-item">
                  <div class="widget-item widget-contact">
                    <div class="widget-title">
                      <h3 class="title">ເພີ່ມຂໍ້ມູນເພື່ອຢືນຢັນບໍລິສັດ</h3>
                    </div>
                    <div class="widget-contact-form">

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="model">ຊື່ບໍລິສັດ</label>
                            <input class="form-control" type="text" name="Name_company" placeholder="ຊື່ບໍລິສັດ:" value="<?= $company['Name_company'] ?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="model">ອິເມວ</label>
                            <input class="form-control" type="email" name="Email" placeholder="ອິເມວ:" value="<?= $company['Email'] ?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="model">ລະຫັດຜ່ານ</label>
                            <input class="form-control" type="text" name="Password" placeholder="ລະຫັດຜ່ານ:" value="<?= $company['Password'] ?> " readonly>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="model">ລະຫັດຜ່ານ</label>
                            <input class="form-control" type="password" name="NewPassword" placeholder="ລະຫັດຜ່ານໃໝ່:">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="model">ຮູບແບບທຸລະກິດ</label>
                            <input class="form-control" type="text" name="Business_model" placeholder="ຮູບແບບທຸລະກິດ:" value="<?= $company['Business_model'] ?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="province">ແຂວງ</label>
                            <select class="form-select" aria-label="Default select example" name="Province" id="provinceSelect">
                              <option value="" selected>-----</option>
                              <?php
                              $stmt = $conn->query("SELECT pr_id, pr_name FROM province");
                              $stmt->execute();
                              $provincestmt = $stmt->fetchAll();
                              foreach ($provincestmt as $province) {
                              ?>
                                <option value="<?= $province['pr_id']; ?>"> <?= $province['pr_name']; ?></option>
                              <?php   }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="district">ເມືອງ</label>
                            <select class="form-select" aria-label="Default select example" name="District" id="districtSelect">
                              <option value="" selected>-----</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="village">ບ້ານ</label>
                            <select class="form-select" aria-label="Default select example" name="Village" id="villageSelect">
                              <option value="" selected>-----</option>
                            </select>
                          </div>
                        </div>
                        <!-- <div class="col-md-12">
                          <div class="form-group">
                            <input class="form-control" type="text" name="address" placeholder="ທີ່ຢູ່ອື່ນໆ:">
                          </div>
                        </div> -->
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="Tel">ເບິຕິດຕໍ່</label>
                            <input class="form-control" type="number" name="Tel" placeholder="ເບີຕິດຕໍ່:" value="<?= $company['Tel'] ?>">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="img">ໃບທະບຽນວິສະຫະກິດ:</label>
                            <input type="file" id="image_company" name="Business_image">
                            <img width="100%" src="../folder-image-company/business-company/<?= $company['Business_image'] ?>" id="perview" class="mt-2 rounded" alt="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="img">ຮູບພາບລວມບໍລິສັດ:</label>
                            <input type="file" id="image_company_All" name="All_image">
                            <img width="100%" src="../folder-image-company/all-image/<?= $company['All_image'] ?>" id="perview_All" class="mt-2 rounded" alt="">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group mb--0">
                            <!-- <button onclick="window.location.href = 'company-destails.html';" class="btn-theme d-block w-100" type="submit">ບັນທຶກ</button> -->
                            <button type="button1" name="Submit" class="btn-theme d-block w-100">ບັນທຶກ</button>

                          </div>
                        </div>
                      </div>

                      <!--== Message Notification ==-->
                      <div class="form-message"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-xl-4">
                <div class="team-sidebar">
                  <div class="widget-item">
                    <div class="widget-title">
                      <h3 class="title">ຂໍ້ມູນທົ່ວໄປ</h3>
                    </div>
                    <div class="summery-info">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td class="table-name">ອີເມວ</td>
                            <td class="dotted">:</td>
                            <td><?= $company['Name_company'] ? $company['Name_company'] : 'ຍັງບໍ່ມີຂໍ້ມູນ' ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ເບີຕິດຕໍ່</td>
                            <td class="dotted">:</td>
                            <td><?= $company['Tel'] ? $company['Tel'] : 'ຍັງບໍ່ມີຂໍ້ມູນ' ?></td>
                          </tr>
                          <tr>
                            <td class="table-name">ທີ່ຢູ່</td>
                            <td class="dotted">:</td>
                            <td><?= $company['Province'] ? $company['Province'] : 'ຍັງບໍ່ມີຂໍ້ມູນ' ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="widget-item">
                    <div class="widget-title">
                      <h3 class="title">Share</h3>
                    </div>
                    <div class="social-icons">
                      <a href="https://www.facebook.com" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
                      <a href="https://twitter.com" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>
                      <a href="https://www.skype.com" target="_blank" rel="noopener"><i class="icofont-skype"></i></a>
                      <a href="https://www.pinterest.com" target="_blank" rel="noopener"><i class="icofont-pinterest"></i></a>
                      <a href="https://dribbble.com/" target="_blank" rel="noopener"><i class="icofont-dribbble"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

      </section>
      <!--== End Team Details Area Wrapper ==-->
    </main>
    <!--== Start Footer Area Wrapper ==-->
    <footer class="footer-area">
      <!--== Start Footer Bottom ==-->
      <div class="footer-bottom">
        <div class="container pt--0 pb--0">
          <div class="row">
            <div class="col-12">
              <div class="footer-bottom-content">
                <div class="social-icons">
                  <a href="https://www.facebook.com" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
                  <a href="https://www.skype.com" target="_blank" rel="noopener"><i class="icofont-skype"></i></a>
                  <a href="https://twitter.com" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>
                </div>
                <p class="copyright">© 2024 . 2ITCon2 <i class="icofont-heart"></i> by <a target="_blank" href="#">Group 101.</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== End Footer Bottom ==-->
    </footer>
    <!--== End Footer Area Wrapper ==-->
    <!--== Scroll Top Button ==-->
    <div id="scroll-to-top" class="scroll-to-top"><span class="icofont-rounded-up"></span></div>

    <!--== Start Aside Menu ==-->
    <aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h1 class="d-none" id="offcanvasExampleLabel">Aside Menu</h1>
        <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">menu <i class="icofont-simple-left"></i></button>
      </div>
      <div class="offcanvas-body">
        <!-- Mobile Menu Start -->
        <div class="mobile-menu-items">
          <ul class="nav-menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Find Jobs</a>
              <ul class="sub-menu">
                <li><a href="job.html">Jobs</a></li>
                <li><a href="job-details.html">Job Details</a></li>
              </ul>
            </li>
            <li><a href="employers-details.html">Employers Details</a></li>
            <li><a href="#">Candidates</a>
              <ul class="sub-menu">
                <li><a href="candidate.html">Candidates</a></li>
                <li><a href="candidate-details.html">Candidate Details</a></li>
              </ul>
            </li>
            <li><a href="#">Blog</a>
              <ul class="sub-menu">
                <li><a href="blog-grid.html">Blog Grid</a></li>
                <li><a href="blog.html">Blog Left Sidebar</a></li>
                <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                <li><a href="blog-details.html">Blog Details</a></li>
              </ul>
            </li>
            <li><a href="#">Pages</a>
              <ul class="sub-menu">
                <li><a href="about-us.html">About us</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="registration.html">Registration</a></li>
                <li><a href="page-not-found.html">Page Not Found</a></li>
              </ul>
            </li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>
        <!-- Mobile Menu End -->
      </div>
    </aside>
    <!--== End Aside Menu ==-->
  </div>

  <!--=======================Javascript============================-->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

  <script src="assets/js/jquery-main.js"></script>


  <!-- start sweetalert2 -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- start sweetalert2 -->

  <!-- JavaScript Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="./setValue_select.js"></script>


  <script>
    let Image = document.getElementById('image_company');
    let preview = document.getElementById('perview');

    Image.onchange = evt => {
      const [file] = Image.files;
      if (file) {
        preview.src = URL.createObjectURL(file);
      }
    }

    //All image
    let ImageAll = document.getElementById('image_company_All');
    let previewAll = document.getElementById('perview_All');

    ImageAll.onchange = evt => {
      const [file] = ImageAll.files;
      if (file) {
        previewAll.src = URL.createObjectURL(file);
      }
    }
  </script>



</body>

</html>
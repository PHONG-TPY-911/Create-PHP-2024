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
                                    <a href="index.php">
                                        <img class="logo-main" src="assets/img/logo-light.png" alt="Logo" />
                                        <img class="logo-light" src="assets/img/logo-light.png" alt="Logo" />
                                    </a>
                                </div>
                            </div>
                            <div class="header-align-center">
                                <div class="header-navigation-area position-relative">
                                    <ul class="main-menu nav">
                                        <li><a href="index.php"><span>ໜ້າຫຼັກ</span></a></li>
                                        <li><a href="job.php"><span>ປະກາດວຽກ</span></a></li>

                                        <li><a href="candidate.html"><span>ບໍລີສັດ</span></a></li>
                                        <li><a href="about-us.html"><span>ກ່ຽວກັບ</span></a></li>
                                        <li><a href="contact.html"><span>ຕິດຕໍ່</span></a></li>

                                        <div class="header-align-end">
                                            <div class="header-action-area">
                                                <a class="btn-login" href="login.html"><span></span> ເຂົ້າສູ່ລະບົບ</a>
                                                <button class="btn-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                                                    <i class="icofont-navigation-menu"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="header-align-end">
                                            <div class="header-action-area">
                                                <a class="btn-registration" href="registration.html"><span>+</span> ລົງທະບຽນ</a>
                                                <button class="btn-menu" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                                                    <i class="icofont-navigation-menu"></i>
                                                </button>
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
                                <h2 class="title">ປະກາດວຽກ</h2>
                            </div>
                        </div> 
                        <div class="col-12">
                            <div class="job-search-wrap">
                                <div class="job-search-form">
                                    <form action="#">
                                        <div class="row row-gutter-10">
                                            <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="ໜ້າວຽກ, ຕຳແໜ່ງ">
                                                </div>
                                            </div>
                                            <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                                <div class="form-group">
                                                    <select class="form-control">
                                                        <option value="1" selected>ເມືອງ</option>
                                                        <option value="2">New York</option>
                                                        <option value="3">California</option>
                                                        <option value="4">Illinois</option>
                                                        <option value="5">Texas</option>
                                                        <option value="6">Florida</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                                <div class="form-group">
                                                    <select class="form-control">
                                                        <option value="1" selected>ໝວດວຽກ</option>
                                                        <option value="2">Web Designer</option>
                                                        <option value="3">Web Developer</option>
                                                        <option value="4">Graphic Designer</option>
                                                        <option value="5">App Developer</option>
                                                        <option value="6">UI &amp; UX Expert</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                                <div class="form-group">
                                                    <button type="button" class="btn-form-search"><i class="icofont-search-1"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Page Header Area Wrapper ==-->

            <!--== Start Job Details Area Wrapper ==-->
            <section class="job-details-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="job-details-wrap-list">
                                <div class="job-details-info">
                                    <div class="thumb">
                                        <img src="assets/img/companies/APP Bank.png" width="130" height="130" alt="Image-HasTech">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Senior Web Developer</h4>
                                        <h5 class="sub-title">Pongsavnah Bank.</h5>
                                        <ul class="info-list">
                                            <li><i class="icofont-location-pin"></i> Vientiane, Laos</li>
                                            <li><i class="icofont-phone"></i> 020 6666666</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="job-details-price">
                                    <h4 class="title">$8,000,000 ກີບ <span>/ເດືອນ</span></h4>
                                    <button type="button" class="btn-theme">ສະໝັກ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="job-details-wrap-list">
                                <div class="job-details-info">
                                    <div class="thumb">
                                        <img src="assets/img/companies/APP Bank.png" width="130" height="130" alt="Image-HasTech">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Senior Web Developer</h4>
                                        <h5 class="sub-title">Pongsavnah Bank.</h5>
                                        <ul class="info-list">
                                            <li><i class="icofont-location-pin"></i> Vientiane, Laos</li>
                                            <li><i class="icofont-phone"></i> 020 6666666</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="job-details-price">
                                    <h4 class="title">$8,000,000 ກີບ <span>/ເດືອນ</span></h4>
                                    <button type="button" class="btn-theme">ສະໝັກ</button>
                                </div>
                            </div>
                        </div>
                    </div> <div class="row">
                        <div class="col-12">
                            <div class="job-details-wrap-list">
                                <div class="job-details-info">
                                    <div class="thumb">
                                        <img src="assets/img/companies/APP Bank.png" width="130" height="130" alt="Image-HasTech">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Senior Web Developer</h4>
                                        <h5 class="sub-title">Pongsavnah Bank.</h5>
                                        <ul class="info-list">
                                            <li><i class="icofont-location-pin"></i> Vientiane, Laos</li>
                                            <li><i class="icofont-phone"></i> 020 6666666</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="job-details-price">
                                    <h4 class="title">$8,000,000 ກີບ <span>/ເດືອນ</span></h4>
                                    <button type="button" class="btn-theme">ສະໝັກ</button>
                                </div>
                            </div>
                        </div>
                    </div> <div class="row">
                        <div class="col-12">
                            <div class="job-details-wrap-list">
                                <div class="job-details-info">
                                    <div class="thumb">
                                        <img src="assets/img/companies/APP Bank.png" width="130" height="130" alt="Image-HasTech">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Senior Web Developer</h4>
                                        <h5 class="sub-title">Pongsavnah Bank.</h5>
                                        <ul class="info-list">
                                            <li><i class="icofont-location-pin"></i> Vientiane, Laos</li>
                                            <li><i class="icofont-phone"></i> 020 6666666</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="job-details-price">
                                    <h4 class="title">$8,000,000 ກີບ <span>/ເດືອນ</span></h4>
                                    <button type="button" class="btn-theme">ສະໝັກ</button>
                                </div>
                            </div>
                        </div>
                    </div> <div class="row">
                        <div class="col-12">
                            <div class="job-details-wrap-list">
                                <div class="job-details-info">
                                    <div class="thumb">
                                        <img src="assets/img/companies/APP Bank.png" width="130" height="130" alt="Image-HasTech">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Senior Web Developer</h4>
                                        <h5 class="sub-title">Pongsavnah Bank.</h5>
                                        <ul class="info-list">
                                            <li><i class="icofont-location-pin"></i> Vientiane, Laos</li>
                                            <li><i class="icofont-phone"></i> 020 6666666</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="job-details-price">
                                    <h4 class="title">$8,000,000 ກີບ <span>/ເດືອນ</span></h4>
                                    <button type="button" class="btn-theme">ສະໝັກ</button>
                                </div>
                            </div>
                        </div>
                    </div> <div class="row">
                        <div class="col-12">
                            <div class="job-details-wrap-list">
                                <div class="job-details-info">
                                    <div class="thumb">
                                        <img src="assets/img/companies/APP Bank.png" width="130" height="130" alt="Image-HasTech">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Senior Web Developer</h4>
                                        <h5 class="sub-title">Pongsavnah Bank.</h5>
                                        <ul class="info-list">
                                            <li><i class="icofont-location-pin"></i> Vientiane, Laos</li>
                                            <li><i class="icofont-phone"></i> 020 6666666</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="job-details-price">
                                    <h4 class="title">$8,000,000 ກີບ <span>/ເດືອນ</span></h4>
                                    <button type="button" class="btn-theme">ສະໝັກ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Job Details Area Wrapper ==-->
        </main>

        <!--== Start Footer Area Wrapper ==-->
        <footer class="footer-area">
            <!--== Start Footer Top ==-->
            <div class="footer-top">
                <div class="container pt--0 pb--0">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="footer-newsletter-content">
                                <h4 class="title">Subscribe for everyday job newsletter.</h4>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="footer-newsletter-form">
                                <form action="#">
                                    <input type="email" placeholder="Enter your email">
                                    <button type="submit" class="btn-newsletter">Subscribe Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Footer Top ==-->

            <!--== Start Footer Main ==-->
            <div class="footer-main">
                <div class="container pt--0 pb--0">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-item widget-about">
                                <div class="widget-logo-area">
                                    <a href="index.php">
                                        <img class="logo-main" src="assets/img/logo-light-theme.png" alt="Logo" />
                                    </a>
                                </div>
                                <p class="desc">That necessitat ecommerce platform that optimi your store popularised the release</p>
                                <div class="social-icons">
                                    <a href="https://www.facebook.com" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
                                    <a href="https://www.skype.com" target="_blank" rel="noopener"><i class="icofont-skype"></i></a>
                                    <a href="https://twitter.com" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-3 col-lg-3">
                                    <div class="widget-item nav-menu-item1">
                                        <h4 class="widget-title">Company</h4>
                                        <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-1">Company</h4>
                                        <div id="widgetId-1" class="collapse widget-collapse-body">
                                            <div class="collapse-body">
                                                <div class="widget-menu-wrap">
                                                    <ul class="nav-menu">
                                                        <li><a href="about-us.html">About Us</a></li>
                                                        <li><a href="about-us.html">Why Extobot</a></li>
                                                        <li><a href="contact.html">Contact With Us</a></li>
                                                        <li><a href="contact.html">Our Partners</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3">
                                    <div class="widget-item nav-menu-item2">
                                        <h4 class="widget-title">Resources</h4>
                                        <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-2">Resources</h4>
                                        <div id="widgetId-2" class="collapse widget-collapse-body">
                                            <div class="collapse-body">
                                                <div class="widget-menu-wrap">
                                                    <ul class="nav-menu">
                                                        <li><a href="account-login.html">Quick Links</a></li>
                                                        <li><a href="job.php">Job Packages</a></li>
                                                        <li><a href="job.php">Post New Job</a></li>
                                                        <li><a href="job.php">Jobs Listing</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3">
                                    <div class="widget-item nav-menu-item3">
                                        <h4 class="widget-title">Legal</h4>
                                        <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-3">Legal</h4>
                                        <div id="widgetId-3" class="collapse widget-collapse-body">
                                            <div class="collapse-body">
                                                <div class="widget-menu-wrap">
                                                    <ul class="nav-menu">
                                                        <li><a href="account-login.html">Affiliate</a></li>
                                                        <li><a href="blog.html">Blog</a></li>
                                                        <li><a href="account-login.html">Help & Support</a></li>
                                                        <li><a href="job.php">Careers</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3">
                                    <div class="widget-item nav-menu-item4">
                                        <h4 class="widget-title">Products</h4>
                                        <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-4">Products</h4>
                                        <div id="widgetId-4" class="collapse widget-collapse-body">
                                            <div class="collapse-body">
                                                <div class="widget-menu-wrap">
                                                    <ul class="nav-menu">
                                                        <li><a href="account-login.html">Star a Trial</a></li>
                                                        <li><a href="about-us.html">How It Works</a></li>
                                                        <li><a href="account-login.html">Features</a></li>
                                                        <li><a href="about-us.html">Price & Planing</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Footer Main ==-->

            <!--== Start Footer Bottom ==-->
            <div class="footer-bottom">
                <div class="container pt--0 pb--0">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-bottom-content">
                                <p class="copyright">© 2021 Finate. Made with <i class="icofont-heart"></i> by <a target="_blank" href="https://themeforest.net/user/codecarnival">Codecarnival.</a></p>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Find Jobs</a>
                            <ul class="sub-menu">
                                <li><a href="job.php">Jobs</a></li>
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

    <!--=== jQuery Modernizr Min Js ===-->
    <script src="assets/js/modernizr.js"></script>
    <!--=== jQuery Min Js ===-->
    <script src="assets/js/jquery-main.js"></script>
    <!--=== jQuery Migration Min Js ===-->
    <script src="assets/js/jquery-migrate.js"></script>
    <!--=== jQuery Popper Min Js ===-->
    <script src="assets/js/popper.min.js"></script>
    <!--=== jQuery Bootstrap Min Js ===-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--=== jQuery Swiper Min Js ===-->
    <script src="assets/js/swiper.min.js"></script>
    <!--=== jQuery Fancybox Min Js ===-->
    <script src="assets/js/fancybox.min.js"></script>
    <!--=== jQuery Aos Min Js ===-->
    <script src="assets/js/aos.min.js"></script>
    <!--=== jQuery Counterup Min Js ===-->
    <script src="assets/js/counterup.js"></script>
    <!--=== jQuery Waypoint Js ===-->
    <script src="assets/js/waypoint.js"></script>

    <!--=== jQuery Custom Js ===-->
    <script src="assets/js/custom.js"></script>

</body>

</html>
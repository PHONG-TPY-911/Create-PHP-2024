<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Finate - Job Portal Website Template Using Bootstrap 5"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="hastech"/>

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
    <!--== Start Hero Area Wrapper ==-->
    <class="home-slider-area">
      <div class="home-slider-container default-slider-container">
        <div class="home-slider-wrapper slider-default">
          <div class="slider-content-area" data-bg-img="assets/img/slider/slider-bg.jpg">
            <div class="container pt--0 pb--0">
              <div class="slider-container">
                <div class="row justify-content-center align-items-center">
                  <div class="col-12 col-lg-8">
                    <!--<div class="slider-content">
                      <h2 class="title"><span class="counter" data-counterup-delay="80">2,568</span> job available <br>
                        You can choose your dream job</h2>
                      <p class="desc">Find great job for build your bright career. Have many job in this plactform.</p>
                    </div> -->
                    <div class="slider-content">
                      <h2 class="title">ຄົ້ນຫາວຽກ ເພື່ອອານາຄົດ</h2>
                      <p class="desc">ຊອກວຽກທີ່ດີສຳລັບທ່ານ ໄດ້ງ່າຍໆ</p>
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
          </div>
        </div>
      </div>
      <div class="home-slider-shape">
        <img class="shape1" data-aos="fade-down" data-aos-duration="1500" src="assets/img/slider/vector1.png" width="270" height="234" alt="Image-HasTech">
        <img class="shape2" data-aos="fade-left" data-aos-duration="2000" src="assets/img/slider/vector2.png" width="201" height="346" alt="Image-HasTech">
        <img class="shape3" data-aos="fade-right" data-aos-duration="2000" src="assets/img/slider/vector3.png" width="276" height="432" alt="Image-HasTech">
        <img class="shape4" data-aos="flip-left" data-aos-duration="1500" src="assets/img/slider/vector4.png" width="127" height="121" alt="Image-HasTech">
      </div>
    </section>
    <!--== End Hero Area Wrapper ==-->

    <!--== Start Recent Job Area Wrapper ==-->
    <section class="recent-job-area bg-color-gray">
      <div class="container" data-aos="fade-down">
        <div class="row">
          <div class="col-12">
            <div class="section-title text-center">
              <h3 class="title">ວຽກທີ່ກຳລັບຕ້ອງການ</h3>
              <div class="desc">
                <p>ສະໝັກເລີຍ</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <!--== Start Recent Job Item ==-->
            <div class="recent-job-item">
              <div class="company-info">
                <div class="logo">
                  <a href="company-details.html"><img src="assets/img/companies/BCEL Bank.jpg" width="75" height="75" alt="Image-HasTech"></a>
                </div>
                <div class="content">
                  <h4 class="name"><a href="company-details.html">BCEL Bank</a></h4>
                  <p class="address">ວຽງຈັນ, ລາວ</p>
                </div>
              </div>
              <div class="main-content">
                <h3 class="title"><a href="job-details.html">Front-end Developer</a></h3>
                <h5 class="work-type">Full-time</h5>
                <p class="desc">ພາສາ CSS3, HTML5, Javascript, Bootstrap, Jquery</p>
              </div>
              <div class="recent-job-info">
                <div class="salary">
                  <h4>9,000,000LAK</h4>
                  <p>/ເດືອນ</p>
                </div>
                <a class="btn-theme btn-sm" href="job-details.html">ສະໝັກ</a>
              </div>
            </div>
            <!--== End Recent Job Item ==-->
          </div>
          <div class="col-md-6 col-lg-4">
            <!--== Start Recent Job Item ==-->
            <div class="recent-job-item">
              <div class="company-info">
                <div class="logo">
                  <a href="company-details.html"><img src="assets/img/companies/CLSK.jpg" width="75" height="75" alt="Image-HasTech"></a>
                </div>
                <div class="content">
                  <h4 class="name"><a href="company-details.html">ຈະເລິນເຊກອງ</a></h4>
                  <p class="address">ຈຳປາສັກ, ລາວ</p>
                </div>
              </div>
              <div class="main-content">
                <h3 class="title"><a href="job-details.html">Senior UI Designer</a></h3>
                <h5 class="work-type" data-text-color="#ff7e00">Part-time</h5>
                <p class="desc">ນຳໃຊ້ໂປແກຣມ Figma, Adobe Illustrator, Adobe Photoshop</p>
              </div>
              <div class="recent-job-info">
                <div class="salary">
                  <h4>7,000,000LAK</h4>
                  <p>/ເດືອນ</p>
                </div>
                <a class="btn-theme btn-sm" href="job-details.html">ສະໝັກ</a>
              </div>
            </div>
            <!--== End Recent Job Item ==-->
          </div>
          <div class="col-md-6 col-lg-4">
            <!--== Start Recent Job Item ==-->
            <div class="recent-job-item">
              <div class="company-info">
                <div class="logo">
                  <a href="company-details.html"><img src="assets/img/companies/BeerLao.jpg" width="75" height="75" alt="Image-HasTech"></a>
                </div>
                <div class="content">
                  <h4 class="name"><a href="company-details.html">Beer Lao</a></h4>
                  <p class="address">ວຽງຈັນ, ລາວ</p>
                </div>
              </div>
              <div class="main-content">
                <h3 class="title"><a href="job-details.html">Graphic Designer</a></h3>
                <h5 class="work-type">Full-time</h5>
                <p class="desc">ນຳໃຊ້ໂປແກຣມ Adobe Illustrator, Adobe Photoshop, ProCreate</p>
              </div>
              <div class="recent-job-info">
                <div class="salary">
                  <h4>9,000,000LAK</h4>
                  <p>/ເດືອນ</p>
                </div>
                <a class="btn-theme btn-sm" href="job-details.html">ສະໝັກ</a>
              </div>
            </div>
            <!--== End Recent Job Item ==-->
          </div>
          <div class="col-md-6 col-lg-4">
            <!--== Start Recent Job Item ==-->
            <div class="recent-job-item">
              <div class="company-info">
                <div class="logo">
                  <a href="company-details.html"><img src="assets/img/companies/Lao IT Dev.jpg" width="75" height="75" alt="Image-HasTech"></a>
                </div>
                <div class="content">
                  <h4 class="name"><a href="company-details.html">LAO IT DEV</a></h4>
                  <p class="address">ວຽງຈັນ, ລາວ</p>
                </div>
              </div>
              <div class="main-content">
                <h3 class="title"><a href="job-details.html">Back-end Developer</a></h3>
                <h5 class="work-type">Full-time</h5>
                <p class="desc">ພາສາ JAVA, Flutter, Node JS, Bootstrap, Jquery</p>
              </div>
              <div class="recent-job-info">
                <div class="salary">
                  <h4>8,000,000LAK</h4>
                  <p>/ເດືອນ</p>
                </div>
                <a class="btn-theme btn-sm" href="job-details.html">ສະໝັກ</a>
              </div>
            </div>
            <!--== End Recent Job Item ==-->
          </div>
          <div class="col-md-6 col-lg-4">
            <!--== Start Recent Job Item ==-->
            <div class="recent-job-item">
              <div class="company-info">
                <div class="logo">
                  <a href="company-details.html"><img src="assets/img/companies/BCEL Bank.jpg" width="75" height="75" alt="Image-HasTech"></a>
                </div>
                <div class="content">
                  <h4 class="name"><a href="company-details.html">BCEL Bank</a></h4>
                  <p class="address">ວຽງຈັນ, ລາວ</p>
                </div>
              </div>
              <div class="main-content">
                <h3 class="title"><a href="job-details.html">Graphic Designer</a></h3>
                <h5 class="work-type">Full-time</h5>
                <p class="desc">ນຳໃຊ້ໂປແກຣມ Adobe Illustrator, Adobe Photoshop, ProCreate</p>
              </div>
              <div class="recent-job-info">
                <div class="salary">
                  <h4>9,000,000LAK</h4>
                  <p>/ເດືອນ</p>
                </div>
                <a class="btn-theme btn-sm" href="job-details.html">ສະໝັກ</a>
              </div>
            </div>
            <!--== End Recent Job Item ==-->
          </div>
          <div class="col-md-6 col-lg-4">
            <!--== Start Recent Job Item ==-->
            <div class="recent-job-item">
              <div class="company-info">
                <div class="logo">
                  <a href="company-details.html"><img src="assets/img/companies/Khob Chai Due.jpg" width="75" height="75" alt="Image-HasTech"></a>
                </div>
                <div class="content">
                  <h4 class="name"><a href="company-details.html">ຮ້ານຂອບໃຈເດີ້</a></h4>
                  <p class="address">ວຽງຈັນ, ລາວ</p>
                </div>
              </div>
              <div class="main-content">
                <h3 class="title"><a href="job-details.html">ພະນັກງານເສີບ</a></h3>
                <h5 class="work-type" data-text-color="#ff7e00">Part-time</h5>
                <p class="desc">ເສີບອາຫານ <br> ແລະ ບໍລິການລູກຄ້າ</p>
              </div>
              <div class="recent-job-info">
                <div class="salary">
                  <h4>5,000,000LAK</h4>
                  <p>/ເດືອນ</p>
                </div>
                <a class="btn-theme btn-sm" href="job-details.html">ສະໝັກ</a>
              </div>
            </div>
            <!--== End Recent Job Item ==-->
          </div>
      </div>
    </section>
    <!--== End Recent Job Area Wrapper ==-->

    <!--== Start Work Process Area Wrapper ==-->
    <section class="work-process-area">
      <div class="container" data-aos="fade-down">
        <div class="row">
          <div class="col-12">
            <div class="section-title text-center" >
              <h3 class="title">ເປັນສ່ວນຮ່ວມກັບເຮົາ</h3>
              <div class="desc">
                <p>ວິທິ່ການລົງທະບຽນນຳໃຊ້ Website</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="working-process-content-wrap">
              <div class="working-col">
                <!--== Start Work Process ==-->
                <div class="working-process-item">
                  <div class="icon-box">
                    <div class="inner">
                      <img class="icon-img" src="assets/img/icons/w1.png" alt="Image-HasTech">
                      <img class="icon-hover" src="assets/img/icons/w1-hover.png" alt="Image-HasTech">
                    </div>
                  </div>
                  <div class="content">
                    <h4 class="title">ສ້າງບັນຊີ</h4>
                    <p class="desc">ລົງທະບຽນນຳໃຊ້ເວັບໄຊ</p>
                  </div>
                  <div class="shape-arrow-icon">
                    <img class="shape-icon" src="assets/img/icons/right-arrow.png" alt="Image-HasTech">
                    <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png" alt="Image-HasTech">
                  </div>
                </div>
                <!--== End Work Process ==-->
              </div>
              <div class="working-col">
                <!--== Start Work Process ==-->
                <div class="working-process-item">
                  <div class="icon-box">
                    <div class="inner">
                      <img class="icon-img" src="assets/img/icons/w2.png" alt="Image-HasTech">
                      <img class="icon-hover" src="assets/img/icons/w2-hover.png" alt="Image-HasTech">
                    </div>
                  </div>
                  <div class="content">
                    <h4 class="title">ປະກອບຂໍ້ມູນ CV/Resume</h4>
                    <p class="desc">ຕື່ມຂໍ້ມູນພຶ້ນຖານ ແລະ CV ລໍຖ້າການອານຸມັດ</p>
                  </div>
                  <div class="shape-arrow-icon">
                    <img class="shape-icon" src="assets/img/icons/right-arrow.png" alt="Image-HasTech">
                    <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png" alt="Image-HasTech">
                  </div>
                </div>
                <!--== End Work Process ==-->
              </div>
              <div class="working-col">
                <!--== Start Work Process ==-->
                <div class="working-process-item">
                  <div class="icon-box">
                    <div class="inner">
                      <img class="icon-img" src="assets/img/icons/w3.png" alt="Image-HasTech">
                      <img class="icon-hover" src="assets/img/icons/w3-hover.png" alt="Image-HasTech">
                    </div>
                  </div>
                  <div class="content">
                    <h4 class="title">ຊອກຫາວຽກ</h4>
                    <p class="desc">ຊອກຫາວຽກທີ່ດີສຳລັບທ່ານຜ່ານເວັບໄຊ</p>
                  </div>
                  <div class="shape-arrow-icon">
                    <img class="shape-icon" src="assets/img/icons/right-arrow.png" alt="Image-HasTech">
                    <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png" alt="Image-HasTech">
                  </div>
                </div>
                <!--== End Work Process ==-->
              </div>
              <div class="working-col">
                <!--== Start Work Process ==-->
                <div class="working-process-item">
                  <div class="icon-box">
                    <div class="inner">
                      <img class="icon-img" src="assets/img/icons/w4.png" alt="Image-HasTech">
                      <img class="icon-hover" src="assets/img/icons/w4-hover.png" alt="Image-HasTech">
                    </div>
                  </div>
                  <div class="content">
                    <h4 class="title">ສະໝັກ</h4>
                    <p class="desc">ກົດປຸ່ມສະໝັກວຽກທີ່ຕ້ອງການ</p>
                  </div>
                  <div class="shape-arrow-icon d-none">
                    <img class="shape-icon" src="assets/img/icons/right-arrow.png" alt="Image-HasTech">
                    <img class="shape-icon-hover" src="assets/img/icons/right-arrow2.png" alt="Image-HasTech">
                  </div>
                </div>
                <!--== End Work Process ==-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Work Process Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->
    <section class="sec-overlay sec-overlay-theme bg-img" data-bg-img="assets/img/photos/">
      <div class="container pt--0 pb--0">
        <div class="row justify-content-center divider-style1">
          <div class="col-lg-10 col-xl-7">
            <div class="divider-content text-center">
              <h4 class="sub-title" data-aos="fade-down">ລົງທະບຽນເລິຍ</h4>
              <h2 class="title" data-aos="fade-down">ຜູ່ຫາວຽກກໍງ່າຍ... ຜູ້ຈ້າງງານກໍ່ສະດວກ...</h2>
              <div class="divider-btn-group">
                <a class="btn-divider" data-aos="fade-down" href="page-not-found.html">
                  <img src="assets/img/photos/google-play.png" width="201" height="63" class="icon" alt="Image-HasTech">
                </a>
                <a class="btn-divider btn-divider-app-store" data-aos="fade-down" href="page-not-found.html">
                  <img src="assets/img/photos/mac-os.png" width="201" height="63" class="icon" alt="Image-HasTech">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bg-layer-style1"></div>
      <div class="bg-layer-style2"></div>
    </section>
    <!--== End Divider Area Wrapper ==-->

    <!--== Start Team Area Wrapper ==-->
    <section class="team-area">
      <div class="container" data-aos="fade-down">
        <div class="row">
          <div class="col-12">
            <div class="section-title text-center" >
              <h3 class="title">ບໍລິສັດດັ່ງທິ່ກຳລັງຊອກຫາພະນັກງານ</h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!--== Start Team Item ==-->
            <div class="team-item">
              <div class="thumb">
                <a href="candidate-details.html">
                  <img src="assets/img/companies/BCEL Bank.jpg" width="160" height="160" alt="Image-HasTech">
                </a>
              </div>
              <div class="content">
                <h4 class="title"><a href="candidate-details.html">BCEL Bank</a></h4>
                <h5 class="sub-title">Back-end Developer</h5>
                <div class="rating-box">
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>
                
                <a class="btn-theme btn-white btn-sm" href="candidate-details.html">ເບິ່ງໂປໄຟຣ</a>
              </div>
              <div class="bookmark-icon"><img src="assets/img/icons/bookmark1.png" alt="Image-HasTech"></div>
              <div class="bookmark-icon-hover"><img src="assets/img/icons/bookmark2.png" alt="Image-HasTech"></div>
            </div>
            <!--== End Team Item ==-->
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!--== Start Team Item ==-->
            <div class="team-item">
              <div class="thumb">
                <a href="candidate-details.html">
                  <img src="assets/img/companies/BeerLao.jpg" width="160" height="160" alt="Image-HasTech">
                </a>
              </div>
              <div class="content">
                <h4 class="title"><a href="candidate-details.html">Beer Lao </a></h4>
                <h5 class="sub-title">Graphice Designer</h5>
                <div class="rating-box">
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>
                
                <a class="btn-theme btn-white btn-sm" href="candidate-details.html">ເບິ່ງໂປໄຟຣ</a>
              </div>
              <div class="bookmark-icon"><img src="assets/img/icons/bookmark1.png" alt="Image-HasTech"></div>
              <div class="bookmark-icon-hover"><img src="assets/img/icons/bookmark2.png" alt="Image-HasTech"></div>
            </div>
            <!--== End Team Item ==-->
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!--== Start Team Item ==-->
            <div class="team-item">
              <div class="thumb">
                <a href="candidate-details.html">
                  <img src="assets/img/companies/APB Bank.jpg" width="160" height="160" alt="Image-HasTech">
                </a>
              </div>
              <div class="content">
                <h4 class="title"><a href="candidate-details.html">APB Bank</a></h4>
                <h5 class="sub-title">Web Designer</h5>
                <div class="rating-box">
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>
                
                <a class="btn-theme btn-white btn-sm" href="candidate-details.html">ເບິ່ງໂປໄຟຣ</a>
              </div>
              <div class="bookmark-icon"><img src="assets/img/icons/bookmark1.png" alt="Image-HasTech"></div>
              <div class="bookmark-icon-hover"><img src="assets/img/icons/bookmark2.png" alt="Image-HasTech"></div>
            </div>
            <!--== End Team Item ==-->
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!--== Start Team Item ==-->
            <div class="team-item">
              <div class="thumb">
                <a href="candidate-details.html">
                  <img src="assets/img/companies/CLSK.jpg" width="160" height="160" alt="Image-HasTech">
                </a>
              </div>
              <div class="content">
                <h4 class="title"><a href="candidate-details.html">ຈະເລີນເຊກອງ</a></h4>
                <h5 class="sub-title">App. Developer</h5>
                <div class="rating-box">
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                  <i class="icofont-star"></i>
                </div>
                
                <a class="btn-theme btn-white btn-sm" href="candidate-details.html">ເບິ່ງໂປໄຟຣ</a>
              </div>
              <div class="bookmark-icon"><img src="assets/img/icons/bookmark1.png" alt="Image-HasTech"></div>
              <div class="bookmark-icon-hover"><img src="assets/img/icons/bookmark2.png" alt="Image-HasTech"></div>
            </div>
            <!--== End Team Item ==-->
          </div>
        </div>
      </div>
    </section>
    <!--== End Team Area Wrapper ==-->

    <!--== Start Testimonial Area Wrapper ==-->
    <section class="testimonial-area bg-color-gray">
      <div class="container" data-aos="fade-down">
        <div class="row">
          <div class="col-12">
            <div class="section-title text-center" >
              <h3 class="title">ກຳລັງຊອກຫາວຽກ</h3>
              <div class="desc">
                <p>ພະນັກງານທີ່ທ່ານອາກກຳລັງຊອກຫາ ເປັນສ່ວນຮ່ວມກັບທິມ</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="swiper testi-slider-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <!--== Start Testimonial Item ==-->
                  <div class="testimonial-item">
                    <div class="testi-inner-content">
                      <div class="testi-author">
                        <div class="testi-thumb">
                          <img src="assets/img/user/Profile.jpeg" width="75" height="75" alt="Image-HasTech">
                        </div>
                        <div class="testi-info">
                          <h4 class="name">Kanya XAYYAHAN</h4>
                          <span class="designation">Graphic Designer</span>
                        </div>
                      </div>
                      <div class="testi-content">
                        <p class="desc">ປະສົບການເຮັດວຽກງານອອກແບບຫຼາຍກວ່າຫຼາຍ 10 ປີ. ນຳໃຂ້ Program Illustrator, Photosho,</p>
                        <div class="rating-box">
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                        </div>
                        <div class="testi-quote"><img src="assets/img/icons/quote1.png" alt="Image-HasTech"></div>
                      </div>
                    </div>
                  </div>
                  <!--== End Testimonial Item ==-->
                </div>
                <div class="swiper-slide">
                  <!--== Start Testimonial Item ==-->
                  <div class="testimonial-item">
                    <div class="testi-inner-content">
                      <div class="testi-author">
                        <div class="testi-thumb">
                          <img src="assets/img/user/Profile.jpeg" width="75" height="75" alt="Image-HasTech">
                        </div>
                        <div class="testi-info">
                          <h4 class="name">Kanya XAYYAHAN</h4>
                          <span class="designation">Graphic Designer</span>
                        </div>
                      </div>
                      <div class="testi-content">
                        <p class="desc">ປະສົບການເຮັດວຽກງານອອກແບບຫຼາຍກວ່າຫຼາຍ 10 ປີ. ນຳໃຂ້ Program Illustrator, Photosho,</p>
                        <div class="rating-box">
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                        </div>
                        <div class="testi-quote"><img src="assets/img/icons/quote1.png" alt="Image-HasTech"></div>
                      </div>
                    </div>
                  </div>
                  <!--== End Testimonial Item ==-->
                </div>
                <div class="swiper-slide">
                  <!--== Start Testimonial Item ==-->
                  <div class="testimonial-item">
                    <div class="testi-inner-content">
                      <div class="testi-author">
                        <div class="testi-thumb">
                          <img src="assets/img/user/Profile.jpeg" width="75" height="75" alt="Image-HasTech">
                        </div>
                        <div class="testi-info">
                          <h4 class="name">Kanya XAYYAHAN</h4>
                          <span class="designation">Graphic Designer</span>
                        </div>
                      </div>
                      <div class="testi-content">
                        <p class="desc">ປະສົບການເຮັດວຽກງານອອກແບບຫຼາຍກວ່າຫຼາຍ 10 ປີ. ນຳໃຂ້ Program Illustrator, Photosho,</p>
                        <div class="rating-box">
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                        </div>
                        <div class="testi-quote"><img src="assets/img/icons/quote1.png" alt="Image-HasTech"></div>
                      </div>
                    </div>
                  </div>
                  <!--== End Testimonial Item ==-->
                </div>
                <div class="swiper-slide">
                  <!--== Start Testimonial Item ==-->
                  <div class="testimonial-item">
                  <div class="testi-inner-content">
                      <div class="testi-author">
                        <div class="testi-thumb">
                          <img src="assets/img/user/Profile.jpeg" width="75" height="75" alt="Image-HasTech">
                        </div>
                        <div class="testi-info">
                          <h4 class="name">Kanya XAYYAHAN</h4>
                          <span class="designation">Graphic Designer</span>
                        </div>
                      </div>
                      <div class="testi-content">
                        <p class="desc">ປະສົບການເຮັດວຽກງານອອກແບບຫຼາຍກວ່າຫຼາຍ 10 ປີ. ນຳໃຂ້ Program Illustrator, Photosho,</p>
                        <div class="rating-box">
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                        </div>
                        <div class="testi-quote"><img src="assets/img/icons/quote1.png" alt="Image-HasTech"></div>
                      </div>
                    </div>
                  </div>
                  <!--== End Testimonial Item ==-->
                </div>
                <div class="swiper-slide">
                  <!--== Start Testimonial Item ==-->
                  <div class="testimonial-item">
                  <div class="testi-inner-content">
                      <div class="testi-author">
                        <div class="testi-thumb">
                          <img src="assets/img/user/Profile.jpeg" width="75" height="75" alt="Image-HasTech">
                        </div>
                        <div class="testi-info">
                          <h4 class="name">Kanya XAYYAHAN</h4>
                          <span class="designation">Graphic Designer</span>
                        </div>
                      </div>
                      <div class="testi-content">
                        <p class="desc">ປະສົບການເຮັດວຽກງານອອກແບບຫຼາຍກວ່າຫຼາຍ 10 ປີ. ນຳໃຂ້ Program Illustrator, Photosho,</p>
                        <div class="rating-box">
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                          <i class="icofont-star"></i>
                        </div>
                        <div class="testi-quote"><img src="assets/img/icons/quote1.png" alt="Image-HasTech"></div>
                      </div>
                    </div>
                  </div>
                  <!--== End Testimonial Item ==-->
                </div>
              </div>

              <!--== Add Swiper Pagination ==-->
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Testimonial Area Wrapper ==-->

  
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
                <a href="index.html">
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
                          <li><a href="job.html">Job Packages</a></li>
                          <li><a href="job.html">Post New Job</a></li>
                          <li><a href="job.html">Jobs Listing</a></li>
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
                          <li><a href="job.html">Careers</a></li>
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
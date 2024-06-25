<?php include_once 'header.php'; ?>

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
                                                <option value="1" selected>ສະຖານທີ</option>
                                                <?php
                                                $sql = "SELECT * FROM company WHERE InfoFull = 'passed'";
                                                $stmt = $conn->query($sql);
                                                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($results as $companys) {
                                                ?>
                                                    <option value="<?= $companys['Province'] ?>"><?= $companys['Province'] ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-auto col-sm-6 col-12 flex-grow-1">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="1" selected>ປະເພດ ວຽກ</option>
                                                <?php
                                                $sql = "SELECT * FROM post_work_company WHERE InfoFull = 'passed'";
                                                $stmt = $conn->query($sql);
                                                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                foreach ($results as $companys) {
                                                ?>
                                                    <option value="<?= $companys['Occupation'] ?>"><?= $companys['Occupation'] ?></option>
                                                <?php }
                                                ?>
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
                            <a class="btn-theme btn-sm" href="job-details.php">ສະໝັກ</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
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
                            <a class="btn-theme btn-sm" href="job-details.php">ສະໝັກ</a>
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
                            <a class="btn-theme btn-sm" href="job-details.php">ສະໝັກ</a>
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
                            <a class="btn-theme btn-sm" href="job-details.php">ສະໝັກ</a>
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
                            <a class="btn-theme btn-sm" href="job-details.php">ສະໝັກ</a>
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
                            <a class="btn-theme btn-sm" href="job-details.php">ສະໝັກ</a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!--== End Job Details Area Wrapper ==-->
</main>
<?php include_once 'footer.php'; ?>
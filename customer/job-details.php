<?php include_once 'header.php'; ?>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->query("SELECT * FROM post_work_company WHERE ID = $id");
    $stmt->execute();
    $work_post = $stmt->fetch();
}

?>
<style>
    .reply {
        margin-left: 30px;
    }
</style>

<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/photos/bg2.jpg">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title">ຕ້ອງການພະນັກງານ</h2>
                        <nav class="breadcrumb-area">
                            <ul class="breadcrumb justify-content-center">
                                <li><a href="index.php">ໜ້າຫຼັກ</a></li>
                                <li class="breadcrumb-sep">//</li>
                                <li><?= $work_post['Job_title'] ?></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->
    <?php
    if (isset($_GET['id'])) {
        $ids = $_GET['id'];
        $sql = "SELECT * FROM post_work_company WHERE ID = $ids";
        $stmt = $conn->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if results are not empty
        if (!empty($results)) {
            // Iterate through each result to perform further operations
            foreach ($results as $result) {
                $company_id = $result['ID_company'];

                // Prepare the query to fetch matching company IDs
                $stmt = $conn->prepare("
                    SELECT company.ID AS company_id
                    FROM company
                    WHERE company.ID = :company_id
                ");
                $stmt->bindParam(':company_id', $company_id, PDO::PARAM_INT);
                $stmt->execute();
                $ID_task = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($ID_task) {
                    // Fetch company details
                    $stmt = $conn->prepare("SELECT * FROM company WHERE ID = :company_id");
                    $stmt->bindParam(':company_id', $ID_task['company_id'], PDO::PARAM_INT);
                    $stmt->execute();
                    $Data_company = $stmt->fetch(PDO::FETCH_ASSOC);
                } else {
                    $Data_company = null;
                }

                // Display the data within the HTML structure if Data_company is not null
                if ($Data_company) {
    ?>
                    <!--== Start Job Details Area Wrapper ==-->
                    <section class="job-details-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="job-details-wrap">
                                        <div class="job-details-info">
                                            <div class="thumb">
                                                <img src="../company/admin/Image_post/<?= $work_post['Job_post_photos'] ?>" width="130" height="130" alt="Image-HasTech">
                                            </div>
                                            <div class="content">
                                                <h4 class="title"><?= $result['Job_title'] ?></h4>
                                                <h5 class="sub-title"><?= $Data_company['Name_company'] ?></h5>
                                                <ul class="info-list">
                                                    <li><i class="icofont-location-pin"></i><?= $Data_company['Province'] ?>, <?= $Data_company['Nationality'] ?></li>
                                                    <li><i class="icofont-phone"></i><?= $Data_company['Tel'] ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="job-details-price">
                                            <h4 class="title"><?= number_format(htmlspecialchars($result['Salary'])); ?> <span style="margin-left: 1rem;"> ກີບ/ເດືອນ</span></h4>
                                            <button type="button" class="btn-theme">ສະໝັກ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-xl-8">
                                    <div class="job-details-item">
                                        <div class="content">
                                            <h4 class="title">ປະກາດ</h4>
                                            <img src="../company/admin/Image_post/<?= $work_post['Job_post_photos'] ?>" width="930">
                                            <p class="desc"></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <div class="job-details-item">
                                    <div class="content">
                                        <h4 class="title">ລາຍລະອຽດ</h4>
                                        <p><?= $result['Describe_work'] ?></p>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">ໜ້າທີຮັບຜິດຊອບ</h4>
                                        <ul class="job-details-list">
                                            <li><i class="icofont-check"></i> Developing custom themes (WordPress.org & ThemeForest Standards)</li>
                                            <li><i class="icofont-check"></i> Creating reactive website designs</li>
                                            <li><i class="icofont-check"></i> Working under strict deadlines</li>
                                            <li><i class="icofont-check"></i> Develop page speed optimized themes</li>
                                        </ul>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">ລະດັບການສຶກສາ</h4>
                                        <p class="desc">It doesn’t matter where you went to college or what your CGPA was as long as you are smart, passionate, ready to work hard, and have fun.</p>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">ເວລາເຮັດວຽກ</h4>
                                        <ul class="job-details-list">
                                            <li><i class="icofont-check"></i> 8:00 AM - 5:00 PM</li>
                                            <li><i class="icofont-check"></i> Weekly: 5 days.</li>
                                            <li><i class="icofont-check"></i> Weekend: Saturday, Sunday.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-12">
                                <form action="comment.php?id=<?= $data['id']; ?>" method="post" enctype="multipart/form-data">
                                    <div class="widget-title">
                                        <h3 class="title">ຄຳຄິດເຫັນ</h3>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col-md-8 mb-3 p-3 ms-3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="d-flex flex-start align-items-center">
                                                                <img class="rounded-circle shadow-1-strong me-3" src="assets/img/user/Profile.jpeg" alt="avatar" width="60" height="60" />
                                                                <div>
                                                                    <h6 class="fw-bold mb-1">Kan Ya phongsavath </h6>
                                                                    <p class="">
                                                                        8:00 PM
                                                                    </p>

                                                                </div>
                                                                <div class="ms-4" style="margin-top: -32px;">
                                                                    <p class="fw-bold">
                                                                        pen jung drk pen jung dh fsdfsdfsdfdfdsfsdfdsfdsfdsfdsfsdfdsfsdf
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <a href="#" class="d-flex align-items-center me-3 reply-btn" style="margin-left: 4.3rem">
                                                                <i class="far fa-comment-dots me-2"></i>
                                                                <p class="mb-0">Reply</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                                <div class="flex-start w-100 h-100">
                                                    <div data-mdb-input-init class="form-outline w-100">
                                                        <textarea class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                                        <label class="form-label" for="textAreaExample">Message</label>
                                                    </div>
                                                </div>
                                                <div class="float-end mt-2 pt-1">
                                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn-theme btn-sm">comment</button>
                                                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-theme btn-sm">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <h3 class="title">Share With</h3>
                                    </div>
                                </form>
                            </div> -->

                            <div class="col-md-12">
                                <form action="comment.php" method="post" enctype="multipart/form-data">
                                    <input type="text" name="ID_user" value="<?= $_SESSION['user_login'] = $user_data['ID']; ?>">
                                    <input type="text" name="ID_work" value="<?= $result['ID'] ?>">
                                    <input type="text" name="Time" id="timeInput" value="" />
                                    <div class="widget-title">
                                        <h3 class="title">Comments</h3>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col-md-8 mb-3 p-3 ms-3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="d-flex flex-start align-items-center">
                                                                <img class="rounded-circle shadow-1-strong me-3" src="assets/img/user/Profile.jpeg" alt="avatar" width="60" height="60" />
                                                                <div>
                                                                    <h6 class="fw-bold mb-1">Kan Ya phongsavath </h6>
                                                                    <p>8:00 PM</p>
                                                                </div>
                                                                <div class="ms-4" style="margin-top: -32px;">
                                                                    <p class="fw-bold">Example comment text here.</p>
                                                                </div>
                                                            </div>
                                                            <a href="#" class="d-flex align-items-center me-3 reply-btn" style="margin-left: 4.3rem" data-comment-id="1">
                                                                <i class="far fa-comment-dots me-2"></i>
                                                                <p class="mb-0">Reply</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                                <div class="flex-start w-100 h-100">
                                                    <div data-mdb-input-init class="form-outline w-100">
                                                        <textarea class="form-control" id="textAreaExample" rows="4" name="Comment_content" style="background: #fff;"></textarea>
                                                        <label class="form-label" for="textAreaExample">Message</label>
                                                        <input type="hidden" name="parent_id" id="parent_id" value="0">
                                                    </div>
                                                </div>
                                                <div class="float-end mt-2 pt-1">
                                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn-theme btn-sm" name="comment_Post_work">Comment</button>
                                                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-theme btn-sm">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <h3 class="title">Share With</h3>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-5 col-xl-7">
                                <div class="job-sidebar">
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
                    </section>
    <?php
                }
            }
        }
    }
    ?>
    <!--== End Job Details Area Wrapper ==-->
</main>

<?php include_once 'footer.php'; ?>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('.reply-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const commentId = this.getAttribute('data-comment-id');
                document.getElementById('parent_id').value = commentId;
                document.getElementById('textAreaExample').focus();
            });
        });
    });

    function getCurrentTime() {
        const now = new Date();
        const hours = now.getHours();
        const minutes = String(now.getMinutes()).padStart(2, '0');
        return `${hours}:${minutes}`;
    }

    // Set the value of the input field to the current time
    document.getElementById('timeInput').value = getCurrentTime();
</script>
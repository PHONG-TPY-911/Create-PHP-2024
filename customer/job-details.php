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

    #image-profile {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;

    }

    .scorll {
        width: 100%;
        overflow-y: auto;
        max-height: 700px;
    }

    .card-body {
        overflow-y: auto;
        max-height: 500px;
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

                            <div>

                                <h3 class="title">ຄອມເມັ້ນ</h3>
                                <div class="col-md-12 mt-4">
                                    <div class="widget-title">
                                        <div class="card">
                                            <div class="scorll">
                                                <?php
                                                $ID = $result['ID'];
                                                $stmt = $conn->query("SELECT count(*) FROM comment, post_work_company WHERE comment.ID_work = post_work_company.ID AND post_work_company.ID = $ID;");
                                                $num = $stmt->fetchColumn();
                                                ?>
                                                <?php

                                                $stmt = $conn->query("SELECT comment.ID, comment.ID_work, comment.Comment_content, comment.ID_user, comment.Time, customer.ID AS custome_ID, customer.Name, customer.Profile_picture, customer.Status, post_work_company.ID AS word_post_id FROM comment,post_work_company,customer WHERE comment.ID_work = post_work_company.ID AND comment.ID_work = $ID and comment.ID_user = customer.ID and comment.ID_user ORDER by comment.ID ASC;");
                                                $data = $stmt->fetchAll();
                                                foreach ($data as $comment) {
                                                    $time = new DateTime($comment['Time']);
                                                    $formattedTime = $time->format('h:i A');
                                                ?>
                                                    <div class="card-body" style="margin-bottom: -80px;">
                                                        <div class="col-md-8 p-3 ms-3">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="d-flex flex-start align-items-center">
                                                                        <img class="rounded-circle shadow-1-strong me-3" src="../folder-image/image-profile/<?= $comment['Profile_picture']; ?>" id="image-profile" alt="avatar" width="50" height="50" />
                                                                        <div>
                                                                            <h6 class="fw-bold mb-1"><?= $comment['Name']; ?> </h6>
                                                                            <p><?= $formattedTime ?></p>

                                                                        </div>
                                                                        <div class="ms-4" style="margin-top: -32px;">
                                                                            <p class="fw-bold"><?= $comment['Comment_content']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- reply -->
                                                    <div class="col-md-6 mt-5 ms-5">
                                                        <a href="javascript:void(0)" class="d-flex align-items-center me-3 reply-btn" style="margin-left: 5rem;" data-comment-id="<?= $comment['ID']; ?>">
                                                            <i class="far fa-comment-dots me-2"></i>
                                                            <p class="mb-0" data-comment-id="<?= $comment['ID']; ?>">Reply</p>
                                                        </a>
                                                        <!-- Reply form section -->
                                                        <div class="card-footerss py-3 mt-2 border-0 reply-form" style="display: none; margin-left: 5rem; margin-top: -10rem;  margin-bottom: 5rem;" id="reply-form-<?= $comment['ID']; ?>">
                                                            <form method="POST" action="Reply_db.php" enctype="multipart/form-data">
                                                                <!-- <form id="comment-form-<?= $comment['ID']; ?>" method="POST" action="Reply_db.php"> -->
                                                                <input type="hidden" name="Reply_user_ID" value="<?= $comment['custome_ID']; ?>">
                                                                <input type="hidden" name="ID_comment" value="<?= $comment['ID']; ?>">
                                                                <input type="hidden" name="ID_users" value="<?= $_SESSION['user_login'] = $user_data['ID']; ?>">
                                                                <input type="hidden" name="ID_works" value="<?= $comment['word_post_id'] ?>">
                                                                <input type="hidden" name="Time" id="timeInput1" class="time-input" value="" />

                                                                <div class="flex-start w-100 h-100">
                                                                    <div data-mdb-input-init class="form-outline w-100">
                                                                        <textarea class="form-control" id="textAreaExample" rows="4" name="Reply_comment_content" style="background: #fff;"></textarea>
                                                                        <input type="hidden" name="parent_id" id="parent_id" value="<?= $comment['ID']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="float-end mt-2 pt-1">
                                                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn-theme btn-sm" name="reply_comment_Post_work">Comment</button>
                                                                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-theme btn-sm cancel-reply">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $reply = $conn->query("SELECT comment.ID, comment.ID_work,  comment.Comment_content,  comment.Time, customer.ID AS customer_ID, customer.Name, customer.Profile_picture, customer.Status, post_work_company.ID AS work_post_id,  reply.ID AS Reply_ID, reply.parent_id,  reply.Reply_comment_content,  reply.ID_users, reply.ID_works, reply.Times,reply.Reply_user_ID,reply.ID_comment FROM comment JOIN customer ON comment.ID_user = customer.ID JOIN  reply ON reply.ID_comment = comment.ID JOIN  post_work_company ON reply.ID_works = post_work_company.ID WHERE reply.Reply_user_ID = comment.ID_user AND reply.ID_comment = comment.ID AND reply.ID_works = $ID;");
                                                    $data_reply = $reply->fetchAll();
                                                    foreach ($data_reply as $reply_comment) {
                                                        $time = new DateTime($reply_comment['Times']);
                                                        $formattedTime = $time->format('h:i A');
                                                        if ($reply_comment['ID_users'] == $comment['ID_user'] && $reply_comment['parent_id'] == $reply_comment['ID_comment']) {
                                                    ?>
                                                            <div class="card-body" style="margin-bottom: -80px; margin-left: 5rem;">
                                                                <div class="col-md-11 p-3 ms-3">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="d-flex flex-start align-items-center">
                                                                                <img class="rounded-circle shadow-1-strong me-3" src="../folder-image/image-profile/<?= $reply_comment['Profile_picture']; ?>" id="image-profile" alt="avatar" width="50" height="50" />
                                                                                <div>
                                                                                    <h6 class="fw-bold mb-1"><?= $reply_comment['Name']; ?> @ ( <?= $comment['Name']; ?>)</h6>
                                                                                    <p><?= $formattedTime ?></p>
                                                                                </div>
                                                                                <div class="ms-4" style="margin-top: -32px;">
                                                                                    <p class="fw-bold"><?= $reply_comment['Reply_comment_content']; ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- reply  comment of reply comment -->
                                                            <div class="col-md-6 mt-5 ms-5">
                                                                <a href="javascript:void(0)" class="d-flex align-items-center me-3 reply-btn-reply" style="margin-left: 10rem;" data-comment-id-reply="<?= $reply_comment['Reply_ID']; ?>">
                                                                    <i class="far fa-comment-dots me-2"></i>
                                                                    <p class="mb-0" data-comment-id-reply="<?= $reply_comment['Reply_ID']; ?>">Reply</p>
                                                                </a>
                                                                <div class="card-footerss py-3 mt-2 border-0 reply-form-reply" style="display: none; margin-left: 10rem; margin-top: -10rem;  margin-bottom: 5rem;" id="reply-form-reply-<?= $reply_comment['Reply_ID']; ?>">
                                                                    <form method="POST" action="Reply_db.php" enctype="multipart/form-data">
                                                                        <input type="hidden" name="Reply_user_ID" value="<?= $comment['custome_ID']; ?>">
                                                                        <input type="hidden" name="ID_comment" value="<?= $comment['ID']; ?>">
                                                                        <input type="hidden" name="ID_users" value="<?= $_SESSION['user_login'] = $user_data['ID']; ?>">
                                                                        <input type="hidden" name="ID_works" value="<?= $reply_comment['work_post_id'] ?>">
                                                                        <input type="hidden" name="Times" id="timeInput2" class="time-input" value="" />

                                                                        <div class="flex-start w-100 h-100">
                                                                            <div data-mdb-input-init class="form-outline w-100">
                                                                                <textarea class="form-control" id="textAreaExample" rows="4" name="Reply_comment_content" style="background: #fff;"></textarea>
                                                                                <input type="hidden" name="parent_id" id="parent_id" value="<?= $reply_comment['Reply_ID']; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="float-end mt-2 pt-1">
                                                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn-theme btn-sm" name="reply_comment_Post_work">Comment</button>
                                                                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-theme btn-sm cancel-reply-reply">Cancel</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                    <?php }
                                                    }
                                                    ?>
                                                <?php   }
                                                ?>
                                                <form action="comment.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="ID_user" value="<?= $_SESSION['user_login'] = $user_data['ID']; ?>">
                                                    <input type="hidden" name="ID_work" value="<?= $result['ID'] ?>">
                                                    <input type="hidden" name="Time" id="timeInput" class="time-input" s value="" />
                                                    <div class="col-md-12 mb-5 me-5">
                                                        <div class=" py-3 mt-5 border-0 p-4">
                                                            <div class="flex-start w-100 h-100">
                                                                <div data-mdb-input-init class="form-outline w-100">
                                                                    <textarea class="form-control" rows="4" name="Comment_content" style="background: #fff;"></textarea>
                                                                    <input type="hidden" name="parent_id" id="parent_id" value="0">
                                                                </div>
                                                            </div>
                                                            <div class="float-end mt-2 pt-1 mt-3 mb-4">
                                                                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn-theme btn-sm" name="comment_Post_work">Comment</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <br>
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

<?php include_once 'footer_detail.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function getCurrentTime() {
            const now = new Date();
            let hours = now.getHours();
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            return `${hours}:${minutes} ${ampm}`;
        }

        // Set the value of all input fields with class "time-input" to the current time
        document.querySelectorAll('.time-input').forEach(input => {
            input.value = getCurrentTime();
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all reply buttons
        const replyButtonsReply = document.querySelectorAll('.reply-btn-reply');
        if (replyButtonsReply) {
            // Attach click event to each reply button
            replyButtonsReply.forEach(function(button) {
                button.addEventListener('click', function(eveint) {
                    event.preventDefault();
                    // Hide all other reply forms before showing the clicked one
                    document.querySelectorAll('.reply-form-reply').forEach(function(form) {
                        form.style.display = 'none';
                    });
                    // Show the corresponding reply form
                    const commentId_reply = this.getAttribute('data-comment-id-reply');
                    const replyFormReply = document.getElementById(`reply-form-reply-${commentId_reply}`);
                    if (replyFormReply) {
                        replyFormReply.style.display = 'block';
                    }
                });
            });
        }
        // Handle cancel button click to hide reply form
        const cancelButtonsReply = document.querySelectorAll('.cancel-reply-reply');
        if (cancelButtonsReply) {
            cancelButtonsReply.forEach(function(button) {
                button.addEventListener('click', function() {
                    const replyFormReply = this.closest('.reply-form-reply');
                    if (replyFormReply) {
                        replyFormReply.style.display = 'none';
                    }
                });
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all reply buttons
        const replyButtons = document.querySelectorAll('.reply-btn');
        if (replyButtons) {
            // Attach click event to each reply button
            replyButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    // Hide all other reply forms before showing the clicked one
                    document.querySelectorAll('.reply-form').forEach(function(form) {
                        form.style.display = 'none';
                    });
                    // Show the corresponding reply form
                    const commentId = this.getAttribute('data-comment-id');
                    const replyForm = document.getElementById(`reply-form-${commentId}`);
                    if (replyForm) {
                        replyForm.style.display = 'block';
                    }
                });
            });
        }
        // Handle cancel button click to hide reply form
        const cancelButtons = document.querySelectorAll('.cancel-reply');
        if (cancelButtons) {
            cancelButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    const replyForm = this.closest('.reply-form');
                    if (replyForm) {
                        replyForm.style.display = 'none';
                    }
                });
            });
        }
    });
</script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comment</title>
</head>

<body>


  <!-- comment -->
  <div class="ps-blog-grid pt-80 pb-80">
    <div class="ps-container">
      <h2 class="fw-blod mb-3">ສະແດງຄວາມຄິດເຫັນ</h2>
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
          <form action="comment.php?id=<?= $user['ID']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <!-- <input type="hidden" name="info" value="<?= $id = $_GET['id']; ?>" /> -->
              <input type="hidden" name="user_id" value="<?= $_SESSION['user_login'] = $row['id']; ?>" />
              <textarea class="form-control rounded" require id="floatingTextarea2" name="comment" style=" width: 100%; height: 100px"></textarea>
            </div>
            <!-- <input type="submit" name="submit" value="ໂຟສຄອມເມັ້ນ" class="btn btn-info mt-2"> -->
            <button class="btn btn-info" type="submit" name="submit">ໂຟສຄອມເມັ້ນ</button>
          </form>

          <?php
          $stmt = $conn->query("SELECT count(*) FROM comment,info WHERE comment.car_id = info.id AND info.id = $id;");
          $num = $stmt->fetchColumn();

          ?>
          <div class="ps-comments">
            <h3>Comment (<?php echo $num ?>)</h3>
            <?php
            require '../../config/db.php';

            $stmt = $conn->query("SELECT comment.id, comment.car_id, comment.body, comment.created_at, info.id, users.id, users.firstname, users.email, users.img,users.urole FROM comment,info,users WHERE comment.car_id = info.id AND comment.car_id = $id and comment.user_id = users.id and comment.user_id  ORDER by comment.id DESC;");
            // $stmt = $conn->query("SELECT comment.id, comment.car_id, comment.body, comment.user_name, comment.created_at, comment.img, comment.urole, info.id FROM comment,info WHERE comment.car_id = info.id AND comment.car_id = $id ORDER by comment.id DESC;");
            $data = $stmt->fetchAll();
            foreach ($data as $comment) {
            ?>
              <div class="ps-comment">
                <div class="ps-comment__thumbnail">
                  <img src="../../Admin/login/img/<?= $comment['img']; ?>" alt="">
                </div>
                <div class="ps-comment__content">
                  <header>
                    <h4><?= $comment['firstname']; ?> (<?= $comment['urole']; ?>)<span><?= $comment['created_at']; ?></span></h4>
                    <!-- <a href="#replies" data-id=<?= $comment['id']; ?>>Reply<i class="ps-icon-arrow-left"></i></a> -->
                  </header>
                  <p><?= $comment['body']; ?></p>
                </div>
              </div>
            <?php   }
            ?>
            <div class="ps-comment ps-comment--reply">
              <div class="ps-comment__thumbnail"><img src="images/user/3.jpg" alt=""></div>
              <div class="ps-comment__content">
                <header>
                  <h4>MARK GREY <span>(3 hours ago)</span></h4><a href="#">Reply<i class="ps-icon-arrow-left"></i></a>
                </header>
                <p>The development of the mass spectrometer allowed the mass of atoms to be measured with increased accuracy. The device uses continue ace explore.</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- comment -->
</body>

</html>
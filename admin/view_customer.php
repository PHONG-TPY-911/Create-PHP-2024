<?php include_once './header copy.php'; ?>
<style>
  .image-img {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    /* height: 100vh; */
  }

  .image-img img {
    max-width: 40%;
    height: auto;
    border-radius: 20%;
    overflow: hidden;
  }

  .skill {
    border-right: 1px solid #000;
    border-left: none;
    /* padding: 5px; */
  }
</style>
<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // Use a prepared statement to prevent SQL injection
  $stmt = $conn->prepare("SELECT * FROM customer WHERE ID = :id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch a single record
  $formattedDateOfBirth = '';
  if (isset($user['DataOfBirth'])) {
    $timestamp = strtotime($user['DataOfBirth']);
    $formattedDateOfBirth = date('Y-m-d', $timestamp);
  }
}
?>

<div class="show-data">
  <div class="row g-3 needs-validation" novalidate>
    <div class="image-img">
      <div class="col-mb-12">
        <h6 for="validationCustom01" class="form-label mb-3 fw-bold">ຮູບພາຍ ໂປຣຟາຍ</h6>
        <img src="../folder-image/image-profile/<?= $user['Profile_picture'] ?>" alt="">
      </div>
    </div>
    <hr>
    <div class="col-md-4">
      <h6 for="validationCustom01" class="form-label">ຊື່ : <?= htmlspecialchars($user['Name']) ?> </h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom02" class="form-label">ນາມສະກຸນ : <?= htmlspecialchars($user['Lname']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustomUsername" class="form-label">ອາຍຸ : <?= htmlspecialchars($user['Age']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom03" class="form-label">ເດືອນປີເກີດ : <?= htmlspecialchars($formattedDateOfBirth) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom04" class="form-label">ບ້ານ : <?= htmlspecialchars($user['Village']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ເມືອງ : <?= htmlspecialchars($user['District']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ແຂວງ : <?= htmlspecialchars($user['Province']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ທີ່ຢູ່ : <?= htmlspecialchars($user['Address']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ເພດ : <?= htmlspecialchars($user['Gender']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ສະຖະນະ : <?= htmlspecialchars($user['Status_user']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ສະສາໜາ : <?= htmlspecialchars($user['Religion']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ສັນຊາດ : <?= htmlspecialchars($user['Nationality']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ສາຂາຮຽນ : <?= htmlspecialchars($user['Study']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ລະດັບການສຶກສາ : <?= htmlspecialchars($user['Education_level']) ?>
      </h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ອິເມວ : <?= htmlspecialchars($user['Email']) ?></h6>
    </div>
    <div class="col-md-4">
      <h6 for="validationCustom05" class="form-label">ເບີຕິດຕໍ່ : <?= htmlspecialchars($user['Tel']) ?></h6>
    </div>
    <hr>
    <?php
    $user_id = $user['ID'];
    $stmt = $conn->prepare("SELECT ID_Task, Skill, Language, Skill_Other, Language_Other, Occupation, Job_content, ID FROM taskinformation WHERE ID = :user_id");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $inFo = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($inFo) {
      $skills = json_decode($inFo['Skill'], true);
      $Languages = json_decode($inFo['Language'], true);
    ?>
      <div class="row">
        <div class="col-md-6 skill">
          <label for="">Skill (ທາງດ້ານຄອມພິວເຕີ)</label>
          <hr width="150px">
          <ol>
            <?php if (!empty($skills)) : ?>
              <?php foreach ($skills as $skill) : ?>
                <li><i class="fa-solid fa-check me-4" style="color: #63E6BE;"></i> <?= htmlspecialchars($skill, ENT_QUOTES, 'UTF-8') ?></li>
              <?php endforeach; ?>
            <?php else : ?>
              <li>ຍັງບໍ່ມີຂໍ້ມູນ Skill</li>
            <?php endif; ?>
          </ol>
          <hr>
          <label for="">Skill ອື່ນໆທີ່ກ່ຽວຂ້ອງກັນ</label>
          <hr width="150px">
          <p><?= $inFo['Skill_Other'] ? $inFo['Skill_Other'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></p>
        </div>

        <div class="col-md-6">
          <label for="">ທັກສະ (ທາງດ້ານພາສາ)</label>
          <hr width="150px">
          <ol>
            <?php if (!empty($skills)) : ?>
              <?php foreach ($skills as $skill) : ?>
                <li><i class="fa-solid fa-check me-4" style="color: #63E6BE;"></i> <?= htmlspecialchars($skill, ENT_QUOTES, 'UTF-8') ?></li>
              <?php endforeach; ?>
            <?php else : ?>
              <li>ຍັງບໍ່ມີຂໍ້ມູນ Skill</li>
            <?php endif; ?>
          </ol>
          <hr>
          <label for="">Skill ອື່ນໆທີ່ກ່ຽວຂ້ອງກັນ</label>
          <hr width="150px">
          <p><?= $inFo['Language_Other'] ?></p>
        </div>
      </div>
      <hr>
      <div class="col-md-12">
        <label for="">ເນຶ້ອຫາວຽກ</label>
        <p><?= $inFo['Job_content'] ?></p>
      </div>
      <hr>
    <?php
    }
    ?>
    <div class="row">
      <div class="col-md-4">
        <h6 for="validationCustom05" class="form-label">ໃບປະກາດ </h6>
        <img width="60%" id="perview" class="mt-2 rounded" alt="" src="../folder-image/image-declaration/<?= $user['Declaration'] ?>">
      </div>
      <div class="col-md-4">
        <h6 for="validationCustom05" class="form-label">ໃບຄະແນນ </h6>
        <img width="60%" id="perview2" class="mt-2 rounded" alt="" src="../folder-image/image-score/<?= $user['Score'] ?>">
      </div>
      <div class="col-md-4">
        <h6 for="validationCustom05" class="form-label">ໃບຊິວິ </h6>
        <img width="60%" id="perview1" class="mt-2 rounded" alt="" src="../folder-image/image-cv/<?= $user['Cv'] ?>">
        <!-- <img id="myImg" src="../login/img/<?= $data['img']; ?> " alt="" style="width:100px;"> -->
      </div>
    </div>
  </div>
</div>
</div>
<hr>

<?php include_once './footer.php' ?>
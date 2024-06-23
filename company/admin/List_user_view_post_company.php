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
    max-width: 250px;
    height: auto;
    border-radius: 20px;
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
  $stmt = $conn->prepare("SELECT * FROM post_work_company WHERE ID = :id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $user_data = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch a single record
  $formattedDateOfBirth = '';
  if (isset($user_data['DataOfBirth'])) {
    $timestamp = strtotime($user_data['Created_at']);
    $formattedDateOfBirth = date('Y-m-d', $timestamp);
  }
}
?>

<div class="show-data">
  <div class="row g-3 needs-validation" novalidate>
    <div class="row">
      <div class="row">
        <input type="hidden" name="ID" value="<?= $user_data['ID'] ?>">
        <input type="hidden" name="ID_company" value="<?= $user_data['ID_company'] ?>">
        <input type="hidden" name="ID_employee" value="<?= $user_data['ID_employee'] ?>">
        <div class="row g-3 needs-validation" novalidate>

          <div class="col-md-6">
            <label for="validationCustom01" class="form-label fw-bold">ຫົວຂໍ້ໜ້າວຽກ</label>
            <p><?= $user_data['Job_title'] ?></p>
          </div>
          <div class="col-md-6">
            <label for="validationCustom02" class="form-label fw-bold">ເງີນເດືອນ</label>
            <p><?= $user_data['Salary'] ?></p>
          </div>
          <div class="col-md-6">
            <label for="validationCustomUsername" class="form-label fw-bold">ວັນທີ່ເປີດຮັບສະໝັກວຽກ</label>
            <p><?= $user_data['Job_data'] ?></p>
          </div>
          <div class="col-md-6">
            <label for="validationCustom02" class="form-label fw-bold">ວັນທີ່ປີດຮັບສະໝັກວຽກ</label>
            <p><?= $user_data['job_end_data'] ?></p>
          </div>
          <div class="col-md-6">
            <label for="validationCustom02" class="form-label fw-bold">ເວລາການເຮັດວຽກ</label>
            <p><?= $user_data['Working_time'] ?></p>
          </div>
          <div class="col-md-6">
            <label for="validationCustom03" class="form-label fw-bold">ເວລາ</label>
            <p><?= $user_data['Time'] ?></p>
          </div>

          <div class="col-md-12">
            <label for="validationCustom03" class="form-label fw-bold">ໜ້າວຽກໂດຍຫຍໍ້</label>
            <p><?= $user_data['Describe_work'] ?></p>
          </div>
          <div class="col-md-12">
            <label for="validationCustom05" class="form-label fw-bold">ໂພສເຕີ້ປະກາດວຽກ</label><br>
            <hr>
            <img width="100%" id="perview" class="mt-4 rounded" alt="" src="./image/<?= $user_data['Job_post_photos'] ?>">
          </div>
        </div>
      </div>
    </div>
    <!-- </div> -->
  </div>
</div>
</div>
<hr>

<?php include_once './footer.php' ?>
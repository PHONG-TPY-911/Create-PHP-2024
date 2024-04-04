<?php
// session_start();
require_once '../../connect-database/config.php';
require_once './get_districts.php';
require_once './get_village.php';
?>

  <div class="col-md-12">
    <div class="form-group">
      <label class="province">ແຂວງ</label>
      <select class="form-select" aria-label="Default select example" name="province" id="provinceSelect">
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
      <select class="form-select" aria-label="Default select example" name="district" id="districtSelect">
        <option value="" selected>-----</option>
      </select>
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      <label class="village">ບ້ານ</label>
      <select class="form-select" aria-label="Default select example" name="village" id="villageSelect">
        <option value="" selected>-----</option>
      </select>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./setValue_select.js"></script>

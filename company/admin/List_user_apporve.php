<?php include_once './header copy.php';
if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $deletestmt = $conn->query("DELETE FROM post_work_company WHERE ID = $delete_id");
  $deletestmt->execute();
}
?>

<?php
try {
  // Step 1: Fetch all relevant data from post_work_company
  $sql = "SELECT * FROM post_work_company WHERE InfoFull = 'full'";
  $stmt = $conn->query($sql);
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Step 2: Iterate through each result to perform further operations
  foreach ($results as $result) {
    $user_id = $result['ID'];
    $company_id = $result['ID_company'];
    $employee_id = $result['ID_employee'];

    // Step 3: Prepare the query to fetch matching company and employee IDs
    $stmt = $conn->prepare("
      SELECT company.ID AS company_id, employees.ID AS employee_id
      FROM company
      JOIN employees ON employees.ID = :employee_id
      WHERE company.ID = :company_id
    ");
    $stmt->bindParam(':company_id', $company_id, PDO::PARAM_INT);
    $stmt->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
    $stmt->execute();
    $ID_task = $stmt->fetch(PDO::FETCH_ASSOC);

    // You can now use $ID_task as needed
    // Example: echo "Company ID: " . $ID_task['company_id'] . ", Employee ID: " . $ID_task['employee_id'];

    if ($ID_task) {
      // Fetch company details
      $stmt = $conn->prepare("SELECT * FROM company WHERE ID = :company_id");
      $stmt->bindParam(':company_id', $ID_task['company_id'], PDO::PARAM_INT);
      $stmt->execute();
      $Data_company = $stmt->fetch(PDO::FETCH_ASSOC);

      // Fetch employee details
      $stmts = $conn->prepare("SELECT * FROM employees WHERE ID = :employee_id");
      $stmts->bindParam(':employee_id', $ID_task['employee_id'], PDO::PARAM_INT);
      $stmts->execute();
      $Data_employee = $stmts->fetch(PDO::FETCH_ASSOC);
    }
  }
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
?>

<div class="container-xl px-4 mt-4">
  <div class="row d-flex flex-wrap">
    <form action="List_user_appored_inserts.php" enctype="multipart/form-data" method="POST" class="d-flex flex-wrap">
      <?php foreach ($results as $cus_info) : ?>
        <input type="hidden" name="ID" value="<?= $cus_info['ID'] ?>">
        <input type="hidden" name="ID_company" value="<?= $cus_info['ID_company'] ?>">
        <div class="card me-3 mb-3" style="width: 25rem;">
          <?php if (!empty($cus_info['Job_post_photos'])) : ?>
            <img src="Image_post/<?= $cus_info['Job_post_photos'] ?>" height="Profile Image" class="profile-img mt-3" style="width: 100%; height: 200px; object-fit: cover;">
          <?php else : ?>
            <img src="../../userImage/icon_example.webp" alt="Profile Image" class="profile-img" style="width: 100%; height: 200px; object-fit: cover;">
          <?php endif; ?>
          <div class="card-body">
            <h2 class="card-title fw-bold">ຫົວຂໍ້: <?= $cus_info['Job_title']; ?></h2>
            <h6 class="card-title">ເງີນເດືອນ: <?= $cus_info['Salary']; ?></h6>
            <h6 class="card-title">ເວລາ: (<?= $cus_info['Working_time']; ?>)</h6>
            <h6 class="card-title">ວັນທີ ເປີດ-ປິດ</h6>
            <h6 class="card-title">(<?= $cus_info['Job_data']; ?> - <?= $cus_info['job_end_data']; ?>)</h6>
          </div>
          <?php if (isset($Data_company) && isset($Data_employee)) : ?>

            <input type="hidden" name="ID_employee" value="<?= $Data_employee['ID'] ?>">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <div class="row">
                  <div class="col-md-5">
                    <h6 class="fw-bold">Company</h6>
                  </div>
                  <div class="col-md-6">
                    <?= htmlspecialchars($Data_company['Name_company']) ?>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-md-5">
                    <h6 class="fw-bold">Employee - Post</h6>
                  </div>
                  <div class="col-md-6">
                    <?= htmlspecialchars($Data_employee['Name_Employee']) ?>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="row">
                  <div class="col-md-6">
                    <a href="List_user_view_post_company.php?id=<?= $cus_info['ID'] ?>" class="btn btn-warning">ເບີ່ງເພີ່ມເຕີມ
                    </a>
                  </div>
                  <div class="col-md-6">
                    <button class="btn btn-primary" type="submit" name="insert_apporve_user">ຍອມຮັບ</button>
                  </div>
                </div>
              </li>
            </ul>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </form>
  </div>
</div>


<?php include_once './footer.php' ?>
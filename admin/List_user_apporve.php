<?php include_once './header copy.php';
if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $deletestmt = $conn->query("DELETE FROM customer WHERE ID = $delete_id");
  $deletestmt->execute();

  // if ($deletestmt) {
  //   echo "<script>alert('Data has been deleted successfully');</script>";
  //   $_SESSION['success'] = "Data has not deleted successfully";
  //   header("refresh:1; url=add-user.php");
  // }
}
?>
<style>
  .profile-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
  }

  .border-img {
    border-right: 1px solid #000;
    border-left: none;
    padding: 5px;
  }

  .flex-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .list-group-item {
    text-align: center;
    padding: 10px;
  }

  .link-click {
    /* Define your styles here */
    font-family: "Your Lao Font", Arial, sans-serif;
    font-size: 16px;
    color: #ffffff;
    text-decoration: none;
  }

  .link-click:hover {
    text-decoration: underline;
    color: #ffffff;
    background: none;
  }
</style>

<?php
try {
  $sql = "SELECT * from customer WHERE InfoFull = 'full'";

  $stmt = $conn->query($sql);

  $stmt = $conn->query($sql);

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
  die();
}
?>

<div class="container-xl px-4 mt-4">
  <div class="row">
    <?php foreach ($results as $cus_info) : ?>
      <div class="col-md-8">
        <ul class="list-group">
          <li class="list-group-item text-center flex-container">
            <div class="border-img">
              <?php if (!empty($cus_info['Profile_picture'])) : ?>
                <img src="../folder-image/image-profile/<?= $cus_info['Profile_picture']; ?>" alt="Profile Image" class="profile-img">
              <?php else : ?>
                <img src="../userImage/user.png" alt="Profile Image" class="profile-img">
              <?php endif; ?>
            </div>
            <span>ຊຶ່ (ຜູ້ສະຊອກວຽກ) : <?php echo htmlspecialchars($cus_info['Name']); ?></span>
            <span>ສະຖານທີ : <?php echo htmlspecialchars($cus_info['Province']); ?></span>
            <span>ສະຖະນະ : <?php echo htmlspecialchars($cus_info['Status']); ?></span><br>
          </li>
          <button type="button" class="btn btn-primary btn-lx mt-3 mb-3"><a href="List_user_view_customer.php?id=<?= $cus_info['ID'] ?>" class="link-click">ເບີ່ງຂໍ້ມູນ ເພີ່ມເຕີມ </a></button>
        </ul>
      </div>
      <div class="col-md-4">
        <?php
        $user_id = $cus_info['ID'];
        $stmt = $conn->prepare("SELECT ID_Task,ID FROM taskinformation WHERE ID = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $ID_task = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <form action="List_user_appored_insert.php" enctype="multipart/form-data" method="POST">
          <input type="hidden" name="ID_task_information" value="<?= htmlspecialchars($ID_task['ID_Task']); ?>">
          <input type="hidden" name="ID" value="<?= htmlspecialchars($cus_info['ID']); ?>" placeholder="Name">
          <input type="hidden" name="Name" value="<?= htmlspecialchars($cus_info['Name']); ?>" placeholder="Name">
          <input type="hidden" name="Lname" value="<?= htmlspecialchars($cus_info['Lname']); ?>" placeholder="Last Name">
          <input type="hidden" name="Email" value="<?= htmlspecialchars($cus_info['Email']); ?>" placeholder="Email" required>
          <input type="hidden" name="Password" value="<?= htmlspecialchars($cus_info['Password']); ?>" placeholder="Password">
          <input type="hidden" name="Status" value="<?= htmlspecialchars($cus_info['Status']); ?>" placeholder="Status">
          <button type="submit" name="user_list" class="btn btn-primary btn-lx mt-3 mb-3">ຍອມຮັບ</button>
        </form>
      </div>
    <?php endforeach; ?>
  </div>
</div>



<?php
try {
  $sql = "SELECT * from company WHERE InfoFull = 'full'";

  $stmt = $conn->query($sql);

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
  die();
}
?>
<div class="container-xl px-4 mt-4">
  <div class="row">
    <?php foreach ($results as $cpm_info) : ?>
      <div class="col-md-8">
        <ul class="list-group">
          <li class="list-group-item text-center flex-container">
            <div class="border-img">
              <?php if (!empty($cpm_info['Profile_picture'])) : ?>
                <img src="../folder-image-company/profile-company/<?= $cpm_info['Profile_picture']; ?>" alt="Profile Image" class="profile-img">
              <?php else : ?>
                <img src="../userImage/user.png" alt="Profile Image" class="profile-img">
              <?php endif; ?>
            </div>
            <span>ຊຶ່ (ບໍລິສັດ): <?php echo htmlspecialchars($cpm_info['Name_company']); ?></span>
            <span>ສະຖານທີ : <?php echo htmlspecialchars($cpm_info['Province']); ?></span>
            <span>ສະຖະນະ : <?php echo htmlspecialchars($cpm_info['Status']); ?></span><br>
          </li>
          <button type="button" class="btn btn-primary btn-lx mt-3 mb-3"><a href="List_user_company_view.php?id=<?= $cpm_info['ID'] ?>" class="link-click">ເບີ່ງຂໍ້ມູນ ເພີ່ມເຕີມ </a></button>
        </ul>
      </div>
      <div class="col-md-4">
        <form action="List_user_appored_insert_company.php" enctype="multipart/form-data" method="POST">
          <input type="hidden" name="ID" value="<?= htmlspecialchars($cpm_info['ID']); ?>" placeholder="Name">
          <input type="hidden" name="Name_company" value="<?= htmlspecialchars($cpm_info['Name_company']); ?>" placeholder="Name">
          <input type="hidden" name="Email" value="<?= htmlspecialchars($cpm_info['Email']); ?>" placeholder="Email" required>
          <input type="hidden" name="Password" value="<?= htmlspecialchars($cpm_info['Password']); ?>" placeholder="Password">
          <input type="hidden" name="Status" value="<?= htmlspecialchars($cpm_info['Status']); ?>" placeholder="Status">
          <button type="submit" name="user_list_company" class="btn btn-primary btn-lx mt-3 mb-3">ຍອມຮັບ</button>
        </form>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- <div class="container-xl px-4 mt-4">
  <div class="row">
    <div class="col-md-6">
      <ul class="list-group">
        <li class="list-group-item text-center flex-container">
          <div class="border-img">
            <img src="../folder-image/image-cv/1033060701.jpg" alt="Profile Image" class="profile-img">
          </div>
          <span>ຊຶ່ : phongsavath</span>
          <span>ສະຖານທີ : ນະຄອນຫຼວງ</span>
          <span>ສະຖະນະ : ບໍລິສັດ</span><br>
        </li>
        <button type="button" class="btn btn-primary btn-lx mt-3 mb-3">ເບີ່ງຂໍ້ມູນ ເພີ່ມເຕີມ</button>
      </ul>
    </div>
    <div class="col-md-6 ">
      <button type="button" class="btn btn-primary btn-lx mt-3">ຍອມຮັບ</button>
    </div>
    <div class="col-md-6">
      <ul class="list-group">
        <li class="list-group-item text-center flex-container">
          <div class="border-img">
            <img src="../folder-image/image-cv/1033060701.jpg" alt="Profile Image" class="profile-img">
          </div>
          <span>ຊຶ່ : phongsavath</span>
          <span>ສະຖານທີ : ນະຄອນຫຼວງ</span>
          <span>ສະຖະນະ : ບໍລິສັດ</span><br>
        </li>
        <button type="button" class="btn btn-primary btn-lx mt-3 mb-3">ເບີ່ງຂໍ້ມູນ ເພີ່ມເຕີມ</button>
      </ul>
    </div>
    <div class="col-md-6 ">
      <button type="button" class="btn btn-primary btn-lx mt-3">ຍອມຮັບ</button>
    </div>
  </div>
</div> -->

<?php include_once './footer.php' ?>
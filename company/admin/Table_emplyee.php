<?php include_once './header.php'; ?>
<?php
if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $deletestmt = $conn->query("DELETE FROM employees WHERE ID = $delete_id");
  $deletestmt->execute();
}

if (!isset($_SESSION['company_login'])) {
  $_SESSION['error'] = 'ກາລຸນາເຂົ້າສູ່ລະບົບ!';
  header("location: ../../customer/login.php");
}
?>
<div class="mb-4">
  <div class="mb-5">
    <h3 class="fw-bold">ຕາຕະລາງຈັດການ ບັນຊີຜູ້ເຂົ້າໃຊ້ງານ ຂອງພະນັກງານ ບໍລິສັດ</h3>
  </div>
  <div class="row mb-4">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <!-- <button class="btn btn-primary" type="button">ເພີ່ມ <i class="fa-solid fa-user"></button> -->
      <button class="btn btn-primary p-3 fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">ເພີ່ມ <i class="fa-solid fa-plus"></i></button>
    </div>
  </div>
  <table id="myTable" class="table">
    <thead>
      <tr>
        <th scope="col" class="left">ຮູບພາບ</th>
        <th scope="col">ຊື່ ພະນັກງານ</th>
        <th scope="col">ນາມສະກຸນ</th>
        <th scope="col">ຕຳແໜ່ງ</th>
        <th scope="col">ເບີຕິດຕໍ່</th>
        <th scope="col">ອີເມວ</th>
        <th scope="col" class="right">ລາຍການ</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $stmt = $conn->query("SELECT * FROM employees ORDER BY Name_Employee DESC");
      $stmt->execute();
      $user = $stmt->fetchAll();

      if (!$user) {
        echo "<tr><td colspan='6' class='text-center'>ຍັງບໍ່ມີ ບັນຊີຜູ້ໃຊ້ງານ</td></tr>";
      } else {
        foreach ($user as $users) {

      ?>
          <tr>
            <td>
              <img src="image/<?= $users['Profile_picture']; ?>" class="d-block" width="100px" alt="<?= $users['Profile_picture']; ?>">
            </td>
            <td><?= $users['Name_Employee'] ? $users['Name_Employee'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $users['Lname'] ? $users['Lname'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $users['Position'] ? $users['Position'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $users['Tel'] ? $users['Tel'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $users['Email'] ? $users['Email'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td class="actions">
              <div class="actions-btn">
                <a href="Edit_employee.php?id=<?= $users['ID']; ?>" class="btn btn-warning mb-2"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="?delete=<?= $users['ID']; ?>" class="btn btn-danger delete-btn mb-2" data-id="<?= $users['ID']; ?>"><i class="fa-solid fa-trash-arrow-up"></i></a>
              </div>
            </td>
          </tr>
      <?php }
      } ?>
    </tbody>
  </table>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">ເພີ່ມຂໍ້ມູນ ພະນັກງານ</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="insert_employee.php" method="post" enctype="multipart/form-data">

          <div class="modal-body">
            <?php
            if (isset($_SESSION['company_login']))
              $user_id = $_SESSION['company_login'];
            // echo 'User ID' . $user_id;
            $stmt = $conn->query("SELECT * FROM company WHERE ID = $user_id ");
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            
            <input type="text" name="ID_company" value="<?= $user_data['ID'] ?>">
            <input type="text" name="Name_company" value="<?= $user_data['Name_company'] ?>">
            <input type="text" name="Password1" value="<?= $user_data['Password'] ?>">
            <input type="text" name="Email1" value="<?= $user_data['Email'] ?>">
            <input type="text" name="Status" value="<?= $user_data['Status'] ?>">
            <div class="row g-3 needs-validation" novalidate>

              <div class="col-md-4">
                <label for="validationCustom01" class="form-label">ຊື່ ພະນັກງານ</label>
                <input type="text" class="form-control" name="Name_Employee">
              </div>
              <div class="col-md-4">
                <label for="validationCustom02" class="form-label">ນາມສະກຸນ</label>
                <input type="text" class="form-control" name="Lname">
              </div>
              <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">ຕຳແໜ່ງ</label>
                <input type="text" class="form-control" name="Position">
              </div>
              <div class="col-md-4">
                <label for="validationCustom02" class="form-label">ເບີຕິດຕໍ່</label>
                <input type="number" class="form-control" name="Tel">
              </div>
              <div class="col-md-4">
                <label for="validationCustom03" class="form-label">ລະຫັດ</label>
                <input type="password" class="form-control" name="Password">
              </div>
              <div class="col-md-4">
                <label for="validationCustom04" class="form-label">ອີເມວ</label>
                <input type="email" class="form-control" name="Email">
              </div>
              <div class="col-md-12">
                <label for="validationCustom05" class="form-label">ຮູບໂປຣຟາຍ</label><br>
                <input type="file" name="Profile_picture" id="image-company"><br>
                <img width="100%" id="perviewImage" class="mt-4 rounded" alt="" src="image/<?= $company['Profile_picture'] ?>">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
            <button type="submit" name="add" class="btn btn-primary">ບັນທຶກ</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- create function click delete -->

  <?php include_once './footer.php' ?>

  <script>
    $('.delete-btn').click(function(e) {
      var userId = $(this).data('id');
      e.preventDefault();
      deleteConfirm(userId);
    })

    function deleteConfirm(userId) {
      Swal.fire({
        icon: 'warning',
        title: 'ທ່ານໝັ້ນໃຈແລ້ວຫວາ ທີ່ຈະລົບບັນຊີນີ້?',
        text: 'ບັນຊີຈະຖືກລົບອອກຖາວອນ!',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ຍົກເລີກ',
        confirmButtonText: 'ລົບບັນຊີນີ້!',
        showLoaderOnConfirm: true,
        preConfirm: function() {
          return new Promise(function(resolve) {

            $.ajax({
                url: 'Table_emplyee.php',
                type: 'GET',
                data: 'delete=' + userId,
              })
              .done(function() {
                Swal.fire({
                  title: 'ລົບບັນຊີ',
                  text: 'ລົບບັນຊີໄດ້ເປັນທີ່ຮຽບຮ້ອຍແລ້ວ!',
                  icon: 'success'
                }).then(() => {
                  document.location.href = 'Table_emplyee.php';
                })
              })
              .fail(function() {
                Swal.fire('Oops...', 'ມີບາງຢ່າງຜິດພາດໃນ ajax!', 'error');
                window.location.reload();
              })
          })
        }
      })
    }
    let Image_company = document.getElementById('image-company');
    let preview = document.getElementById('perviewImage');
    Image_company.onchange = e => {
      const [file] = Image_company.files;
      if (file) {
        preview.src = URL.createObjectURL(file);
      }
    }
  </script>
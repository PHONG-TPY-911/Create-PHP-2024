<?php include_once './header.php';
if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  $deletestmt = $conn->query("DELETE FROM customer WHERE ID = $delete_id");
  $deletestmt->execute();
}
?>

<div class="mb-4">
  <div class="mb-5">
    <h3 class="fw-bold">ຕາຕະລາງຈັດການ ບັນຊີຜູ້ເຂົ້າໃຊ້ງານ ລາຍການຍອມຮັບຜູ້ໃຊ້ງານ (ຊອກວຽກ)</h3>
    <hr>
  </div>
  <table id="myTable" class="table">
    <thead>
      <tr>
        <th scope="col" class="left">ຊື່</th>
        <th scope="col">ວັນເດືອນປີເກີດ</th>
        <th scope="col">ເພດ</th>
        <th scope="col">ສັນຊາດ</th>
        <th scope="col">ເມືອງ</th>
        <th scope="col">ແຂວງ</th>
        <th scope="col" class="right">ລາຍການ</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $stmt = $conn->query("SELECT * FROM customer WHERE InfoFull = 'passed' ORDER BY Name DESC ");
      $stmt->execute();
      $user = $stmt->fetchAll();

      if (!$user) {
        echo "<tr><td colspan='6' class='text-center'>ຍັງບໍ່ມີ ບັນຊີຜູ້ໃຊ້ງານ ທີ່ໄດ້ຖືກຍອມຮັບແລ້ວ</td></tr>";
      } else {
        foreach ($user as $users) {
      ?>
          <tr>
            <td><?= $users['Name'] ? $users['Name'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $users['DataOfBirth'] ? $users['DataOfBirth'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $users['Gender'] ? $users['Gender'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $users['Nationality'] ? $users['Nationality'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $users['District'] ? $users['District'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td><?= $users['Province'] ? $users['Province'] : "ຍັງບໍ່ມີຂໍ້ມູນ" ?></td>
            <td class="actions">
              <div class="actions-btn">
                <a href="view_customer.php?id=<?= $users['ID']; ?>" class="btn btn-primary mb-2"><i class="fa-solid fa-eye"></i></a>
                <a href="Edit_customer.php?id=<?= $users['ID']; ?>" class="btn btn-warning mb-2"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="?delete=<?= $users['ID']; ?>" class="btn btn-danger delete-btn mb-2" data-id="<?= $users['ID']; ?>"><i class="fa-solid fa-trash-arrow-up"></i></a>
              </div>
            </td>
          </tr>
      <?php  }
      } ?>
    </tbody>
  </table>

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
                url: 'Table_customer.php',
                type: 'GET',
                data: 'delete=' + userId,
              })
              .done(function() {
                Swal.fire({
                  title: 'ລົບບັນຊີ',
                  text: 'ລົບບັນຊີໄດ້ເປັນທີ່ຮຽບຮ້ອຍແລ້ວ!',
                  icon: 'success'
                }).then(() => {
                  document.location.href = 'Table_customer.php';
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
  </script>
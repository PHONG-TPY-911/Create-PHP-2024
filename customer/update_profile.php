<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




<?php
//ການເອີ້ນໃຊ້ session ມາເພື່ອ check ການສະໝັກສະມາຊີກ
session_start();
require_once '../../config/db.php';

if (isset($_POST['submit'])) {
  // $Name = $_POST['name'];
  // $Lname = $_POST['lname'];
  // $Password = $_POST['password'];
  // $C_password = $_POST['C_password'];
  // $Email = $_POST['email'];
  // $Age = "";
  // $DataOfBirth = "";
  // $Village = "";
  // $District = "";
  // $Province = "";
  // $Address = "";
  // $Religion = "";
  // $Study = "";
  // $Education_level = "";
  // $Tel = "";
  // $Status = 'user';
  // $Profile_picture = "";
  // $Declaration = "";
  // $Score = "";
  // $Cv = "";

    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $street = $_POST['street'];
    $village = $_POST['village'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $img = $_FILES['img'];


    $img2 = $_POST['img2'];
    $upload = $_FILES['img']['name'];
    if ($upload != '') {
        //filename.jpg
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode(".", $img['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;
        $filePath = "img/" . $fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($img['size'] > 0 && $img['error'] == 0) {
                move_uploaded_file($img['tmp_name'], $filePath);
            }
        }
    } else {
        $fileNew = $img2;
    }
    // $allow = array('jpg', 'jpeg', 'png');
    // $extension = explode(".", $img['name']);
    // $fileActExt = strtolower(end($extension));
    // $fileNew = rand() . "." . $fileActExt;
    // $filePath = "img/" . $fileNew;

    // $path = "img/" . $_FILES['img']['name'];
    // move_uploaded_file($_FILES['img']['tmp_name'], $filePath);
    if ($img['size'] > 0) {
        $stmt = $conn->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, street = :street, village = :village, district = :district, province = :province, tel = :tel, email = :email, img = :img WHERE id = :id ");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":street", $street);
        $stmt->bindParam(":village", $village);
        $stmt->bindParam(":district", $district);
        $stmt->bindParam(":province", $province);
        $stmt->bindParam(":tel", $tel);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":img", $fileNew);
        $stmt->execute();
        // $_SESSION['success'] = "ອັບເດດຂໍ້ມູນຮຽບຮ້ອຍແລ້ວ";
        echo "<script>
                            $(document).ready(function() {
                                Swal.fire({
                                    title: 'ອັບເດດ',
                                    text: 'ອັບເດດຂໍ້ມູນບັນຊີ ແລະ ຮູບພາບຮຽບຮ້ອຍແລ້ວ',
                                    icon: 'success',
                                    timer: 5000,
                                    showConfirmButton: false
                                });
                            });
                            
                            </script>";
        header("refresh:2; url=../admin-new/index.php");
    } else {
        $stmt = $conn->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, street = :street, village = :village, district = :district, province = :province, tel = :tel, email = :email  WHERE id = :id ");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":street", $street);
        $stmt->bindParam(":village", $village);
        $stmt->bindParam(":district", $district);
        $stmt->bindParam(":province", $province);
        $stmt->bindParam(":tel", $tel);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        // $_SESSION['success'] = "ອັບເດດຂໍ້ມູນຮຽບຮ້ອຍແລ້ວ";
        echo "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                title: 'ອັບເດດ',
                                text: 'ອັບເດດຂໍ້ມູນບັນຊີຮຽບຮ້ອຍແລ້ວ',
                                icon: 'success',
                                timer: 5000,
                                showConfirmButton: false
                            });
                        });
                        
                        </script>";
        header("refresh:2; url=../admin-new/index.php");
    }
} else {
    $_SESSION['error'] = "ມີຢ່າງຜິດພາດ";
    header("location: ../admin-new/index.php");
}
?>
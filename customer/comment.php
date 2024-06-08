<?php

require '../../config/db.php';

if (isset($_POST['submit'])) {
    $body = $_POST['comment'];
    $car_id = $_POST['info'];
    $user_id = $_POST['user_id'];

   
    $sql = $conn->prepare("INSERT INTO comment(body, car_id, user_id ) VALUES( :comment, :info, :user_id )");
    $sql->bindParam(':comment', $body);
    $sql->bindParam(':info',  $car_id);
    $sql->bindParam(':user_id', $user_id);
    $sql->execute();

    if ($sql) {
        echo "<script>alert('ຄອມເມັ້ນສຳເລັດແລ້ວ');</script>";
        header("location: product-detail.php?id=$car_id");
    }
     else {
        $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
        header("location: product-detail.php");
    }

}
?>
<?php

require '../connect-database/config.php';

if (isset($_POST['comment_Post_work'])) {
    $Comment_content = $_POST['Comment_content'];
    $Time = $_POST['Time'];
    $ID_work = $_POST['ID_work'];
    $ID_user = $_POST['ID_user'];

    if (empty($Comment_content)) {
        $_SESSION['error'] = 'ກາລຸນາປ້ອນຂໍ້ຄວາມ';
        header("location: job-details.php?id=$ID_work");
    } else {

        $sql = $conn->prepare("INSERT INTO comment(Comment_content, Time, ID_work, ID_user) VALUES( :Comment_content, :Time, :ID_work, :ID_user)");
        $sql->bindParam(':Comment_content', $Comment_content);
        $sql->bindParam(':Time', $Time);
        $sql->bindParam(':ID_work',  $ID_work);
        $sql->bindParam(':ID_user', $ID_user);
        $sql->execute();

        if ($sql) {
            echo "<script>alert('ຄອມເມັ້ນສຳເລັດແລ້ວ');</script>";
            header("location: job-details.php?id=$ID_work");
        } else {
            $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
            header("location: job-details.php");
        }
    }
}

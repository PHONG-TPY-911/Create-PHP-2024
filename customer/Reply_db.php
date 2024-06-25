<?php

require '../connect-database/config.php';

if (isset($_POST['reply_comment_Post_work'])) {
  $Reply_comment_content = $_POST['Reply_comment_content'];
  $Times = $_POST['Times'];
  $ID_works = $_POST['ID_works'];
  $ID_users = $_POST['ID_users'];
  $Reply_user_ID = $_POST['Reply_user_ID'];
  $parent_id = $_POST['parent_id'];
  $ID_comment = $_POST['ID_comment'];

  if (empty($Reply_comment_content)) {
    $_SESSION['error'] = 'ກາລຸນາປ້ອນຂໍ້ຄວາມ';
    header("location: job-details.php?id=$ID_works");
  } else {
    $sql = $conn->prepare("INSERT INTO reply(Reply_comment_content, Times, ID_works, ID_users, Reply_user_ID, parent_id, ID_comment ) VALUES( :Reply_comment_content, :Times, :ID_works, :ID_users, :Reply_user_ID, :parent_id, :ID_comment)");
    $sql->bindParam(':Reply_comment_content', $Reply_comment_content);
    $sql->bindParam(':Times', $Times);
    $sql->bindParam(':ID_works',  $ID_works);
    $sql->bindParam(':ID_users', $ID_users);
    $sql->bindParam(':Reply_user_ID', $Reply_user_ID);
    $sql->bindParam(':parent_id', $parent_id);
    $sql->bindParam(':ID_comment', $ID_comment);
    $sql->execute();

    if ($sql) {
      echo "<script>alert('ຄອມເມັ້ນສຳເລັດແລ້ວ');</script>";
      header("location: job-details.php?id=$ID_works");
    } else {
      $_SESSION['error'] = "ມີບາງຢ່າງເກິດການຜິດພາດ ບໍ່ສາມາດເພີ່ມຂໍ້ມູນາສຳເລັດ";
      header("location: job-details.php");
    }
  }
}

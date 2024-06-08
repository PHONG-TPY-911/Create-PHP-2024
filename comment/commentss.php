<?php
session_start();
require_once '../connect-database/new_config.php';

if (!isset($_SESSION['user_login'])) {
  header("location: login.php");
  exit;
}
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_id = $_SESSION['user_login'];
  $content = $_POST['comment'];

  $stmt = $conn->prepare("INSERT INTO comments (user_id, content) VALUES (:user_id, :content)");
  $stmt->bindParam(':user_id', $user_id);
  $stmt->bindParam(':content', $content);

  if ($stmt->execute()) {
    header("Location: comments.php");
  } else {
    echo "Error: " . $stmt->errorInfo();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pro Comments</title>
</head>

<body>
  <form id="comment-form" action="submit_comment.php" method="POST">
    <textarea name="comment" placeholder="Write a comment..." required></textarea>
    <button type="submit">Submit</button>
  </form>


  <form id="reply-form" action="submit_reply.php" method="POST" style="display:none;">
    <input type="hidden" name="comment_id" id="comment_id">
    <textarea name="reply" placeholder="Write a reply..." required></textarea>
    <button type="submit">Submit</button>
  </form>

  <!-- JavaScript to show reply form -->
  <script>
    function showReplyForm(commentId) {
      document.getElementById('comment_id').value = commentId;
      document.getElementById('reply-form').style.display = 'block';
    }
  </script>

</body>

</html>
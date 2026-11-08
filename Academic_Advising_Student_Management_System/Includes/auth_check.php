 <!-- Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953 -->
<?php
// هذا الملف يحتوي على حارس البوابة فقط
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Frontend/login.php");
    exit();
}
?>
<?php
session_start();
session_unset(); // مسح جميع متغيرات الجلسة
session_destroy(); // تدمير الجلسة
header("Location: ../Frontend/Public_and_Customer_Pages/login.php");
exit();
?>
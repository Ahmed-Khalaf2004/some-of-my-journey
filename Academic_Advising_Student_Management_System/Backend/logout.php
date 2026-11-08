<?php
/*
  Full Name: Ahmed Amjad Ibrahim Khalaf
  University ID: 20220953
*/
require_once "../Includes/config.php"; 
session_unset();  
session_destroy();  
header("Location: ../Frontend/login.php");
exit();
?>
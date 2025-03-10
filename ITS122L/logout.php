<?php
   session_start();
   unset($_SESSION["ad_email"]);
   unset($_SESSION["ad_pass"]);
   
// Redirect to login page after 1 second
header('Refresh: 0; URL=adminlogin.php');
exit();
?>
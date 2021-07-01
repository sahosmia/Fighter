<?php
if (!isset($_SESSION['log_chack'])) {
   $_SESSION['deny_error'] = "please Log in first";
   header("location: ../authentication/login.php");
}

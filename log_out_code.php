<?php
session_start();
unset($_SESSION['log_chack']);
unset($_SESSION['log_chack_email']);
header("location: login.php");

<?php
session_start();
unset($_SESSION['log_chack_email']);
unset($_SESSION['log_chack']);

header("location: login.php");

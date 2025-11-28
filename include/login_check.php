<?php
session_start();

if (!isset($_SESSION['auth'])) {
    $_SESSION['deny_error'] = "Please log in first!";
    header("Location: ../authentication/login.php");
    exit();
}

<?php

session_start();
// veriable
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


// session veriable
$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['confirm_password'] = $_POST['confirm_password'];


// if condition start
if (!$name) {
   $_SESSION['name_error'] = "name filde is requried";
}
if (!$email) {
   $_SESSION['email_error'] = "email filde is requried";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $_SESSION['email_error2'] = "it is not valid email";
}
if (!$password) {
   $_SESSION['password_error'] = "password filde is requried";
}
if (!$confirm_password) {
   $_SESSION['confirm_password_error'] = "confirm password filde is requried";
} elseif ($confirm_password != $password) {
   $_SESSION['confirm_password_error2'] = "confirm password is mot match";
}
header("location: index.php");

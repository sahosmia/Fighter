<?php
include '../include/db.php';
include '../include/function.php';
$id = $_SESSION['auth']['id'];
$old_password_session = $_SESSION['auth']['password'];
$error = false;

$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

$_SESSION['update_old_password'] = $_POST['old_password'];
$_SESSION['update_new_password'] = $_POST['new_password'];
$_SESSION['update_confirm_password'] = $_POST['confirm_password'];


// if condition start
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (!$old_password) {
      $_SESSION['update_old_password_requried'] = "*Old Password filde is requried";
      $error = true;
   } elseif (md5($old_password) != $old_password_session) {
      $_SESSION['update_old_password_invalid'] = "*Your old password is wrong.";
      $error = true;
   }
   if (!$new_password) {
      $_SESSION['update_new_password_requried'] = "*new Password filde is requried";
      $error = true;
   }

   if (!$confirm_password) {
      $_SESSION['update_confirm_password_requried'] = "*Confirm Password filde is requried";
      $error = true;
   } elseif ($new_password != $confirm_password) {
      $_SESSION['update_confirm_password_match'] = "*Confirm Password is not match with new password";
      $error = true;
   }

   if ($error == false) {                  // error not show
      $md5_password = md5($new_password);
      $update_query = "UPDATE users SET password ='$md5_password' WHERE id = '$id'";
      mysqli_query($db_connect, $update_query);
      $_SESSION['auth']['password'] = $md5_password;
      $_SESSION['password_update_success'] = "You are success to update your password";
      redirect("edit.php");
   } else {
redirect("edit.php");
   }
}

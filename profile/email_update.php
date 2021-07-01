<?php
include '../include/db.php';

$email = $_POST['email'];
$old_email = $_SESSION['auth']['email'];
$id = $_SESSION['auth']['id'];
$_SESSION['update_email'] = $_POST['email'];
$error = false;

// if condition start
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (!$email) {
      $_SESSION['update_email_requried'] = "*Email filde is requried";
      $error = true;
   } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['update_email_invalid'] = "*Your new email is invalid.";
      $error = true;
   }

   if ($error == false) {                  // error not show
      $email_query = "SELECT COUNT(*) AS count FROM users WHERE email = '$email'";   //chack email is resgisted or not query
      $email_form_db = mysqli_query($db_connect, $email_query);

      $email_assoc = mysqli_fetch_assoc($email_form_db);

      if ($email_assoc['count'] == 0) {                       // email not exist
         $update_query = "UPDATE users SET email ='$email' WHERE id = '$id'";
         mysqli_query($db_connect, $update_query);
         $_SESSION['auth']['email'] = $email;
         $_SESSION['email_update_success'] = "You are success to update your email form $old_email to $email";
         header("location: edit.php");
      } else {             // email exist
         $_SESSION['update_email_exist'] = "*This email is alrady exist";
         header("location: edit.php");
      }
   } else {
      header("location: edit.php");
   }
}

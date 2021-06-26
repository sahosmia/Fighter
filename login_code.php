<?php

session_start();
include 'include/db.php';

// veriable
$email = $_POST['email'];
$password = $_POST['password'];

// session veriable
$_SESSION['log_email'] = $_POST['email'];
$_SESSION['log_password'] = $_POST['password'];


// if condition start
$error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // email
   if (!$email) {
      $_SESSION['log_email_error'] = "email filde is requried";
      $error = true;
   }
   // password
   if (!$password) {
      $_SESSION['log_password_error'] = "password filde is requried";
      $error = true;
   }

   if ($error == false) {                  // error 
      $email_query = "SELECT COUNT(*) AS count FROM users WHERE email = '$email'";
      $email_form_db = mysqli_query($db_connect, $email_query);
      $email_assoc = mysqli_fetch_assoc($email_form_db);
      if ($email_assoc['count'] == 1) {                    // check registered email
         $after_encript_password = md5($password);
         $password_query = "SELECT COUNT(*) AS count FROM users WHERE email = '$email' AND password = '$after_encript_password'";
         $password_form_db = mysqli_query($db_connect, $password_query);
         $password_assoc = mysqli_fetch_assoc($password_form_db);
         if ($password_assoc['count'] == 1) {               // password check
            $_SESSION['log_chack'] = true;
            $_SESSION['log_chack_email'] = "$email";
            header("location: index.php");
         } else {
            $_SESSION['log_password_error2'] = "Your password is wrong";
            header("location: login.php");
         }
      } else {
         $_SESSION['log_email_error2'] = "this email is not registed";
         header("location: login.php");
      }
   } else {
      header("location: login.php");
   }
}

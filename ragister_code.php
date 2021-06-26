<?php

session_start();
include 'include/db.php';

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
$error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // name
   if (!$name) {
      $_SESSION['name_error'] = "name filde is requried";
      $error = true;
   }
   // email
   if (!$email) {
      $_SESSION['email_error'] = "email filde is requried";
      $error = true;
   } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['email_error2'] = "it is not valid email";
      $error = true;
   }
   // password
   if (!$password) {
      $_SESSION['password_error'] = "password filde is requried";
      $error = true;
   }
   // conform password
   if (!$confirm_password) {
      $_SESSION['confirm_password_error'] = "confirm password filde is requried";
      $error = true;
   } elseif ($confirm_password != $password) {
      $_SESSION['confirm_password_error2'] = "confirm password is not match";
      $error = true;
   }
   // error
   if ($error == false) {                                      // error
      $email_query = "SELECT COUNT(*) AS count FROM users WHERE email = '$email'";
      $email_form_db = mysqli_query($db_connect, $email_query);
      $email_assoc = mysqli_fetch_assoc($email_form_db);
      if ($email_assoc['count'] == 0) {                       // check email exist
         $after_encript_password = md5($password);
         $insert_query =  "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$after_encript_password')";
         mysqli_query($db_connect, $insert_query);
         $_SESSION['reg_success'] = "Register successfull. You can log in now";
         header("location: login.php");
      } else {
         $_SESSION['email_error3'] = "this email is alrady exist";
         header("location: register.php");
      }
   } else {
      header("location: register.php");
   }
}

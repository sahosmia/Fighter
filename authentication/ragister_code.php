<?php

require_once '../include/function.php';

// veriable
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


// session veriable
$_SESSION['reg_name'] = $_POST['name'];
$_SESSION['reg_email'] = $_POST['email'];
$_SESSION['reg_password'] = $_POST['password'];
$_SESSION['reg_confirm_password'] = $_POST['confirm_password'];


// if condition start
$error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // name
   if (!$name) {
      $_SESSION['reg_name_requried'] = "*Name filde is requried";
      $error = true;
   }
   // email
   if (!$email) {
      $_SESSION['reg_email_requried'] = "*Email filde is requried";
      $error = true;
   } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['reg_email_invalid'] = "*It is not valid email";
      $error = true;
   }
   // password
   if (!$password) {
      $_SESSION['reg_password_requried'] = "*Password filde is requried";
      $error = true;
   }
   // conform password
   if (!$confirm_password) {
      $_SESSION['reg_confirm_password_requried'] = "*Confirm Password filde is requried";
      $error = true;
   } elseif ($confirm_password != $password) {
      $_SESSION['confirm_password_match'] = "*Don't Match Your Confirm password with Pssword";
      $error = true;
   }

   // error == false 
   if ($error == false) {
      $email_query = "SELECT COUNT(*) AS count FROM users WHERE email = '$email'";   //chack email is resgisted or not query
      $email_form_db = mysqli_query(db(), $email_query);
      $email_assoc = mysqli_fetch_assoc($email_form_db);
      if ($email_assoc['count'] == 0) {                       // email not exist
         $after_encript_password = md5($password);
         $insert_query =  "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$after_encript_password')";
         mysqli_query(db(), $insert_query);
         $_SESSION['reg_success'] = "Register successfull. You can log in now";
         header("location: login.php");
      } else {             // email exist
         $_SESSION['reg_email_exist'] = "*This email is alrady exist";
         header("location: register.php");
      }
   } else {            // error == true
      header("location: register.php");
   }
} else {
   header("location: register.php");
}

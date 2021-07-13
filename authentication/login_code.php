<?php
require_once '../include/function.php';

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
      $_SESSION['log_email_requried'] = "*Email filde is requried";
      $error = true;
   }

   // password
   if (!$password) {
      $_SESSION['log_password_requried'] = "*Password filde is requried";
      $error = true;
   }

   if ($error == false) {                  // error not show
      $email_query = "SELECT COUNT(*) AS count FROM users WHERE email = '$email'";
      $email_form_db = mysqli_query(db(), $email_query);
      $email_assoc = mysqli_fetch_assoc($email_form_db);
      if ($email_assoc['count'] == 1) {                    // check registered email
         $after_encript_password = md5($password);
         $password_query = "SELECT COUNT(*) AS count FROM users WHERE email = '$email' AND password = '$after_encript_password'";
         $password_form_db = mysqli_query(db(), $password_query);
         $password_assoc = mysqli_fetch_assoc($password_form_db);
         if ($password_assoc['count'] == 1) {
            $select_query =  "SELECT * FROM users WHERE email = '$email'";
            $db_mysqli_query = mysqli_query(db(), $select_query);
            $select_assoc = mysqli_fetch_assoc($db_mysqli_query);
            $_SESSION['auth'] = array('id' => $select_assoc['id'], 'name' => $select_assoc['name'], 'email' => $email, 'password' => $select_assoc['password']);
            $_SESSION['log_chack'] = true;
            header("location: ../dasbord/dasbord.php");
         } else {
            $_SESSION['log_password_wrong'] = "*Your password is wrong";
            header("location: login.php");
         }
      } else {
         $_SESSION['log_valid_email'] = "*This email is not registed";
         header("location: login.php");
      }
   } else {
      header('location:' . $_SERVER['HTTP_REFERER']);
   }
}

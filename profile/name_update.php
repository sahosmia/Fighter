<?php
include '../include/db.php';

$name = $_POST['name'];
$old_name = $_SESSION['auth']['name'];
$id = $_SESSION['auth']['id'];
$_SESSION['update_name'] = $_POST['name'];
$error = false;

// if condition start
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (!$name) {
      $_SESSION['update_name_requried'] = "Name filde is requried";
      $error = true;
   } elseif (strlen($name) < 4) {
      $_SESSION['update_name_short'] = "Your new name is too short. Minimum 4 caracter need";
      $error = true;
   }

   if ($error == false) {                  // error not show
      $update_query = "UPDATE users SET name='$name' WHERE id = '$id'";
      mysqli_query($db_connect, $update_query);
      $_SESSION['auth']['name'] = $name;
      $_SESSION['name_update_success'] = "You are success to update your name form $old_name to $name";
      header("location: edit.php");
   } else {
      header("location: edit.php");
   }
}

<?php
require_once '../include/function.php';

// veriable
$auto_counter_title = $_POST['auto_counter_title'];
$auto_counter_value = $_POST['auto_counter_value'];
$auto_counter_logo = $_POST['auto_counter_logo'];


// session veriable
$_SESSION['auto_counter_title'] = $_POST['auto_counter_title'];
$_SESSION['auto_counter_value'] = $_POST['auto_counter_value'];
$_SESSION['auto_counter_logo'] = $_POST['auto_counter_logo'];

$date = date('Y-m-d H:i:s');
$auth = $_SESSION['auth']['id'];


// echo $auto_counter_title;
// print_r($_POST);
// die();
// if condition start
$error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Title
   if (!$auto_counter_title) {
      $_SESSION['auto_counter_title_requried'] = "*auto_counter Title filde is requried";
      $error = true;
   }
   // value
   if (!$auto_counter_value) {
      $_SESSION['auto_counter_value_requried'] = "*auto_counter value is requried";
      $error = true;
   }
   // logo
   if (!$auto_counter_logo) {
      $_SESSION['auto_counter_logo_requried'] = "*Please select your auto_counter logo";
      $error = true;
   }

   // // error == false 
   if ($error == false) {
      $auto_counter_title_query = "SELECT COUNT(*) AS count FROM auto_counters WHERE title = '$auto_counter_title'";   //chack auto_counter_title is resgisted or not query
      $auto_counter_title_form_db = mysqli_query(db(), $auto_counter_title_query);
      $auto_counter_title_assoc = mysqli_fetch_assoc($auto_counter_title_form_db);
      if ($auto_counter_title_assoc['count'] == 0) {                       // auto_counter_title not exist
         $insert_query =  "INSERT INTO auto_counters (title, value, logo, added_by, created_at) VALUES ('$auto_counter_title', '$auto_counter_value', '$auto_counter_logo', '$auth', '$date')";
         mysqli_query(db(), $insert_query);
         $_SESSION['auto_counter_success'] = "auto_counter Add successfull.";

         redirect("auto_counter.php");
      } else {             // auto_counter title exist
         $_SESSION['auto_counter_title_exist'] = "*This auto_counter title is alrady exist";
         redirect("auto_counter.php");
      }
   } else {            // error == true
      redirect("auto_counter.php");
   }
}

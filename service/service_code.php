<?php
require_once '../include/function.php';

// veriable
$service_title = $_POST['service_title'];
$service_description = $_POST['service_description'];
$service_icon = $_POST['service_icon'];


// session veriable
$_SESSION['service_title'] = $_POST['service_title'];
$_SESSION['service_description'] = $_POST['service_description'];
$_SESSION['service_icon'] = $_POST['service_icon'];

$date = date('Y-m-d H:i:s');
$auth = $_SESSION['auth']['id'];


// echo $auth;
// die();
// if condition start
$error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Title
   if (!$service_title) {
      $_SESSION['service_title_requried'] = "*service Title filde is requried";
      $error = true;
   }
   // description
   if (!$service_description) {
      $_SESSION['service_description_requried'] = "*service description is requried";
      $error = true;
   }
   // icon
   if (!$service_icon) {
      $_SESSION['service_icon_requried'] = "*Please select your service icon";
      $error = true;
   }

   // // error == false 
   if ($error == false) {
      $service_title_query = "SELECT COUNT(*) AS count FROM services WHERE service_title = '$service_title'";   //chack service_title is resgisted or not query
      $service_title_form_db = mysqli_query($db_connect, $service_title_query);
      $service_title_assoc = mysqli_fetch_assoc($service_title_form_db);
      if ($service_title_assoc['count'] == 0) {                       // service_title not exist
         $insert_query =  "INSERT INTO services (service_title, service_description, service_icon, added_by, created_at) VALUES ('$service_title', '$service_description', '$service_icon', '$auth', '$date')";
         mysqli_query($db_connect, $insert_query);
         $_SESSION['service_success'] = "service Add successfull.";
         header("location: service.php");
      } else {             // service title exist
         $_SESSION['service_title_exist'] = "*This service title is alrady exist";
         header("location: service.php");
      }
   } else {            // error == true
      header("location: service.php");
   }
}

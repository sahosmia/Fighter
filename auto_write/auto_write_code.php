<?php
require_once '../include/function.php';


// veriable
$title = $_POST['auto_write_title'];

$date = date('Y-m-d H:i:s');
$auth = $_SESSION['auth']['id'];

// session veriable
$_SESSION['auto_write_title'] = $_POST['auto_write_title'];


// if condition start
$error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // name
   if (!$title) {
      $_SESSION['auto_write_title_requried'] = "*Title filde is requried";
      $error = true;
   }


   // // error == false 
   if ($error == false) {
      $title_query = "SELECT COUNT(*) AS count FROM auto_writes WHERE auto_write_title = '$title'";   //chack auto_write_title is resgisted or not query
      $title_form_db = mysqli_query(db(), $title_query);
      $title_assoc = mysqli_fetch_assoc($title_form_db);
      if ($title_assoc['count'] == 0) {                       // auto_write_title not exist
         $insert_query =  "INSERT INTO auto_writes (auto_write_title, added_by, created_at) VALUES ('$title', '$auth', '$date')";
         mysqli_query(db(), $insert_query);
         $_SESSION['auto_write_success'] = "Title Add successfull.";
         header("location: auto_write.php");
      } else {             // auto_write title exist
         $_SESSION['auto_write_title_exist'] = "*This auto write title is alrady exist";
         header("location: auto_write.php");
      }
   } else {            // error == true
      header("location: auto_write.php");
   }
} else {
   header('location:' . $_SERVER['HTTP_REFERER']);
}


// error 
// input "I'm programmer " not working

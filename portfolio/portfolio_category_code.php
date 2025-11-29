<?php
require_once '../include/function.php';
// session veriable
$_SESSION['portfolio_category'] = $_POST['portfolio_category'];

// veriable
$portfolio_category = $_POST['portfolio_category'];

$error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // img

   if (!$_POST['portfolio_category']) {
      $_SESSION['portfolio_category_requried'] = "*portfolio_category filde is requried";
      $error = true;
   }

   if ($error == false) {
      $insert_query =  "INSERT INTO portfolio_categories (name, added_by, created_at) VALUES ('$portfolio_category', '$auth', '$date')";
      mysqli_query(db(), $insert_query);
      $_SESSION['portfolio_categories_success'] = "portfolio Add successfull.";
      back();
   } else {            // error == true
      back();
   }
} else {            // error == true
   back();
}

<?php
require_once '../include/function.php';
// session veriable
$_SESSION['protfolio_catagory'] = $_POST['protfolio_catagory'];

// veriable
$protfolio_catagory = $_POST['protfolio_catagory'];



// echo $protfolio_catagory;
// die();
// if condition start


$error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // img

   if (!$_POST['protfolio_catagory']) {
      $_SESSION['protfolio_catagory_requried'] = "*protfolio_catagory filde is requried";
      $error = true;
   }


   // // error == false 
   if ($error == false) {
      $insert_query =  "INSERT INTO protfolio_catagories (name, added_by, created_at) VALUES ('$protfolio_catagory', '$auth', '$date')";
      mysqli_query(db(), $insert_query);
      $_SESSION['protfolio_catagories_success'] = "protfolio Add successfull.";
      header("location: protfolio_catagory.php");
   } else {            // error == true
      header("location: protfolio_catagory.php");
   }
} else {            // error == true
   header("location: protfolio_catagory.php");
}

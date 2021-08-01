<?php
require_once '../include/function.php';
// session veriable
$_SESSION['protfolio_img'] = $_FILES['protfolio_img'];
$_SESSION['catagory'] = $_POST['catagory'];
$catagory = $_POST['catagory'];

// veriable
$img = $_FILES['protfolio_img']['name'];
$img_explode = explode('.', $img);
$img_ext = end($img_explode);
$extensions = array("jpeg", "jpg", "png");




// print_r($_FILES['protfolio_img']);
// print_r($_POST);
// echo "done";
// echo $_POST['catagory'];
// header("location: protfolio.php");

// die();
// if condition start


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // img

   if (!$_POST['catagory']) {
      $_SESSION['catagory_requried'] = "*catagory filde is requried";
      $error = true;
   }
   if (!$_FILES['protfolio_img']['name']) {
      $_SESSION['protfolio_img_requried'] = "*protfolio img filde is requried";
      $error = true;
   }

   if (!in_array($img_ext, $extensions) == false) {
      $_SESSION['protfolio_img_extention'] = "*protfolio img extention not a img extention";
      $error = true;
   }
   // echo $error;
   // die();
   // // error == false 
   if ($error == false) {
      $new_name = rand(1000, 99999) . "." . $img_ext;
      $temp_loc = $_FILES['protfolio_img']['tmp_name'];
      $new_loc = '../upload/protfolio/' . $new_name;
      move_uploaded_file($temp_loc, $new_loc);
      // $insert_query =  "INSERT INTO protfolios (img, catagory_id, added_by, created_at) VALUES ('$new_name', '$catagory' '$auth', '$date')";
      // $insert_query =  "INSERT INTO protfolios (img, catagory_id, added_by, created_at) VALUES ('$new_name', '$catagory' '$auth', '$date')";
      $insert_query =  "INSERT INTO protfolios (img, catagory_id, added_by, created_at) VALUES ('$new_name', '$catagory', '$auth', '$date')";
      mysqli_query(db(), $insert_query);
      $_SESSION['protfolio_success'] = "protfolio Add successfull.";
      header("location: protfolio.php");
   } else {            // error == true
      header("location: protfolio.php");
   }
} else {            // error == true
   header("location: protfolio.php");
}

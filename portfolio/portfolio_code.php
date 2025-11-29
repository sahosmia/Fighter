<?php
require_once '../include/function.php';
// session veriable
$_SESSION['portfolio_img'] = $_FILES['portfolio_img'];
$_SESSION['category'] = $_POST['category'];
$category = $_POST['category'];

// veriable
$img = $_FILES['portfolio_img']['name'];
$img_explode = explode('.', $img);
$img_ext = end($img_explode);
$extensions = array("jpeg", "jpg", "png", "gif", "JPG", "JPEG", "PNG", "GIF");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // img

   if (!$_POST['category']) {
      $_SESSION['category_requried'] = "*category filde is requried";
      $error = true;
   }
   if (!$_FILES['portfolio_img']['name']) {
      $_SESSION['portfolio_img_requried'] = "*portfolio img filde is requried";
      $error = true;
   }

   if (!in_array($img_ext, $extensions) == false) {
      $_SESSION['portfolio_img_extention'] = "*portfolio img extention not a img extention";
      $error = true;
   }
   // echo $error;
   // die();
   // // error == false 
   if ($error == false) {
      $new_name = rand(1000, 99999) . "." . $img_ext;
      $temp_loc = $_FILES['portfolio_img']['tmp_name'];
      $new_loc = '../upload/portfolio/' . $new_name;
      move_uploaded_file($temp_loc, $new_loc);
      $insert_query =  "INSERT INTO portfolios (img, category_id, added_by, created_at) VALUES ('$new_name', '$category', '$auth', '$date')";
      mysqli_query(db(), $insert_query);
      $_SESSION['portfolio_success'] = "portfolio Add successfull.";
      back();
   } else {            // error == true
      back();
   }
} else {            // error == true
   back();
}

<?php
// print_r($_POST);
require_once '../include/function.php';



$type = $_POST['type'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

   //  ****************        banner img           ****************

   if ($type == 'banner_img') {
      $img = $_FILES['banner_img']['name'];
      $img_explode = explode('.', $img);
      $img_ext = end($img_explode);
      $extensions = array("jpeg", "jpg", "png", "gif", "JPG", "JPEG", "PNG", "GIF");

      if (!$_FILES['banner_img']['name']) {
         $_SESSION['banner_img_requried'] = "*banner_img filde is requried";
         $error = true;
      }

      if (in_array($img_ext, $extensions) == false) {
         $_SESSION['banner_img_extention'] = "*banner img extention not a img extention";
         $error = true;
      }


      if ($error == false) {
         $new_name = "banner." . $img_ext;
         $temp_loc = $_FILES['banner_img']['tmp_name'];
         $new_loc = '../upload/banner/' . $new_name;
         $old_img = '../upload/banner/' . settings_data_read("banner");
         unlink($old_img);
         move_uploaded_file($temp_loc, $new_loc);
         $update_query =  "UPDATE settings SET val = '$new_name' WHERE item = 'banner'";
         mysqli_query(db(), $update_query);
         $_SESSION['banner_success'] = "banner Add successfull.";
         back();
      } else {            // error == true
         back();
      }
   }

   //  ****************        about img           ****************

   if ($type == 'about_img') {
      $img = $_FILES['about_img']['name'];
      $img_explode = explode('.', $img);
      $img_ext = end($img_explode);
      $extensions = array("jpeg", "jpg", "png", "gif", "JPG", "JPEG", "PNG", "GIF");

      if (!$_FILES['about_img']['name']) {
         $_SESSION['about_img_requried'] = "*about_img filde is requried";
         $error = true;
      }

      if (in_array($img_ext, $extensions) == false) {
         $_SESSION['about_img_extention'] = "*banner img extention not a img extention";
         $error = true;
      }


      if ($error == false) {
         $new_name = "about." . $img_ext;
         $temp_loc = $_FILES['about_img']['tmp_name'];
         $new_loc = '../upload/about/' . $new_name;
         $old_img = '../upload/about/' . settings_data_read("about_img");
         unlink($old_img);
         move_uploaded_file($temp_loc, $new_loc);
         $update_query =  "UPDATE settings SET val = '$new_name' WHERE item = 'about_img'";
         mysqli_query(db(), $update_query);
         $_SESSION['about_success'] = "about Add successfull.";
         back();
      } else {            // error == true
         back();
      }
   }

   //  ****************        description            ****************

   if ($type == 'description') {
      $_SESSION['about_des'] = $_POST['about_des'];
      $_SESSION['footer_des'] = $_POST['footer_des'];


      $about_des = $_POST['about_des'];
      $footer_des = $_POST['footer_des'];


      if (!$_POST['about_des']) {
         $_SESSION['about_des_requried'] = "*about_des filde is requried";
         $error = true;
      }
      if (!$_POST['footer_des']) {
         $_SESSION['footer_des_requried'] = "*footer_des filde is requried";
         $error = true;
      }


      if ($error == false) {
         $update_query =  "UPDATE settings SET val = '$about_des' WHERE item = 'about_des'";
         mysqli_query(db(), $update_query);
         $update_query =  "UPDATE settings SET val = '$footer_des' WHERE item = 'footer_des'";
         mysqli_query(db(), $update_query);

         echo "done";
         $_SESSION['about_success'] = "about Add successfull.";
         back();
      } else {            // error == true
         back();
      }
   }

   //  ****************        banner img           ****************

   if ($type == 'socail_midia') {
      $_SESSION['facebook'] = $_POST['facebook'];
      $_SESSION['twitter'] = $_POST['twitter'];
      $_SESSION['tumblr'] = $_POST['tumblr'];
      $_SESSION['linkedin'] = $_POST['linkedin'];

      $about_des = $_POST['about_des'];
      $footer_des = $_POST['footer_des'];
      $tumblr = $_POST['tumblr'];
      $linkedin = $_POST['linkedin'];

      if (!$_POST['about_des']) {
         $_SESSION['about_des_requried'] = "*about_des filde is requried";
         $error = true;
      }
      if (!$_POST['footer_des']) {
         $_SESSION['footer_des_requried'] = "*footer_des filde is requried";
         $error = true;
      }
      if (!$_POST['tumblr']) {
         $_SESSION['tumblr_requried'] = "*tumblr filde is requried";
         $error = true;
      }
      if (!$_POST['linkedin']) {
         $_SESSION['linkedin_requried'] = "*linkedin filde is requried";
         $error = true;
      }

      if ($error == false) {

         foreach ($_POST as $data => $val) {

            $update_query =  "UPDATE settings SET val = '$val' WHERE item = '$data'";
            mysqli_query(db(), $update_query);
         }

         $_SESSION['about_success'] = "about Add successfull.";
         back();
      } else {            // error == true
         back();
      }
   }
}
back();

<?php
require_once '../include/function.php';
$id = $_POST['id'];
$table_name = 'teams';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if ($_POST['action_type'] == 'all') {
      $_SESSION['team_update_name'] = $_POST['team_update_name'];
      $_SESSION['team_update_title'] = $_POST['team_update_title'];
      $_SESSION['team_update_facebook'] = $_POST['team_update_facebook'];
      $_SESSION['team_update_twitter'] = $_POST['team_update_twitter'];
      $_SESSION['team_update_tumblr'] = $_POST['team_update_tumblr'];
      $_SESSION['team_update_linkedin'] = $_POST['team_update_linkedin'];

      $team_update_name = $_POST['team_update_name'];
      $team_update_title = $_POST['team_update_title'];
      $team_update_facebook = $_POST['team_update_facebook'];
      $team_update_twitter = $_POST['team_update_twitter'];
      $team_update_tumblr = $_POST['team_update_tumblr'];
      $team_update_linkedin = $_POST['team_update_linkedin'];

      if (!$_POST['team_update_name']) {
         $_SESSION['team_update_name_requried'] = "*team name filde is requried";
         $error = true;
      }
      if (!$_POST['team_update_title']) {
         $_SESSION['team_update_title_requried'] = "*team title filde is requried";
         $error = true;
      }
      if (!$_POST['team_update_facebook']) {
         $_SESSION['team_update_facebook_requried'] = "*team facebook filde is requried";
         $error = true;
      }

      if ($error == false) {
         $update_query =  "UPDATE $table_name SET name = '$team_update_name' WHERE id = $id";
         mysqli_query(db(), $update_query);

         $update_query =  "UPDATE $table_name SET title = '$team_update_title' WHERE id = $id";
         mysqli_query(db(), $update_query);

         $update_query =  "UPDATE $table_name SET facebook = '$team_update_facebook' WHERE id = $id";
         mysqli_query(db(), $update_query);

         // team_update_twitter insert       
         if ($team_update_twitter) {
            $update_query =  "UPDATE $table_name SET twitter = '$team_update_twitter' WHERE id = $id";
            mysqli_query(db(), $update_query);
         }
         // // team_update_tumblr insert       
         if ($team_update_tumblr) {
            $update_query =  "UPDATE $table_name SET tumblr = '$team_update_tumblr' WHERE id = $id";
            mysqli_query(db(), $update_query);
         }
         // // team_update_linkdin insert       
         if ($team_update_linkedin) {
            $update_query =  "UPDATE $table_name SET linkedin = '$team_update_linkedin' WHERE id = $id";
            mysqli_query(db(), $update_query);
         }
         $_SESSION['team_update_success'] = "team Add successfull.";
         back();
      } else {            // error == true
         back();
      }
   }

   if ($_POST['action_type'] == 'img') {
      $_SESSION['team_update_img'] = $_FILES['team_update_img'];

      $img = $_FILES['team_update_img']['name'];
      $img_explode = explode('.', $img);
      $img_ext = end($img_explode);
      $extensions = array("jpeg", "jpg", "png", "gif", "JPG", "JPEG", "PNG", "GIF");


      if (!$_FILES['team_update_img']['name']) {
         $_SESSION['team_update_img_requried'] = "*team img filde is requried";
         $error = true;
      }
      if (in_array($img_ext, $extensions) == false) {
         $_SESSION['team_update_img_extention'] = "*team img extention not a img extention";
         $error = true;
      }
      // image insert 


      if ($error == false) {
         $old_img = where_data_read($table_name, $id)['img'];
         $old_img_path = '../upload/team/' . $old_img;
         unlink($old_img_path);

         $new_name = $id . "." . $img_ext;
         // $new_name = "a." . $img_ext;
         $temp_loc = $_FILES['team_update_img']['tmp_name'];
         $new_loc = '../upload/team/' . $new_name;
         move_uploaded_file($temp_loc, $new_loc);
         $update_query =  "UPDATE $table_name SET img = '$new_name' WHERE id = $id";
         mysqli_query(db(), $update_query);

         $_SESSION['team_update_success'] = "team Add successfull.";
         back();
      }
   }
}
back();

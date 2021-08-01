<?php
require_once '../include/function.php';
$db_connect = mysqli_connect('localhost', 'root', '', 'autentication');

// session veriable
$_SESSION['team_img'] = $_FILES['team_img'];
$_SESSION['team_name'] = $_POST['team_name'];
$_SESSION['team_title'] = $_POST['team_title'];
$_SESSION['team_facebook'] = $_POST['team_facebook'];
$_SESSION['team_twitter'] = $_POST['team_twitter'];
$_SESSION['team_tumblr'] = $_POST['team_tumblr'];
$_SESSION['team_linkdin'] = $_POST['team_linkdin'];

// veriable
$team_name = $_POST['team_name'];
$team_title = $_POST['team_title'];
$team_facebook = $_POST['team_facebook'];
$team_twitter = $_POST['team_twitter'];
$team_tumblr = $_POST['team_tumblr'];
$team_linkdin = $_POST['team_linkdin'];
$date = date('Y-m-d H:i:s');
$auth = $_SESSION['auth']['id'];


$img = $_FILES['team_img']['name'];
$img_explode = explode('.', $img);
$img_ext = end($img_explode);
$extensions = array("jpeg", "jpg", "png", "gif", "JPG", "JPEG", "PNG", "GIF");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // img

   if (!$_FILES['team_img']['name']) {
      $_SESSION['team_img_requried'] = "*team img filde is requried";
      $error = true;
   }
   if (in_array($img_ext, $extensions) == false) {
      $_SESSION['team_img_extention'] = "*team img extention not a img extention";
      $error = true;
   }

   if (!$_POST['team_name']) {
      $_SESSION['team_name_requried'] = "*team name filde is requried";
      $error = true;
   }
   if (!$_POST['team_title']) {
      $_SESSION['team_title_requried'] = "*team title filde is requried";
      $error = true;
   }
   if (!$_POST['team_facebook']) {
      $_SESSION['team_facebook_requried'] = "*team facebook filde is requried";
      $error = true;
   }


   // // error == false 
   if ($error == false) {
      $insert_query =  "INSERT INTO teams (name, title, facebook, added_by, created_at) VALUES ('$team_name', '$team_title', '$team_facebook', '$auth', '$date')";
      mysqli_query($db_connect, $insert_query);

      $last_id = mysqli_insert_id($db_connect);


      // image insert 
      $new_name = $last_id . "." . $img_ext;
      $temp_loc = $_FILES['team_img']['tmp_name'];
      $new_loc = '../upload/team/' . $new_name;
      move_uploaded_file($temp_loc, $new_loc);
      $update_query =  "UPDATE teams SET img = '$new_name' WHERE id = $last_id";
      mysqli_query($db_connect, $update_query);

      // team_twitter insert       
      if ($team_twitter) {
         $update_query =  "UPDATE teams SET twitter = '$team_twitter' WHERE id = $last_id";
         mysqli_query($db_connect, $update_query);
      }
      // team_tumblr insert       
      if ($team_tumblr) {
         $update_query =  "UPDATE teams SET tumblr = '$team_tumblr' WHERE id = $last_id";
         mysqli_query($db_connect, $update_query);
      }
      // team_linkdin insert       
      if ($team_linkdin) {
         $update_query =  "UPDATE teams SET linkdin = '$team_linkdin' WHERE id = $last_id";
         mysqli_query($db_connect, $update_query);
      }
      // print_r($last_id);





      $_SESSION['team_success'] = "team Add successfull.";
      header("location: team.php");
   } else {            // error == true
      header("location: team.php");
   }
} else {            // error == true
   header("location: team.php");
}

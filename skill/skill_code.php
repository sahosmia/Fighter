<?php
include '../include/db.php';

// veriable
$skill_title = $_POST['skill_title'];
$skill_value = $_POST['skill_value'];


// session veriable
$_SESSION['skill_title'] = $_POST['skill_title'];
$_SESSION['skill_value'] = $_POST['skill_value'];


// if condition start
$error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Title
   if (!$skill_title) {
      $_SESSION['skill_title_requried'] = "*Skill Title filde is requried";
      $error = true;
   }
   // value
   if (!$skill_value) {
      $_SESSION['skill_value_requried'] = "*Skill Value is requried";
      $error = true;
   } elseif ($skill_value <= 40) {
      $_SESSION['skill_value_invalid'] = "*It is not valid skill value. Value need minimum 40";
      $error = true;
   }

   // // error == false 
   if ($error == false) {
      echo "hobe";
      $skill_title_query = "SELECT COUNT(*) AS count FROM skills WHERE skill_title = '$skill_title'";   //chack skill_title is resgisted or not query
      $skill_title_form_db = mysqli_query($db_connect, $skill_title_query);
      $skill_title_assoc = mysqli_fetch_assoc($skill_title_form_db);
      if ($skill_title_assoc['count'] == 0) {                       // skill_title not exist
         $insert_query =  "INSERT INTO skills (skill_title, skill_value) VALUES ('$skill_title', '$skill_value')";
         mysqli_query($db_connect, $insert_query);
         $_SESSION['skill_success'] = "Skill Add successfull.";
         header("location: skill.php");
      } else {             // skill title exist
         $_SESSION['skill_title_exist'] = "*This skill title is alrady exist";
         header("location: skill.php");
      }
   } else {            // error == true
      header("location: skill.php");
   }
}

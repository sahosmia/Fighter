<?php
require_once '../include/function.php';

// veriable
$skill_title = $_POST['skill_title'];
$skill_value = $_POST['skill_value'];

// if ($skill_value <= 100) {
// if ($skill_value >= 40) {

//    echo "thik ase";
// } else {
//    echo "thik nai";
// }
// die();
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
   }
   if ($skill_value <= 40 || $skill_value >= 100) {
      $_SESSION['skill_value_invalid'] = "*It is not valid skill value. Value need minimum 40 and maximum 100";
      $error = true;
   }

   // // error == false 
   if ($error == false) {
      $skill_title_query = "SELECT COUNT(*) AS count FROM skills WHERE skill_title = '$skill_title'";   //chack skill_title is resgisted or not query
      $skill_title_form_db = mysqli_query(db(), $skill_title_query);
      $skill_title_assoc = mysqli_fetch_assoc($skill_title_form_db);
      if ($skill_title_assoc['count'] == 0) {                       // skill_title not exist
         $insert_query =  "INSERT INTO skills (skill_title, skill_value) VALUES ('$skill_title', '$skill_value')";
         mysqli_query(db(), $insert_query);
         $_SESSION['skill_success'] = "Skill Add successfull.";
         redirect("skill.php");
      } else {             // skill title exist
         $_SESSION['skill_title_exist'] = "*This skill title is alrady exist";
         back();
      }
   }      // error == true
}
back();

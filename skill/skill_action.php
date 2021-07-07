<?php
include '../include/db.php';

$id = $_GET['skill_id'];
$action = $_GET['action'];
$status = $_GET['status'];


if ($action == 'single_delete') {
   $delete_query = "DELETE FROM skills WHERE id= $id";
   mysqli_query($db_connect, $delete_query);
}

if ($action == 'show_hide') {
   if ($status == 1) {
      $update_query = "UPDATE skills SET skill_status=2 WHERE id=$id";
      mysqli_query($db_connect, $update_query);
   } else {
      $update_query = "UPDATE skills SET skill_status=1 WHERE id=$id";
      mysqli_query($db_connect, $update_query);
   }
}
header('location: skill.php');

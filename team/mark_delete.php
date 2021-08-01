<?php
require_once '../include/function.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (!$_POST['select_item']) {
      $_SESSION['select_item_requried'] = "*Please Select Any Item";
      header('location:' . $_SERVER['HTTP_REFERER']);
   } else {
      $select_item = $_POST['select_item'];
      foreach ($select_item as $data) {
         $path = '../upload/team/' . where_data_read("teams", $data)['img'];
         unlink($path);
         $delete_query = "DELETE FROM teams WHERE id = $data";
         mysqli_query(db(), $delete_query);
      }
      header('location:' . $_SERVER['HTTP_REFERER']);
   }
} else {            // error == true
   header('location:' . $_SERVER['HTTP_REFERER']);
}

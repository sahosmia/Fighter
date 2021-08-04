<?php
require_once '../include/function.php';
// echo $_SERVER['HTTP_REFERER'];
// die();
// print_r($_GET);
// die();
$table = $_GET['table_name'];
$action = $_GET['action'];
$id = $_GET['id'];


if (isset($_GET['status'])) {
   $status = $_GET['status'];
}



if ($action == 'single_delete') {
   data_delete($table, $id);
}


if ($action == 'img_delete') {
   $img_path = isset($_GET['img_path']);

   data_delete($table, $id);
   unlink($img_path);
}

if ($action == 'show_hide') {
   data_show_hide($table, $id, $status);
}
if ($action == 'delete_all') {
   delete_all($table);
}


back();

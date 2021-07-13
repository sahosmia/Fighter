<?php
require_once '../include/function.php';
// echo $_SERVER['HTTP_REFERER'];
// die();
// print_r($_GET);
// die();
$id = $_GET['id'];
$action = $_GET['action'];
$status = $_GET['status'];
$table = $_GET['table_name'];






if ($action == 'single_delete') {
   data_delete($table, $id);
}

if ($action == 'show_hide') {
   data_show_hide($table, $id, $status);
}


header('location:' . $_SERVER['HTTP_REFERER']);

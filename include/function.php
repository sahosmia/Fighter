<?php
session_start();
date_default_timezone_set('Asia/Dhaka');


define("server", "localhost");
define("username", "root");
define("password", "");
define("database", "autentication");
function db()
{
   $db_connect = mysqli_connect(server, username, password, database);
   return $db_connect;
}

// data read 
function data_read($table_name, $status)
{
   //$status 0 == all, 1 == hide_status, 2 == show_status

   // global $db_connect;       // golobal scope
   $select_query = "SELECT * FROM $table_name WHERE status = $status";
   if ($status == 0) {
      $select_query = "SELECT * FROM $table_name";
   }
   $mysqli_query = mysqli_query(db(), $select_query);
   // $mysqli_query = mysqli_query($GLOBALS['db_connect'], $select_query);
   return $mysqli_query;
}


// data read 
function data_delete($table_name, $select)
{
   //$select 0 == all, 1 == single,

   // global $db_connect;       // golobal scope

   if ($select == 0) {
      $delete_query = "DELETE FROM $table_name";
   } else {
      $delete_query = "DELETE FROM $table_name WHERE id= $select";
   }
   $mysqli_query = mysqli_query(db(), $delete_query);
   return $mysqli_query;
}

// data read 
function data_show_hide($table_name, $select, $status)
{
   //$status 1 = hide_curent_status,.... 2 = show_curent_status
   //select => id select

   global $db_connect;       // golobal scope

   if ($status == 1) {
      $update_query = "UPDATE $table_name SET status=2 WHERE id=$select";
   } else {
      $update_query = "UPDATE $table_name SET status=1 WHERE id=$select";
   }

   $mysqli_query = mysqli_query(db(), $update_query);
   return $mysqli_query;
}



function user_name_read($user_id)
{
   $user_query = "SELECT * FROM users WHERE id = $user_id";
   $user_form_db = mysqli_query(db(), $user_query);
   $user_assoc = mysqli_fetch_assoc($user_form_db);
   return $user_assoc['name'];
}

function demo()
{
   return "sahos";
}

function test()
{
}

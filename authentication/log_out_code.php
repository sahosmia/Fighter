<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require_once '../include/function.php';

unset($_SESSION['auth']); // logged user data remove
unset($_SESSION['error']); 
unset($_SESSION['old']);   

session_destroy(); 

redirect("login.php");
exit();

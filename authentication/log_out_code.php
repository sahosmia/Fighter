<?php
session_start();

unset($_SESSION['auth']); // logged user data remove
unset($_SESSION['error']); 
unset($_SESSION['old']);   

session_destroy(); 

header("Location: login.php");
exit();

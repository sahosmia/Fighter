<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once 'include/function.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    
    
    $_SESSION['old'] = [
        'email' => $email
    ];
    
    $errors = [];

    // Validation
    if (!$email) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    if (!$password) {
        $errors['password'] = "Password is required";
    }
    
    if (!empty($errors)) {
        $_SESSION['error'] = $errors;
        redirect("test.php");
        exit();
    }

    // Database check
    $con = db();
    $stmt = $con->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows < 1) {
        $_SESSION['error']['email'] = "This email is not registered";
        redirect("test.php");
        exit();
    }

    $user = $result->fetch_assoc();

    if (!password_verify($password, $user['password'])) {
        $_SESSION['error']['password'] = "Incorrect password";
        redirect("test.php");
        exit();
    }

    // Login Success
    $_SESSION['auth'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "email" => $user['email']
    ];

    unset($_SESSION['error'], $_SESSION['old']);

    redirect("dashboard/dashboard.php");
    exit();
}

// At the bottom:
require_once 'views/test.view.php';
?>

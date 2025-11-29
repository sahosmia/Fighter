<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require_once '../include/function.php';

// collect inputs
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);

$_SESSION['old'] = [
    'name' => $name,
    'email' => $email
];

$errors = [];

// Validation -----------------------
if (!$name) {
    $errors['name'] = "Name is required";
}

if (!$email) {
    $errors['email'] = "Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format";
}

if (!$password) {
    $errors['password'] = "Password is required";
}

if (!$confirm_password) {
    $errors['confirm_password'] = "Confirm password is required";
} elseif ($password !== $confirm_password) {
    $errors['confirm_password'] = "Passwords do not match";
}

// If error exists
if (!empty($errors)) {
    $_SESSION['error'] = $errors;
    redirect("register.php");
    exit();
}

// Check if email exists (SQL injection safe)
$con = db();
$stmt = $con->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['error']['email'] = "This email already exists";
    redirect("register.php");
    exit();
}

// Register user ----------------------
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$insert = $con->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$insert->bind_param("sss", $name, $email, $hashed_password);
$insert->execute();

$_SESSION['success'] = "Registration successful. Please login.";

// Clear old inputs on success
unset($_SESSION['old']);

redirect("login.php");
exit();

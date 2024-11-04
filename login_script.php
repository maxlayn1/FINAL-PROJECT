<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if (isset($email) && isset($password)) {
    $_SESSION['user_email'] = $email;
    header("Location: index.php");
    exit();
}
?>
<?php //I THINK STILL HASH ENTERED PASS IF NOT SHIT AND 
//CHECK THAT HASH AGAINST HASHES IN DB
//NOTE THAT EMAIL DOES NOT TRIGGER JUST YET
//TODO: FIX INVALID EMAIL RED TEXT
session_start();
$_SESSION['emailError'] = false;
$_SESSION['passError'] = false;

$email = $_POST['email'];
$password = $_POST['password'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['emailError'] = true;
}

if (!preg_match("/^(?=.*\d)(?=.*[!@#$%^&*()])(?=.{1,60}$)/", $password)) {
    $_SESSION['passError'] = true;
}

if ($_SESSION['emailError'] || $_SESSION['passError']) {
    header('Location: login.php');
    exit();
}
?>
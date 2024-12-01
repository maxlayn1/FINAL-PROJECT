<?php //TODO: add a check to see if a username or email is already in use!!!!!!
//HASHING WILL ALSO BE NECESSARY FOR PASSWORDS
session_start(); //header could fuck up

$username = htmlspecialchars(trim($_POST['username']));
$email = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));
$_SESSION['nameError'] = false;
$_SESSION['emailError'] = false;
$_SESSION['passError'] = false;

if (strlen($username) > 60 || strlen($username) == 0) {
    $_SESSION['nameError'] = true;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['emailError'] = true;
}

if (!preg_match("/^(?!.*\s)(?=.*\d)(?=.*[!@#$%^&*()])(?=.{6,60}$)/", $password)) {
    $_SESSION['passError'] = true;
}

if ($_SESSION['nameError'] || $_SESSION['emailError'] || $_SESSION['passError']) {
    header('Location: register.php');
    exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$_POST['password'] = '';
$password = '';

$dsn = "mysql:host=localhost;port=8889;dbname=project";
$DBusername = "root";
$DBpassword = "root";
try {
    $pdo = new PDO($dsn, $DBusername, $DBpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connectStatus = "Connected successfully";
    //echo $connectStatus;
} catch (PDOException $e) {
    $connectStatus = "Connection failed:" . $e->getMessage();
    die($connectStatus);
}

$sql = "INSERT INTO registration (username, email, password_hash) VALUES (?, ?, ?)";
$statement = $pdo->prepare($sql);
try {
    $statement->execute([$username, $email, $hashedPassword]);
    echo "successful insertion";
}
catch (PDOException $e) {
    echo "Error inserting data: " . $e->getMessage();
    $_SESSION['nameError'] = true;
    $_SESSION['emailError'] = true;
    header('Location: register.php');
    exit();
}
echo "MADE IT THRU EXECUTING STATEMENT";

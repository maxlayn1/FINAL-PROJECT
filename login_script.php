<?php //I THINK STILL HASH ENTERED PASS IF NOT SHIT AND 
//CHECK THAT HASH AGAINST HASHES IN DB
//NOTE THAT EMAIL DOES NOT TRIGGER JUST YET
//TODO: FIX INVALID EMAIL RED TEXT
session_start();
$_SESSION['nameError'] = false;
$_SESSION['passError'] = false;

$username = $_POST['username'];
$password = $_POST['password'];

if (strlen($username) > 60 || strlen($username) == 0) {
    $_SESSION['nameError'] = true;
}

if (!preg_match("/^(?=.*\d)(?=.*[!@#$%^&*()])(?=.{1,60}$)/", $password)) {
    $_SESSION['passError'] = true;
}

if ($_SESSION['emailError'] || $_SESSION['passError']) {
    header('Location: login.php');
    exit();
}

//$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$_POST['password'] = '';
//$password = '';

$dsn = "mysql:host=localhost;port=8889;dbname=project";
$DBusername = "root";
$DBpassword = "root";
try {
    $pdo = new PDO($dsn, $DBusername, $DBpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connectStatus = "Connected successfully";
    //echo $connectStatus;

    $sql = "SELECT password_hash FROM registration WHERE username = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$username]);   
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        if (password_verify($password, $result['password_hash'])) {
            // Username and password match
            echo "Login successful!";
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $username;
        } else {
            // Password doesn't match
            $_SESSION['passError'] = true;
            header('Location: login.php');
            exit();
        }
    } else {
        // Username not found
        $_SESSION['nameError'] = true;
        header('Location: login.php');
        exit();
    }
} catch (PDOException $e) {
    $connectStatus = "Connection failed:" . $e->getMessage();
    die($connectStatus);
}

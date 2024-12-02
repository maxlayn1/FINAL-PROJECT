<?php
session_start();
$_SESSION['nameError'] = false;
$_SESSION['passError'] = false;

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == 'admin' && $password == 'admin') {
    $_SESSION['loggedIn'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['isAdmin'] = true;
    header('Location: admin.php');
    exit();
}

if (strlen($username) > 60 || strlen($username) == 0) {
    $_SESSION['nameError'] = true;
}

if (!preg_match("/^(?=.*\d)(?=.*[!@#$%^&*()])(?=.{1,60}$)/", $password)) {
    $_SESSION['passError'] = true;
}

if ($_SESSION['nameError'] || $_SESSION['passError']) {
    header('Location: login.php');
    exit();
}

$dsn = "mysql:host=localhost;port=8889;dbname=project";
$DBusername = "root";
$DBpassword = "root";
try {
    $pdo = new PDO($dsn, $DBusername, $DBpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT user_id, password_hash FROM registration WHERE username = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$username]);   
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        if (password_verify($password, $result['password_hash'])) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $username;
            //$user_id = $result['user_id'];

            $insertLoginSql = "INSERT INTO user_data (user_id, login_times) VALUES (?, NOW())";
            $insertLoginStmt = $pdo->prepare($insertLoginSql);
            $insertLoginStmt->execute([$result['user_id']]);

            header('Location: index.php');
            exit();
        } else {
            $_SESSION['passError'] = true;
            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['nameError'] = true;
        header('Location: login.php');
        exit();
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

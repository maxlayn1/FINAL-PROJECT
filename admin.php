<?php
session_start();

if (!$_SESSION['isAdmin']) { //if user is not an admin, redirect to login page
    header("Location: login.php");
    exit();
}

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

$results = null;
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sqlCommand'])) {
    $sqlCommand = trim($_POST['sqlCommand']);
    try {
        $statement = $pdo->prepare($sqlCommand);
        $statement->execute();

        if (stripos($sqlCommand, 'SELECT') === 0) {
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $results = 'Command executed successfully.';
        }
    } catch (PDOException $e) {
        $errorMessage = 'Error: ' . htmlspecialchars($e->getMessage());
    }
} else {
    $sql = "SELECT * FROM registration";
    $statement = $pdo->prepare($sql);
    try {
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Fatal error: ' . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Admin page</title>
</head>

<body>
    <div class="w3-bar topMenu w3-white">
        <a href="index.php">
            <img src="imgs\Pharmacy_Green_Cross.svg.png" alt="website logo linking to index page"
                class="logo w3-image w3-bar-item" style="width: 150px; height: auto;">
            <p class="w3-bar-item websiteName">&lt;/insert website name&gt;</p>
        </a>
        <a href="About.php" class="rightLink w3-bar-item w3-button w3-right w3-hover-text-green w3-hover-white">About</a>
        <a href="Supplements.php" class="rightLink w3-bar-item w3-button w3-right w3-hover-text-green w3-hover-white">Supplements</a>
        <a href="Calculator.php" class="rightLink w3-bar-item w3-button w3-right w3-hover-text-green w3-hover-white">Calculator</a>
        <a href="Dieting.php" class="rightLink w3-bar-item w3-button w3-right w3-hover-text-green w3-hover-white">Dieting</a>
    </div>

    <div class="selectAll">
    <?php
    if (is_array($results)) {
        echo '<table class="w3-table w3-bordered w3-striped">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Username</th>';
        echo '<th>Email</th>';
        echo '<th>Password Hash</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($results as $row) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['user_id']) . '</td>';
            echo '<td>' . htmlspecialchars($row['username']) . '</td>';
            echo '<td>' . htmlspecialchars($row['email']) . '</td>';
            echo '<td>' . htmlspecialchars($row['password_hash']) . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } elseif (is_string($results)) {
        echo '<p>' . htmlspecialchars($results) . '</p>';
    } else {
        echo '<p>No data to display.</p>';
    }
    ?>
</div>

    <div class="sqlCommandBox">
        <form action="admin.php" method="POST">
            <input type="text" name="sqlCommand" placeholder="Enter SQL command" class="sqlInput">
            <input type="submit" value="execute" class="sqlSubmit">
        </form>
    </div>

</body>

</html>
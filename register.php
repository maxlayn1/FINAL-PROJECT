<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Registration page</title>
</head>

<body>
    <div class="topLeftContainer">
        <img src="imgs\Pharmacy_Green_Cross.svg.png" alt="website logo linking to index page"
            class="logo w3-image w3-bar-item" style="width: 80px; height: auto;">
        <p class="w3-bar-item websiteNameOnLogin">&lt;/insert website name&gt;</p>
    </div>

    <div class="loginBox w3-container w3-round">
        <p class="signIn w3-xxlarge"><b>Register</b></p>
        <p class="loginCaption">Your first step to a healthier life!</p>
        <form action="register_script.php" method="post">
            <input type="text" name="username" placeholder="Username" class="nameInput loginEntry w3-round-large w3-border"><br>
            <?php
            if ($_SESSION['nameError']) {
                echo "<p class='errorMsg errorUser' style='color: red'>Invalid username</p>";
                unset($_SESSION['nameError']);
            }
            ?>
            <input type="email" name="email" placeholder="Email" class="emailInput loginEntry w3-round-large w3-border"><br>
            <?php
            if ($_SESSION['emailError']) {
                echo "<p class='errorMsg errorEmail' style='color: red'>Invalid email</p>";
                unset($_SESSION['emailError']);
            }
            ?>
            <input type="password" name="password" placeholder="Password" class="passwordInput loginEntry w3-round-large w3-border"><br>
            <?php
            if ($_SESSION['passError']) {
                echo "<p class='errorMsg errorPassword' style='color: red'>Invalid password</p>";
                unset($_SESSION['passError']);
            }
            ?>
            <input type="submit" value="Sign up" class="signInButton w3-btn w3-green w3-round-xxlarge">
        </form>
        <div class="divider">Already have an account?</div>
        <a href="login.php"><input type="button" value="Login" class="registerButton w3-btn w3-blue w3-round-xxlarge"></a>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Login page</title>
</head>

<body>
    <div class="loginBox w3-container w3-round">
        <p class="signIn w3-xxlarge"><b>Sign in</b></p>
        <p class="loginCaption">Stay up to date on the latest health research</p>
        <form action="script.php" method="post">
            <input type="email" placeholder="Email" class="emailInput loginEntry w3-round-large w3-border"><br>
            <input type="password" placeholder="Password" class="passwordInput loginEntry w3-round-large w3-border"><br>
            <input type="submit" value="Login" class="signInButton w3-btn w3-green w3-round-xxlarge">
        </form>
        <div class="divider">or</div>
        <a href="register.php"><input type="button" value="Sign up!" class="registerButton w3-btn w3-blue w3-round-xxlarge"></a>
    </div>
</body>

</html>
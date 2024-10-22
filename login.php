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
    <div>
        <form action="script.php" method="post">
            <label for="firstName">First name:</label>
            <input type="text" id="firstName" name="name[]">

            <label for="lastName">Last name:</label>
            <input type="text" id="lastName" name="name[]">

            <input type="submit">
        </form>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Login form result</h2>
    <?php
    if (!empty($_POST['name'])) {
        $name = $_POST['name'];
        echo 'Your name is:<br>';
        foreach ($name as $firstOrLastName) {
            echo $firstOrLastName . ' ';
        }
    } else {
        echo "No name given";
    }
    ?>
</body>

</html>
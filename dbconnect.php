<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $DBHandler = new PDO('mysql:host=mysql;dbname=moviesdb;charset=utf-8', 'root', 'qwerty');

        if ($DBHandler) {
            echo "Connected to the database successfully!";
        } else {
            echo "Connection failed!";
        }
    ?>   
</body>
</html>
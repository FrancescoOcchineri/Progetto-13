<?php
session_start();

if (!isset($_SESSION['user_login'])) {
    header('Location: login.php');
    exit;
} elseif ($_SESSION['user_login']['admin'] !== 0) {
    header('Location: administration.php');
    exit; 
} else {
    session_write_close();
}

require_once('header.php')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .unauthorized {
            margin: 0;
            padding: 0;
            background-image: url('https://storage.googleapis.com/dopingcloud/blog/en/2022/03/403-forbidden-error.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: center;
            color: white; 
        }
    </style>
</head>
<body>
    <div class="unauthorized"></div>
</body>
</html>
<?php 

require_once('DB_PDO/database.php');
require_once('DB_PDO/userDTO.php');
$config = require_once('DB_PDO/config.php');

    use database\DB_PDO as DB;
    use UserDTO as User;

    $PDOConn = DB::getInstance($config);
    $conn = $PDOConn->getConnection();

    $userDTO = new User($conn);

    if (isset($_SESSION['user_login'])) {
      $user = $_SESSION['user_login'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet">
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
  />
    <style>
        html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            overflow-y: hidden;
        }

        header {
            height: 100%;
        }

        #intro-example {
            height: 100%;
        }

        @media (min-width: 992px) {
            #intro-example {
                height: 100%;
            }
        }
    </style>
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/1200px-PHP-logo.svg.png" alt="logo" style="width: 4rem;" /></a>
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarText"
      aria-controls="navbarText"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
      </ul>
        <?php
                if (isset($user)) {
                    echo '<div class="dropdown">
                    <button
                    class="btn btn-dark dropdown-toggle"
                    type="button"
                    id="dropdownMenu2"
                    data-mdb-dropdown-init
                    data-mdb-ripple-init aria-expanded="false">
                    Hi, ' . $user['firstname'] . ' ' . $user['lastname'] . '
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">';
                  if ($user['admin'] === 1) {
                    echo '<li><a class="dropdown-item" href="administration.php">Administration</a></li>';
                  }
                   echo '<li><a class="dropdown-item" href="controller.php?action=logout">Logout</a></li>
                    </ul>
                  </div>';
                } else {
                  echo ' <li class="nav-item list-unstyled me-3">
                  <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                </li>
                <li class="nav-item list-unstyled">
                  <a class="nav-link active" aria-current="page" href="register.php">Register</a>
                </li>';
                }
                ?>
    </div>
  </div>
</nav>
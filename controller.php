<?php

require_once('DB_PDO/database.php');
require_once('DB_PDO/userDTO.php');
$config = require_once('DB_PDO/config.php');

    use database\DB_PDO as DB;
    use UserDTO as User;

    $PDOConn = DB::getInstance($config);
    $conn = $PDOConn->getConnection();

    $userDTO = new User($conn);

    if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'register') {
        $regexPass = '/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/';
        preg_match_all($regexPass, htmlspecialchars($_REQUEST['password']), $matchesPass, PREG_SET_ORDER, 0);
        $regexEmail = '/^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/m';
        preg_match_all($regexEmail, htmlspecialchars($_REQUEST['email']), $matchesEmail, PREG_SET_ORDER, 0);
    
        $firstname = strlen(trim(htmlspecialchars($_POST['firstname']))) > 2 ? trim(htmlspecialchars($_POST['firstname'])) : '';
        $lastname = strlen(trim(htmlspecialchars($_POST['lastname']))) > 2 ? trim(htmlspecialchars($_POST['lastname'])) : '';
        $city = strlen(trim(htmlspecialchars($_POST['city']))) > 2 ? trim(htmlspecialchars($_POST['city'])) : '';
        $email = $matchesEmail ? htmlspecialchars($_POST['email']) : '';
        $password = $matchesPass ? htmlspecialchars($_REQUEST['password']) : '';
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $admin = isset($_POST['admin']) ? 1 : 0;
    
        try {
            $userDTO->saveUser($firstname, $lastname, $email, $hash, $city, $admin);
            $response = "Dati inseriti con successo";
            header("Location: login.php");
        } catch (PDOException $e) {
            echo "Errore durante l'inserimento dei dati: " . $e->getMessage();
        }
    }   else if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'login') {
        $userDTO->login();
        exit; 
    }   elseif (isset($_REQUEST['action']) && $_REQUEST['action'] === 'logout') {
        session_unset();
        session_destroy();
        header('Location: login.php');
    }   elseif ($_REQUEST['action'] === 'update') {
        if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['city'], $_POST['id'])) {
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $email = htmlspecialchars($_POST['email']);
            $city = htmlspecialchars($_POST['city']);

            $admin = isset($_POST['admin']) && $_POST['admin'] == '1' ? 1 : 0;
        
            $id = htmlspecialchars($_POST['id']); 
        
            try {
                $userDTO->updateUser($firstname, $lastname, $email, $city, $admin, $id);
                header("Location: administration.php");
                exit;
            } catch (PDOException $e) {
                echo "Errore durante l'aggiornamento dei dati: " . $e->getMessage();
            }
        }
    }   elseif ($_REQUEST['action'] === 'delete') {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $userDTO->deleteUser($id);
            header('Location: administration.php');
            exit;
        } else {
            echo "ID non specificato per la cancellazione dell'utente.";
        }
    }   elseif ($_REQUEST['action'] === 'add_user') {
        $regexPass = '/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/';
        preg_match_all($regexPass, htmlspecialchars($_REQUEST['password']), $matchesPass, PREG_SET_ORDER, 0);
        $regexEmail = '/^((?!\.)[\w\-_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$/m';
        preg_match_all($regexEmail, htmlspecialchars($_REQUEST['email']), $matchesEmail, PREG_SET_ORDER, 0);
    
        $firstname = strlen(trim(htmlspecialchars($_POST['firstname']))) > 2 ? trim(htmlspecialchars($_POST['firstname'])) : '';
        $lastname = strlen(trim(htmlspecialchars($_POST['lastname']))) > 2 ? trim(htmlspecialchars($_POST['lastname'])) : '';
        $city = strlen(trim(htmlspecialchars($_POST['city']))) > 2 ? trim(htmlspecialchars($_POST['city'])) : '';
        $email = $matchesEmail ? htmlspecialchars($_POST['email']) : '';
        $password = $matchesPass ? htmlspecialchars($_REQUEST['password']) : '';
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $admin = isset($_POST['admin']) ? 1 : 0;
    
        try {
            $userDTO->saveUser($firstname, $lastname, $email, $hash, $city, $admin);
            $response = "Dati inseriti con successo";
            header("Location: administration.php");
        } catch (PDOException $e) {
            echo "Errore durante l'inserimento dei dati: " . $e->getMessage();
        }
    }
    
    


<?php

class UserDTO {
    private PDO $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createDb() {
        $sql = 'CREATE DATABASE IF NOT EXISTS progetto_pdo';
        try {
            $this->conn->exec($sql);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createTable() {
        $sql = 'CREATE TABLE IF NOT EXISTS utenti (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            firstname VARCHAR(255) NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            pass VARCHAR(100) NOT NULL,
            city VARCHAR(255) NULL,
            admin BOOLEAN NOT NULL DEFAULT 0
          )';

        try {
            $this->conn->exec($sql);
        } catch(PDOException $e) {
            die($e->getMessage());
        } 
    }
    public function saveUser($firstname, $lastname, $email, $hash, $city, $admin) {
        $sql = "INSERT INTO utenti (firstname, lastname, email, pass, city, admin)
                VALUES ('$firstname', '$lastname', '$email', '$hash', '$city', '$admin')";
        try {
            $this->conn->exec($sql);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
    public function login() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!empty($_REQUEST['email']) && !empty($_REQUEST['password'])) {
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];
            $sql = "SELECT * FROM utenti WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                if (password_verify($password, $result['pass'])) {
                    $_SESSION['user_login'] = $result;
                    session_write_close();
                    header('Location: http://localhost/PHP/Progetto-13/index.php');
                    exit;
                } else {
                    echo 'Password errata!!';
                }
            } else {
                echo 'Utente non trovato!!';
            }
        } else {
            echo "Per favore, inserisci l'email e la password.";
        }
    }
    
    public function getAll() {
        $sql = 'SELECT * FROM utenti';
        $res = $this->conn->query($sql);
        return $res ? $res->fetchAll(PDO::FETCH_ASSOC) : null;
        
    }
    public function getUserByID(int $id) {
        try {
            $sql = 'SELECT * FROM utenti WHERE id = :id';
            $stm = $this->conn->prepare($sql);
            $stm->execute(['id' => $id]);

            $user = $stm->fetch(PDO::FETCH_OBJ);
            
            return $user;
        } catch (PDOException $e) {
            throw new Exception("Errore durante il recupero dell'utente: " . $e->getMessage());
        }
    }
    
    public function updateUser($firstname, $lastname, $email, $city, $admin, $id) {
        $sql = "UPDATE utenti SET firstname = :firstname, lastname = :lastname, email = :email, city = :city, admin = :admin WHERE id = :id";
        $stm = $this->conn->prepare($sql);
        $stm->execute([
            'firstname' => $firstname, 
            'lastname' => $lastname,
            'email' => $email,
            'city' => $city,
            'admin' => $admin,
            'id' => $id
        ]);
        return $stm->rowCount();
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM utenti WHERE id = :id";
        $stm = $this->conn->prepare($sql);
        $stm->execute(['id' => $id]);
        return $stm->rowCount();
    }

}

<?php

declare(strict_types=1);

function get_username(object $pdo, string $username){
    try{
        $query = "SELECT username FROM users WHERE username = :username;";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }catch(PDOException $e){
        error_log("Query failed: " . $e->getMessage());
        return false;
    }
}

function get_email(object $pdo, string $email){
    try{
        $query = "SELECT email FROM users WHERE email = :email;";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }catch(PDOException $e){
        error_log("Query failed: " . $e->getMessage());
        return false;
    }
}

function create_user(object $pdo, string $username, $email, $password){
    try{
        $query = "INSERT INTO users (username, email, pwd) VALUES(:username, :email, :pwd);";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);

        // Encrypt password:
        $options = [
            'cost' => 12
        ];
        
        $hashedPwd = password_hash($password, PASSWORD_BCRYPT, $options);

        $stmt->bindParam(":pwd", $hashedPwd);
        $stmt->execute();
    }catch(PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
}
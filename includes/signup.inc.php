<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    
    try{
        require_once "dbh.inc.php";
        require_once "../models/signup_model.inc.php";
        require_once "../controllers/signup_contr.inc.php";
        
        // Error handlers:
        $errs = [];
        
        if(is_input_empty($username, $email, $pwd)){
            $errs["empty_inputs"] = "Fill in all fields!";
        }
            
        if(is_email_invalid($email)){
            $errs["invalid_email"] = "Invalid email!";
        }

        if(is_username_taken($pdo, $username)){
            $errs["username_taken"] = "Username already taken!";
        }

        if(is_email_registered($pdo, $email)){
            $errs["email_taken"] = 'Email already registered!';
        }

        require 'config_session.inc.php';

        if($errs){
            $_SESSION["error_signup"] = $errs;
            header("Location: ../views/signup.php");
            exit();
        }

        createNewUser($pdo, $username, $email, $pwd);

        header("Location: ../views/login.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();

    }catch(PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("Location: ../index.php");
    die();
}
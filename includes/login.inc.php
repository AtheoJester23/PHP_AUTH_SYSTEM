<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try{
        require_once "dbh.inc.php";
        require_once "../controllers/login_contr.inc.php";
        require_once "../models/login_model.inc.php";

        // ERROR Handlers:
        $errs = [];
        
        if(is_input_empty($username, $pwd)){
            $errs["empty_inputs"] = "Fill in all fields!";
        }

        $result = get_user($pdo, $username);

        if(is_username_wrong($result)){
            $errs["login_incorrect"] = "Incorrect login info!";
        }

        if(!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])){
            $errs["login_incorrect"] = "Incorrect login info!";
        }

        require 'config_session.inc.php';

        if($errs){
            $_SESSION["error_signup"] = $errs;
            header("Location: ../views/login.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);

        $_SESSION["last_regeneration"] = time();
        
        header("Location: ../views/login.php");

        $pdo = null;
        $stmt = null;

        die();

    }catch(PDOException $e){
        die('Query failed: ' . $e->getMessage());
    }

    echo "Details: " . $username . $pwd;
}else{
    header("Location: ../index.php");
}
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    if(empty($username) || empty($pwd)){
        exit();
    }

    try{
        require_once "dbh.inc.php";

        $query = "SELECT * FROM users WHERE username = :username";

        $stmt = $pdo->prepare($query);

        $stmt->bind(":username", $username);
    }catch(PDOException $e){
        error_log('Query failed: ' . $e->getMessage());
    }

    echo "Details: " . $username . $pwd;
}else{
    header("Location: ../index.php");
}
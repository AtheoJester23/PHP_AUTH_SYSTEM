<?php
    require_once "../includes/config_session.inc.php";

    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");

    if(!isset($_SESSION["user_id"])){
        header("Location: ../index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>This is dashboard</p>
    <form action="../includes/logout.inc.php">
        <button>logout</button>
    </form>
</body>
</html>
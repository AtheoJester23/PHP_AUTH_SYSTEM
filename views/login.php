<?php 
    require_once "../includes/config_session.inc.php";

    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    
    if(isset($_SESSION["user_id"])){
        header("Location: dashboard.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Document</title>
</head>
<body>
    <main>
        <form action="../includes/login.inc.php" class="loginForm" method="POST">
            <h1>Login</h1>
            <div class="inputs">
                <div class="">
                    <label for="username">Username: </label>
                    <input type="text" name="username" placeholder="Enter username">
                </div>
                <div>
                    <label for="pwd">Password: </label>
                    <input type="text" name="pwd" placeholder="Enter password">
                </div>
                <a href="signup.php">Create new account</a>
            </div>
            <button>Login</button>
        </form>
    </main>
</body>
</html>
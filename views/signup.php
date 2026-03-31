<?php 
    require_once "../includes/config_session.inc.php";
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
        <form action="../includes/signup.inc.php" class="loginForm" method="POST">
            <h1>Signup</h1>
            <div class="inputs">
                <div class="">
                    <label for="username">Username: </label>
                    <input type="text" name="username" placeholder="Enter username">
                </div>
                <div class="">
                    <label for="email">Email: </label>
                    <input type="text" name="email" placeholder="Enter email">
                </div>
                <div>
                    <label for="pwd">Password: </label>
                    <input type="text" name="pwd" placeholder="Enter password">
                </div>
            </div>
            <button>Submit</button>

            <?php
            
                if(isset($_SESSION["error_signup"])){
                    $errors = $_SESSION["error_signup"];

                    foreach($errors as $error){
                        echo "<small>" . $error . "</small>";
                    }

                    unset($_SESSION['error_signup']);
                }else if(isset($_GET["signup"]) && $_GET["signup"] === "success"){
                    echo "<small>User created successfully!</small>";
                }
            ?>
        </form>
    </main>
</body>
</html>
<?php

if(!isset($_SESSION['user'])){
    header("Location: views/login.php");
    exit();
}else{
    header("Location: views/dashboard.php");
}
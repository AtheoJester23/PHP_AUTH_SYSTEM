<?php

require_once "includes/config_session.inc.php";

if(!isset($_SESSION['user_id'])){
    header("Location: views/login.php");
    exit();
}else{
    header("Location: views/dashboard.php");
}
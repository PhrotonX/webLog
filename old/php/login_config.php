<?php
    require 'database.php';

    session_start();

    $db = new Database();

    if(isset($_POST["login-form"])){
        echo $_POST["login-email"];
    }
?>
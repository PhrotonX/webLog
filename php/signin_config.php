<?php
    require 'database.php';

    session_start();

    if(isset($_POST["login-form"])){
        echo $_POST["login-email"];
    }
?>
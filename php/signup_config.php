<?php
    require 'database.php';

    session_start();

    $db = new Database();

    //if(isset($_POST["signup-form"])){

        $birthday = strtotime(
            $db->validate($_POST["signup-birthmonth"]) . " " .
            $db->validate($_POST["signup-birthday"]) . ", " .
            $db->validate($_POST["signup-birthyear"])
        );

        $sql = "INSERT INTO accounts (
            username, 
            email,
            password,
            securepassword,
            joindate,
            firstname,
            middlename,
            lastname,
            birthdate, 
            gender, 
            description, 
            newaccount,
            type,
            country
        ) VALUES(
            ". $db->validate($_POST["signup-username"]) .", 
            ". $db->validate($_POST["signup-email"]) .",
            ". $db->validate($_POST["signup-password"]) /* NEEDS HASHING */ .",
            ". false .",
            ". date("Y/m/d H:i:s") .",
            ". $db->validate($_POST["signup-firstname"]) .",
            ". $db->validate($_POST["signup-middlename"]) .",
            ". $db->validate($_POST["signup-lastname"]) .",
            ". date("Y/m/d", $birthday) .", 
            ". $db->validate($_POST["signup-gender"]) .",
            'N/A',
            ". true ."
            'member',
            ". $db->validate($_POST["signup-country"]) ."
        )";

        $db->save($sql);
        $db->close();

        echo '<script>
            window.location.href="..//html/index.php";
        </script>';
    //}

    
?>
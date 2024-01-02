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
            firstname,
            middlename,
            lastname,
            email,
            birthdate, 
            gender, 
            description, 
            newaccount,
            type,
            country,
            password_hash,
            securepassword,
            joindate
        ) VALUES(
            ". $db->validate($_POST["signup-username"]) .", 
            ". $db->validate($_POST["signup-firstname"]) .",
            ". $db->validate($_POST["signup-middlename"]) .",
            ". $db->validate($_POST["signup-lastname"]) .",
            ". $_POST["signup-email"] .",
            ". date("Y-m-d", $birthday) .", 
            ". $db->validate($_POST["signup-gender"]) .",
            'N/A',
            1,
            'member',
            ". $db->validate($_POST["signup-country"]) .",
            ". $db->validate($_POST["signup-password"]) /* NEEDS HASHING */ .",
            0,
            ". date("Y-m-d H:i:s") . "
        )";

        $db->save($sql);
        $db->close();

        echo '<script>
            window.location.href="..//html/index.php";
        </script>';
    //}

    
?>
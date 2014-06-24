<?php
    $db_host = "localhost";
    $db_name = "dflira";
    $db_user = "root";
    $db_pass = "root";
    
    $db_connect = "mysql:host=" . $db_host . ";dbname=" . $db_name;
    
    try {
        $db = new PDO($db_connect, $db_user, $db_pass);
    } catch (Exception $e) {
        echo "Could not connect to the database.";
        exit;
    }
?>

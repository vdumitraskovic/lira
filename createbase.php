<?php
    $db_host = "localhost";
    $db_name = "dflira";
    $db_user = "root";
    $db_pass = "root";
    $db_connect = "mysql:host=" . $db_host . ";dbname=" . $db_name;
    
    try {
        $db = new PDO($db_connect, $db_user, $db_pass);
        var_dump($db);
    } catch (Exception $e) {
        echo "Could not connect to the database.";
        exit;
    }

    $sql = file_get_contents('sql/database.sql');

    echo $sql;
    $qr = $db->exec($sql);

    echo $qr;
?>

<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "qpdata";

    try {
        $connection = new PDO("mysql:host=$server;dbname=$database;", $user, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connección fallida: " . $e->getMessage());
    }
?>
<?php

function getConnection() {
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'signup';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die('Connection Failed: ' . $e->getMessage());
    }
}

<?php
function dbConnect(): PDO {
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "test_crud";
    
    
    try {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        $pdo = new PDO($dsn, $user, $password, $options);
        return $pdo;

    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }

}
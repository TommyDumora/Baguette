<?php

session_start();

if (!isset($_SESSION["role"])) {
    header("Location: index.php");
}

require_once("lib/db_connect.php");

$pdo = dbConnect();

$sql = "DELETE FROM recipes WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
$stmt->execute();
header("Location: index.php");

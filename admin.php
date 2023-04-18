<?php

require_once("lib/db_connect.php");

$pdo = dbConnect();

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin WHERE username = :username AND password = :password AND role = 'admin'";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();

    if ($result && $result["password"] && $result["role"] == "admin") {
        session_start();
        $_SESSION["role"] = $result["role"];
        header("Location: index.php");
    } else {
        echo "Nom d'utilisateur ou mot de passe invalide";
    }
}

include("inc/header.php"); ?>

<h1>Connexion</h1>

<form method="post" action="admin.php">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" name="username" required><br>

    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required><br>

    <button class="btn" type="submit">Se connecter</button>
</form>

<?php include('inc/footer.php');

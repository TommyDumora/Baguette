<?php

session_start();

if (!isset($_SESSION["role"])) {
    header("Location: index.php");
}

require_once("lib/db_connect.php");

$pdo = dbConnect();

$recipeNameError = "";
$ratingError = "";
$totalTimeInSecondsError = "";
$numberOfServingsError = "";
$ingredientsError = "";
$stepError = "";
$imagesError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipeName = $_POST["recipeName"] ?? "";
    $rating = (float) $_POST["rating"] ?? null;
    $totalTimeInSeconds = (int) $_POST["totalTimeInSeconds"] ?? null;
    $numberOfServings = (int) $_POST["numberOfServings"] ?? null;
    $ingredients = $_POST["ingredients"] ?? "";
    $step = $_POST["step"] ?? "";
    $images = $_POST["images"] ?? "";

    if (empty($recipeName)) {
        $recipeNameError = "Le nom de la recette est requis";
    }

    if (isset($rating) && empty($rating)) {
        $ratingError = "La note est requise";
    }

    if (isset($totalTimeInSeconds) && empty($totalTimeInSeconds)) {
        $totalTimeInSecondsError = "Le temps en seconde est requis";
    }

    if (isset($numberOfServings) && empty($numberOfServings)) {
        $numberOfServingsError = "Le nombre de personne est requis";
    }

    if (empty($ingredients)) {
        $ingredientsError = "Les ingrédients sont requis";
    }

    if (empty($step)) {
        $stepError = "Les étapes de la recette sont requises";
    }

    if (empty($images)) {
        $imagesError = "Le lien de l'image est requis";
    }

    if (
        empty($recipeNameError)
        && empty($ratingError)
        && empty($totalTimeInSecondsError)
        && empty($numberOfServingsError)
        && empty($ingredientsError)
        && empty($stepError)
        && empty($imagesError)
    ) {
        $sql = "INSERT INTO recipes 
        (recipeName, rating, totalTimeInSeconds, numberOfServings, ingredients, step, images)
        VALUES 
        (:recipeName, :rating, :totalTimeInSeconds, :numberOfServings, :ingredients, :step, :images)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':recipeName', $recipeName, PDO::PARAM_STR);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_STR);
        $stmt->bindParam(':totalTimeInSeconds', $totalTimeInSeconds, PDO::PARAM_INT);
        $stmt->bindParam(':numberOfServings', $numberOfServings, PDO::PARAM_INT);
        $stmt->bindParam(':ingredients', $ingredients, PDO::PARAM_STR);
        $stmt->bindParam(':step', $step, PDO::PARAM_STR);
        $stmt->bindParam(':images', $images, PDO::PARAM_STR);

        $stmt->execute();
        header('Location: index.php');
    }
}

include("inc/header.php"); ?>

<h1>Ajouter une recette</h1>

<form action="add_recipe.php" method="POST" novalidate>

    <label for="recipeName">Nom de la recette:</label><br>
    <input type="text" id="recipeName" name="recipeName"><br>
    <?= !empty($recipeNameError) ? "<p>" . $recipeNameError . "</p>" : null ?>

    <label for="rating">Note:</label><br>
    <input type="number" id="rating" name="rating" min="0" max="5"><br>
    <?= !empty($ratingError) ? "<p>" . $ratingError . "</p>" : null ?>

    <label for="totalTimeInSeconds">Temps de préparation (en secondes):</label><br>
    <input type="number" id="totalTimeInSeconds" name="totalTimeInSeconds"><br>
    <?= !empty($totalTimeInSecondsError) ? "<p>" . $totalTimeInSecondsError . "</p>" : null ?>

    <label for="numberOfServings">Nombre de portions:</label><br>
    <input type="number" id="numberOfServings" name="numberOfServings"><br>
    <?= !empty($numberOfServingsError) ? "<p>" . $numberOfServingsError . "</p>" : null ?>

    <label for="ingredients">Ingrédients:</label><br>
    <textarea id="ingredients" name="ingredients"></textarea><br>
    <?= !empty($ingredientsError) ? "<p>" . $ingredientsError . "</p>" : null ?>

    <label for="step">Instructions:</label><br>
    <textarea id="step" name="step"></textarea><br>
    <?= !empty($stepError) ? "<p>" . $stepError . "</p>" : null ?>

    <label for="images">Image:</label><br>
    <input type="text" id="images" name="images"><br>
    <?= !empty($imagesError) ? "<p>" . $imagesError . "</p>" : null ?>

    <button class="btn" type="submit">Envoyer la recette</button>

</form>

<?php include("inc/footer.php");

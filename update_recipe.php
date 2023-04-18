<?php

session_start();

if (!isset($_SESSION["role"])) {
    header("Location: index.php");
}

require_once('lib/db_connect.php');

$pdo = dbConnect();

$recipeNameError = "";
$ratingError = "";
$totalTimeInSecondsError = "";
$numberOfServingsError = "";
$ingredientsError = "";
$stepError = "";
$imagesError = "";

$sql = "SELECT * FROM recipes WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
$stmt->execute();
$recipe = $stmt->fetch();

// $sql = "UPDATE recipes 
// SET recipeName = :recipeName, ingredients = :ingredients, totalTimeInSeconds = :totalTimeInSeconds, rating = :rating, images = :images, numberOfServings = :numberOfServings, step = :step 
// WHERE id = :id";
// $stmt = $pdo->prepare($sql);
// $stmt->bindParam(':recipeName', $recipeName, PDO::PARAM_STR);
// $stmt->bindParam(':ingredients', $ingredients, PDO::PARAM_STR);
// $stmt->bindParam(':totalTimeInSeconds', $totalTimeInSeconds, PDO::PARAM_INT);
// $stmt->bindParam(':rating', $rating, PDO::PARAM_STR);
// $stmt->bindParam(':images', $images, PDO::PARAM_STR);
// $stmt->bindParam(':numberOfServings', $numberOfServings, PDO::PARAM_INT);
// $stmt->bindParam(':step', $step, PDO::PARAM_STR);
// $stmt->bindParam(':id', $_GET["id"], PDO::PARAM_INT);

// $stmt->execute();

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
        $sql = "UPDATE recipes 
                SET recipeName = :recipeName, ingredients = :ingredients, totalTimeInSeconds = :totalTimeInSeconds, rating = :rating, images = :images, numberOfServings = :numberOfServings, step = :step 
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':recipeName', $recipeName, PDO::PARAM_STR);
        $stmt->bindParam(':ingredients', $ingredients, PDO::PARAM_STR);
        $stmt->bindParam(':totalTimeInSeconds', $totalTimeInSeconds, PDO::PARAM_INT);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_STR);
        $stmt->bindParam(':images', $images, PDO::PARAM_STR);
        $stmt->bindParam(':numberOfServings', $numberOfServings, PDO::PARAM_INT);
        $stmt->bindParam(':step', $step, PDO::PARAM_STR);
        $stmt->bindParam(':id', $_GET["id"], PDO::PARAM_INT);

        $stmt->execute();

        header("Location: show_recipe.php?id=" . $recipe['id']);
    }
}

include("inc/header.php"); ?>

<h1>Modifier une recette</h1>

<form method="post" action="update_recipe.php?id=<?= $recipe['id']; ?>">

    <label for="recipeName">Nom de la recette :</label><br>
    <input type="text" name="recipeName" id="recipeName" value="<?= $recipe['recipeName']; ?>"><br>
    <?= !empty($recipeNameError) ? "<p>" . $recipeNameError . "</p>" : null ?>

    <label for="ingredients">Ingrédients :</label><br>
    <textarea name="ingredients" id="ingredients"><?= $recipe['ingredients']; ?></textarea><br>
    <?= !empty($ingredientsError) ? "<p>" . $ingredientsError . "</p>" : null ?>

    <label for="totalTimeInSeconds">Temps total en secondes :</label><br>
    <input type="number" name="totalTimeInSeconds" id="totalTimeInSeconds" value="<?= $recipe['totalTimeInSeconds']; ?>"><br>
    <?= !empty($totalTimeInSecondsError) ? "<p>" . $totalTimeInSecondsError . "</p>" : null ?>

    <label for="rating">Note :</label><br>
    <input type="number" name="rating" id="rating" min="0" max="5" step="0.1" value="<?= $recipe['rating']; ?>"><br>
    <?= !empty($ratingError) ? "<p>" . $ratingError . "</p>" : null ?>

    <label for="images">Image :</label><br>
    <input type="text" name="images" id="images" value="<?= $recipe['images']; ?>"><br>
    <?= !empty($imagesError) ? "<p>" . $imagesError . "</p>" : null ?>

    <label for="numberOfServings">Nombre de portions :</label><br>
    <input type="number" name="numberOfServings" id="numberOfServings" value="<?= $recipe['numberOfServings']; ?>"><br>
    <?= !empty($numberOfServingsError) ? "<p>" . $numberOfServingsError . "</p>" : null ?>

    <label for="step">Étapes :</label><br>
    <textarea name="step" id="step"><?= $recipe['step']; ?></textarea><br>
    <?= !empty($stepError) ? "<p>" . $stepError . "</p>" : null ?>

    <button class="btn" type="submit">Enregistrer les modifications</button>

</form>


<?php include('inc/footer.php');

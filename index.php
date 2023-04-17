<?php

session_start();

require_once("lib/db_connect.php");

$pdo = dbConnect();
$sql = "SELECT * FROM recipes";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();



include("inc/header.php");

foreach ($result as $recipe) {
?>
    <div class="recipe">

        <div class="left">

            <img src="<?= $recipe['images']; ?>" alt="">

            <?php if (isset($_SESSION["role"])) { ?>

                <a class="" href="show_recipe.php?id=<?= $recipe["id"] ?>">
                    <svg class="recipe-svg svgDarkMode" fill="#000000" viewBox="-5.5 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>eye</title>
                            <path d="M10.32 22.32c-5.6 0-9.92-5.56-10.12-5.8-0.24-0.32-0.24-0.72 0-1.040 0.2-0.24 4.52-5.8 10.12-5.8s9.92 5.56 10.12 5.8c0.24 0.32 0.24 0.72 0 1.040-0.2 0.24-4.56 5.8-10.12 5.8zM1.96 16c1.16 1.32 4.52 4.64 8.36 4.64s7.2-3.32 8.36-4.64c-1.16-1.32-4.52-4.64-8.36-4.64s-7.2 3.32-8.36 4.64zM10.32 20c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.84 4-4 4zM10.32 13.68c-1.28 0-2.32 1.040-2.32 2.32s1.040 2.32 2.32 2.32 2.32-1.040 2.32-2.32-1.040-2.32-2.32-2.32z"></path>
                        </g>
                    </svg>
                    <svg class="recipe-svg svgWhiteMode" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.30147 15.5771C4.77832 14.2684 3.6904 12.7726 3.18002 12C3.6904 11.2274 4.77832 9.73158 6.30147 8.42294C7.87402 7.07185 9.81574 6 12 6C14.1843 6 16.1261 7.07185 17.6986 8.42294C19.2218 9.73158 20.3097 11.2274 20.8201 12C20.3097 12.7726 19.2218 14.2684 17.6986 15.5771C16.1261 16.9282 14.1843 18 12 18C9.81574 18 7.87402 16.9282 6.30147 15.5771ZM12 4C9.14754 4 6.75717 5.39462 4.99812 6.90595C3.23268 8.42276 2.00757 10.1376 1.46387 10.9698C1.05306 11.5985 1.05306 12.4015 1.46387 13.0302C2.00757 13.8624 3.23268 15.5772 4.99812 17.0941C6.75717 18.6054 9.14754 20 12 20C14.8525 20 17.2429 18.6054 19.002 17.0941C20.7674 15.5772 21.9925 13.8624 22.5362 13.0302C22.947 12.4015 22.947 11.5985 22.5362 10.9698C21.9925 10.1376 20.7674 8.42276 19.002 6.90595C17.2429 5.39462 14.8525 4 12 4ZM10 12C10 10.8954 10.8955 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8955 14 10 13.1046 10 12ZM12 8C9.7909 8 8.00004 9.79086 8.00004 12C8.00004 14.2091 9.7909 16 12 16C14.2092 16 16 14.2091 16 12C16 9.79086 14.2092 8 12 8Z" fill="#ffffff"></path>
                        </g>
                    </svg>
                </a>

            <?php } ?>


        </div>

        <div class="right">

            <h2><?= $recipe['recipeName']; ?></h2>

            <div class="info">
                <div class="note">
                    <h3><strong>Note</strong></h3>
                    <p><?= $recipe['rating']; ?> ⭐</p>
                </div>

                <div class="temps">
                    <h3><strong>Temps</strong></h3>
                    <p><?= ($recipe['totalTimeInSeconds'] / 60); ?> ⌛</p>
                </div>

                <div class="ndp">
                    <h3><strong>Nombres de personnes</strong></h3>
                    <p><?= $recipe['numberOfServings']; ?> 👨</p>
                </div>
            </div>

            <!-- <h3><strong>Ingrédients</strong></h3>
            <ul>
                <?php
                $ingredients_array = explode(", ", $recipe['ingredients']);
                foreach ($ingredients_array as $ingredient) { ?>
                    <li> <?= $ingredient; ?> </li>
                <?php }; ?>
            </ul> -->

            <h3><strong>Ingrédients</strong></h3>
            <p><?= $recipe["ingredients"] ?></p>

            <h3><strong>Étapes</strong></h3>
            <ol>
                <?php
                $steps_array = preg_split("/\d+\./", $recipe["step"], -1, PREG_SPLIT_NO_EMPTY);
                foreach ($steps_array as $step) { ?>
                    <li> <?= $step; ?>
                    </li>
                <?php }; ?>
            </ol>

        </div>

    </div>
<?php
}

include('inc/footer.php');

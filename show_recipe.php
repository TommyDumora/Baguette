<?php

session_start();

if (!isset($_SESSION["role"])) {
    header("Location: index.php");
}

require_once("lib/db_connect.php");

$pdo = dbConnect();

$sql = "SELECT * FROM recipes WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $_GET["id"], PDO::PARAM_INT);
$stmt->execute();
$recipe = $stmt->fetch();

include("inc/header.php"); ?>

<div class="recipe">

    <div class="left">

        <img src="<?= $recipe['images'] ?>" alt="">

        <div class="svgDarkMode">
            <a href="index.php">
                <svg class="recipe-svg" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill="#000000" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"></path>
                        <path fill="#000000" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"></path>
                    </g>
                </svg>
            </a>

            <a href="update_recipe.php?id=<?= $recipe["id"] ?>">
                <svg class="recipe-svg" fill="#000000" viewBox="0 0 24 24" id="update" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path id="primary" d="M4,12A8,8,0,0,1,18.93,8" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                        <path id="primary-2" data-name="primary" d="M20,12A8,8,0,0,1,5.07,16" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                        <polyline id="primary-3" data-name="primary" points="14 8 19 8 19 3" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline>
                        <polyline id="primary-4" data-name="primary" points="10 16 5 16 5 21" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline>
                    </g>
                </svg>
            </a>

            <a href="delete_recipe.php?id=<?= $recipe["id"] ?>">
                <svg class="recipe-svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M10 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M14 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
            </a>
        </div>

        <div class="svgWhiteMode">

            <a href="index.php">
                <svg class="recipe-svg" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000" stroke="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <title></title>
                        <g id="Complete">
                            <g id="arrow-left">
                                <g>
                                    <polyline data-name="Right" fill="none" id="Right-2" points="7.6 7 2.5 12 7.6 17" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
                                    <line fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x1="21.5" x2="4.8" y1="12" y2="12"></line>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>

            <a href="update_recipe.php?id=<?= $recipe["id"] ?>">
                <svg class="recipe-svg" fill="#000000" viewBox="0 0 24 24" id="update" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path id="primary" d="M4,12A8,8,0,0,1,18.93,8" style="fill: none; stroke: #ffffff; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                        <path id="primary-2" data-name="primary" d="M20,12A8,8,0,0,1,5.07,16" style="fill: none; stroke: #ffffff; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path>
                        <polyline id="primary-3" data-name="primary" points="14 8 19 8 19 3" style="fill: none; stroke: #ffffff; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline>
                        <polyline id="primary-4" data-name="primary" points="10 16 5 16 5 21" style="fill: none; stroke: #ffffff; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polyline>
                    </g>
                </svg>
            </a>

            <a href="delete_recipe.php?id=<?= $recipe["id"] ?>">
                <svg class="recipe-svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M10 11V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M14 11V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M4 7H20" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
            </a>
        </div>

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

        <h3><strong>Ingrédients</strong></h3>

        <ul>
            <?php
            $ingredients_array = explode(", ", $recipe['ingredients']);
            foreach ($ingredients_array as $ingredient) { ?>
                <li> <?= $ingredient; ?> </li>
            <?php }; ?>
        </ul>

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

<?php include('inc/footer.php');

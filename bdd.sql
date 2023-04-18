-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 avr. 2023 à 16:01
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test_crud`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `recipeName` varchar(255) DEFAULT NULL,
  `ingredients` text DEFAULT NULL,
  `totalTimeInSeconds` int(11) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `images` text DEFAULT NULL,
  `numberOfServings` int(11) DEFAULT NULL,
  `step` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`id`, `recipeName`, `ingredients`, `totalTimeInSeconds`, `rating`, `images`, `numberOfServings`, `step`) VALUES
(1, 'Poulet rôti aux herbes', 'poulet, thym, romarin, ail, huile d\'olive, sel, poivre', 3600, 4.8, 'https://media.soscuisine.com/images/recettes/large/792.jpg', 4, '1. Préchauffer le four à 200°C. 2. Dans un petit bol, mélanger le thym, le romarin, l\'ail, l\'huile d\'olive, le sel et le poivre. 3. Placer le poulet dans un plat allant au four. 4. Badigeonner le poulet avec le mélange d\'herbes. 5. Enfourner pendant 1 heure, en arrosant le poulet toutes les 20 minutes. 6. Laisser reposer le poulet pendant 10 minutes avant de le servir.'),
(2, 'Pâtes à la carbonara', 'spaghetti, pancetta, oeufs, parmesan, poivre', 900, 4.5, 'https://assets.afcdn.com/recipe/20211214/125831_w1024h768c1cx866cy866.jpg', 2, '1. Faire cuire les spaghetti dans une grande casserole d\'eau bouillante salée selon les instructions sur l\'emballage. 2. Dans une poêle, faire revenir la pancetta à feu moyen jusqu\'à ce qu\'elle soit dorée. 3. Dans un petit bol, battre les oeufs et le parmesan jusqu\'à obtenir une consistance lisse. 4. Égoutter les spaghetti et réserver une petite quantité d\'eau de cuisson. 5. Ajouter les spaghetti à la poêle avec la pancetta et remuer pour bien les enrober. 6. Retirer la poêle du feu et ajouter le mélange d\'oeufs et de parmesan, en remuant rapidement pour que les oeufs ne coagulent pas. 7. Si la sauce est trop épaisse, ajouter un peu d\'eau de cuisson réservée. 8. Servir chaud, avec un peu de poivre noir moulu par-dessus.'),
(3, 'Tarte aux pommes', 'pâte brisée, pommes, sucre, cannelle, beurre', 2700, 4.7, 'https://static.750g.com/images/1200-675/a96d46e59b4f0ab8169c7cb0cb932a84/la-cuisson.jpg', 8, '1. Préchauffer le four à 180°C. 2. Étaler la pâte brisée dans un moule à tarte et piquer le fond avec une fourchette. 3. Éplucher et couper les pommes en tranches fines. 4. Disposer les tranches de pommes sur le fond de tarte, en les faisant se chevaucher légèrement. 5. Saupoudrer de sucre et de cannelle. 6. Ajouter quelques petits morceaux de beurre sur le dessus. 7. Enfourner pendant 45 minutes. 8. Laisser refroidir avant de servir.'),
(4, 'Tacos au boeuf', '500g de viande de boeuf hachée, 8 tortillas de maïs, 1 poivron rouge, 1 oignon, 2 gousses d\'ail, 1 cuillère à soupe de cumin moulu, 1 cuillère à soupe de paprika, sel, poivre', 1800, 4.2, 'https://brandsitesplatform-res.cloudinary.com/image/fetch/w_1540,c_scale,q_auto:eco,f_auto,fl_lossy,dpr_1.0,e_sharpen:85/https://assets.brandplatform.generalmills.com%2F-%2Fmedia%2Fproject%2Fgmi%2Foldelpaso%2Foldelpaso-fr%2Foepp%2Fnri%2Ftacos-de-boeuf-facon-birria-mexicaine-hero.png%3Fw%3D480%26rev%3Da663805fddd94a5d8e0a17a594f8a002%201540w', 4, 'Chauffer une poêle à feu moyen-vif. Ajouter la viande hachée et faire cuire jusqu\'à ce qu\'elle soit dorée. Ajouter le poivron et l\'oignon hachés, ainsi que l\'ail émincé, le cumin, le paprika, le sel et le poivre. Faire cuire jusqu\'à ce que les légumes soient tendres. Chauffer les tortillas de maïs selon les instructions sur l\'emballage. Répartir la viande et les légumes sur les tortillas et servir avec des tranches d\'avocat et de la coriandre fraîche.'),
(5, 'Lasagnes', '500g de viande hachée, 1 oignon, 2 gousses d\'ail, 1 boîte de tomates pelées, 1 cuillère à soupe de concentré de tomates, 250g de pâtes à lasagne, 400g de ricotta, 100g de parmesan râpé, sel, poivre', 5400, 4.8, 'https://kissmychef.com/wp-content/uploads/2022/03/lasagne-500x375.png', 6, '1. Préchauffez le four à 180°C. 2. Dans une poêle, faites revenir l\'oignon et l\'ail hachés dans un peu d\'huile d\'olive. 3. Ajoutez la viande hachée et faites-la dorer. 4. Ajoutez les tomates pelées et le concentré de tomates, salez et poivrez. Laissez mijoter pendant 20 minutes. 5. Dans un plat à gratin, alternez les couches de pâtes, de sauce à la viande et de ricotta, en terminant par une couche de pâtes. 6. Saupoudrez de parmesan râpé et enfournez pour environ 30 minutes.'),
(6, 'Ragoût de boeuf à la provençale', 'boeuf, oignon, carotte, céleri, ail, tomates, vin rouge, bouillon de boeuf, herbes de Provence, sel, poivre', 7200, 4.6, 'https://img.cuisineaz.com/660x660/2013/12/20/i45409-ragout-de-boeuf-aux-carottes-et-puree-aux-herbes.jpeg', 6, '1. Couper le boeuf en cubes de 2,5 cm. 2. Émincer l\'oignon et couper la carotte et le céleri en dés. 3. Faire chauffer de l\'huile d\'olive dans une grande cocotte et y faire revenir le boeuf jusqu\'à ce qu\'il soit doré de tous les côtés. 4. Retirer le boeuf de la cocotte et réserver. 5. Ajouter l\'oignon, la carotte et le céleri dans la cocotte et faire revenir pendant environ 5 minutes, jusqu\'à ce que les légumes soient tendres. 6. Ajouter l\'ail émincé et faire revenir pendant 1 minute de plus. 7. Ajouter les tomates concassées, le vin rouge, le bouillon de boeuf et les herbes de Provence. 8. Remettre le boeuf dans la cocotte et porter à ébullition. 9. Baisser le feu et laisser mijoter à feu doux pendant environ 2 heures, jusqu\'à ce que le boeuf soit tendre. 10. Assaisonner avec du sel et du poivre, au goût. 11. Servir chaud, accompagné de pommes de terre vapeur ou de riz.'),
(7, 'Salade grecque', 'concombre, tomates, oignon rouge, poivron vert, feta, olives noires, huile d\'olive, vinaigre de vin rouge, origan, sel, poivre', 900, 4.8, 'https://assets.afcdn.com/recipe/20190704/94666_w1024h768c1cx2689cy1920.jpg', 4, '1. Couper le concombre en rondelles et les tomates en quartiers. 2. Couper l\'oignon rouge en fines lamelles et le poivron vert en dés. 3. Émietter la feta. 4. Dans un grand saladier, mélanger les légumes, la feta et les olives noires. 5. Préparer la vinaigrette en mélangeant l\'huile d\'olive, le vinaigre de vin rouge, l\'origan, le sel et le poivre dans un petit bol. 6. Verser la vinaigrette sur la salade et mélanger délicatement. 7. Servir immédiatement, accompagné de pain pita grillé si désiré.'),
(8, 'Recette spaghettis à l’ail et au basilic', 'spaghettis, ail, basilic', 1800, 4.5, 'https://cache.marieclaire.fr/data/photo/w1000_ci/6h/gettyimages-647750236.webp', 4, 'Faire cuire les spaghettis. Pendant ce temps, hacher l\'ail et le basilic. Faire revenir l\'ail dans de l\'huile d\'olive, ajouter le basilic, puis mélanger avec les spaghettis cuits. Servir chaud.'),
(9, 'Recette banana bread aux noix', 'bananes, farine, sucre, oeufs, noix', 3600, 4.8, 'https://cache.marieclaire.fr/data/photo/w1000_ci/6h/recette-banana-bread-noix11.webp', 8, 'Mélanger la farine, le sucre et les noix. Écraser les bananes et les ajouter au mélange. Ajouter les oeufs un par un en mélangeant bien. Verser la pâte dans un moule à cake beurré et fariné. Faire cuire pendant environ 1 heure à 180°C.'),
(10, 'Recette baeckeoffe d\'agneau aux épices', 'agneau, pommes de terre, carottes, oignons, thym, laurier, cannelle, vin blanc', 7200, 4.2, 'https://cache.marieclaire.fr/data/photo/w1000_ci/6h/recette-baeckeoffe-agneau-epices11.webp', 6, 'Couper l\'agneau en morceaux et le faire mariner dans le vin blanc avec le thym, le laurier et la cannelle. Éplucher et couper les légumes en rondelles. Disposer les légumes et l\'agneau dans un plat à baeckeoffe. Faire cuire pendant environ 4 heures à 150°C.'),
(11, 'Recette cake marbré', 'farine, sucre, oeufs, beurre, lait, cacao', 2700, 4.6, 'https://cache.marieclaire.fr/data/photo/w1000_ci/6h/marbre-au-chocolat1.webp', 8, 'Mélanger la farine, le sucre, les oeufs, le beurre fondu et le lait. Diviser la pâte en deux parts égales. Ajouter le cacao dans une des deux parts. Dans un moule à cake beurré et fariné, alterner les deux pâtes. Faire cuire pendant environ 45 minutes à 180°C.'),
(12, 'Recette cocotte de légumes d\'automne', 'pommes de terre, carottes, panais, courge, champignons, oignons, ail, thym, huile d\'olive', 3600, 4.4, 'https://cache.marieclaire.fr/data/photo/w1000_ci/63/cocotte-legumes-automne.webp', 4, 'Éplucher et couper tous les légumes en morceaux. Les faire revenir dans une cocotte avec de l\'huile d\'olive. Ajouter l\'ail et le thym. Couvrir et faire cuire pendant environ 1 heure à feu doux.'),
(13, 'Recette boulettes de veau aux petits pois et au citron', 'viande de veau hachée, petits pois, chapelure, citron, oeuf, oignon, ail, persil, sel, poivre', 2400, 4.5, 'https://cache.marieclaire.fr/data/photo/w1000_ci/1h2/boulettes-de-veau-aux-petits-pois-et-citron.webp', 4, '1. Dans un saladier, mélanger la viande hachée avec la chapelure, le zeste de citron râpé, l\'œuf battu, l\'oignon et l\'ail hachés, le persil, du sel et du poivre.\n2. Former des boulettes et les faire dorer dans une poêle avec de l\'huile d\'olive.\n3. Ajouter les petits pois et un peu d\'eau, couvrir et laisser mijoter à feu doux pendant 15 à 20 minutes.\n4. Servir chaud.'),
(14, 'Recette parmentier de cabillaud et haddock', 'cabillaud, haddock, pommes de terre, lait, beurre, sel, poivre, muscade, oignon, ail, huile d\'olive', 3600, 4.2, 'https://cache.marieclaire.fr/data/photo/w1000_ci/1h2/parmentier-de-cabillaud-et-haddock.webp', 4, '1. Faire cuire les pommes de terre dans de l\'eau salée jusqu\'à ce qu\'elles soient tendres.\n2. Les égoutter et les écraser avec du lait, du beurre, du sel, du poivre et de la muscade.\n3. Dans une poêle, faire revenir l\'oignon et l\'ail dans de l\'huile d\'olive.\n4. Ajouter le cabillaud et le haddock coupés en morceaux et faire cuire pendant 10 minutes.\n5. Préchauffer le four à 180°C.\n6. Dans un plat à gratin, disposer une couche de purée, une couche de poisson, une deuxième couche de purée.\n7. Enfourner pour 25 à 30 minutes.\n8. Servir chaud.'),
(15, 'Recette chili con carne', 'boeuf haché, oignon, poivron rouge, tomates pelées, haricots rouges, épices chili, huile d\'olive, sel, poivre', 3600, 4.6, 'https://cache.marieclaire.fr/data/photo/w1000_c17/1h2/chili-con-carne-facile.webp', 6, '1. Dans une grande poêle, faire chauffer de l\'huile d\'olive.\n2. Faire revenir l\'oignon et le poivron rouge coupés en petits dés.\n3. Ajouter la viande hachée et faire cuire jusqu\'à ce qu\'elle soit dorée.\n4. Ajouter les tomates pelées et les épices chili, saler et poivrer.\n5. Laisser mijoter pendant 30 minutes à feu doux.\n6. Ajouter les haricots rouges égouttés et faire cuire encore 10 minutes.\n7. Servir chaud.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

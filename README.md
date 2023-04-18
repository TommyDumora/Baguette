# Baguette

Ce projet est un site de recettes de cuisine avec un système CRUD (Create, Read, Update, Delete) développé en PHP version 8.2 et utilisant une base de données MySQL.

Le site présente toutes les recettes stockées en base de données sur la page d'accueil. Les utilisateurs peuvent se connecter sur une page dédiée `/admin.php`. L'utilisateur connecté avec le rôle "admin" a également accès à un menu CRUD pour chaque recette.

## BDD

La base de données comprend deux tables: une table pour les recettes et une autre pour les utilisateurs. La table des recettes stocke les informations suivantes:

### `recipes` :

- `id`: identifiant unique pour chaque recette.
- `recipeName`: le titre de la recette.
- `ingrédients`: les ingrédients nécessaires pour la recette.
- `totalTimeInSeconds`: le temps de préparation.
- `rating`: la note de la recette.
- `image`: l'URL de l'image de la recette.
- `numberOfServings`: pour combien de personne.
- `step`: les différentes étapes.

La table des utilisateurs stocke les informations suivantes:

### `admin` :

- `id`: identifiant unique pour chaque utilisateurs.
- `username`: nom d'utilisateur.
- `password`: mot de passe de l'utilisateur.
- `role`: rôle user par default.

## Installation

Pour installer le site, vous pouvez suivre les étapes suivantes:

1. Clonez ce dépôt sur votre ordinateur.

```bash
git clone git@github.com:TommyDumora/Baguette.git
```

2. Ouvrez le terminal et naviguez jusqu'au répertoire cloné.

3. Créez une base de données MySQL et importez le fichier de la base de données inclus.

4. Modifiez le fichier `db_connect.php` avec les informations de votre base de données.

5. Lancez votre serveur web.

6. Les imformations de connexion pour le compte admin et tester le CRUD sont : `admin` et `admin`.

## Fonctionnalités

Les fonctionnalités du site comprennent:

- La visualisation de toutes les recettes disponibles sur la page d'accueil.
- La connexion des utilisateurs.
- La création, la lecture, la mise à jour et la suppression des recettes pour les utilisateurs administrateurs.

## Limitations

Ce projet est une démonstration de l'utilisation de PHP et MySQL pour développer un site CRUD de recettes de cuisine. Il n'a pas été développé avec des considérations de sécurité avancées et doit être utilisé à des fins d'apprentissage et de démonstration uniquement.

## Futures fonctionnalités

- [x] Mettre en place le hash des mots de passe
- [ ] Rajouter une page incription
- [ ] Ajout d'un système de commentaire sous les recettes
- [ ] Ajout d'un CRUD sur les commentaires
- [ ] Ajout d'un système de favori pour les recettes

## Auteurs

Ce projet a été développé par Tommy Dumora.

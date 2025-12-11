<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
        # VERSION 2
        
    /* ▂ ▅ ▆ █  Create dir  █ ▆ ▅ ▂  */
    /*
    - Controllers: Il contiendra tous les contrôleurs en charge de gérer leur entité.
    - Core: C'est le coeur de l'application (connexion à la base de données, router).
    - Entities: Il contient les classes représentant les tables de la base de données.
    - Models: Il contiendra tous les modèles (requêtes SQL) de chaque entité.
    - public: il contient ce qui est accessible par le navigateur.
    - Views: Il contiendra toutes les vues (l'affichage des pages) avec un dossier par contrôleur.
    - Autoloader.php: Il permettra de charger automatiquement nos fichiers de classes.
    */
    if (!is_dir('../Controllers')){mkdir('../Controllers');};
    if (!is_dir('../Core')){mkdir('../Core');};
    if (!is_dir('../Entities')){mkdir('../Entities');};
    if (!is_dir('../Models')){mkdir('../Models');};
    if (!is_dir('../public')){mkdir('../public');};
        # ├ Created subfolder
        if (is_dir('../public') && !is_dir("../public/images")){mkdir('../public/images');};
    if (!is_dir('../Views')){mkdir('../Views');};
        # ├ Created subfolder
        if (is_dir('../Views') && !is_dir("../Views/home")){mkdir('../Views/home');};
    if (!is_dir('../css')){mkdir('../css');};
    if (!is_dir('../js')){mkdir('../js');};
    if (!is_dir('../php')){mkdir('../php');};
    if (!is_dir('../json')){mkdir('../json');};
    if (!is_dir('../images')){mkdir('../images');};
    if (!is_dir('../includes')){mkdir('../includes');};
?>
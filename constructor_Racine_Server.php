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
    if (!is_dir('../app')){mkdir('../app');};
        # ├ Created subfolder
    if (!is_dir('../app/Controllers')){mkdir('../app/Controllers');};
    if (!is_dir('../app/Core')){mkdir('../app/Core');};
    if (!is_dir('../app/Entities')){mkdir('../app/Entities');};
    if (!is_dir('../app/Models')){mkdir('../app/Models');};
    if (!is_dir('../app/public')){mkdir('../app/public');};
        # ├ Created subfolder
        if (is_dir('../app/public') && !is_dir("../app/public/images")){mkdir('../app/public/images');};
    if (!is_dir('../app/Views')){mkdir('../app/Views');};
        # ├ Created subfolder
        if (is_dir('../app/Views') && !is_dir("../app/Views/home")){mkdir('../app/Views/home');};
    if (!is_dir('../app/css')){mkdir('../app/css');};
    if (!is_dir('../app/js')){mkdir('../app/js');};
    if (!is_dir('../app/php')){mkdir('../app/php');};
    if (!is_dir('../app/json')){mkdir('../app/json');};
    if (!is_dir('../app/images')){mkdir('../app/images');};
    if (!is_dir('../app/includes')){mkdir('../app/includes');};

    if (!is_dir('../StructureTables')){mkdir('../StructureTables');};
    if (!is_dir('../StructureFormulaires')){mkdir('../StructureFormulaires');};

?>
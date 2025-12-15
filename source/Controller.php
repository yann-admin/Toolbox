<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
        /*Les contrôleurs contiennent tout le code de fonctionnement des pages de l'application en réceptionnant les informations demandées au modèle, 
        pour ensuite les proposer à la vue. Ou alors, en proposant des valeurs directement au modèle pour ensuite les traités dans la base de données.
        Un contrôleur est composé de méthodes, qui elles-mêmes représentent une action exécutée sur une des pages de l'application.
        Dans la classe "Controller", on commence par déclarer le "namespace" de la classe afin de lui donner un espace de nom pour que l'autoloader puisse l'exécuter. 
        Pour cela, on utilise le mot clé "namespace" suivi de l'espace de nom. Ici, la racine de l'application se nomme "App" suivi du nom du dossier "Controllers".
        nsuite, on déclare la classe "Controller" que l'on définit comme une classe abstraite avec le mot clé "abstract". Car nous n'allons jamais l'instancier. 
        Nous passerons tout le temps par les classes "Controller" qui l'étendent.
        */
    /*
    */
    /* ▂ ▅ ▆ █  NameSpace  █ ▆ ▅ ▂ */
        #namespace=Nom du projet \ nom du dossier
        namespace App\Controllers;    
    /*
    */
    /* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
        abstract class Controller{
            /* ▂ ▅ ▆ █ Methodes █ ▆ ▅ ▂ */
                public function render(string $patch, array $data = []){
                    # Permet d'extraire les données récupérées sous forme de variables
                    extract($data);
                    # on créer le buffer de sortie:
                    ob_start();
                    # Créer le chemin et inclut le fichier de la vue souhaitée
                    include dirname(__DIR__). '/Views/' . $patch . '.php';;
                    # On Vide le buffer dans la variable $title et $content
                    $content = ob_get_clean();
                    # On fabrique le "template"
                    include dirname(__DIR__) .'/Views/base.php';
                }
                /**/
            /* ----------------------------- */
        };
    /* ----------------------------- */
?>
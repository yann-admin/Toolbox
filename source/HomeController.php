<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
        /*Un contrôleur nommé HomeController est créé. Comme il s'agit d'une déclaration de classe, il est important de spécifier le "namespace". 
        Ce contrôleur hérite du contrôleur parent défini précédemment, pour bénéficier de ses paramètres.
        Une méthode publique appelée "index()" est déclarée pour l'instant, elle affiche simplement une chaîne de caractères.
        Le routeur cible ce contrôleur et sa méthode "index()" pour répondre à l'action de l'utilisateur via l'URL. 
        */
    /*
    */
    /* ▂ ▅ ▆ █  Inclusion  █ ▆ ▅ ▂ */
        #namespace=Nom du projet \ nom du dossier
        namespace App\Controllers;
    /*
    */
    /* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
        class HomeController extends Controller{
            /* ▂ ▅ ▆ █ Methodes █ ▆ ▅ ▂ */
                Public function index(){
                    //echo "cette méthode affiche la page d'acceuil";
                    $this -> render('home/index');
                }
                /**/
                Public function login(){
                    //echo "cette méthode affiche la page d'acceuil";
                    $this -> render('userapp/indexUserapp');
                }
                /**/
            /* ----------------------------- */
        };
    /* ----------------------------- */   
?>

<?php
    //?XDEBUG_SESSION_START=1
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
        /* file created by Z_ToolBox\source\index.php /
        /*  L'index.php est le premier fichier exécuté et la seule porte d'entrée de l'application.
            Dans un premier temps, nous importons les classes "Autoloader" et "Routeur" via le mot clé "use" car nous utilisons le principe des "namespace".
            Nous incluons obligatoirement l'autoloader dans l'index car il va nous être utile pour exécuter la classe "Routeur".
            Nous incluons également le fichier de la classe "Autoloader" car nous exécutons la méthode "register", qui est une méthode "static", donc sans instanciation de la classe.
            Enfin, une fois la classe Routeur instanciée, nous exécutons la méthode "routes()" qui contient toute la logique du routeur, et donc l'exécution du contrôleur et de sa 
            méthode pour lancer une action telle que l'affichage d'une page ou le traitement d'un formulaire.
        */
    /**/
    /* ▂ ▅ ▆ █  NameSpace  █ ▆ ▅ ▂ */
        #namespace=Nom du projet \ nom du dossier
    /**/
    session_start();
    
    /* ▂ ▅ ▆ █  Inclusion  █ ▆ ▅ ▂ */
        use App\Autoloader;
        use App\Core\Router;  
        include '../Autoloader.php';  
    /**/
    /* ▂ ▅ ▆ █  DEONNCECTION AUTO  █ ▆ ▅ ▂ */
        if(isset($_SESSION['LAST_ACTIVITY']) && (time()-$_SESSION['LAST_ACTIVITY']>180)){
            session_unset();
            session_destroy();
            header("Location:index.php");
        };
        $_SESSION['LAST_ACTIVITY']=time();
    /**/
    /* ▂ ▅ ▆ █  Call  █ ▆ ▅ ▂ */
        Autoloader::register();
        # On instancie le routeur :
            $route = new Router();
        # On lance l'application :
            $route->routes();
    /**/
?>
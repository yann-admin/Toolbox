<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
        # Le routeur va récupérer l'URL demandée par l'utilisateur. Nous allons donc définir une structure type des URLs.
    /*
    */
    /* ▂ ▅ ▆ █  NameSpace  █ ▆ ▅ ▂ */
        namespace App\Core;
    /*
    */
    /* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
        class Router {
            /* Dans la classe "Routeur", nous déclarons une méthode "routes" qui sera appelée plus tard dans l'index de notre application. 
            Cette méthode permet de récupérer les valeurs de chaque paramètre présent dans l'URL grâce à la superglobale "$_GET".
            Cette variable $_GET est un tableau et c'est donc dans ce dernier que nous récupérons, au minimum, les deux paramètres "controller" et "action", 
            et potentiellement d'autres paramètres tels qu'un identifiant */
            
            /* ▂ ▅ ▆ █ Methodes █ ▆ ▅ ▂ */
            public function routes(){
                # on enlève la $_GET['XDEBUG_SESSION_START'] avant traitement de l'URL pour les erreurs
                if(isset($_GET['XDEBUG_SESSION_START'])){array_shift($_GET);}

                #on recherche $_SESSION['identifiant']
                if(!isset($_SESSION['identifiant'])){
                    $_GET['controller']="userapp";
                    if(isset($_POST['true'])){
                        $_GET['action']="controlLogin";
                    }else{
                        $_GET['action']="connexion";
                    }                    
                }else{

                };
                /*Nous stockons la valeur du paramètre "controller" récupéré par la superglobale "$_GET" dans la variable "$controller". 
                Si cette dernière n'est pas déclarée, alors nous assignons la valeur "home" par défaut afin d'exécuter un contrôleur par défaut qui sera celui de la page d'accueil. 
                Pour dynamiser le routeur, nous stockons de nouveau la valeur récupérée précédemment dans la même variable en la concaténant avec son namespace et le mot "Controller", 
                afin d'indiquer le nom de la classe contrôleur à exécuter. */
                $controller = (isset($_GET['controller']) ? ucfirst(array_shift($_GET)):'Home');
                $controller = '\\App\\Controllers\\' . $controller . 'Controller';

                /* Nous faisons ensuite la même chose avec le paramètre "action". Sauf que dans ce cas, l'objectif étant d'exécuter la méthode du contrôleur concerné, 
                nous ne récupérons que le nom de cette méthode. Par défaut, pour accéder à la page d'accueil, la méthode exécutée se nomme "index". */
                $action = (isset($_GET['action']) ? ucfirst(array_shift($_GET)):'index');
                //On instancie le contrôleur:
                $controller = new $controller();
                if(method_exists($controller,$action)){
                    //Execute la méthode:
                    (isset($_GET)) ? call_user_func_array([$controller,$action], $_GET) : $controller->action();
                }else{
                    // On envoie Error 404:
                    http_response_code(404);
                    echo "La page recherchée n'existe pas";
                };
            }
            /**/
        };
    /* ----------------------------- */
    /*Nous pouvons remarquer l'utilisation de la fonction "array_shift()". Cette fonction permet d'enlever du tableau l'index ciblé. 
    Pourquoi ? Parce que, comme indiqué au début, nous manipulons le tableau "$_GET" pour y manipuler les valeurs paramétrées dans l'URL, 
    et le but est de savoir à la fin de notre traitement s'il reste encore des paramètres à prendre en compte afin de les faire passer à 
    l'intérieur de la méthode exécutée dans le contrôleur. C'est ce que nous faisons dans la condition suivante : "si le contrôleur et la 
    méthode existent, alors nous testons s'il reste toujours 'index' dans la variable $_GET. Si c'est le cas, nous exécutons le contrôleur 
    et sa méthode avec la variable $_GET, ajoutant ainsi des paramètres entre les parenthèses de la méthode grâce à la fonction "call_user_func_array". 
    Sinon, s'il n'y a plus d'index dans $_GET, nous exécutons le contrôleur et sa méthode sans paramètres.*/
?>
<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
        /*
        La faille CSRF
        CSRF signifie "Cross-Site Request Forger", c'est-à-dire la falsification d'une requête intersite. 
        Cette attaque déclenche une action sur un site en passant par l'utilisateur du site. 
        */
    /*__________________________________*/
    /* */
    /* ▂ ▅ ▆ █  NameSpace  █ ▆ ▅ ▂ */
        namespace App\Core;
    /*__________________________________*/
    /**/
    /* ▂ ▅ ▆ █   Variable  █ ▆ ▅ ▂ */
        # Variable to be modified as needed :
        /* ------------------- */
        # Automatic variable :
        /* ------------------- */
    /*__________________________________*/
    /**/
    /* ▂ ▅ ▆ █  Inclusion  █ ▆ ▅ ▂ */
    /*__________________________________*/
    /**/
    /* ▂ ▅ ▆ █  Function   █ ▆ ▅ ▂ */
    /*__________________________________*/
    /**/
    /* ▂ ▅ ▆ █    Class    █ ▆ ▅ ▂ */
        class Token {
            #  ****   Attributs:  ****
            private $token;
            private $token_time;
            /* ----------------------- */
            #  ****   Constante:  ****
            /* ----------------------- */
            public function __construct($token, $token_time){
                $this->token = $token;
                $this->token_time = $token_time;
            }

            # ----    Setters     ----         
            /* ----------------------- */
            # ----    Getters     ----  
            public function getToken(){ return $this -> token;}
            public function getToken_time(){ return $this -> token_time;}
            /* ----------------------- */
        }
    /**/
    /*__________________________________*/

?>
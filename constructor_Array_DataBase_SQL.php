<?php
        /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */ 
            # VERSION 2
            # Code de récupération du non des colonnes des tables et écriture dans le fichier : ../structure_Table_DataBase.php
        /* ================================ */
        /* ▂ ▅ ▆ █  NameSpace  █ ▆ ▅ ▂ */
           namespace App\ToolBox;
        /* ▂ ▅ ▆ █  Inclusion  █ ▆ ▅ ▂ */
            //use App\Core\DbConnect;
            use PDO;
            // require "constructor_Entitites_Class_Table_DataBase.php";
            // require "constructor_Models_Class_Table_DataBase.php";
            // require "constructor_Controller.php";
            // require "constructor_Form.php";
        /* ================================ */

        /* ▂ ▅ ▆ █ Variable █ ▆ ▅ ▂ */
            /************************************* A MODIFIER ************************************************* */
            # Tables de la base de donnée. 'ex: userapp'  
                $DataBase='ligne';     
            #********************
            # type input possible: text, number, date, phone, mail, textarea, select , file, password (!!!!! Déclaré la colonne ID)
                $TypeInputTable=array('number','text');    
            #********************              
            # Var bool pour supprimer le fichier avant écriture
                $boolClearData=false;

                // $boolCreateControllers = true;
                // $boolCreateEntities = true;
                // $boolCreateModels = true;
                // $boolCreateForm = false;
                #******************** 
                # Représentation graphique des tables de la base de donnée.
                    $path = "./../";                               # Chemin pour aller à la racine du serveur.
                    $fileName = "Représentation_structure_Table_DataBase.php";    # Nom du fichier pour la représentation graphique de la structure des tables de la base de donnée.
                    $fileGraphTable = $path.$fileName;             # Chemin complet du fichier de réprésentation graphique de la structure des tables de la base de donnée.
                #********************
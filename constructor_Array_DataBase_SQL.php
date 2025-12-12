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
            use Dotenv\Dotenv;

            require 'vendor/autoload.php';
            // require "constructor_Entitites_Class_Table_DataBase.php";
            // require "constructor_Models_Class_Table_DataBase.php";
            // require "constructor_Controller.php";
            // require "constructor_Form.php";
        /* ================================ */
        
            $dotenv = Dotenv::createImmutable(__DIR__);
            $dotenv->load(); 

        /* ▂ ▅ ▆ █ Variable █ ▆ ▅ ▂ */
            /************************************* A MODIFIER ************************************************* */
            # Tables de la base de donnée. 'ex: userapp'  
                $DataBase='creation';     
            #********************
            # type input possible: text, number, date, phone, mail, textarea, select , file, password (!!!!! Déclaré la colonne ID)
                $TypeInputTable=array('number','text');    
            #********************              
            # Var bool pour supprimer le fichier avant écriture
                $boolClearData=true;

                // $boolCreateControllers = true;
                // $boolCreateEntities = true;
                // $boolCreateModels = true;
                // $boolCreateForm = false;
                #******************** 
                # Représentation graphique des tables de la base de donnée.
                $path = "../StructureTables/";                               # Chemin pour aller à la racine du serveur.
                $fileName = "Représentation_structure_Table_$DataBase.json";    # Nom du fichier pour la représentation graphique de la structure des tables de la base de donnée.
                $fileGraphTable = $path.$fileName;             # Chemin complet du fichier de réprésentation graphique de la structure des tables de la base de donnée.
                #********************

            # Constante de connexion à la base de donnée      
             $SERVER = $_ENV['SERVER'];
             $PORT = $_ENV['PORT'];
             $BASE = $_ENV['BASE'];
             $USER = $_ENV['USER'];
             $PASSWORD = $_ENV['PASSWORD'];
            # on créer la connection à la bade de donnée.
            $oConnexion = new PDO("mysql:host=". $SERVER . ":" . $PORT .";dbname=" . $BASE, $USER, $PASSWORD);
            $connexion = $oConnexion;
            $saveText ="";
            /*************************************************************************************************** */
        /* ▂ ▅ ▆ █ Code █ ▆ ▅ ▂ */
            # on ouvre le fichier $fileGraphTable en mode lecture et ériture.
            if($boolClearData==true){
            # On supprime le fichier
                if (file_exists($fileGraphTable)) {
                    !unlink($fileGraphTable);
                    fopen($fileGraphTable,'w');
                };
            }else{
                if (file_exists($fileGraphTable)) {
                    # Ouvre un fichier pour lire un contenu existant
                    $saveText = file_get_contents($fileGraphTable);   
                }else{
                    fopen($fileGraphTable,'w');
                }         
            };
            # RECHERCHE DES DONNEES DE LA TABLE 
                # REQUETE :
                # On prépare la requète de récupération de la liste des colonnes de la table.
                    $prepare = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$DataBase' ORDER BY ORDINAL_POSITION";
                    $request = $connexion -> prepare($prepare);
                    $request -> execute();
                    $objResultRequest = $request -> fetchAll(PDO::FETCH_ASSOC);
                    $json =json_encode($objResultRequest,JSON_PRETTY_PRINT);
                    //echo ($json. PHP_EOL);
                #********************
            #********************
            # ECRITURE STRUCTURE DE LA TABLES :
            // Écrit le résultat dans le fichier
                if($boolClearData==false){
                    file_put_contents($fileGraphTable, $saveText, FILE_APPEND ); 
                }else{
                    file_put_contents($fileGraphTable, $json, FILE_APPEND );               
                };
            #********************

            $tableJson = file_get_contents('../Représentation_structure_Table_'.$DataBase.'.json');
            $table = json_decode($tableJson, true);

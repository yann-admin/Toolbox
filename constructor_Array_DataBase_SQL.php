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
                    $path = "../";                               # Chemin pour aller à la racine du serveur.
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
                $headerText="";
                $saveText ="";
                $version = "2";                                 # Variable pour les commentaires
                $correctif = "\t\t\t"."/* Version 2: Reprise complète du soft */ \n";
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
            //$file=fopen($fileGraphTable, 'w+');                      
            # on écrit les infos :
            //$headerText.="<?php";
            $headerText.="\n";
            $headerText.="\t". "/* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */" ."\n";
            $headerText.="\t\t". "/* via Z_ToolBox/CONSTRUCTOR/constructor_Array_Structure_Table.php VERSION: $version*/" ."\n";
            $headerText.= $correctif . "\n";
            $headerText.= "\n"; 
            # RECHERCHE DES DONNEES DE LA TABLE
                #VARIABLES :
                # Raz des variables
                    $prepare="";                # Variable préparation de la requète.
                    $comment="";                # Variable commentaire.
                    $objResultRequest=[];       # Variable résultats de la requète.
                    $arrayColumn="";            # Variable texte des noms et des types de valeurs des colonnes de la table.
                #********************  
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
                # On écrit l'entête du fichier
                    $headerText.= "\t". "/* ▂ ▅ ▆ █ Fichier structure table database $DataBase █ ▆ ▅ ▂ */" . "\n";
                # On écrit le début du commentaire
                    $comment="\t\t". "/* Commentaire sur la structure pour aide au débeug */" . "\n";
                //   $comment.="\t\t\t /*". "\$structureTableDb_$listTableDataBase = array(" . "\n";
                // # On écrit le début du tableau de la structure de la table
                //     $arrayColumn.="\t\t" . "\$structureTableDb_$listTableDataBase = array(" . "\n"; 
                //     for ($col=0 ; $col<count($objResultRequest) ; $col++){
                //         # On test si le champ peu être nul
                //         if($objResultRequest[$col]->IS_NULLABLE=="NO"){$required='false';}else{$required='true';};
                //         # On test si le champ length n'est pas vide
                //         if($objResultRequest[$col]->CHARACTER_MAXIMUM_LENGTH==NULL){$maxLength="";}else{$maxLength=$objResultRequest[$col]->CHARACTER_MAXIMUM_LENGTH;};
                //         # On test si c'est la dernière donnée.
                //         if ($col<(count($objResultRequest)-1)){
                //             # on écrit le dévut du tableau en commentaire
                //             $comment.="\t\t\t\t". "array(";
                //             $comment.="'ColumnNum'=>$col, ";
                //             $comment.="'name'=>'" . $objResultRequest[$col]->COLUMN_NAME ."', ";
                //             $comment.="'null'=>'" . $required ."', ";
                //             $comment.="'type'=>" . $TypeInputTable[$col] ."', ";
                //             $comment.="'maxLength'=>'" . $objResultRequest[$col]->CHARACTER_MAXIMUM_LENGTH ."', ";
                //             $comment.="'commentaire'=>'" . $objResultRequest[$col]->COLUMN_COMMENT."', );";
                //             $comment.="\n";
                //             #
                //             $arrayColumn.="\t\t\t". "array(";
                //             $arrayColumn.="'ColumnNum'=>$col, ";
                //             $arrayColumn.="'name'=>'". $objResultRequest[$col]->COLUMN_NAME ."' , ";
                //             $arrayColumn.="'null'=>'" . $required ."', ";
                //             $arrayColumn.="'type'=>'". $TypeInputTable[$col] ."', ";
                //             $arrayColumn.="'maxLength'=>" . "'$maxLength'" .", ";
                //             $arrayColumn.="'commentaire'=>'". $objResultRequest[$col]->COLUMN_COMMENT ."' ), ";
                //             $arrayColumn.="\n";
                //         }else{
                //             # on écrit le dévut du tableau en commentaire
                //             $comment.="\t\t\t\t". "array(";
                //             $comment.="'ColumnNum'=>" . $col.", ";
                //             $comment.="'name'=>'" . $objResultRequest[$col]->COLUMN_NAME ."', ";
                //             $comment.="'null'=>'" . $required ."', ";
                //             $comment.="'type'=>'" . $TypeInputTable[$col] ."', ";
                //             $comment.="'maxLength'=>'" . $objResultRequest[$col]->CHARACTER_MAXIMUM_LENGTH ."', ";
                //             $comment.="'commentaire'=>'" . $objResultRequest[$col]->COLUMN_COMMENT ."' );";
                //             $comment.="\n";
                //             #
                //             $arrayColumn.="\t\t\t". "array(";
                //             $arrayColumn.="'ColumnNum'=>$col, ";
                //             $arrayColumn.="'name'=>'". $objResultRequest[$col]->COLUMN_NAME ."', ";
                //             $arrayColumn.="'null'=>'" . $required ."', ";
                //             $arrayColumn.="'type'=>'". $TypeInputTable[$col] ."', ";
                //             $arrayColumn.="'maxLength'=>" . "'$maxLength'" .", ";
                //             $arrayColumn.="'commentaire'=>'". $objResultRequest[$col]->COLUMN_COMMENT ."' ) ";
                //             $arrayColumn.="\n";
                //         };
                //         };
                //         # on ferme le commentaire
                //         $comment.="\t\t\t". ")" . "\n";                
                //         $comment.="\t". "*/";
                //         $arrayColumn.="\t\t". ");"; 
                // #********************
            #********************
            /*
            $FooterText="\n";        
            $FooterText.="?>\n";*/

            // Écrit le résultat dans le fichier
                if($boolClearData==false){
                    //file_put_contents($fileGraphTable, $headerText, FILE_APPEND );

                    //file_put_contents($fileGraphTable, $comment, FILE_APPEND );
                    //file_put_contents($fileGraphTable, $arrayColumn, FILE_APPEND );

                    //file_put_contents($fileGraphTable, $FooterText, FILE_APPEND ); 

                    
                    file_put_contents($fileGraphTable, $saveText, FILE_APPEND ); 

                }else{

                    file_put_contents($fileGraphTable, $json, FILE_APPEND );

                    //file_put_contents($fileGraphTable, $comment, FILE_APPEND );
                    //file_put_contents($fileGraphTable, $arrayColumn, FILE_APPEND );

                    //file_put_contents($fileGraphTable, $FooterText, FILE_APPEND );                
                };
            #********************

            $tableJson = file_get_contents('../Représentation_structure_Table_'.$DataBase.'.json');
            $table = json_decode($tableJson, true);

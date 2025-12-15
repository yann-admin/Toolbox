<?php
    /* ▂ ▅ ▆ █ Function █ ▆ ▅ ▂ */
        /* A MODIFIER */
        $version="2.0";
        $name = "creation";

        $nameApplication = "App";
        $models = ucfirst($name)."Model.php";
        $patchModels ="../StructureModels/";
        $fileModels = $patchModels . $models;
        # On supprime le fichier entities
        if (file_exists($fileModels)) {
            !unlink($fileModels);
        };
        # Include du fichier JSON structure de la table
        $tableJson = file_get_contents('../StructureTables/Représentation_structure_Table_'. $name .'.json');
        $table = json_decode($tableJson, true);
                                                                /* ▂ ▅ ▆ █ Models █ ▆ ▅ ▂ */
        #Add file in under directory :
        $file = fopen($fileModels,'w+');
        # Whrite in the file entiites
        fwrite($file,"<?php");
        fwrite($file,"\n");
        # Writing info database :
        fwrite($file,"\t". "/* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t\t". "/* Fichier entities database : $name via constructor_Array_DataBase_SQL.php VERSION: $version*/ \n") ;
        fwrite($file,"\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ \n") ;
        /*--------------------------*/
        # Writing head :
        fwrite($file,"\t". "/* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t\t". "namespace $nameApplication\\Entities;" ."\n");
        fwrite($file,"\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ \n") ;
        fwrite($file,"\n") ;
        fwrite($file,"\t". "/* ▂ ▅ ▆ █ Inclusion █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t\t". "use PDO;" . "\n");
        fwrite($file,"\t\t". "use Exception;" . "\n");
        fwrite($file,"\t\t". "use App\Core\DbConnect;" . "\n");
        fwrite($file,"\t\t". "use App\Entities\\". ucfirst($name) . ";" . "\n");
        fwrite($file,"\t\t". "use App\Models\PdoDbException;" . "\n");
        fwrite($file,"\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ \n") ;
        fwrite($file,"\n") ;
        /*--------------------------*/
        # Writing Class : 
        fwrite($file,"\t". "/* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t"."class " . ucfirst($name) . "Model extends DbConnect" . "{" . "\n");
        /*--------------------------*/
        # Writing Methodes :
        fwrite($file,"\t\t". "/* ▂ ▅ Methodes ▅ ▂ */" ."\n");
        # Writing executeTryCatch() :
        fwrite($file,"\t\t\t". "/* ▂ ▅  executeTryCatch()  ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t\t". "public function executeTryCatch() { " ."\n");
        fwrite($file,"\t\t\t\t\t". "try {" ."\n");
        fwrite($file,"\t\t\t\t\t\t". "\$this -> request -> execute();" ."\n");
        fwrite($file,"\t\t\t\t\t\t". "\$pdoDbException = '';" ."\n");
        fwrite($file,"\t\t\t\t\t". "}catch ( Exception \$e ){" ."\n");
        fwrite($file,"\t\t\t\t\t\t". "\$pdoDbException =  new PdoDbException( \$e );" ."\n");
        fwrite($file,"\t\t\t\t\t". "}" ."\n");
        fwrite($file,"\t\t\t\t\t". "/* Ferme le curseur, permettant à la requete d'être de nouveau executée */" ."\n");
        fwrite($file,"\t\t\t\t\t". "\$this -> request -> closeCursor();" ."\n");
        fwrite($file,"\t\t\t\t\t". "return  \$pdoDbException;" ."\n");
        fwrite($file,"\t\t\t\t". "}" ."\n");
        fwrite($file,"\t\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂ */" ."\n\n");
        # Writing findAll() :
        fwrite($file,"\t\t\t". "/* ▂ ▅  findAll()  ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t\t". "public function findAll() { " ."\n");
        fwrite($file,"\t\t\t\t\t". "\$this -> request = \$this -> connexion -> prepare( \"SELECT $name.* FROM $name\" );" ."\n");
        fwrite($file,"\t\t\t\t\t". "\$this -> request -> execute();" ."\n");
        fwrite($file,"\t\t\t\t\t". "\$results = \$this -> request -> fetchAll();" ."\n");
        fwrite($file,"\t\t\t\t\t". "return \$results;" ."\n");
        fwrite($file,"\t\t\t\t". "}" ."\n");
        fwrite($file,"\t\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂ */" ."\n\n");
        # Writing findId( int$id ) :
        fwrite($file,"\t\t\t". "/* ▂ ▅  findId( int \$id )  ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t\t". "public function findId( int \$id ) { " ."\n");
        $idColumn = $table[0]["COLUMN_NAME"];
        fwrite($file,"\t\t\t\t\t". "\$this -> request = \$this -> connexion -> prepare( \"SELECT $name.* FROM $name WHERE $name.$idColumn=:$idColumn\" );" ."\n");
        fwrite($file,"\t\t\t\t\t". "\$this -> request -> bindParam(\":$idColumn\", \$id , PDO::PARAM_STR);" ."\n");
        fwrite($file,"\t\t\t\t\t". "\$this -> request -> execute();" ."\n");
        fwrite($file,"\t\t\t\t\t". "\$results = \$this -> request -> fetch();" ."\n");
        fwrite($file,"\t\t\t\t\t". "return \$results;" ."\n");
        fwrite($file,"\t\t\t\t". "}" ."\n");
        fwrite($file,"\t\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂ */" ."\n\n");
        # Writing findEmpty( array $table, array $Column ) :
        fwrite($file,"\t\t\t". "/* ▂ ▅  findEmpty( array \$table, array \$Column, str \$value )  ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t\t". "public function findEmpty( array \$table, array \$Column, str \$value  ) { " ."\n");
        fwrite($file,"\t\t\t\t\t". "\$this -> request = \$this -> connexion -> prepare( \"SELECT \$table[0].* FROM \$table[0] WHERE \$table[0].\$Column[0]=:\$Column[0]\" );" ."\n");
        fwrite($file,"\t\t\t\t\t". "\$this -> request -> bindParam(\":\$Column[0]\", \$value , PDO::PARAM_STR);" ."\n");
        fwrite($file,"\t\t\t\t\t". "\$this -> request -> execute();" ."\n");
        fwrite($file,"\t\t\t\t\t". "\$results = \$this -> request -> fetch();" ."\n");
        fwrite($file,"\t\t\t\t\t". "return \$results;" ."\n");
        fwrite($file,"\t\t\t\t". "}" ."\n");
        fwrite($file,"\t\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂ */" ."\n\n");

        # create(Entities $Entiites) :
        # Writing list set and create :
        $paramCreate='';
        $paramSet='';
        for ($i=0 ; $i<count($table) ; $i++){ 
            if($i==0){
                $paramCreate='';
            }else{
                if(($i<count($table)-1)){
                    #call function write PDO::STATEMENT
                    //$PDO=typePdo($table[$i]['DATA_TYPE']);
                    //$PDO=$table[$i]['DATA_TYPE'];
                    $paramCreate.= $name.".".$table[$i]['COLUMN_NAME']."=:".$table[$i]['COLUMN_NAME'] .", ";
                    $paramSet.= $name.".".$table[$i]['COLUMN_NAME'] . "=:". $table[$i]['COLUMN_NAME'].", ";
                }else{
                    $paramCreate.= $name.".".$table[$i]['COLUMN_NAME']."=:".$table[$i]['COLUMN_NAME'] ;
                    $paramSet.= $name.".".$table[$i]['COLUMN_NAME'] . "=:". $table[$i]['COLUMN_NAME'];
                };
            };
        };

        fwrite($file,"\t\t\t". "/* ▂ ▅  create( " . ucfirst($name) .' $'.ucfirst($name) . " )  ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t\t". "public function create( " . ucfirst($name) .' $'.ucfirst($name) . " ) { " ."\n");
        fwrite($file,"\t\t\t\t\t". "\$this -> request = \$this -> connexion -> prepare( \"INSERT INTO $name"."\n");
        fwrite($file,"\t\t\t\t\t". "SET $paramCreate" ."\");" ."\n");
        # Writing bindValue :
        for ($i=1 ; $i<count($table) ; $i++){ 
            #call function write PDO::STATEMENT
            $PDO=typePdo($table[$i]['DATA_TYPE']);
            //$PDO=$table[$i]['DATA_TYPE'];
            $param = $table[$i]['COLUMN_NAME'];
            $get = "get".ucfirst($param);
            $entities = '$'.ucfirst($name);
            fwrite($file,"\t\t\t\t\t". "\$this -> request -> bindValue(\":$param\", $entities -> $get()$PDO);" ."\n");
        };
        fwrite($file,"\t\t\t\t\t". "\$pdoDbException = \$this -> executeTryCatch(); " ."\n");
        fwrite($file,"\t\t\t\t\t". "return \$pdoDbException; " ."\n");
        fwrite($file,"\t\t\t\t". "}" ."\n");
        fwrite($file,"\t\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂ */" ."\n\n");












        fwrite($file,"\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */" ."\n");
        fwrite($file,"\n");
        # Writing footer :
        fwrite($file,"\t" . "};" . "\n") ;
        fwrite($file,"?>") ;
        fclose($file);
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂*/
    function typePdo($typePDO){
        switch ($typePDO){
            case ('int'):
                $PDO=", PDO::PARAM_INT";
                break;
            case ('bool'):
                $PDO=", PDO::PARAM_BOOL";
                break;;               
            default:
                $PDO=", PDO::PARAM_STR";
                break;
        }
        return $PDO;
    }


    
?>
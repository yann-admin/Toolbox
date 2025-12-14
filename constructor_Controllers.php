<?php
    /* ▂ ▅ ▆ █ Function █ ▆ ▅ ▂ */
        /* A MODIFIER */
        //$version="2.0";
        //$name = "creation";

        $nameApplication = "App";
        $controller = ucfirst($name)."Controller.php";
        $patchcontroller = "../StructureControllers/";
        $fileController = $patchcontroller . $controller;
        # On supprime le fichier controller
        if (file_exists($fileController)) {
            !unlink($fileController);
        }
        # Include du fichier JSON structure de la table
        $tableJson = file_get_contents('../StructureTables/Représentation_structure_Table_'. $name .'.json');
        $table = json_decode($tableJson, true);
                                                                /* ▂ ▅ ▆ █ Controlers █ ▆ ▅ ▂ */
        $file = fopen($fileController,'w+');
        # Whrite in the file entiites
        fwrite($file,"<?php");
        fwrite($file,"\n");
        # Writing info database :
        fwrite($file,"\t". "/* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t\t". "/* Fichier controller database : $name via constructor_Array_DataBase_SQL.php VERSION: $version*/ \n") ;
        /*--------------------------*/
        # Writing head :
        fwrite($file,"\t". "/* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t\t". "namespace $nameApplication\\Controllers;" ."\n");
        fwrite($file,"\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ \n") ;
        fwrite($file,"\n") ;
        fwrite($file,"\t". "/* ▂ ▅ ▆ █ Inclusion █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t\t". "use App\Core\Validator;" . "\n");
        fwrite($file,"\t\t". "use App\\Core\\" . ucwords($name) . ";" ."\n");
        fwrite($file,"\t\t". "use App\\Models\\". ucwords($name) . "Model;" ."\n");
        fwrite($file,"\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ \n") ;
        fwrite($file,"\n") ;
        /*--------------------------*/
        # Writing Class : 
        fwrite($file,"\t". "/* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t"."class " . ucfirst($name)."Controller" . " extends Controller" ."{" . "\n");
        /*--------------------------*/
        # writing Methodes
        fwrite($file,"\t". "/* ▂ ▅ ▆ █    Methodes    █ ▆ ▅ ▂ */" ."\n\n");

        fwrite($file,"\t\t". "/* ▂ ▅ ▆ █ index █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t"."public function index". $name ."(){" ."\n ") ;
        fwrite($file,"\n ") ;
        fwrite($file,"\t\t\t"."}" ."\n ") ;
        fwrite($file,"\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ \n\n") ;

        fwrite($file,"\t\t". "/* ▂ ▅ ▆ █ add █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t"."public function add". $name ."(){" ."\n ") ;
        fwrite($file,"\n ") ;
        # Writing Setters via toolbox
        fwrite($file,"\t\t\t". "/* ▂ ▅  Writing Setters via toolbox  ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t\t" . "\$" . $name . " = new " . ucwords($name) . "();" . "\n") ;
        if(count($table)!=0){
            for($i=0 ; $i<count($table) ; $i++){
                $attribut = ucfirst($table[$i]["COLUMN_NAME"]);
                fwrite($file,"\t\t\t\t". "/* " . $table[$i]["COLUMN_COMMENT"] ." */" ."\n");
                #Setters -> $_POST[]
                fwrite($file,"\t\t\t\t". "\$" . $name . " -> set". ucwords($attribut) . "(\$_POST['" . $attribut . "']);" . "\n");
            };
        };
        fwrite($file,"\t\t\t\t" . "\$obj". ucwords($name) . "Model = new " . ucwords($name) . "Model();" . "\n") ;
        fwrite($file,"\t\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */" ."\n");
        fwrite($file,"\n");
        fwrite($file,"\t\t\t"."}" ."\n ") ;
        fwrite($file,"\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ \n\n") ;

        fwrite($file,"\t\t". "/* ▂ ▅ ▆ █ update █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t"."public function update". $name ."(\$id){" ."\n ") ;
        # Writing Setters via toolbox
        fwrite($file,"\t\t\t". "/* ▂ ▅  Writing Setters via toolbox  ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t\t" . "\$" . $name . " = new " . ucwords($name) . "();" . "\n") ;
        if(count($table)!=0){
            for($i=0 ; $i<count($table) ; $i++){
                $attribut = ucfirst($table[$i]["COLUMN_NAME"]);
                fwrite($file,"\t\t\t\t". "/* " . $table[$i]["COLUMN_COMMENT"] ." */" ."\n");
                #Setters -> $_POST[]
                fwrite($file,"\t\t\t\t". "\$" . $name . " -> set". ucwords($attribut) . "(\$_POST['" . $attribut . "']);" . "\n");
            };
        };
        fwrite($file,"\t\t\t\t" . "\$obj". ucwords($name) . "Model = new " . ucwords($name) . "Model();" . "\n") ;
        fwrite($file,"\t\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */" ."\n");
        fwrite($file,"\n");
        fwrite($file,"\t\t\t"."}" ."\n ") ;
        fwrite($file,"\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ \n\n") ;

        fwrite($file,"\t\t". "/* ▂ ▅ ▆ █ show █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t"."public function show". $name ."(\$id){" ."\n ") ;
        # Writing Getters via toolbox
        fwrite($file,"\t\t\t". "/* ▂ ▅  Writing Getters via toolbox  ▅ ▂ */" ."\n");
        //fwrite($file,"\t\t\t\t" . "\$" . $name . " = new " . ucwords($name) . "();" . "\n") ;
        fwrite($file,"\t\t\t\t" . "\$obj". ucwords($name) . "Model = new " . ucwords($name) . "Model();" . "\n") ;            
        if(count($table)!=0){
            for($i=0 ; $i<count($table) ; $i++){
                $attribut = ucfirst($table[$i]["COLUMN_NAME"]);
                fwrite($file,"\t\t\t\t". "/* " . $table[$i]["COLUMN_COMMENT"] ." */" ."\n");
                fwrite($file,"\t\t\t\t". "\$" . $name ."Get = " . "\$" . $name . " -> get". ucwords($attribut) . "();" . "\n");
            };
        };
        fwrite($file,"\t\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */" ."\n");
        fwrite($file,"\n");
        fwrite($file,"\t\t\t"."}" ."\n ") ;
        fwrite($file,"\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ \n\n") ;

        fwrite($file,"\t\t". "/* ▂ ▅ ▆ █ delete █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t"."public function delete". $name ."(\$id){" ."\n ") ;
        fwrite($file,"\n ") ;
        fwrite($file,"\t\t\t"."}" ."\n ") ;
        fwrite($file,"\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ \n\n") ;

        fwrite($file,"\t\t". "/* ▂ ▅ ▆ █ autre █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t"."/*" ."\n ") ;
        fwrite($file,"\t\t\t"."public function AUTRE". $name ."(){" ."\n ") ;
        fwrite($file,"\n ") ;
        fwrite($file,"\t\t\t"."}" ."\n ") ;
        fwrite($file,"\t\t\t"."*/" ."\n ") ;
        fwrite($file,"\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ \n\n") ;
        //fwrite($file,"\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */" ."\n");
        //fwrite($file,"\n");
        # Writing footer 
        fwrite($file,"\t" . "};" . "\n") ;
        fwrite($file,"?>") ;
        fclose($file);
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂*/

?>
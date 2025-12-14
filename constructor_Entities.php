<?php
    /* ▂ ▅ ▆ █ Function █ ▆ ▅ ▂ */
        /* A MODIFIER */
        //$version="2.0";
        //$name = "creation";

        $nameApplication = "App";
        $entities = ucfirst($name).".php";
        $patchentities ="../StructureEntities/";
        $fileEntities = $patchentities . $entities;
        # On supprime le fichier entities
        if (file_exists($fileEntities)) {
            !unlink($fileEntities);
        };
                                                                /* ▂ ▅ ▆ █ Entities █ ▆ ▅ ▂ */
        #Add file in under directory :
        $file = fopen($fileEntities,'w+');
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
        fwrite($file,"\t\t". "" . "\n");
        fwrite($file,"\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */ \n") ;
        fwrite($file,"\n") ;
        /*--------------------------*/
        # Writing Class : 
        fwrite($file,"\t". "/* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t"."class " . ucfirst($name) ."{" . "\n");
        /*--------------------------*/
        # Writing Attributs :
        fwrite($file,"\t\t". "/* ▂ ▅ Attributs ▅ ▂ */" ."\n");
        # Include du fichier JSON structure de la table
        $tableJson = file_get_contents('../StructureTables/Représentation_structure_Table_'. $name .'.json');
        $table = json_decode($tableJson, true);
        if(count($table)!=0){
            for($i=0 ; $i<count($table) ; $i++){
                $attribut = ucfirst($table[$i]["COLUMN_NAME"]);
                fwrite($file,"\t\t\t"."protected $". $attribut . ";\n");   
            };
        };
        fwrite($file,"\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂ */" ."\n");
        fwrite($file,"\n");
        /*--------------------------*/
        # Writing setter :
        fwrite($file,"\t\t". "/* ▂ ▅  Setters  ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t". "/* Traitement faille XSS htmlspecialchars() 'Cette fonction retourne une chaîne avec ces Conversions réalisées.' */" ."\n");
        fwrite($file,"\t\t\t". "/* ENT_QUOTES => Convertira les deux citations doubles et simples. */" ."\n");
        if(count($table)!=0){
            for($i=0 ; $i<count($table) ; $i++){
                $attribut = ucfirst($table[$i]["COLUMN_NAME"]);
                fwrite($file,"\t\t\t". "/* " . $table[$i]["COLUMN_COMMENT"] ." */" ."\n");
                fwrite($file,"\t\t\t". 'public function set' . ucwords($attribut) .'($modif' . ucwords($attribut) .'){ $this -> ' . $attribut . ' = ' . 'htmlspecialchars(trim($modif' . ucwords($attribut) . '),ENT_QUOTES); ' . "return \$this; }" ."\n");   
            };
        };
        fwrite($file,"\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂ */" ."\n");
        fwrite($file,"\n");
        /*--------------------------*/
        # Writing getter :
        fwrite($file,"\t\t". "/* ▂ ▅  Getters  ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t". "/* Traitement lecture htmlspecialchars_decode() 'Convertir des entités HTML spéciales en caractères'  */" ."\n");
        fwrite($file,"\t\t\t". "/* ENT_COMPAT => Je vais convertir les guillemets doubles et laisser les guillemets simples intacts. */" ."\n");
        if(count($table)!=0){
            for($i=0 ; $i<count($table) ; $i++){
                $attribut = ucfirst($table[$i]["COLUMN_NAME"]);
                fwrite($file,"\t\t\t". "/* " . $table[$i]["COLUMN_COMMENT"] ." */" ."\n");
                fwrite($file,"\t\t\t".'function get' . ucwords($attribut) .'(){ return htmlspecialchars_decode($this -> ' .$attribut.',ENT_COMPAT); }'."\n");
            };
        };
        fwrite($file,"\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂ */" ."\n");
        fwrite($file,"\n");
        /*--------------------------*/
        # Writing Setters and Getters for copy and paste in the code
        fwrite($file,"\t\t". "/* ▂ ▅  copy and paste in the code  ▅ ▂ */" ."\n");
        fwrite($file,"\t\t\t" . "# \$obj". ucwords($name) . "Model = new " . ucwords($name) . "Model();" . "\n") ;
        fwrite($file,"\t\t\t" . "# \$" . $name . " = new " . ucwords($name) . "();" . "\n") ;
        if(count($table)!=0){
            for($i=0 ; $i<count($table) ; $i++){
                $attribut = ucfirst($table[$i]["COLUMN_NAME"]);
                fwrite($file,"\t\t\t". "/* " . $table[$i]["COLUMN_COMMENT"] ." */" ."\n");
                #Setters -> $_POST[]
                fwrite($file,"\t\t\t\t". "# -  " .  "\$" . $name . " -> set". ucwords($attribut) . "(\$_POST['" . $attribut . "']);" . "\n");
                fwrite($file,"\t\t\t\t". "# -  \$" . $name ."Get = " . "\$" . $name . " -> get". ucwords($attribut) . "();" . "\n");
                
            };
        };
        fwrite($file,"\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */" ."\n");
        fwrite($file,"\n");
        # Writing footer 
        fwrite($file,"\t" . "};" . "\n") ;
        fwrite($file,"?>") ;
        fclose($file);
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂*/
?>

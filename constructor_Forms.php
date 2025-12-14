<?php
    /* ▂ ▅ ▆ █ Function █ ▆ ▅ ▂ */
        /* A MODIFIER */
        $version="2.0";
        $name = "creation";

        $nameApplication = "App";
        $form = ucfirst($name)."Form.php";
        $patchForm = "../StructureFormulaires/";
        $fileForm = $patchForm . $form;
        # On supprime le fichier controller
        if (file_exists($fileForm)) {
            !unlink($fileForm);
        }
        # Include du fichier JSON structure de la table
        $tableJson = file_get_contents('../StructureTables/Représentation_structure_Table_'. $name .'.json');
        $table = json_decode($tableJson, true);
        # Include du fichier JSON structure des formulaires

        //$formStructureJson = file_get_contents('./structure_Forms.json');
        //$formStructure = json_decode($formStructureJson, true);

        #Add file in under directory :
        $file = fopen($fileForm,'w+');
        $variableText='';
        # Whrite in the file entiites
        fwrite($file,"<?php");
        fwrite($file,"\n");
        # Writing info database :
        fwrite($file,"\t". "/* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t\t". "/* Fichier formulaire : $name via constructor_Array_DataBase_SQL.php VERSION: $version*/ \n") ;
        fwrite($file,"\t". "/* ▂ ▅ ▆ █ Formulaire pour la table: - $name - █ ▆ ▅ ▂ */" ."\n");
        fwrite($file,"\t\t". "" . "\n");
        fwrite($file,"\t\t". "\n");
        fwrite($file,"\t\t". "# On instancie la class form" . "\n");       
        fwrite($file,"\t\t". "\$form = new Form();" . "\n");
        fwrite($file,"\t\t". "# On construit le formulaire" . "\n"); 

        # Writing div form
        fwrite($file,"\t\t". "\$form -> addDivOuverture( ['class'=>'container'] );" . "\n");
            # Writing Start form
            fwrite($file,"\t\t\t". "\$form -> startForm( \$action, \"POST\", [\"enctype\" =>'multipart/form-data', \"id\"=>\$idForm] );" . "\n");
                # We loop through the database table
                for ($l=0 ; $l < count($table) ; $l++){
                    # Name search
                    $name = $table[$l]['COLUMN_NAME'];
                    # Type search
                    $type = $table[$l]['DATA_TYPE']; 
                    # Comment search
                    $comment = $table[$l]['COLUMN_COMMENT'];   
                    # Mini length search
                    $miniLength = 1; 
                    # Maxi length search
                    $maxiLength = $table[$l]['CHARACTER_MAXIMUM_LENGTH']; 
                    # Null search
                    if($table[$l]['IS_NULLABLE']=="NO"){$required='required';}else{$required='';}; 

                    $variableText.='$'.$name.'Value = "";' . "\n\t\t";

                    fwrite($file,"\t\t\t". "/* ▂   Input group : - $name -   ▂ */" ."\n");
                    # Writing label form
                    fwrite($file,"\t\t\t". "# @addLabel('for', text du label, [attributs]" . "\n"); /*Commentaires*/
                    fwrite($file,"\t\t\t". "\$form -> addLabel('$name', '$comment', ['class'=>'form-label']);" . "\n");
                    # Writing open div group input form
                    fwrite($file,"\t\t\t". "\$form->addDivOuverture(['class'=>'input-group flex-wrap']);" . "\n");
                    # Writing span group input form
                    fwrite($file,"\t\t\t". "\$form->addSpan('<img src=\"__A_COMPLETER__\"></img>', ['class'=>'input-group-text']);" . "\n");
                    # Writing input group input form
                    fwrite($file,"\t\t\t". "# @addInput('type', 'name', [attributs]" . "\n"); /*Commentaires*/
                    $value='$'.$name.'Value';
                    fwrite($file,"\t\t\t". "\$form -> addInput('$type', '$name', ['id'=>'$name', 'placeholder'=>'$comment', 
                            'minlength'=>'$miniLength', 'maxlength'=>'$maxiLength', 'required'=>'$required',
                            'pattern'=>'', 'class'=>'form-control', 'value'=> $value ]);" . "\n");
                    # Writing close div group input form
                    fwrite($file,"\t\t\t". "\$form -> addDivFermeture();" . "\n");
                    fwrite($file,"\t\t\t". "/* ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ ▂ */" ."\n\n");
                };

                # Writing Token form
                fwrite($file,"\t\t\t". "/* ▂   TOKEN   ▂ */" ."\n");
                fwrite($file,"\t\t\t\t". "\$form -> addToken();" . "\n");
                fwrite($file,"\t\t\t\t". "# ├ appel function Form::createdToken()" . "\n");
                fwrite($file,"\t\t\t". "/* ▂ ▂ ▂ ▂ ▂ ▂ ▂ */" ."\n");

            # Writing End form
            fwrite($file,"\t\t\t". "\$form -> endForm();" . "\n");
        # Writing div form
        fwrite($file,"\t\t". "\$form -> addDivFermeture();" . "\n");
        fwrite($file,"\t\t". "" . "\n");
        fwrite($file,"\t\t". "/* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂ */" ."\n");
        # Writing varibale for copy & cut 
        fwrite($file,"\t\t". "/* Writing varibale for copy & cut */" . "\n");
        fwrite($file,"\t\t". "/* " . "\n");
        fwrite($file,"\t\t". "$variableText");
        fwrite($file,"*/" . "\n");
        fwrite($file,"\n");
        # Writing footer 
        fwrite($file,"?>") ;
        fclose($file);
    /* ▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂▂*/

?>
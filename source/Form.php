<?php
    /* ▂ ▅ ▆ █ Information █ ▆ ▅ ▂ */
    /*Nous allons construire nos formulaires grâce à cette classe.
    Chaque élément HTML du formulaire sera généré via cette classe.
    Nous commençons par déclarer une propriété "$formElements" servant à stocker le formulaire construit.
    Nous mettons en place un "getter" afin de récupérer ce formulaire dans le contrôleur par la suite.
    Nous créons une méthode "addAttributs" afin de générer des attributs HTML pour n'importe quel élément du formulaire, comme un "id", une "classe"...
    Cette méthode attend un paramètre qui est un tableau, car un élément HTML comme un "input" possède plusieurs attributs.
    La méthode retourne une chaîne de caractères représentant les attributs espacés par un espace.
    Nous déclarons une méthode "startForm" pour intégrer la balise ouvrante du formulaire. 
    Cette balise attend des attributs spécifiques tels que "action", "method". Nous utilisons donc des paramètres pour les faire passer à l'intérieur afin de compléter l'intégration.
    Nous faisons appel à la méthode addAttributs également pour compléter.
    Nous faisons la même chose en déclarant une méthode pour chaque balise, comme le "for", "input", "textarea", etc...
    Pour terminer, nous mettons en place un petit validateur de champs en testant s'ils ne sont pas vides et les valeurs déclarées.
    Nous créons une méthode pour les $_POST et une autre pour les $_FILE. Les deux méthodes retournent un booléen true/false. 
    Pour les deux, nous bouclons dessus afin de tester dans cette boucle les contraintes citées ci-dessus.
    Nous vous rappelons que ces paramètres de la classe "Form" seront appelés dans les contrôleurs et envoyés ensuite dans la vue concernée.
    */
    /**/
    /* ▂ ▅ ▆ █  NameSpace  █ ▆ ▅ ▂ */
        namespace App\Core;
    /**/
    /* ▂ ▅ ▆ █  Inclusion  █ ▆ ▅ ▂ */
        use App\Core\Token;
        use App\Core\Files;
    /**/
    /* ▂ ▅ ▆ █ Class █ ▆ ▅ ▂ */
    class Form{
        /*----- Attributs -----*/
            private $formElements;
        /* ------------------- */ 
        /*----- Constante -----*/
        /* ------------------- */ 
        /* ▂ ▅ ▆ █ Methodes █ ▆ ▅ ▂ */
        /* ----   Getters     ---- */
            public function getFormElements(){ return $this -> formElements; }
        /* ----------------------- *
        /* --   ADD ATTRIBUTES  -- */
            private function addAtributes(array $attributes):string{
                $att="";
                //Read attributes and writting $att :
                foreach($attributes as $attribute => $value){
                    $att .= " $attribute = '$value'" ;
                };
                return $att;
            }
        /* ----------------------- *

        /* ---    START FORM    --- */
        # Methodes génrérant la balise ouvrante HTML du formulaire
            public function startForm(string $action="#", string $method="POST", array $attributes=[]):self{
                //On commence la création du formulaire avec l'ouverture de la balise <form> et des attributs 'action' et 'methodes'
                $this->formElements = "<form action='$action' method='$method'";
                //Et ses attributs éventuels
                $this->formElements .= isset($attributes) ? $this->addAtributes($attributes) . ">" : ">";
                return $this;
            }
        /* ----------------------- *

        /* ---    ADD BR   --- */
        # Methodes génrérant un BR avec l'ouverture de la balise <Br/> et des attributs 'for
            public function addBr(){
                //on commence la création du label
                $this->formElements .= "<br/>";
                return $this;
            }
        /* ----------------------- *
        
        /* ---    ADD DIV OUVERTURE   --- */
        # Methodes génrérant un BR avec l'ouverture de la balise <Br/> et des attributs 'for
            public function addDivOuverture(array $attributes=[]):self{
                //on commence la création du label
                $this->formElements .= "<div ";
                //Et ses attributs éventuels
                $this->formElements .= isset($attributes) ? $this->addAtributes($attributes) . ">" : ">";
                return $this;
            }
        /* ----------------------- *

        /* ---    ADD DIV OUVERTURE   --- */
        # Methodes génrérant un BR avec l'ouverture de la balise <Br/> et des attributs 'for
            public function addDivFermeture(){
                //on commence la création du label
                $this->formElements .= "</div>";
                return $this;
            }
        /* ----------------------- *

        /* ---    ADD DIV OUVERTURE   --- */
        # Methodes génrérant un BR avec l'ouverture de la balise <Br/> et des attributs 'for
            public function addQuestion(string $text, string $icon, array $attributes=[]):self{
                //on commence la création du label
                $this->formElements .= "<a href='#' aria-label='$text'";
                //Et ses attributs éventuels
                $this->formElements .= isset($attributes) ? $this->addAtributes($attributes) . ">" : ">";
                $this->formElements .="$icon</a>";
                return $this;
            }
        /* ----------------------- *

        /* ---    ADD LABEL   --- */
        # Methodes génrérant un Label avec l'ouverture de la balise <label> et des attributs 'for'
            public function addLabel(string $for, string $text, array $attributes=[]):self{
                //on commence la création du label 
                $this->formElements .= "<label for='$for'";
                //Et ses attributs éventuels
                $this->formElements .= isset($attributes) ? $this->addAtributes($attributes) . ">" : ">";
                $this->formElements .="$text</label>";
                return $this;
            }   
        /* ----------------------- *

        /* ---    ADD INPUT   --- */
        # Methodes génrérant un input avec l'ouverture de la balise <input> et des attributs 'type', 'name'
            public function addInput(string $type, string $name, array $attributes=[]):self{
                //on commence la création du label 
                $this->formElements .= "<input type='$type' name='$name'";
                //Et ses attributs éventuels
                $this->formElements .= isset($attributes) ? $this->addAtributes($attributes) . ">" : ">";
                return $this;
            }   
        /* ----------------------- *

        /* ---    ADD SPAN   --- */
        # Methodes génrérant un BR avec l'ouverture de la balise <Br/> et des attributs 'for
            public function addSpan(string $icon, array $attributes=[]):self{
                //on commence la création du label
                $this->formElements .= "<span href='#' ";
                //Et ses attributs éventuels
                $this->formElements .= isset($attributes) ? $this->addAtributes($attributes) . ">" : ">";
                $this->formElements .="$icon</span>";
                return $this;
            }
        /* ----------------------- *
        
        /* ---    ADD INPUT  ANCRE  --- */
        # Methodes génrérant un input avec l'ouverture de la balise <input> et des attributs 'type', 'name'
            public function addBtn(string $type, string $name, string $ancre, string $text, array $attributes=[]):self{
                //on commence la création du label 
                $this->formElements .= "<a href='$ancre'> <button type='$type' name='$name'";
                //Et ses attributs éventuels
                $this->formElements .= isset($attributes) ? $this->addAtributes($attributes) . ">$text</button></a>" : ">$text</button></a>";
                return $this;
            }   
        /* ----------------------- *

        /* ---    ADD TEXTAREA   --- */
        # Methodes génrérant un textarea avec l'ouverture de la balise <textarea> et des attributs 'name'
            public function addTextarea(string $name, string $text, array $attributes=[]):self{
                //on commence la création du textarea 
                $this->formElements .= "<textarea name='$name'";
                //Et ses attributs éventuels
                $this->formElements .= isset($attributes) ? $this->addAtributes($attributes) . ">" : ">";
                $this->formElements .="$text</textarea>";
                return $this;
            }   
        /* ----------------------- *

        /* ---    ADD SELECT   --- */
        # Methodes génrérant un select avec l'ouverture de la balise <select> et des attributs 'name'
            public function addSelectId(string $name, string $idSelected, $nameKey, $nameValue, array $tableau, array $attributes=[]):self{
                //on commence la création du select 
                $this->formElements .= "<select name='$name'";
                //Et ses attributs éventuels
                $this->formElements .= isset($attributes) ? $this->addAtributes($attributes) . ">" : ">";
                //On ajoute les balises options
                    for ($row=0 ; $row<count($tableau) ; $row++){
                        if($idSelected!="" && ($idSelected==$tableau[$row][$nameKey])){
                        $key = $tableau[$row][$nameKey];
                        $value = $tableau[$row][$nameValue];
                        $this->formElements .="<option value =$key selected>$value</option>";
                        }else{
                        $key = $tableau[$row][$nameKey];
                        $value = $tableau[$row][$nameValue];
                        $this->formElements .="<option value =$key>$value</option>";
                        }
                    };
                    

                $this->formElements .="</select>";
                return $this;
            }   
        /* ----------------------- *


        /* ---    ADD SELECT 2   --- */
        # Methodes génrérant un select avec l'ouverture de la balise <select> et des attributs 'name'
            public function addSelect(string $name, string $idSelected, array $options, array $attributes=[]):self{
                //on commence la création du select 
                $this->formElements .= "<select name='$name'";
                //Et ses attributs éventuels
                $this->formElements .= isset($attributes) ? $this->addAtributes($attributes) . ">" : ">";
                //On ajoute les balises options
                foreach($options as $key => $value){
                    if($idSelected!="" && ($idSelected==$value)){
                        $this->formElements .="<option value ='$value' selected >$value</option>";
                    }else{
                        $this->formElements .="<option value ='$value' >$value</option>";
                    };
                };
                $this->formElements .="</select>";
                return $this;
            }   
        /* ----------------------- *


        /* ---    ADD SELECT   --- */
        # Methodes génrérant un input avec l'ouverture de la balise <input>
            public function addToken():self{
                #on instancie un token à chaque chargement du formulaire
                Form::createdToken();
                //on commence la création du select 
                $this->formElements .= "<input type='hidden' name='token' id='token' value='" . trim($_SESSION['token']) ."' >";
                $this->formElements .= "<input type='hidden' name='token_time' id='token_time' value='" . trim($_SESSION['token_time']) ."' >";
                return $this;
            }
        /* ----------------------- *  
        
        /* ---    END FORM    --- */
        # Methodes génrérant la balise fermante HTML du formulaire
            public function endForm():self{
                $this->formElements .="</form>";
                return $this;
            }
        /* ----------------------- *

        /* ---    VALIDATE POST    --- */
        # Methodes de test des champs du formulaire si le champ existe ou si il est vide 
            public static function validatePost(array $post, array $fields):bool{
                //parcours des champs du formulaire
                foreach ($fields as $field){
                    //test si le champ n'est pas vide
                    if (empty($post[$field]) || !isset($post[$field])){ return false; }
                };
                return true;
            }
        /* ----------------------- *

        /* ---    VALIDATE FILES    --- */
        # Methodes de test des champs du formulaire, les paramètres réprésentent les valeurs en FILES et le nom des champs
            public static function validateFiles(array $files, array $fields):bool{
                //parcours des champs du formulaire
                foreach ($fields as $field){
                    //test si le champ n'est pas vide
                    if (isset($files[$field]) && $files[$field]['error']==0){ return true; }
                };
                return false;
            }
        /* ----------------------- */

        /* ---  CREATED TOKEN  --- */         
            public static function createdToken(){
                #test si $_SESSION['token'] existe et si pas = NULL
                if(isset($_SESSION['token'])){
                    #détruction 
                    unset($_SESSION['token']);
                    unset($_SESSION['token_time']);
                };
                #on instancie un nouveau token
                $oToken = new Token(bin2hex(openssl_random_pseudo_bytes(32)), time());
                $_SESSION['token']=$oToken->getToken();
                $_SESSION['token_time']=$oToken->getToken_time();
                #test
                /*
                echo $_SESSION['token'] ."</br>";
                echo $_SESSION['token_time'] ."</br>";
                */
            }    
        /* ----------------------- */

        /* ---  VALIDATE TOKEN  --- */    
            public static function controlToken(){
                $retour[0]=false;
                $retour[1]="";
                #controle de la correspondance du jeton $_SESSION['token'] à celui $_POST['token']
                if($_SESSION['token'] == $_POST['token']){
                    #on controle la dateline $_POST['token']>= $timestamp
                    $timestamp = time() - (4*60);
                    if($_POST['token_time']>= $timestamp){
                        #la dateline du jeton est expirée
                        $retour[0]=false;
                        $retour[1]="L'ajout des données est réalisé"; 
                    }else{
                        #la dateline du jeton est expirée
                        $retour[0]=true;
                        $retour[1]="Le jeton de controle est expiré, opération annulée !"; 
                    }
                }else{
                    #le jeton ne correspond pas
                    $retour[0]=true;
                    $retour[1]="Le jeton de controle ne correspond pas, opération annulée !";   
                }
                return $retour;   
            }
        /* ----------------------- */
        /* ---  VALIDATE FILES UPDATE  --- */  
            public static function controlFile($file, $sizeMax, $typeFile):array{
                $retour[0]=false; #bool retour fonction
                $retour[1]="";   #Message de retour
                $retour[2]="";	 #Nouveau Nom de fichier
                #on instancie un new Files
                $name=$_FILES["picture"]["name"];
                $type=$_FILES["picture"]["type"];
                $size=$_FILES["picture"]["size"];
                $extension=pathinfo($name,PATHINFO_EXTENSION);
                #$Name = Nom du fichier uploader
                #$type = Type du fichier uploader
                #$size = Poids du fichier uploader
                #$extension = extension du fichier uploader
                #$sizeMax = Poids max du fichier uploader autorisé
                #typeFile = Type du fichier uploader autorisé
                $oFile = new Files($name, $type, $size, $extension, $sizeMax, $typeFile);
                $retourFunction= $oFile->validateUpdateFile();

                $retour[0]=$retourFunction[0];
                $retour[1]=$retourFunction[1];
                $retour[2]=$retourFunction[2];

                return $retour;  
            }
        /* ----------------------- */
    };

?>
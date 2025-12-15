<?php
	/* Fichier de base d'une class à ajuster au besoin V1.00 via  CONSTRUCTOR_CLASS_CLASSIQUE_V1.php */ 
	/* Table of attributs: 'name', 'type', 'size', 'extension' */ 
		/* Structure :  */ 
	/* -------------------------------- */ 

	/* ▂ ▅ ▆ █ NameSpace █ ▆ ▅ ▂ */
		namespace App\Core;
	/* -------------------------------- */ 

	/* ▂ ▅ ▆ █ Inclusion █ ▆ ▅ ▂ */

	/* -------------------------------- */ 
	class Files { 
		//**** Attributs: ****
		private $name;
		private $type;
		private $size;
		private $extension;
		private $sizeMax;
		private $typeFile;
		//----------------------------------------------
 
		//**** Constante: ****
		//----------------------------------------------
 
		//**** Methodes ****
		//Constructor Class: 
		#$Name = Nom du fichier uploader
		#$type = Type du fichier uploader
		#$size = Poids du fichier uploader
		#$extension = extension du fichier uploader
		#$sizeMax = Poids max du fichier uploader autorisé
		#typeFile = Type du fichier uploader autorisé
		public function __construct($name, $type, $size, $extension, $sizeMax, $typeFile /*Parametre à contrôler*/){
 			$this -> name = $name;
			$this -> type = $type;
			$this -> size = $size;
			$this -> extension = $extension;
			$this -> sizeMax = $sizeMax;
			$this -> typeFile = $typeFile;
		}
		//----------------------------------------------

		//Write Setters: 
		function setName($modifName){ $this -> name = $modifName; }
		function setType($modifType){ $this -> type = $modifType; }
		function setSize($modifSize){ $this -> size = $modifSize; }
		function setExtension($modifExtension){ $this -> extension = $modifExtension; }
		function setSizeMax($modifSizeMax){ $this -> sizeMax = $modifSizeMax; }
		function setTypeFile($modifTypeFile){ $this -> typeFile = $modifTypeFile; }
		//----------------------------------------------
 
 		//Write Getters: 
		function getName(){ return $this -> name; }
		function getType(){ return $this -> type; }
		function getSize(){ return $this -> size; }
		function getExtension(){ return $this -> extension; }
		function getSizeMax(){ return $this -> sizeMax; }
		function getTypeFile(){ return $this -> typeFile; }
		//----------------------------------------------

		//**** new function: ****
		public function validateUpdateFile():array{
            $retour[0]=false; #bool retour fonction
            $retour[1]="";   #Message de retour
            $retour[2]="";	 #Nouveau Nom de fichier
			#on récupère le tableau suivant paramètre $typeFile
			$arrayTypeImage=array("jpg"=>"image/jpg", "jpeg"=>"image/jpeg", "gif"=>"image/gif", "png"=>"image/png");
			$arrayTypeText = array("doc"=>"document/doc", "xlsx"=>"document/xlsx", "pptx"=>"document/pptx", "ODP"=>"document/ODP");
			$arrayTypePdf=array("pdf"=>"document/pdf");
			if(($this->typeFile)=="image"){$arrayType = $arrayTypeImage;};
			if(($this->typeFile)=="text"){$arrayType = $arrayTypeText;};
			if(($this->typeFile)=="pdf"){$arrayType = $arrayTypePdf;};
			#on controle l'extension
			if(!array_key_exists(($this->extension), $arrayType)){
				$retour[0]=false;
                $retour[1]="Le format du fichier est incorrect !";
                $retour[2]="";
				return $retour;
			};
			#on controle la taille du fichier
			if(($this->size)>($this->sizeMax)){
				$retour[0]=false;
                $retour[1]="Le fichier dépasse la taille maximum ! (". ($this->sizeMax/1024/1024) ." Mo)";
                $retour[2]="";
				return $retour;
			};
			#on controle le type MINE
			if(in_array(($this->type), $arrayType)){
				#on génère un nom unique
				$uniqueName=uniqid('', true);
				$newFileName= $uniqueName . "." . ($this->extension);
				#on controle si le fichier existe
				if(file_exists("../public/images/".$newFileName)){
					$retour[0]=false;
					$retour[1]="Le fichier" . $newFileName . "éxiste déjà !";
					$retour[2]=$newFileName;
				}else{
					$retour[0]=true;
					$retour[1]="";
					$retour[2]=$newFileName;
				}
				return $retour;
			};
		}
		//----------------------------------------------

		//**** new function: ****
		/*public function Name_function(){
 		
		}*/
		//----------------------------------------------

	};
?>
<?php

return [
    'guard'=>[
    	 'web'=>"web",
		 "admin"=>"admin",
		 "superAdmin"=>"superAdmin"
	 ],
	/*nom du disk tmp par defaut*/
	"disk"=>[
		"tmp"=>"tmp"
	],
	/*prefix utliser lors de la session pour sauvegarder nos fichiers en sessions*/
	"prefix"=>[
		"dossier"=>"dossier-",
		"document"=>"document-"
	],
	"log_action_label"=>[
		"create"=>"creation",
		"delete"=>"suppression",
		"update"=>"mis à jour"
	],
	/**
	 * liste des options de configuration après le traitement d'un fichier
	*/
	"traitement_after_scan"=>[
		"skip"    =>0,
		"continue"=>1
	]
];

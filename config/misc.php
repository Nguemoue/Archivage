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
	]
];

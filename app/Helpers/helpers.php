<?php
	if(!function_exists("superName")){
		function superName(){

		}
	}

	if(!function_exists("megaOctet")){
		/**
		 * renvoi la taille en octet
		 * @param $size
		 * @param string $type
		 * @return float|int|null
		 */
		function megaOctet($size, $type="o"): float|int|null
		{
			if($type == "o"){
				return $size / (pow(1024,2));
			}elseif ($type == "ko"){
				return $size / 1024;
			}
			return null;
		}
	}
function getDataUrl($image, $mime = 'image/png'): string
{

	//je verifie si le fichier existe
	if (!empty($image)) {
		return 'data:image/png;base64,' . base64_encode($image);
	}
	return '';
}

if(!function_exists("adminUrl")){
	function adminUrl(){
		return config("url.admin","admin.localhost");
	}
}

if(!function_exists("superAdminUrl")){
	function superAdminUrl(){
		return config("url.superAdmin","superadmin.localhost");
	}
}

if(!function_exists("webAuth")){
	function webAuth(): \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Auth\Factory
	{
		return auth(config('misc.guard.web'));
	}
}

if(!function_exists('superAdminAuth')){
	function superAdminAuth(){
		return auth(config('misc.guard.superAdmin'));
	}
}

if(!function_exists("adminAuth")){
	function adminAuth(){
		return auth(config("misc.guard.admin"));
	}
}

if(!function_exists("adminGuard")){
	function adminGuard(){
		return (config("misc.guard.admin","admin"));
	}
}
if(!function_exists("webGuard")){
	function webGuard(){
		return (config("misc.guard.web","web"));
	}
}
if(!function_exists("superAdminGuard")){
	function superAdminGuard(){
		return (config("misc.guard.superAdmin","superAdmin"));
	}
}


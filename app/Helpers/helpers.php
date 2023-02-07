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

<?php 

namespace App\Helpers;

class Formatar {

	/** 
	* @param $cep string|int
	* @return string
	* Formata um número no padrão 00000-000
	*/

	public static function cep($cep) {
		return preg_replace('/^([0-9]5)([0-3])$/', '$1-$2');
	}

}

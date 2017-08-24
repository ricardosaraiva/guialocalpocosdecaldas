<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Empresa extends Controller {
	public function get(Request $request) {
		$filtro = ;

		//valida se o cliente esta passando um cep e busca pelo cep
		$filtroNumero = preg_replace('/[^0-9]/', '', $filtro);
		if(strlen($filtroNumero) == '8' && substr($filtroNumero, 0,4) = '3770') {

		}


	}
}

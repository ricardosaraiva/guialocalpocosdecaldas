<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Empresa;
use GuzzleHttp\Exception\RequestException;

class ControllerEmpresa extends Controller {

	public function get(Request $request) {

		try{
			

		$dados = $request->input('dados');

		if(mb_strlen($dados, 'UTF-8') <= 3) {
			return [];
		}

		$data = Empresa::
		select('nome', 'logradouro', 'bairro', 'numero', 'latitude', 'longitude', 'atividade', 'datainscricao')->
		where(function ($where) {
			$where->whereNotNull('latitude');
			$where->whereNotNull('longitude');
		})->orWhere(function ($where) use ($dados) {
			$where->where('atividade', '=', "%$dados%");
			$where->where('bairro', '=', "%$dados%");
			$where->where('nome', '=', "%$dados%");
			$where->where('cep', '=', "%$dados%");
		})->
		limit(1000)->
		get();

		return $data;		

		}catch(Exception $e){
			
			return $e->getMessage();
		}

	}
}
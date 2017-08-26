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
			$where->where('atividade', 'like', "%$dados%");
			$where->where('bairro', 'like', "%$dados%");
			$where->where('nome', 'like', "%$dados%");
			$where->where('cep', 'like', "%$dados%");
		})->
		limit(5000)->
		get();

		return $data;		

		}catch(Exception $e){
			
			return $e->getMessage();
		}

	}
}
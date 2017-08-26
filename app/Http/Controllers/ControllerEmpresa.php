<?php
namespace App\Http\Controllers;
use App\Model\Empresa;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ControllerEmpresa extends Controller {

	public function get(Request $request, Response $response) {

		try{
			

		$input = $request->input('dados');

		if(mb_strlen($input, 'UTF-8') <= 3) {
			return [];
		}

		$dadosEmpresa = Empresa::
		select('nome', 'logradouro', 'bairro', 'numero', 'latitude', 'longitude', 'atividade', 'datainscricao')->
		where(function ($where) {
			$where->whereNotNull('latitude');
			$where->whereNotNull('longitude');
			$where->where(DB::Raw('YEAR(datainscricao)'), '>=', 2007);
			$where->where(DB::Raw('YEAR(datainscricao)'), '<=', 2017);
		})->where(function ($where) use ($input) {
			$where->orWhere('atividade', 'like', "%$input%");
			$where->orWhere('bairro', 'like', "%$input%");
			$where->orWhere('nome', 'like', "%$input%");
			$where->orWhere('cep', 'like', "%$input%");
		})->
		limit(1000)->
		get();

		//periodo
		$dados = addslashes($input);
		$periodo  = Db::select( Db::raw("
			SELECT 
				COUNT(*) as total, 
				YEAR(datainscricao) as ano
			FROM 
				empresas
			WHERE (YEAR(datainscricao) BETWEEN 2007 AND 2017 AND NOT ISNULL(latitude)  AND NOT ISNULL(longitude)) AND (
				atividade LIKE '%$dados%' OR
				bairro LIKE '%$dados%' OR
				nome LIKE '%$dados%' OR
				cep LIKE '%$dados%'
			)
			GROUP BY YEAR(datainscricao)
			ORDER BY YEAR(datainscricao) ASC;"));


		// bairro
		$bairro  = Db::select( Db::raw("
			SELECT 
				COUNT(*) as total, 
				bairro
			FROM 
				empresas
			WHERE (YEAR(datainscricao) BETWEEN 2007 AND 2017 AND NOT ISNULL(latitude)  AND NOT ISNULL(longitude) AND bairro != '' AND not isnull(bairro)) AND (
				atividade LIKE '%$dados%' OR
				bairro LIKE '%$dados%' OR
				nome LIKE '%$dados%' OR
				cep LIKE '%$dados%'
			)
			GROUP BY bairro
			ORDER BY bairro ASC;"));	


		//atividade
		$atividade  = Db::select( Db::raw("
			SELECT 
				COUNT(*) as total, 
				atividade
			FROM 
				empresas
			WHERE (YEAR(datainscricao) BETWEEN 2007 AND 2017 AND NOT ISNULL(latitude)  AND NOT ISNULL(longitude) AND atividade != '' AND not isnull(atividade) AND atividade != '0' AND atividade != '********' ) AND (
				atividade LIKE '%$dados%' OR
				bairro LIKE '%$dados%' OR
				nome LIKE '%$dados%' OR
				cep LIKE '%$dados%'
			)
			GROUP BY atividade
			ORDER BY total DESC;"));	


		$retorno = new \stdClass;
		$retorno->dados = $dadosEmpresa;
		$retorno->bairro = $bairro;
		$retorno->periodo = $periodo;
		$retorno->atividade = $atividade;

		return json_encode($retorno);		

		}catch(Exception $e){
			
			return $e->getMessage();
		}

	}
}
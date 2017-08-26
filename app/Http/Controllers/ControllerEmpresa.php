<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Empresa;
use GuzzleHttp\Exception\RequestException;

class ControllerEmpresa extends Controller {

	public function get(Request $request) {

		try{
			
		$count = Empresa::WhereRaw("MATCH(atividade) 
		AGAINST('".$request->input('dados')." ')")
		->where('atualizado','=',10)
		->count();
		
		if($count > 0){
			$data = Empresa::WhereRaw("MATCH(atividade) 
			AGAINST('".$request->input('dados')."')")
			->where('atualizado','=',10)
			//->limit(10)
			->get();
			return  $data;
		}

		

		}catch(Exception $e){
			
			return $e->getMessage();
		}

	}
}

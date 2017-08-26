<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Empresa;
use GuzzleHttp\Exception\RequestException;

class ControllerEmpresa extends Controller {

	public function get(Request $request) {

		try{
			
		$data = Empresa::WhereRaw("MATCH(tipo) 
		AGAINST('".$request->input('dados')."')")
		->limit(10)
		->get();

		return  $data;

		}catch(Exception $e){
			
			return $e->getMessage();
		}

	}
}

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Empresa;

class ControllerEmpresa extends Controller {

	public function get(Request $request) {

		try{
			
		$data = Empresa::WhereRaw("MATCH(tipo) 
		AGAINST('".$request->input('dados')."')")
		->get();

		return  $data;

		}catch(Exception $e){
			
			return $e->getMessage();
		}

	}
}

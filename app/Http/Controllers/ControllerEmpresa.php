<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Model\Empresa;

class ControllerEmpresa extends Controller {

	public function get(Request $request) {

		
		$data = Empresa::WhereRaw("MATCH(tipo,documento,endereco) AGAINST('".$request->input('dados')."'")
		->limit(10)
		->get();

		return  $data;

	
	}
}

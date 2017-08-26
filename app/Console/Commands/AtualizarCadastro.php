<?php
namespace App\Console\Commands;

use App\Model\Empresa;
use Illuminate\Console\Command;

class AtualizarCadastro extends Command
{
    protected $signature = 'cadastro {pagina}';
    protected $name = 'cadastro';
    protected $description = "Atualiza o cadastro das empresas";
    
    /**
     * Atualiza a latitude e a longitude dos endereços das empresas 
     */
    public function handle()
    {

    	$pagina = (int) $this->argument('pagina') - 1;

    	$empresas = Empresa::
    	select('codigo')->
    	where('atualizado', '=', 0)->
    	offset($pagina * 500)->
        limit(500)->
    	get();

		$http = new \GuzzleHttp\Client();

		// (
		// 	['headers'=> [ 
		// 		'User-Agent'=>'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36'
		// 		]
		// 	])
		

        $erro = 0;    	

    	foreach ($empresas as $empresa) {

    		try {
				$request = $http->request('GET', 'http://receitaws.com.br/v1/cnpj/' .  preg_replace('/[^0-9]/', '', $empresa->documento) ,
				['timeout' => 5]);


				$dados = $request->getBody();
				echo $dados;		
    		} catch ( GuzzleHttp\Exception\ConnectException $e) {
    			print_r($e);
    			continue;
    		}
			
			if($request->getStatusCode() == 200 ) {

				$dados = json_decode($request->getBody());



				if($dados->status != 'OK') {
					Empresa::where('codigo', '=', $empresa->codigo)->update([
						'atualizado' => 1,
						'status' => $dados->status
					]);

					continue;
				}  

				Empresa::where('codigo', '=', $empresa->codigo)->update([
					'atividade' => $dados->atividade_principal[0]->text,
					'fantasia' => $dados->fantasia,
					'telefone' => $dados->telefone,
					'tipo_empresa' => $dados->tipo,
					'email' => $dados->email,
					'municipio' => $dados->municipio,
					'cep' => $dados->cep,
					'logradouro' => $dados->logradouro,
					'bairro' => $dados->bairro,
					'complemento' => $dados->complemento,
					'numero' => $dados->numero,
					'cnae' => $dados->atividade_principal[0]->code,
					'uf' => $dados->uf,
					'atualizado' => 1,
					'status' => $dados->status
				]);				

			}     		
    		
    	}
        
    }
}
<?php
namespace App\Console\Commands;

use App\Endereco;
use Illuminate\Console\Command;

class AtualizadorCoordenadas extends Command
{
    protected $signature = 'coordenadas:atualizar {pagina}';
    protected $name = 'coordenadas:atualizar';
    protected $description = "Atualiza as coordendas dos clientes";
    
    /**
     * Atualiza a latitude e a longitude dos endereços das empresas 
     */
    public function handle()
    {
        $pagina = (int) $this->argument('pagina');

        $keys = new \ArrayObject();
        $keys->append('AIzaSyApjxPfyiREU8MCuWfypkzOiS8qYlG3Xqg');

        $enderecos =  Endereco::
            select('id', 'cidade', 'cep', 'numero', 'rua', 'uf')->
            where('latitude', '=', '' )->
            where('longitude', '=', '' )->
            limit($pagina, 2000 * $pagina)->
            get();

        if(count($keys) < $pagina) {
            $this->error('Não existe uma api para esta número de página!');
            exit;
        } 

        $http = new \GuzzleHttp\Client();
        $erro = 0;
        $validarEndereco = false;


        $this->info( 'Processo iniciado' );
        foreach ($enderecos as $endereco) {
            $validarEndereco = false;

            echo $endereco->id . ' - ';

            $coordenadas = json_decode(($http->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?key=' .
                $keys->offsetGet($pagina - 1) , [
                'query' => ['address' => "{$endereco->cidade},{$endereco->numero} {$endereco->rua} {$endereco->cep}"],
                'timeout' => 2
            ]))->getBody());     


            if($coordenadas->status != 'OK') {

                $this->error($coordenadas->status);
                $erro++;

                if($erro >= 10) {
                    $this->error('Processo cancelado por mais de 10 erros concecutivos.');
                    exit;
                }

                continue;
            }

            $erro = 0;

            foreach ($coordenadas->results as $coordenada) {

                $dadosCoordenadas = new \App\Helpers\GoogleMapaEndereco($coordenada, $endereco->uf, $endereco->cep);
                
                if(!empty($dadosCoordenadas->getLatitude()) && !empty($dadosCoordenadas->getLongitude())) {
                    $this->info('OK');
                    $validarEndereco  = true;

                    //atualiza o endereço no banco de dados
                    Endereco::where('id','=', $endereco->id)->update([
                        'latitude' => $dadosCoordenadas->getLatitude(),
                        'longitude' => $dadosCoordenadas->getLongitude()
                    ]);


                    break;       
                }
            
            }

            if($validarEndereco ==  false) {
                $this->error('Endereco não encontrado.');
            }

        }

        $this->info('Processo concluido');
    }
}
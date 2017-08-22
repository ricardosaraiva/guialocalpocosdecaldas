<?php 
namespace App\Helpers;

class GoogleMapaEndereco {
	private $pais;
	private $cep;
	private $uf;
	private $cidade;
	private $bairro;
	private $rua;
	private $numero;
	private $latitude;
	private $longitude;

	public function __construct($endereco, $uf, $cep) {
		foreach ($endereco->address_components as $dados) {
			$type = implode(' ', $dados->types);
			
			if( strstr($type, 'street_number')) {
				$this->numero = strtolower($dados->long_name);
			} elseif(strstr($type, 'route')) {
				$this->rua = strtolower($dados->long_name);
			} elseif(strstr($type, 'sublocality_level_1')) {
				$this->bairro = strtolower($dados->long_name);
			} elseif(strstr($type, 'administrative_area_level_2')) {
				$this->cidade = strtolower($dados->long_name);
			} elseif(strstr($type, 'administrative_area_level_1')) {
				$this->uf = strtolower($dados->short_name);
			} elseif(strstr($type, 'country')) {
				$this->bairro = strtolower($dados->short_name);
			} elseif(strstr($type, 'postal_code')) {
				$this->bairro = preg_replace('[^0-9]', '',$dados->long_name);
			} 
		}

		//valida se o endereço retornado é valido
		if($this->pais != 'br' || $this->uf != strtofirst($uf) || $this->cep != $cep) {
			$this->latitude = $endereco->geometry->location->lat;	
			$this->longitude = $endereco->geometry->location->lng;	
		}
	}
	public function getPais() {
		return $this->pais;
	}

	public function getCep() {
		return $this->cep;
	}

	public function getUf() {
		return $this->uf;
	}

	public function getCidade() {
		return $this->cidade;
	}

	public function getBairro() {
		return $this->bairro;
	}

	public function getRua() {
		return $this->rua;
	}

	public function getNumero() {
		return $this->numero;
	}	

	public function getLatitude() {
		return $this->latitude;
	}

	public function getLongitude() {
		return $this->longitude;
	}

}

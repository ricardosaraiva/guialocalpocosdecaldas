<?php

use Illuminate\Database\Seeder;
use App\Model\Categoria;

class categorias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$categorias = [
	        'AGRICULTURA, PECUÁRIA, PRODUÇÃO FLORESTAL, PESCA E AQÜICULTURA',
			'INDÚSTRIAS EXTRATIVAS',
			'INDÚSTRIAS DE TRANSFORMAÇÃO',
			'ELETRICIDADE E GÁS',
			'ÁGUA, ESGOTO, ATIVIDADES DE GESTÃO DE RESÍDUOS E DESCONTAMINAÇÃO',
			'CONSTRUÇÃO',
			'COMÉRCIO; REPARAÇÃO DE VEÍCULOS AUTOMOTORES E MOTOCICLETAS',
			'TRANSPORTE, ARMAZENAGEM E CORREIO',
			'ALOJAMENTO E ALIMENTAÇÃO',
			'INFORMAÇÃO E COMUNICAÇÃO',
			'ATIVIDADES FINANCEIRAS, DE SEGUROS E SERVIÇOS RELACIONADOS',
			'ATIVIDADES IMOBILIÁRIAS',
			'ATIVIDADES PROFISSIONAIS, CIENTÍFICAS E TÉCNICAS',
			'ATIVIDADES ADMINISTRATIVAS E SERVIÇOS COMPLEMENTARES',
			'ADMINISTRAÇÃO PÚBLICA, DEFESA E SEGURIDADE SOCIAL',
			'EDUCAÇÃO',
			'SAÚDE HUMANA E SERVIÇOS SOCIAIS',
			'ARTES, CULTURA, ESPORTE E RECREAÇÃO',
			'OUTRAS ATIVIDADES DE SERVIÇOS',
			'SERVIÇOS DOMÉSTICOS',
			'ORGANISMOS INTERNACIONAIS E OUTRAS INSTITUIÇÕES EXTRATERRITORIAIS'
		];

		foreach ($categorias as $categoria) {
			$modelCateroria = new Categoria;
			$modelCateroria->nome = $categoria;
			$modelCateroria->save();	
		}
    }
}

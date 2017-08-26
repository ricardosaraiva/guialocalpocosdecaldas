<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Guia do emprendedor</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<!-- import CSS -->
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css">

	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

	<?php /*
	<div class="modal fade" id="novaEmpresa">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Adicionar nova empresa</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	        	<div class="col-md-6">
	        		<label for="razao">Razão Social</label>
	        		<input type="text" class="form-control" id="razao">
	        	</div>

				<div class="col-md-6">
	        		<label for="fantasia">Nome Fantasia</label>
	        		<input type="text" class="form-control" id="fantasia">
	        	</div>	        	
	        </div>
 			<div class="row">
	        	<div class="col-md-4">
	        		<label for="razao">CNPJ</label>
	        		<input type="text" class="form-control" id="razao">
	        	</div>

				<div class="col-md-4">
	        		<label for="fantasia">Telefone</label>
	        		<input type="text" class="form-control" id="telefone">
	        	</div>	        	

				<div class="col-md-4">
	        		<label for="fantasia">E-mail</label>
	        		<input type="text" class="form-control" id="telefone">
	        	</div>	        		        	
	        </div>	        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success">Enviar</button>
	      </div>
	    </div>
	  </div>
	</div>*/?>
	
	<div class="menus">
		<button onclick="toggleFullScreen()" class="btn btn-success fullscreen">
			<i class="fa fa-arrows-alt"></i>
		</button>
		
<!-- 		<button class="btn btn-success info" onclick="grafico()">
			<i class="fa fa-line-chart"></i>
		</button>	 -->

		<button onclick="filtros()" id="filtros" class="btn btn-success filtros">
			<i class="fa fa-search"></i>
		</button>	
		
		<?php /*
		<button  data-toggle="modal" href='#novaEmpresa' class="btn btn-success novaEmpresa">
			<i class="fa fa-plus"></i>
		</button>
		*/?>		
	</div>

	<div id="graficos" class="graficos">
		<div class="row">
			<div class="col-md-10">
				
				<ul class="nav">
				  <li class="nav-item" id="menuGraficoAtividade">
				    <a class="nav-link" href="#" onclick="graficoAtividade()" ><i class="fa fa-building"></i> Atividade</a>
				  </li>
				  <li class="nav-item" id="menuGraficoPeriodo">
				    <a class="nav-link" href="#"  onclick="graficoPeriodo()" ><i class="fa fa-calendar"></i> Periodo</a>
				  </li>
				</ul>

			</div>
			<div class="col-md-2 right">
				<a onclick="fecharGrafico()"><i class="fa fa-times"></i></a>
			</div>
		</div>

		<div id="graficoPeriodo">

			<div class="margin-bottom-15"></div>
			<h2>Periodo</h2>
			
			<div id="graficoPeriodoConteudo"></div>
		</div>	

		<div id="graficoAtividade">

			<div class="margin-bottom-15"></div>
			<h2>Atividades</h2>
			
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="col-md-11">Atividade</th>
						<th class="col-md-1 center">Quantidade</th>
					</tr>
				</thead>
				<tbody id="graficoAtividadeConteudo"></tbody>
			</table>
		</div>					

	</div>

	<div id="formulario" class="formulario">

		<div class="conteudo">
			<button onclick="fecharFiltros()" class="btn btn-danger fechar"><i class="fa fa-times"></i></button>
			<div class="logo"><img src="assets/imgs/logo.png" width="200px"></div>
			
			<div class="row">
				<div class="col-md-10 col-sm-10">
					<input placeholder="Buscar por: Nome, Bairro e Categoria" name="dados" v-model="buscar"  type="text" class="form-control form-control-lg">
				</div>
				<div class="col-md-2 col-sm-2">

					<button class="form-control btn btn-lg btn-success" @click="buscarDados"><i class="fa fa-search"></i></button>

					<!-- <button class="form-control btn btn-lg btn-success" @click="buscar"><i class="fa fa-search"></i></button> -->

				</div>
			</div>

		</div>

		<div class="bg"></div>
	</div>

	<div id="map" class="map"></div>

	<div class="modal fade" id="modalErro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exclamation"></i> Alerta</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Nenhum registro encontrado!
	      </div>
	    </div>
	  </div>
	</div>

</body>
</html>





<script type="text/javascript" src="{{url('/assets/js/loader.js')}}"></script>
<script src="{{url('/assets/js/jquery-3.1.1.slim.min.js')}}"></script>
<script src="{{url('/assets/js/tether.min.js')}}"></script>
<script src="{{url('/assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('/assets/js/axios.min.js')}}"></script>
<script src="{{url('/assets/js/vue.min.js')}}" ></script>
<!-- import JavaScript -->
<script src="{{url('/assets/js/index.js')}}"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
<script async defer  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeuybD5SC0H5gjWXqRsguDtzeNWKq5V_Y&callback=$vm.fetchAddress">
</script> 



<script>
var contentString = [];
var infoWindowClose ;
$vm  = new Vue({
		'el':'#formulario',
		data: {
			dados: [],
			buscar : '',
			markers:[],
			markerCluster: null		
		},

		watch: {

			dados: function(){

				this.clearMap();// limpa o mapa

				if(this.dados.length > 0){
					this.addMarkMap(this.dados);		
			 }
			}
		},
		methods: {



			buscar:function(val){
			vm = this;
		
				axios.post('/empresa',{'dados':val})
				.then(function (response) {
					vm.dados = response.data.dados;
				})
				.catch(function (error) {
					console.log(error);
				});
						
			},			
			
			fetchAddress: function() {
				this.map = new google.maps.Map(document.getElementById('map'), {
        	center: {lat: -21.7876465, lng: -46.5664982},
        	zoom: 13
        });

		},
		addMarkMap: function(){
			var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

		contentString = [];
		for (var i = 0; i < this.dados.length; i++) {

			var obj = 
				{lat: parseFloat(this.dados[i].latitude),
				 lng: parseFloat(this.dados[i].longitude)};
			



			var marker = new google.maps.Marker({
	          position: obj,
						label: '',//labels[i % labels.length],
						title: this.dados[i].nome,

	          map: this.map,
						icon: './assets/imgs/ico.png'

	        });


			contentString[i] = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h6 id="firstHeading" class="firstHeading">'+this.dados[i].nome+'</h6>'+
            '<div id="bodyContent">'+
						'<p>Rua: '+this.dados[i].logradouro+'</p>'+
						'<p>Bairro: '+this.dados[i].bairro+'</p>'+
						'<p>Numero: '+this.dados[i].numero+'</p>'+
						'<p>Atividade: '+this.dados[i].atividade+'</p>'+
            '</div>'+
            '</div>';

        	this.markers.push(marker); // add no marcador

        	addInfoWindow(marker, contentString[i]);
				
			}
			this.makeMarke(); // cria o cluster
			fecharFiltros();
		},
		buscarDados: function(){


			vm = this;
		
				axios.post('/empresa',{'dados':vm.buscar})
				.then(function (response) {
					
					vm.dados = response.data.dados;
					grafico(response.data.periodo, response.data.atividade)
				})
				.catch(function (error) {
					console.log(error);
				});

		},
		makeMarke:function(){

			this.markerCluster = new MarkerClusterer(this.map, this.markers,
					{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'}
      );
		},
		clearMap: function(){
			if(this.markerCluster != undefined) {

           this.markerCluster.removeMarker(this.markers);
     
     for ( i in this.markers) {
      this.markers[i].setMap(null);
     }

		 this.markers = [];
     this.markerCluster.clearMarkers();
				}
		}
		}
})

		function addInfoWindow(marker, message) {

            var infoWindow = new google.maps.InfoWindow({
                content: message
            });

            google.maps.event.addListener(marker, 'click', function () {

            	if (infoWindowClose != undefined) {
            		infoWindowClose.close();	
            	}
            	
                infoWindow.open(map, marker);
                infoWindowClose = infoWindow;
            });
        }

	function toggleFullScreen() {
		if (!document.fullscreenElement &&    // alternative standard method
	      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
	    if (document.documentElement.requestFullscreen) {
	      document.documentElement.requestFullscreen();
	    } else if (document.documentElement.msRequestFullscreen) {
	      document.documentElement.msRequestFullscreen();
	    } else if (document.documentElement.mozRequestFullScreen) {
	      document.documentElement.mozRequestFullScreen();
	    } else if (document.documentElement.webkitRequestFullscreen) {
	      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
	    }
	  } else {
	    if (document.exitFullscreen) {
	      document.exitFullscreen();
	    } else if (document.msExitFullscreen) {
	      document.msExitFullscreen();
	    } else if (document.mozCancelFullScreen) {
	      document.mozCancelFullScreen();
	    } else if (document.webkitExitFullscreen) {
	      document.webkitExitFullscreen();
	    }
	  }
	}

    function fecharFiltros() {
    	document.getElementById('formulario').style.display = 'none';
    	document.getElementById('filtros').style.display = 'block';
    }

    function filtros() {
		document.getElementById('formulario').style.display = 'block';
    	document.getElementById('filtros').style.display = 'none';    		
    }

    function grafico(periodo, atividade) {

    	document.getElementById('graficos').style.display = 'none';  
		document.getElementById('graficoPeriodo').style.display = 'none';
    	document.getElementById('graficoAtividade').style.display = 'none'; 

    	if(periodo.length > 0) {
    		document.getElementById('graficos').style.display = 'block'; 
    		document.getElementById('menuGraficoPeriodo').style.display = 'block';
    		document.getElementById('menuGraficoPeriodo').style.display = 'block'; 
			gerarGraficoPeriodo(periodo);
			gerarGraficoAtividade(atividade);
			graficoPeriodo(); 
			return false;   		
    	} 
    	

    	document.getElementById('menuGraficoPeriodo').style.display = 'none'; 
    	document.getElementById('menuGraficoPeriodo').style.display = 'none';
    	$('#modalErro').modal('show')
    	   	
    }


    function gerarGraficoAtividade(atividade) {
    	var el = document.getElementById('graficoAtividadeConteudo');
    	el.innerHTML = '';

    	for(i in atividade) {
    		el.insertAdjacentHTML( 'beforeend', '<tr>'+
    			'<td>'+atividade[i].atividade+'</td>'+
    			'<td>'+atividade[i].total+'</td>'+
    		'</tr>');
    	}
    }


    function gerarGraficoPeriodo(periodo) {
		google.charts.load('current', {packages: ['corechart', 'line']});
		google.charts.setOnLoadCallback(drawChartPeriodo);
		function drawChartPeriodo() {
			dados = [];
			dados.push(['Ano', 'Empresas']);

			var ano15 = '';
			var ano16 = '';
			var ano17 = '';

			for (i in periodo) {
				dados.push([periodo[i].ano.toString(), periodo[i].total]);
				ano15 = periodo[i].ano == 2015 ? periodo[i].total : ano15;
				ano16 = periodo[i].ano == 2016 ? periodo[i].total : ano16;
				ano17 = periodo[i].ano == 2017 ? periodo[i].total : ano17;
			}

			var total = ((ano15 + ano16 + ano17) / 3).toFixed(2);
			var legenda = (ano15 < ano17) ? 'Perpectiva de crescimento para 2018 de ' + total + '%' . total : 'Perpectiva de queda para 2018 de ' + total + '%';

	        var data = google.visualization.arrayToDataTable(dados);

	        var options = {
	        	legend: 'none',
	          	hAxis: {
		          title: legenda
		        }
	        };

	        var chartPeriodo = new google.visualization.LineChart(document.getElementById('graficoPeriodoConteudo'));
	        chartPeriodo.draw(data, options);
	    }     	
    }

    function graficoAtividade() {
    	document.getElementById('graficoPeriodo').style.display = 'none';
    	document.getElementById('graficoAtividade').style.display = 'block'; 
    }

	function graficoPeriodo() {
    	document.getElementById('graficoAtividade').style.display = 'none'; 
    	document.getElementById('graficoPeriodo').style.display = 'block';
    }      

    function fecharGrafico() {
    	document.getElementById('graficos').style.display = 'none';    	
    }
</script>
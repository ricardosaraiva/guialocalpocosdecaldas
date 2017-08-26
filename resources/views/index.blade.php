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
		
		<button class="btn btn-success info" onclick="grafico()">
			<i class="fa fa-line-chart"></i>
		</button>	

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
				<h1></h1>
			</div>
			<div class="col-md-2 right">
				<button class="btn btn-danger" onclick="fecharGrafico()"><i class="fa fa-times"></i></button>
			</div>
		</div>

		<div id="chart_div"></div>

		<div class="row filtro">
			<div class="col-md-4">
				<select class="form-control" name="" id="">
					<option value="0">Listar por bairro</option>
					<option value="1">Listar por categoria</option>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h2>Jardim Kenndy</h2>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Categoria</th>
							<th class="center" width="150px">Empresas</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Categoria 1</td>
							<td class="center">10</td>
						</tr>
					</tbody>
					
				</table>
			</div>
		</div>
	</div>

	<div id="formulario" class="formulario">

		<div class="conteudo">
			<button onclick="fecharFiltros()" class="btn btn-danger fechar"><i class="fa fa-times"></i></button>
			<div class="logo"><img src="assets/imgs/logo.png" width="200px"></div>
			
			<div class="row">
				<div class="col-md-10 col-sm-10">
					<input placeholder="Buscar por: Nome, Bairro e Categoria" name="dados" v-model='buscar' type="text" class="form-control form-control-lg">
				</div>
				<div class="col-md-2 col-sm-2">
					<button class="form-control btn btn-lg btn-success"><i class="fa fa-search"></i></button>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
				<el-table
				:data="dados"
				height="250"
				border
				style="width: 100%">
				<el-table-column
					prop="nome"
					label="Nome"
					>
				</el-table-column>
				<el-table-column
					prop="atividade"
					label="Atividade"
					>
				</el-table-column>

				<el-table-column
					prop="logradouro"
					label="Logradouro"
				>
				</el-table-column>

				<el-table-column
					prop="bairro"
					label="Bairro"
				>
				</el-table-column>

				<el-table-column
					prop="numero"
					label="Numero"
				>
				</el-table-column>

				<el-table-column
					prop="logradouro"
					label="logradouro"
				>
				</el-table-column>

			</el-table>					
				</div>
			</div>

		</div>

		<div class="bg"></div>
	</div>

	<div id="map" class="map"></div>

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

$vm  = new Vue({
		'el':'#formulario',
		data: {
			dados: [],
			buscar : '',
			markers:[],
			markerCluster: null		
		},

		watch: {
			buscar:function(val){
			vm = this;
		
				axios.post('/empresa',{'dados':val})
				.then(function (response) {
					vm.dados = response.data;
				})
				.catch(function (error) {
					console.log(error);
				});
						
			},
			dados: function(){

				this.clearMap();// limpa o mapa

				if(this.dados.length > 0){
					this.addMarkMap(this.dados);		
			 }
			}
		},
		methods: {
			
			fetchAddress: function() {
				this.map = new google.maps.Map(document.getElementById('map'), {
        	center: {lat: -21.7876465, lng: -46.5664982},
        	zoom: 13
        });

		},
		addMarkMap: function(){
			var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

		for (var i = 0; i < this.dados.length; i++) {
			var obj = 
				{lat: parseFloat(this.dados[i].latitude),
				 lng: parseFloat(this.dados[i].longitude)};
			
			console.log(i);


				 var marker = new google.maps.Marker({
          position: obj,
					label: '',//labels[i % labels.length],
					title: this.dados[i].nome,
          map: this.map
        });

				var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">'+this.dados[i].nome+'</h1>'+
            '<div id="bodyContent">'+
						'<p>Rua: '+this.dados[i].logradouro+'</p>'
						'<p>Bairro: '+this.dados[i].bairro+'</p>'
						'<p>Numero: '+this.dados[i].numero+'</p>'
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });


				marker.addListener('click', function() {
					infowindow.close();
          infowindow.open(this.map, marker);
        });

        this.markers.push(marker); // add no marcador
				
			}
			this.makeMarke(); // cria o cluster
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

    function grafico() {
		google.charts.load('current', {packages: ['corechart', 'line']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
	        var data = google.visualization.arrayToDataTable([
	          ['Ano', 'Empresas'],
	          ['2004',  10],
	          ['2005',  11],
	          ['2006',  15],
	          ['2007',  5]
	        ]);

	        var options = {
	          title: 'Crescimento de empresas',
	          legend: 'none'
	        };

	        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

	        chart.draw(data, options);
	    }    	

    	document.getElementById('graficos').style.display = 'block';    	
    }

    function fecharGrafico() {
    	document.getElementById('graficos').style.display = 'none';    	
    }
</script>

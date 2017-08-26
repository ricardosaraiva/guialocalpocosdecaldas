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
					width="180">
				</el-table-column>
				<el-table-column
					prop="tipo"
					label="Tipo"
					width="180">
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.4.2/vue.min.js" integrity="sha256-Gs0UYwrz/B58FsQggzU+vvCSyG/pewemP4Lssjzv8Ho=" crossorigin="anonymous"></script>
<!-- import JavaScript -->
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
<script>

new Vue({
		'el':'#formulario',
		data: {
			dados: [],
			buscar : '',
			loading: false
		},
		watch: {
			buscar:function(val){
			//	console.log(val)
			vm = this;
				this.loading = true;
				axios.post('/empresa',{'dados':val})
				.then(function (response) {
					vm.dados = response.data;
					console.log(response);
				})
				.catch(function (error) {
					console.log(error);
				});
						
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


	var map;
    function initMap() {
    	map = new google.maps.Map(document.getElementById('map'), {
        	center: {lat: -21.7859266, lng: -46.5725207},
        	fullscreenControl: false,
        	zoom: 15
        });
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
<script async defer  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApjxPfyiREU8MCuWfypkzOiS8qYlG3Xqg&callback=initMap">
</script> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Guia do emprendedor</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<style>
		a {
			cursor: pointer;
			color:  #666;
		}
		a:hover {
			text-decoration: underline;
		}
		.formulario {
			position: absolute;
			left: 10%;
			width: 80%;
			top: 50%;
			margin-top: -200px;
			height: 400px;
			z-index: 1000;
		}
		
		.bg {
			position: absolute;
			top: 0;
			left: 0;
			height: 100%;
			width: 100%;
			background: #FFF;
			opacity: 0.6;
			border-radius: 20px;
			border:  solid 10px #000;
			z-index: 0;
			-webkit-box-shadow: 0px 0px 25px 3px rgba(0,0,0,1);
			-moz-box-shadow: 0px 0px 25px 3px rgba(0,0,0,1);
			box-shadow: 0px 0px 25px 3px rgba(0,0,0,1);
		}
		.formulario .conteudo {
			color:  #555;
			padding: 20px;
			top: 0;
			left: 0;
			height: 100%;
			width: 100%;			
			position: absolute;
			z-index: 100;
			margin-bottom: 15px;
		}
		.formulario .conteudo .logo {
			text-align: center;
			margin: 0;
			padding: 0; 
		}
		.formulario .conteudo input {
			margin: 0;
			padding: 0; 
			border:  solid 2px #999;
			padding: 5px;
			box-sizing: border-box;
			height: 60px;
			border-radius: 5px;
			margin-bottom: 5px;
		}
		.formulario .conteudo .busca {
			text-align: right;
		}
		.formulario .conteudo button {
			border:  solid 1px #333;
			background: #333;
			color: #FFF;
			border-radius: 5px;
			font-size: 18px;
			padding:  10px;
		}
		.formulario .conteudo .categoria {
			width: 120px;
			text-align: center;
			display: inline-block;
		}
    	.map {
    		z-index: 0;
	       	overflow: hidden;
	       	top: 0;
	       	left: 0;
	       	position: absolute;
	        height: 100%;
	        width: 100%;
    	}

    	.fullscreen{
    		margin: 0; 
    		position: fixed;
    		top: 10px;
    		right: 10px;
    		z-index: 1000;
    	}
    </style>
</head>
<body>

	<button onclick="toggleFullScreen()" class="btn-floating fullscreen waves-effect waves-light light-green accent-4"><i class="fa fa-arrows-alt"></i></button>

	<div class="formulario">
		<div class="conteudo">
			<h1 class="logo">LOGO</h1>
			
			
				<div class="busca">
					<input type="text">
					<button>&nbsp;&nbsp;<i class="fa fa-cog"></i>&nbsp;&nbsp;</button>
					<button><i class="fa fa-search"></i> Pesquisar</button>
				</div>

				<h4>Categorias:</h4>

				<div class="categorias">

					<a class="categoria">
						<i class="fa fa-university fa-2x"></i><br>
						Faculdades <br> Escolas
					</a>

					<a class="categoria">
						<i class="fa fa-car fa-2x"></i><br>
						Venda de veiculos
					</a>				
				</div>

		</div>
		<div class="bg"></div>
	</div>

	<div id="map" class="map"></div>

</body>
</html>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
<script>

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
          center: {lat: -21.813248, lng: -46.6315377},
          fullscreenControl: false,
          zoom: 13
        });
    }
</script>
<script async defer  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApjxPfyiREU8MCuWfypkzOiS8qYlG3Xqg&callback=initMap">
</script> 
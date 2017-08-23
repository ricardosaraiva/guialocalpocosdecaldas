<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Guia do emprendedor</title>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body id="login">

	<div class="formLogin">
		
		<div class="row">
			<div class="col-md-12 logo">
				<img src="assets/imgs/logo.png" alt="" width="80%">
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<input type="text" class="form-control" id="login" name="login" placeholder="Usuario">
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Senha">
			</div>
		</div>	

		<div class="row">
				<div class="col-md-12 right"><button class="btn btn-success">Logar</button></div>
			</div>	
	</div>

	<div class="shadow"></div>	

	<div id="map" class="map"></div>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script>
	var map;
    function initMap() {
    	map = new google.maps.Map(document.getElementById('map'), {
        	center: {lat: -21.7859266, lng: -46.5725207},
        	fullscreenControl: false,
        	zoom: 15
        });
    }
</script>
<script async defer  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApjxPfyiREU8MCuWfypkzOiS8qYlG3Xqg&callback=initMap">
</script> 
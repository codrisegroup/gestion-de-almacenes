
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Acceso</title>
<!-- metas -->
<meta http-equiv="refresh" content="1200">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="#">

<!-- Inicio Bootstrap 3  -->
<!-- css -->
<link rel="stylesheet" href="http://192.168.1.7/cdn/bootstrap/css/bootstrap-default.css">

<!-- js -->
<script src="http://192.168.1.7/cdn/bootstrap/js/jquery.min.js"></script>
<script src="http://192.168.1.7/cdn/bootstrap/js/bootstrap.min.js"></script>
<!-- Fin Bootstrap 3  -->


<!-- Inicio FontAwesome -->
<link rel="stylesheet" href="http://192.168.1.7/cdn/font-awesome/css/font-awesome.min.css">

<!-- Inicio Google Fonts -->

<link href="http://192.168.1.7/cdn/google-fonts/montserrat.css" rel="stylesheet">

<style>
body{
font-family: 'Montserrat', sans-serif;
}
</style>
<!-- Fin Google Fonts -->


<!-- Fin Script convertir en mayuscula al ingresar-->
<link rel="stylesheet" href="http://192.168.1.7/cdn/Selectize.js/css/selectize.default.css" >

<script src="http://192.168.1.7/cdn/Selectize.js/js/selectize.js"></script></head>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#idcontrato").change(function () {
$("#idcontrato option:selected").each(function () {
elegido=$(this).val();
$.post("login.php", { elegido: elegido }, function(data){
$("#idform").html(data);
});     
});
});    
});
</script>

<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-4">
<h1 class="text-center">Gestión de Almacenes</h1>
<center>
<img src="assets/img/logo_192.png" alt="" class="img-responsive">
</center>
<p></p>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title text-center">INICIAR SESIÓN</h3>
	</div>
	<div class="panel-body">
	
	<div class="form-group">
	<select name="contrato" id="idcontrato" class="demo-default" required="">
	<option value=''>[SELECCIONAR]</option>	
	<?php 
    $db     = new Conexion();
    $query  = "SELECT * FROM login";
    $result = $db->query($query); 
    while ($fila = mysqli_fetch_object($result))
     {
    	echo "<option value='$fila->id'>$fila->centrocosto $fila->descripcion</option>";
     }


	 ?> 
	</select>
	<script >
	$('#idcontrato').selectize({
	maxItems: 1
	});
	</script>
	</div>

	<div id="idform"></div>
	

	 
	</div>
</div>

</div>
</div>
</div>	
</body>
</html>
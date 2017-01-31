<?php 
include('config.php');
include('bd/conexion.php');

$id =  $_POST['elegido']; 

$db     = new Conexion();
$query  = "SELECT * FROM login WHERE id='".$id."'";
$result = $db->query($query);
$dato   = mysqli_fetch_array($result);


?>


<form action="<?php echo $dato['ruta']; ?>" method="POST" autocomplete="Off">

     <input type="hidden" name="contrato" value="<?php echo $dato['centrocosto'] ?>">

	 <div class="form-group">
	 <input type="text" name="user" id="" class="form-control" placeholder="Ingrese su Usuario" required="" autofocus="">
	 </div>

	 <div class="form-group">
	 <input type="password" name="pass" id="" class="form-control" placeholder="Ingrese su Contraseña" required="">
	 </div>

	
	 <button class="btn btn-primary">Ingresar</button>


</form>
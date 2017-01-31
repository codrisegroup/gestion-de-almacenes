<?php 
include('config.php');
include('bd/conexion.php');
$db = new Conexion();
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Archivos Gestión de Almacenes</title>
<?php include('enlaces/principal.php'); ?>
<?php include('enlaces/datatables.php'); ?>
</head>
<body>
<div class="container-fluid">
	<div class="row">
	<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Cargar Archivo</h3>
		</div>
		<div class="panel-body">
		
		<form action="procesos/subir-archivo" method="POST" enctype="multipart/form-data" class="form-inline"  autocomplete="Off">
       
        <div class="form-group">
        <label for="">Contrato:</label>
        <select name="contrato" id="" class="form-control" required="">
        <option value="">[Seleccionar]</option>
        <?php 
         $query  = "SELECT  * FROM login";
         $result = $db->query($query);
         while ($fila = mysqli_fetch_object($result))
          {
         	echo "<option value='$fila->centrocosto'>$fila->centrocosto $fila->descripcion</option>";
          }

         ?>
        </select>
        </div>

        <div class="form-group">
        <label for="">Nombre Archivo:</label>
        <input type="text" name="nombre" class="form-control" required="" onchange="Mayusculas(this)">
        </div>
        
        <div class="form-group">
        <label for="">Archivo:</label>
		<input type="file" name="archivo"  class="form-control" required="">
        </div>


		<button class="btn btn-primary">Cargar</button>
		</form>

		</div>
	</div>
	</div>
	</div>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Lista de Archivos</h3>
    </div>
    <div class="panel-body">
    <?php include('grid/lista-archivos.php'); ?>
    </div>
</div>
</div>
</div>

</div>
</body>
</html>
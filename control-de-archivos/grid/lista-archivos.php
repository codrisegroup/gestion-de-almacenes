<?php 

$db     = new Conexion();
$query  = "SELECT a.contrato,l.descripcion,a.nombre_archivo,a.ruta_archivo FROM archivos as a INNER JOIN login  as l ON a.contrato=l.centrocosto";
$result = $db->query($query);

 ?>


<div class="table-responsive">
	<table id="consulta" class="table table-bordered table-condensed">
		<thead>
			<tr class="active">
				<th>Contrato</th>
				<th>Nombe de Archivo</th>
				<th><i class="glyphicon glyphicon-trash text-danger"></i></th>
			</tr>
		</thead>
		<tbody>
		<?php 
        while ($fila = mysqli_fetch_object($result)) 
        {
        ?>
        <tr >
        <td><?php echo $fila->contrato.' - '.$fila->descripcion; ?></td>
        <td><a href="files/<?php echo $fila->ruta_archivo; ?>"><?php echo $fila->nombre_archivo; ?></a></td>
        <td><a href="procesos/eliminar-archivo?ruta=<?php echo $fila->ruta_archivo; ?>"><i class="glyphicon glyphicon-trash text-danger"></i></a></td>
        </tr>

        <?php
        }
		 ?>
		</tbody>
	</table>
</div>

<script>
$(document).ready(function(){
    $('#consulta').DataTable();
});
</script>
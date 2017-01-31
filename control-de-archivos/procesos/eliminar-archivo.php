<?php 

include('../config.php');
include('../bd/conexion.php');

$ruta  = $_GET['ruta'];
unlink('../files/'.$ruta.'');

$db     = new Conexion();
$query  = "DELETE FROM archivos WHERE ruta_archivo='".$ruta."'";
$result = $db->query($query);
if ($result) 
{
 echo "<script>
       alert('Registro Eliminado');
       window.location='".PATH."';
       </script>";
}
else
{
 echo "<script>
       alert('Error');
       window.location='".PATH."';
       </script>";
}










 ?>
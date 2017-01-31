<?php
include('../config.php');
include('../bd/conexion.php');
$db = new Conexion();

if ($_FILES['archivo']['type']=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
{

$contrato          = $_POST['contrato'];
$nombre_archivo    = $_POST['nombre'];
$nombre            = $contrato.'-'.$nombre_archivo.'.xlsx';

$query   = "SELECT * FROM archivos WHERE ruta_archivo='".$nombre."'";
$result  = $db->query($query);
$numfila = $result->num_rows;
if ($numfila > 0) 
{
 $archivo_temporal  = $_FILES['archivo']['tmp_name'];
$destino           = "../files/".$nombre;
move_uploaded_file($archivo_temporal,$destino);

$ruta_archivo = $nombre;

$query  = "UPDATE archivos SET ruta_archivo='".$ruta_archivo."' WHERE ruta_archivo='".$ruta_archivo."'";
$result = $db->query($query);
if ($result) 
{
 echo "<script>
       alert('Actualización Exitosa');
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

}
else
{

$archivo_temporal  = $_FILES['archivo']['tmp_name'];
$destino           = "../files/".$nombre;
move_uploaded_file($archivo_temporal,$destino);

$ruta_archivo = $nombre;

$query  = "INSERT INTO archivos(contrato,nombre_archivo,ruta_archivo)
VALUES('".$contrato."','".$nombre_archivo."','".$ruta_archivo."')";
$result = $db->query($query);
if ($result) 
{
 echo "<script>
       alert('Registro Exitoso');
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

}





}
else
{
   echo "<script>
       alert('Archivo no Permitido');
       window.location='".PATH."';
       </script>";
}




 ?>
			
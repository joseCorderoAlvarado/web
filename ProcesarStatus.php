<?php
include("Conexion.php");
$IdVenta=$_POST['Valorid'];
$IdStatus=$_POST['Status'];
$Modificar="update detalleventa set STATUSVENTA_idStatusVentas=$IdStatus WHERE idDetalleVenta=$IdVenta";
mysqli_query($conect,$Modificar)  or die("error al Actualizar");
header("location:Editar_Envios2.php");
?>

<?php
include("lib_carrito.php");
$idProducto=$_REQUEST["id"];
$Nombre=$_REQUEST["nombre"];
$Precio=$_REQUEST["precio"];
$Cantidad=$_REQUEST["Cantidad"];
$_SESSION["ocarrito"]->introduce_producto($idProducto, $Nombre,$Precio,$Cantidad);
header("Location: IndexCliente.php?pagina=1");
?>

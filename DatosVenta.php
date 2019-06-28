<?php
include("lib_carrito.php");
$idPersona=$_POST["idUsuario"];
$idDireccion=$_POST["idDireccion"];
$Metodo=$_POST["Metodo"];
$Envio=$_POST["Envio"];
$_SESSION['idPersona']=$idPersona;
$_SESSION['idDireccion']=$idDireccion;
$_SESSION['Metodo']=$Metodo;
$_SESSION['Envio']=$Envio;
$Fecha_Compra=date("Y-m-d");
if($Metodo==1){
$_SESSION["ocarrito"]->ventapaypal();
}
else {
	header ("Location:Tarjetas.php");
}
?>

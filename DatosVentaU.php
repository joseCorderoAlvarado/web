<?php
include ("lib_carrito.php");
$_SESSION['idPersona'];
$_SESSION['idDireccion'];
$_SESSION['Metodo'];
$_SESSION['Envio'];
$Fecha_Compra=date("Y-m-d");
$MesSistema=date("m");// mes del sistema para calcular la temporada
if ($MesSistema=='03' || $MesSistema=='04' || $MesSistema=='05') {
$TemporadaSistema='Primavera';
}
elseif ($MesSistema=='06'||$MesSistema=='07'||$MesSistema=='08') {
$TemporadaSistema='Verano';
}
elseif ($MesSistema=='09'||$MesSistema=='10'||$MesSistema=='11') {
$TemporadaSistema='Otono';
}
elseif ($MesSistema=='12'||$MesSistema=='01'||$MesSistema=='02') {
$TemporadaSistema='Invierno';
}
$FechaVenta=date("Y-m-d"); // fecha de la venta realizada
$CorreoSesion=$_SESSION['Correo'];
include("Conexion.php");
$consultaEusuario="select estado from  usuario inner join persona on persona.idPersona=usuario.PERSONA_idPersona inner join persona_has_domicilio on persona_has_domicilio.PERSONA_idPersona=persona.idPersona inner join domicilio on persona_has_domicilio.DOMICILIO_idDomicilio=domicilio.idDomicilio inner join entidades on domicilio.ENTIDADES_idEntidades=entidades.idEntidades where CorreoElectronico='$CorreoSesion'"; //aqui en correo electronico debe ir la variable de sesion 
$resultadoconsultaEusuario=mysqli_query($conect,$consultaEusuario) or die("error al consultar el estado del usuario el usuario");
while ($informacionEU=mysqli_fetch_array($resultadoconsultaEusuario)) {
	$EstadoUsuario=$informacionEU['estado'];

}

$_SESSION["ocarrito"]->envio($_SESSION['idPersona'],$_SESSION['idDireccion'],$_SESSION['Metodo'],$_SESSION['Envio'],$Fecha_Compra);	
$ConsultaVenta = "select persona.Nombre_P as Nombre, usuario.CorreoElectronico as Usuario, entidades.Estado as Estado, venta.idVenta as Venta, venta.Fecha_Compra as fecha from persona_has_domicilio 
			join persona on persona_has_domicilio.PERSONA_idPersona = persona.idPersona 
			join domicilio on persona_has_domicilio.DOMICILIO_idDomicilio = domicilio.idDomicilio 
			join usuario on persona_has_domicilio.PERSONA_idPersona = usuario.PERSONA_idPersona 
			join venta on persona_has_domicilio.DOMICILIO_idDomicilio = venta.DOMICILIO_idDomicilio 
			join entidades on domicilio.ENTIDADES_idEntidades = entidades.idEntidades where entidades.Estado = '$EstadoUsuario' order by fecha desc limit 1";
		$ResVenta=mysqli_query($conect,$ConsultaVenta) or die ("error al consultar");
//echo $EstadoUsuario;
while ($valores=mysqli_fetch_array($ResVenta)) {
$Venta=$valores['Venta'];
}
include("Conexion2.php");
$ConsultaUsuarioDw="select * from usuario where Correo='$CorreoSesion'";// el valor sera el de la variable de sesion

$resultadoUsuarioDw=mysqli_query($conect2,$ConsultaUsuarioDw) or die("error al consultar el usuario");
$datos=mysqli_fetch_array($resultadoUsuarioDw);

if ($datos['Correo']!="") 
{
$idEstadoU=" select idEstado from estado where NombreEstado='$EstadoUsuario'";
$resultadoidEstadoU=mysqli_query($conect2,$idEstadoU) or die("error al consultar el id del  estado del usuario");
$informacionidEU=mysqli_fetch_array($resultadoidEstadoU);
$EstadoUdw=$informacionidEU['idEstado'];
$CorreoUsuariodw=$datos['Correo'];
$ConsultaidUsuariodw="select idUsuario from usuario where Correo='$CorreoUsuariodw'";
$ResultadoidUsuariodw=mysqli_query($conect2,$ConsultaidUsuariodw) or die("error al consultar el id  del usuario");
$informacionRidUdw=mysqli_fetch_array($ResultadoidUsuariodw);
$idUsuariodw=$informacionRidUdw['idUsuario'];
$insertaDW = "insert into venta values (null, '$TemporadaSistema','$FechaVenta',$idUsuariodw)"; 
	$ResDW= mysqli_query ($conect2, $insertaDW); 
$consultaVW = "select * from venta order by idVenta desc limit 1"; 
		$ResVW = mysqli_query ($conect2, $consultaVW); 
while ($in = mysqli_fetch_array($ResVW))
		{
			$VWVenta = $in ['idVenta']; 
		}

$ConsultaV="select producto.Nombre_Product as Nombre, producto.Descripcion_Product as Descripcion, ventaproducto.CostoProduc as Costo, venta.idVenta as venta from venta_has_ventaproducto 
		inner join venta on venta.idVenta = venta_has_ventaproducto.VENTA_idVenta
		inner join ventaproducto on ventaproducto.idVentaProducto = venta_has_ventaproducto.VENTAPRODUCTO_idVentaProducto 
		inner join producto on producto.idProducto = ventaproducto.PRODUCTO_idProducto where idVenta = $Venta";
$ResV=mysqli_query($conect,$ConsultaV); 
while ($info=mysqli_fetch_array($ResV))
		{
			$Nombre = $info['Nombre']; 
			$Descripcion=$info['Descripcion']; 
			$Precio = $info['Costo']; 	
		//	include ("conectar.php"); 
		include("Conexion2.php");
			$insertar = "insert into productoventa values (null, '$Nombre', '$Descripcion', $Precio)"; 
			$ResIn = mysqli_query($conect2, $insertar) or die ("Error al insertar el productoventa");
			$ConsPV= "select idProductoVenta from productoventa order by idProductoVenta desc limit 1"; 
			$ResPV = mysqli_query ($conect2, $ConsPV); 
			$iPV= mysqli_fetch_array ($ResPV);
			$idPV = $iPV ['idProductoVenta']; 
			$insPHVW = "insert into productoventa_has_venta values ($idPV,$VWVenta)"; 
			$ResPHVW = mysqli_query($conect2, $insPHVW);
		 $ConsultaRep = "select Nombre,REPLACE(Nombre,'Playera-','') as Tendencia from productoventa where idProductoVenta=$idPV";
			$ResRep = mysqli_query($conect2, $ConsultaRep); 
			$Ten = mysqli_fetch_array ($ResRep); 
			$Tendencia = $Ten['Tendencia']; 
			$inTen= "insert into tendencia values (null, '$Tendencia', '$TemporadaSistema', $Precio)";
			$ResITen = mysqli_query($conect2, $inTen);
			$CidTen="select idTendencia from tendencia order by idtendencia DESC LIMIT 1";
			$ResTen=mysqli_query($conect2, $CidTen);
			$idTen=mysqli_fetch_array ($ResTen);
			$idTen2=$idTen['idTendencia'];
			$CET="insert into estado_has_tendencia values($EstadoUdw,$idTen2)";
			$ResCET= mysqli_query($conect2,$CET);
		}
}
else
{
$CorreoUsuario=$CorreoSesion; ///aqui sera el valor de la variable sesion 
$idEstadoU=" select idEstado from estado where NombreEstado='$EstadoUsuario'";
$resultadoidEstadoU=mysqli_query($conect2,$idEstadoU) or die("error al consultar el id del  estado del usuario");
$informacionidEU=mysqli_fetch_array($resultadoidEstadoU);
$EstadoUdw=$informacionidEU['idEstado'];
$insertarusuariosdw="insert into Usuario values(null,'$CorreoUsuario',$EstadoUdw)";
$resultadoinsertarusuariosdw=mysqli_query($conect2,$insertarusuariosdw) or die("error al insertar un usurio en el dw");
$consultaidUMax="select max(idUsuario) as idUsuario from Usuario";
$resultadoconsultaidUMax=mysqli_query($conect2,$consultaidUMax) or die("error al consultar el id del del usuario");
$idUsuarioMax=mysqli_fetch_array($resultadoconsultaidUMax);
 $IdUMax=$idUsuarioMax['idUsuario'];
	$insertaDW = "insert into venta values (null, '$TemporadaSistema','$FechaVenta',$IdUMax)"; 
	$ResDW= mysqli_query ($conect2, $insertaDW); 
$consultaVW = "select * from venta order by idVenta desc limit 1"; 
		$ResVW = mysqli_query ($conect2, $consultaVW); 
while ($in = mysqli_fetch_array($ResVW))
		{
			$VWVenta = $in ['idVenta']; 
		//	echo $VWVenta; 
		}
$ConsultaV="select producto.Nombre_Product as Nombre, producto.Descripcion_Product as Descripcion, ventaproducto.CostoProduc as Costo, venta.idVenta as venta from venta_has_ventaproducto 
		inner join venta on venta.idVenta = venta_has_ventaproducto.VENTA_idVenta
		inner join ventaproducto on ventaproducto.idVentaProducto = venta_has_ventaproducto.VENTAPRODUCTO_idVentaProducto 
		inner join producto on producto.idProducto = ventaproducto.PRODUCTO_idProducto where idVenta = $Venta";

	
$ResV=mysqli_query($conect,$ConsultaV); 
while ($info=mysqli_fetch_array($ResV))
		{
			$Nombre = $info['Nombre']; 
			$Descripcion=$info['Descripcion']; 
			$Precio = $info['Costo']; 	
		//	include ("conectar.php"); 
			$insertar = "insert into productoventa values (null, '$Nombre', '$Descripcion', $Precio)"; 
			$ResIn = mysqli_query($conect2, $insertar);
			$ConsPV= "select idProductoVenta from productoventa order by idProductoVenta desc limit 1"; 
			$ResPV = mysqli_query ($conect2, $ConsPV); 
			$iPV= mysqli_fetch_array ($ResPV);
			$idPV = $iPV ['idProductoVenta']; 
			$insPHVW = "insert into productoventa_has_venta values ($idPV,$VWVenta)"; 
			$ResPHVW = mysqli_query($conect2, $insPHVW); 
			$ConsultaRep = "select Nombre,REPLACE(Nombre,'Playera-','') as Tendencia from productoventa where idProductoVenta=$idPV";
			$ResRep = mysqli_query($conect2, $ConsultaRep); 
			$Ten = mysqli_fetch_array ($ResRep); 
			$Tendencia = $Ten['Tendencia']; 
			$inTen= "insert into tendencia values (null, '$Tendencia', '$TemporadaSistema', $Precio)";
			$ResITen = mysqli_query($conect2, $inTen);
	        $CidTen="select idTendencia from tendencia order by idtendencia DESC LIMIT 1";
			$ResTen=mysqli_query($conect2, $CidTen);
			$idTen=mysqli_fetch_array($ResTen);
			$idTen2=$idTen['idTendencia'];
			$CET="insert into estado_has_tendencia values($EstadoUdw,$idTen2)";
			$ResCET= mysqli_query($conect2,$CET);
		}
}

header("Location: ver_carrito.php");
?>

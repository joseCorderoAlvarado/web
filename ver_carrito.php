<?php
include("lib_carrito.php");

if($_SESSION['suma']=="0"){
	echo'<script type="text/javascript">
    alert("Este carrito esta vacio");
    window.location.href="IndexCliente.php";
    </script>';
}

?>

<!DOCTYPE html>
<html>
<head>	<!--Encabezado-->
<title>DICAM</title>

	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />  <!--para el banner superior-->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-1.11.0.min.js"></script> <!--Slider de zapatos -->
	<!-- Custom Theme files -->
	<!--theme-style-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
	<link href="css/StyleVistaProductos.css" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Free Style Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:100,300,400,500,700,800,900,100italic,300italic,400italic,500italic,700italic,800italic,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<!--//fonts-->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>	

	<!-- menu -->
	<script src="js/simpleCart.min.js"> </script>
	<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="js/memenu.js"></script>
	<script>$(document).ready(function(){$(".memenu").memenu();});</script>				

</head>
<body>
<?php 
	error_reporting(E_ALL^E_NOTICE);
		if(!$_GET)
		{
			header('Location:ver_carrito.php?pagina=1');
		}
		  $hombre=$_REQUEST['cate'];
	   $mujer=$_REQUEST['cate'];
	   $nino=$_REQUEST['cate'];
	
	?> 
	<!--top-header-->	<!--Busqueda, logo, Carrito-->
	<div class="top-header">
	<div class="container">
		<div class="top-header-main">
			<div class="col-md-4 top-header-left">
			</div>
			<div class="col-md-4 top-header-middle">
			<!-- logo de la empresa -->
				<a href="IndexCliente.php"><img src="images/logo-4.png" alt="" /></a>
			</div>
			<!--Carrito de compras-->
			<div class="col-md-4 top-header-right">
				<div class="cart box_1">
						<a>
						<h3> <div class="total">
					<span></span><?php $_SESSION["ocarrito"]->enviar_total();?></div>
							<!--imagen del carrito  -->
							<img src="images/cart-1.png" alt="" />
						</a>
						<p><a href="ver_carrito.php" >Mi carrito</a></p>
						<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	</div>
<!--Barra Menú-->
	<div class="header-bottom">
		<div class="container">
			<div class="top-nav">
				<ul class="memenu skyblue">	
						<li class="active"><a href="IndexCliente.php">Inicio</a></li>
					<li class="grid"><a>Categor&iacute;as</a>
						<div class="mepanel" >
							<div class="row">
								<div class="col1 me-one">
									<ul>
										<li><a href="indexCliente.php?cate=hombre&pagina=1">Hombres</a></li>
										<li><a href="indexCliente.php?cate=mujer&pagina=1">Mujeres</a></li>
										<li><a href="indexCliente.php?cate=nino&pagina=1">Ni&ntilde;os</a></li>
										
									</ul>
								</div>
								
							</div>
						</div>
					</li> 
					
				
					
					<li class="grid"><a href="Mi_PerfilCliente.php">Mi perfil</a>
					</li> 
					<li class="grid"><a href="Ver_Envios.php">Ver compras</a>
					</li>
					
					<li class="grid"><a href="LogOut.php">Cerrar Sesión</a>
					</li> 
					
					<li class="grid"><a href="Ayuda.php">Ayuda</a>
					</li>
				</ul>
			</div> 
			<div class="clearfix"> </div>
		</div>
	</div> 
	<!---->
	<!--bottom-header-->
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a>Mi Usuario es: <?php echo $_SESSION["Correo"]; ?></a></li>
				</ol>
			</div>
		</div>
	</div>
<?php
$_SESSION["ocarrito"]->imprime_carrito();
?>
<p></p>

<label for="ActiviaVentana" id="AbreModal">Confirmar Compra</label>
<input type="checkbox" name="ActiviaVentana" id="ActiviaVentana" >
<input type="hidden" name="Total" id="Total"   value="0"></input>
  
<?php
if ($_SESSION['suma']==0) {
echo'<script type="text/javascript">
    alert("Este carrito esta vacio");
    window.location.href="IndexCliente.php";
    </script>';
}
else
{
?>
<div class="VentanaModal">
	<label for="ActiviaVentana" id="CierraModal">X</label>
	<?php
	include("Conexion.php");
	$CorreoU=$_SESSION['Correo'];
	$consultaPersona="select * from Persona inner join Usuario on PERSONA_idPersona=idPersona where CorreoElectronico='$CorreoU'";
	$ResultadoPersona=mysqli_query($conect,$consultaPersona) or die ("error al consultar a la persona");
	while ($informacion=mysqli_fetch_array($ResultadoPersona)) {
		$idPersona=$informacion['idPersona'];
	}
	$consultaUsuario="select * from Usuario where PERSONA_idPersona=$idPersona";
	$ResultadoUsuario=mysqli_query($conect,$consultaUsuario) or die ("error al consultar Usuario");
	while ($informacion3=mysqli_fetch_array($ResultadoUsuario)) {
		$idUsuario=$informacion3['idUsuario'];
	}
	$ConsultaDomicilio="select * from domicilio inner join persona_has_domicilio  ON DOMICILIO_idDomicilio=iddomicilio inner join persona on PERSONA_idPersona= idPersona inner join entidades ON ENTIDADES_idEntidades=idEntidades where idPersona=$idPersona";
	$ResultadoDomicilio=mysqli_query($conect,$ConsultaDomicilio) or die ("erro al consultadar domicilio");
	while ($informacion2=mysqli_fetch_array($ResultadoDomicilio)){
		$idDireccion=$informacion2['idDomicilio'];
		$Calle=$informacion2['Calle'];
		$Estado=$informacion2["Estado"];
		$Municipio=$informacion2["Municipio"];
		$Numero=$informacion2["Numero"];
		$CP=$informacion2["CodigoPostal"];
	}
	?>
	<div style=" width: 100%; height: 70%; background-color: white;" align="center">
	<div class="container" style="margin: center; padding: center;  ">
			<div class="contact-top heading"> 
				<h3>Confirmar Envió</h3>
			</div>
			<div class="contact-bottom"> 
				<div class="col-md-6 contact-left"> 
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
				<form method='POST' action="DatosVenta.php"> 
				   <h1> Dirección de envio</h1> <input type="text"   id="Calle" disabled="disabled" name="Calle" value="Tu Calle es: <?php  echo $Calle;?> #<?php echo$Numero ?> "  >
				   <input type="text" name="idDireccion" id="idDireccion" hidden="hidden" value="<?php echo $idDireccion ?>">
				   <input type="text" name="idUsuario" id="idUsuario" hidden="hidden" value="<?php echo $idUsuario ?>">
					<input type="text"   id="Municipio" name="Municipio" disabled="disabled" value="Tu Municipio es: <?php echo$Municipio ?>">
					<input type="text"   id="Estado" name="Estado" disabled="" value="Tu Estado es: <?php echo$Estado ?>">   

	 <input type="submit" name="Aceptar" id="Aceptar" value="Aceptar" align="center" style="padding: 20px; font-size: 15px; width: 100px;">
		
				</div>
				  <h1> Formas de envió y tipo de pago</h1>
				<div class="col-md-6 contact-left">
				Selecciona tu método de pago: 
				<select name="Metodo" id="Metodo" style="height: 40px; width: 50%;">
					<?php
					$ConsultaMetodos="select *From metodopago";
					$ResultadoMetodos=mysqli_query($conect,$ConsultaMetodos) or die ("error al consultar metodos de pago");
					while ($ValoresMetodos=mysqli_fetch_array($ResultadoMetodos)) {
					echo "<option value='".$ValoresMetodos["idMetodoPago"]."'";
					echo ">".$ValoresMetodos["TipoMetodo"]."</option>";
					}
					?>
				</select>
				<p></p>
				Selecciona Tu tipo de envió:  
				<select name="Envio" id="Envio" style="height: 40px; width: 50%;">
					<?php
					$ConsultaEnvios="select *From envio";
					$ResultadoEnvios=mysqli_query($conect,$ConsultaEnvios) or die ("error al consultar los envios");
					while ($ValoresEnvios=mysqli_fetch_array($ResultadoEnvios)) {
					echo "<option value='".$ValoresEnvios["idEnvio"]."'";
					echo ">".$ValoresEnvios["Paqueteria"]."</option>";
					}
					?>
				</select>
	        </form>

			</div>
		</div>
	</div>
   </div>
</div>

<style type="text/css">
	#AbreModal{
		display: block;
		width: 150px;
		height: 50px;
		text-align: center;
		line-height: 50px;
		background-color: #cd3d3d;
		color: white;
		font-size: 1.2em;
		font-weight: bolder;
        cursor: pointer;
	}
	.VentanaModal{
		width: 100%;
		height: 100%;
		position: fixed;
		top: -100%;
		left: 0px;
		background-color:rgb(0,0,0,0.6);
	}
	#ActiviaVentana{
		display: none;
	}
	#ActiviaVentana:checked ~ .VentanaModal{
		top: 0%;
	}
	#CierraModal{
	display: block;
	color: white;
	font-size: 3em;
	background-color: #cd3d3d;
	width: 30px;
	height: 30px;
	text-align: center;
	line-height: 30px;
	margin-left: 100px;
	cursor: pointer;
	}
</style>
<?php
}
?>

<br>
<br>
<div class="footer-text">
		<div class="container">
			<div class="footer-main">
				<p class="footer-class">Dicam Costruyendo tu futuro<a target="_blank"> @2019</a> </p>
			</div>
		</div>
		<script type="text/javascript">
									$(document).ready(function() {
										
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
	<!--end-footer-text-->	
</body>
</html>

	
<?php
include("lib_carrito.php");
?>
<html>
	<head>
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
		<!--top-header-->	<!--Busqueda, logo, Carrito-->
		<div class="top-header">
			<div class="container">
				<div class="top-header-main">
					<div class="col-md-4 top-header-left">
						<!--Barra de búsqueda-->
						<div class="search-bar">
							<form method="POST">
								<input type="text" name="Pr" id="Pr" onfocus="this.value = '';" onkeyup="validar();" onblur="if (this.value == '') {this.value = '';}">
								<input type="submit" value="" name="buscar" id="buscar" disabled="disabled"/>
							</form>
						</div>
					</div>
			<div class="col-md-4 top-header-middle">

			<script type="text/javascript">
			function validar(){
			var valor = document.getElementById("Pr");

			if(valor.value != "" ){
				document.getElementById("buscar").disabled = "";  
			}else{
				document.getElementById("buscar").disabled = "disabled"; 
			}
			}
			</script>
			<!-- logo de la empresa -->
				<a href="IndexAdministrador.php"><img src="images/logo-4.png" alt="" /></a>
			</div>
			<!--Carrito de compras-->
			<div class="clearfix"></div>
				</div>
			</div>
		</div>
		
		<!--top-header-->
		<!--bottom-header-->
		<!--Barra Menú-->
		<div class="header-bottom">
		<div class="container">
			<div class="top-nav">
				<ul class="memenu skyblue"><li class="active"><a href="IndexAdministrador.php">Inicio</a></li>					
					<li class="grid"><a href="Mi_PerfilAdministrador.php">Mi perfil</a></li> 
					<li class="grid"><a href="Editar_Envios.php">Modificar Compras</a></li>
					<li class="grid"><a href="AltaUsuarios.php">Registrar Usuarios</a></li>
					<li class="grid"><a href="AltaProductos.php">Registrar productos</a></li>
					<li class="grid"><a href="VerVendidos.php">Productos Más Vendidos</a></li>
					<li class="grid"><a href="LogOut.php">Cerrar Sesión</a></li> 					
				</ul>
			</div> 
			<div class="clearfix"> </div>
		</div>
	</div> 
		
		<!--start-ckeckout-->
		<div class="ckeckout">
		<div class="container">
		<div class="ckeckout-top">
		<div class=" cart-items heading">
		<h3>Productos Más Vendidos</h3>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			<div class="in-check" >
				<ul class="unit">
					<li><span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Nombre Producto</span></li>
					<li><span>&nbsp &nbsp &nbsp &nbsp Precio</span></li>		
					<li><span>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp Cantidad Vendida</span></li>
					<li> </li>
					<div class="clearfix"> </div>
				</ul>
		<?php
		include ("Conexion2.php");
$ProdVer="select Nombre,Coste, count(*) as CANTIDAD from venta inner join usuario on venta.USUARIO_idUsuario=usuario.idUsuario 
 inner join productoventa_has_venta on venta.idVenta=Venta_idVenta inner join productoventa
 on productoventa_has_venta.ProductoVenta_idProductoVenta=productoventa.idProductoVenta group by Nombre,Coste order by count(*) desc limit 5;";
 $ResultadosV=mysqli_query($conect2,$ProdVer)  
or die("error al consultar los datos del usuario"); 	 //**Redondea el valor anterior
		while ($informacion=mysqli_fetch_array($ResultadosV))
		{
	
			$NombreP=$informacion['Nombre'];
			$Precio=$informacion['Coste'];
			$Cantidad=$informacion['CANTIDAD'];
			
		?>
				<ul class="cart-header">
					<div> </div>
		
						<li><span><?php echo $NombreP; ?></span></li>
						<li><span>$ <?php echo $Precio; ?>MX</span></li>
						<li><span><?php echo $Cantidad; ?></span></li>
					<div class="clearfix"> </div>
				</ul>
		<?php
        }
        ?>
			</div>
			</div>  
		 </div>
		</div>
	</div>
	<div class="ckeckout">
		<div class="container">
		<div class="ckeckout-top">
		<div class=" cart-items heading">
		<h3>Productos Más Vendidos en Verano</h3>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			<div class="in-check" >
				<ul class="unit">
					<li><span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Nombre Producto</span></li>
					<li><span>&nbsp &nbsp &nbsp &nbsp Precio</span></li>		
					<li><span>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp Cantidad Vendida</span></li>
					<li> </li>
					<div class="clearfix"> </div>
				</ul>
		<?php
		include ("Conexion2.php");

$ProdVer="select Nombre,Coste, count(*) as CANTIDAD from venta inner join usuario on venta.USUARIO_idUsuario=usuario.idUsuario 
 inner join productoventa_has_venta on venta.idVenta=Venta_idVenta inner join productoventa
 on productoventa_has_venta.ProductoVenta_idProductoVenta=productoventa.idProductoVenta 
 where Temporada='Verano'  group by Nombre,Coste order by count(*) desc limit 4;";
 $ResultadosV=mysqli_query($conect2,$ProdVer)  
or die("error al consultar los datos del usuario"); 	 //**Redondea el valor anterior
		while ($informacion=mysqli_fetch_array($ResultadosV))
		{
	
			$NombreP=$informacion['Nombre'];
			$Precio=$informacion['Coste'];
			$Cantidad=$informacion['CANTIDAD'];
			
		?>
				<ul class="cart-header">
					<div> </div>
		
						<li><span><?php echo $NombreP; ?></span></li>
						<li><span>$ <?php echo $Precio; ?>MX</span></li>
						<li><span><?php echo $Cantidad; ?></span></li>
					<div class="clearfix"> </div>
				</ul>
		<?php
        }
        ?>
			</div>
			</div>  
		 </div>
		</div>
	</div>

	<div class="ckeckout">
		<div class="container">
		<div class="ckeckout-top">
		<div class=" cart-items heading">
		<h3>Productos Más Vendidos en Otoño </h3>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			<div class="in-check" >
				<ul class="unit">
					<li><span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Nombre Producto</span></li>
					<li><span>&nbsp &nbsp &nbsp &nbsp Precio</span></li>		
					<li><span>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp Cantidad Vendida</span></li>
					<li> </li>
					<div class="clearfix"> </div>
				</ul>
		<?php
		
$ProdVer="select Nombre,Coste, count(*) as CANTIDAD from venta inner join usuario on 	venta.USUARIO_idUsuario=usuario.idUsuario 
 	inner join productoventa_has_venta on venta.idVenta=Venta_idVenta inner join productoventa
 	on productoventa_has_venta.ProductoVenta_idProductoVenta=productoventa.idProductoVenta 
 	where Temporada='Otono'  group by Nombre,Coste order by count(*) desc limit 4;";
 	$ResultadosV=mysqli_query($conect2,$ProdVer)  
	or die("error al consultar los datos del usuario"); 	 //**Redondea el valor anterior
		while ($informacion=mysqli_fetch_array($ResultadosV))
		{
	
			$NombreP=$informacion['Nombre'];
			$Precio=$informacion['Coste'];
			$Cantidad=$informacion['CANTIDAD'];
			
		?>
				<ul class="cart-header">
					<div> </div>
		
						<li><span><?php echo $NombreP; ?></span></li>
						<li><span>$ <?php echo $Precio; ?>MX</span></li>
						<li><span><?php echo $Cantidad; ?></span></li>
					<div class="clearfix"> </div>
				</ul>
		<?php
        }
        ?>
			</div>
			</div>  
		 </div>
		</div>
	</div>

	<div class="ckeckout">
		<div class="container">
		<div class="ckeckout-top">
		<div class=" cart-items heading">
		<h3>Productos Más Vendidos en Invierno</h3>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			<div class="in-check" >
				<ul class="unit">
					<li><span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Nombre Producto</span></li>
					<li><span>&nbsp &nbsp &nbsp &nbsp Precio</span></li>		
					<li><span>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp Cantidad Vendida</span></li>
					<li> </li>
					<div class="clearfix"> </div>
				</ul>
		<?php
		
$ProdVer="select Nombre,Coste, count(*) as CANTIDAD from venta inner join usuario on venta.USUARIO_idUsuario=usuario.idUsuario 
 	inner join productoventa_has_venta on venta.idVenta=Venta_idVenta inner join productoventa
 	on productoventa_has_venta.ProductoVenta_idProductoVenta=productoventa.idProductoVenta 
 	where Temporada='Invierno'  group by Nombre,Coste order by count(*) desc limit 4;";
 $ResultadosV=mysqli_query($conect2,$ProdVer)  
or die("error al consultar los datos del usuario"); 	 //**Redondea el valor anterior
		while ($informacion=mysqli_fetch_array($ResultadosV))
		{
	
			$NombreP=$informacion['Nombre'];
			$Precio=$informacion['Coste'];
			$Cantidad=$informacion['CANTIDAD'];
			
		?>
				<ul class="cart-header">
					<div> </div>
		
						<li><span><?php echo $NombreP; ?></span></li>
						<li><span>$ <?php echo $Precio; ?>MX</span></li>
						<li><span><?php echo $Cantidad; ?></span></li>
					<div class="clearfix"> </div>
				</ul>
		<?php
        }
        ?>
			</div>
			</div>  
		 </div>
		</div>
	</div>
	
	<div class="ckeckout">
		<div class="container">
		<div class="ckeckout-top">
		<div class=" cart-items heading">
		<h3>Productos Más Vendidos en Primavera</h3>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cart-header').fadeOut('slow', function(c){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			<div class="in-check" >
				<ul class="unit">
					<li><span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Nombre Producto</span></li>
					<li><span>&nbsp &nbsp &nbsp &nbsp Precio</span></li>		
					<li><span>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp Cantidad Vendida</span></li>
					<li> </li>
					<div class="clearfix"> </div>
				</ul>
		<?php
		include ("Conexion2.php");
$ProdVer="select Nombre,Coste, count(*) as CANTIDAD from venta inner join usuario on venta.USUARIO_idUsuario=usuario.idUsuario 
 inner join productoventa_has_venta on venta.idVenta=Venta_idVenta inner join productoventa
 on productoventa_has_venta.ProductoVenta_idProductoVenta=productoventa.idProductoVenta 
 where Temporada='Primavera'  group by Nombre,Coste order by count(*) desc limit 4;";
 $ResultadosV=mysqli_query($conect2,$ProdVer)  
or die("error al consultar los datos del usuario"); 	 //**Redondea el valor anterior
		while ($informacion=mysqli_fetch_array($ResultadosV))
		{
	
			$NombreP=$informacion['Nombre'];
			$Precio=$informacion['Coste'];
			$Cantidad=$informacion['CANTIDAD'];
			
		?>
				<ul class="cart-header">
					<div> </div>
		
						<li><span><?php echo $NombreP; ?></span></li>
						<li><span>$ <?php echo $Precio; ?>MX</span></li>
						<li><span><?php echo $Cantidad; ?></span></li>
					<div class="clearfix"> </div>
				</ul>
		<?php
        }
        ?>
			</div>
			</div>  
		 </div>
		</div>
	</div>
	<!--end-ckeckout-->
	<div class="footer-text">
		<div class="container">
			<div class="footer-main">
				<p class="footer-class">DICAM Construyendo tu estilo <a target="_blank">@2019</a> </p>
			</div>
		</div>
		<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
		
		
		
		
	</body> 
	
</html>

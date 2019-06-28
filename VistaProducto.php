
<?php
include("lib_carrito.php");
?>
<?php

$idProducto=$_GET["id"];
include ("Conexion.php");
$consultaDP="select * from producto where idProducto=$idProducto";
		$resultadoconsultaDP=mysqli_query($conect,$consultaDP) or die("error al consultar los datos
		del producto");
		while ($informacion=mysqli_fetch_array($resultadoconsultaDP))
		{
			$idTalla=$informacion['TALLA_idTalla'];
			$idColor=$informacion['COLOR_idColor'];
			$NombreP=$informacion['Nombre_Product'];
			$Descripcion=$informacion['Descripcion_Product'];
			$Precio=$informacion['Precio'];
			$Imagen=$informacion['Imagen'];
		}
$idColor=$_GET["Color"];
$idTalla=$_GET["Talla"];

?>
<!DOCTYPE html>
<html>
<head>
<title>DICAM</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
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
<!-- start menu -->
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
			header('Location:VistaProducto.php?pagina=1');
		}
		  $hombre=$_REQUEST['cate'];
	   $mujer=$_REQUEST['cate'];
	   $nino=$_REQUEST['cate'];
	
	?> 
	<body> 
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
<!--top-header-->
	<!--bottom-header-->
	<!--Barra Menú-->
	<div class="header-bottom">
		<div class="container">
			<div class="top-nav">
				<ul class="memenu skyblue"><li class="active"><a href="IndexCliente.php">Inicio</a></li>
					
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
					<li><a>Mi Usuario es: <?php echo $_SESSION["Correo"]; ?>  </a></li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--start-single-->
	<div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-9 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="images/s4.jpg">
<!-- imagen que reciba -->		<img src="/web/images/<?php echo $Imagen; ?>" />
								</li>
							</ul>
						</div>
<!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

	<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
				</div>
			
				<div class="col-md-7 single-top-right">
					<div class="details-left-info simpleCart_shelfItem">
						<h3><?php echo $NombreP; ?></h3> <!--Nombre del articulo-->
						<p class="availability">En existencia<span class="color"> Entrega de 5 a 15 días hábiles</span></p>
						<div class="price_single">
						<a >Precio del producto: </a><span class="actual item_price">$<?php echo $Precio; ?></span> 
						</div>

						<h2 class="quick">Descripción del producto:</h2>
						<p class="quick_desc"><?php echo $Descripcion; ?></p> <!--aqui la descripción -->
						<ul class="product-colors">
							<h3>Elige tu  Color ::</h3>
							<li><a class="color1"  href="VistaProducto.php?id=<?php echo $idProducto;?>&Color=1&Talla=<?php echo $idTalla ?>" ><span> </span></a></li> 
							<li><a class="color2" href="VistaProducto.php?id=<?php echo $idProducto;?>&Color=2&Talla=<?php echo $idTalla ?>"><span> </span></a></li>
							<li><a class="color3" href="VistaProducto.php?id=<?php echo $idProducto;?>&Color=3&Talla=<?php echo $idTalla ?>"><span> </span></a></li>
							<li><a class="color4" href="VistaProducto.php?id=<?php echo $idProducto;?>&Color=4&Talla=<?php echo $idTalla ?>"><span> </span></a></li>
							<li><a class="color5" href="VistaProducto.php?id=<?php echo $idProducto;?>&Color=5&Talla=<?php echo $idTalla ?>"><span> </span></a></li>
							<li><a class="color6" href="VistaProducto.php?id=<?php echo $idProducto;?>&Color=6&Talla=<?php echo $idTalla ?>"><span> </span></a></li>
							<li><a class="color7" href="VistaProducto.php?id=<?php echo $idProducto;?>&Color=7&Talla=<?php echo $idTalla ?>"><span> </span></a></li>
							<li><a class="color8" href="VistaProducto.php?id=<?php echo $idProducto;?>&Color=8&Talla=<?php echo $idTalla ?>"><span> </span></a></li>
							<li><a class="color9" href="VistaProducto.php?id=<?php echo $idProducto;?>&Color=9&Talla=<?php echo $idTalla ?>"><span> </span></a></li>
							<li><a class="color10" href="VistaProducto.php?id=<?php echo $idProducto;?>&Color=10&Talla=<?php echo $idTalla ?>"><span> </span></a></li>
							<div class="clear"> </div>
						</ul>
						<ul class="size">
				
							<h3>Escoge tu talla</h3>
							<li><a href="VistaProducto.php?id=<?php echo $idProducto;?>&Talla=2&Color=<?php echo $idColor?>">Chica</a></li>
							<li><a href="VistaProducto.php?id=<?php echo $idProducto;?>&Talla=3&Color=<?php echo $idColor?>">Mediana</a></li>
							<li><a href="VistaProducto.php?id=<?php echo $idProducto;?>&Talla=4&Color=<?php echo $idColor?>">Grande</a></li>
						</ul>
						<div class="quantity_box">
							<ul class="product-qty">
				<form method="POST" action="mete_producto.php">	
								<span>Cantidad de productos:</span>
								<select name="Cantidad" id="Cantidad">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
								</select>
									</ul>		
						</div>
					
					<script type="text/javascript">
						$('#Cantidad').change(function(){
							var CantidadProduc=$(this).val();
							document.getElementById('resultadoCantidad').innerHTML=CantidadProduc;
							
						});

					</script>

							<?php
				$consultaC="select * from Color where idColor =$idColor";
		$resultadoconsultaC=mysqli_query($conect,$consultaC) or die("error al consultar los colores
		del producto");
		while ($informacionColor=mysqli_fetch_array($resultadoconsultaC))
		{
			$ColorObt=$informacionColor['Color'];
		}
$consultaT="select * from Talla where idTalla =$idTalla";
		$resultadoconsultaT=mysqli_query($conect,$consultaT) or die("error al consultar los colores
		del producto");
		while ($informacionColor=mysqli_fetch_array($resultadoconsultaT))
		{
			$TallaObt=$informacionColor['Talla'];
		}
				?>

					<div class="clearfix"> </div>
<input type="text" name="id" hidden="hidden" value="<?php echo $idProducto; ?>">
<input type="text" name="nombre" hidden="hidden" value="<p> Nombre:<?php echo $NombreP;?> <p> Color:<?php echo $ColorObt; ?> <p> Talla:<?php echo $TallaObt ?>">
<input type="text" name="precio" hidden="hidden" value="<?php echo $Precio;?>">
<div class="single-but item_add">
<input type="submit" name="Enviar" value="AGREGAR" onclick="return confirm ('Agregado al Carrito');">
</div>
					</form>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
					<div class="latest products">
						<div class="product-one">
							<div class="col-md-4 product-left single-left"> 
							</div>
							<div class="clearfix"> </div>
						</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
				<div class="col-md-3 single-right">
				
			
					<h3>Tu Talla y Colores son:</h3>
					<ul class="product-categories">
						<li><a></a>Tu color es: <?php echo $ColorObt; ?> <span class="count"></span></li>
						<li><a>Tu talla es: <?php echo $TallaObt; ?> </a> <span class="count"></span></li>
						<li><a>Piezas Seleccionadas:<a id="resultadoCantidad" name="resultadoCantidad">1</a> </a> <span class="count"></span></li>
					</ul>
					<h3>Categorias</h3>
					<ul class="product-categories">
						<li><a></a> Hombres <span class="count"></span></li>
						<li><a>Mujeres</a> <span class="count"></span></li>
						<li><a>Niños</a> <span class="count"></span></li>
					</ul>
					<h3>Tallas</h3>
					<ul class="product-categories">
						<li><a>Chica</a> <span class="count"></span></li>
						<li><a>Mediana</a> <span class="count"></span></li>
						<li><a>Grande</a> <span class="count"></span></li>
					</ul>
					<h3>Rango de precios</h3>
					<ul class="product-categories p1">
						<li><a href="#">150$-200$</a> <span class="count">envió no incluido</span></li>
						<li><a href="#">200$-250$</a> <span class="count">envió no incluido</span></li>
						<li><a href="#">250$-300$</a> <span class="count">envió no incluido</span></li>
						<li><a href="#">300$-350$</a> <span class="count">envió no incluido</span></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-single-->
	<!--end-footer-text-->
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

<?php
include("lib_carrito.php");
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
			header('Location:IndexAdministrador.php?pagina=1');
		}	
	?>
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
		<!--banner-starts-->
	<div class="bnr" id="home">
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4">
			    <li>
					<div class="banner-1"></div>
				</li>
				<li>
					<div class="banner-2"></div>
				</li>
				<li>
					<div class="banner-3"></div>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--banner-ends--> 
	<!--\\Slider-Starts-Here-->
				<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: false,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!--End-slider-script-->
	<!--bottom-header-->
	<!--start-ckeckout-->
	<div class="ckeckout">
		<div class="container">
		<div class="ckeckout-top">
		<div class=" cart-items heading">
		<h3>Productos</h3>
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
					<li><span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ITEM</span></li>
					<li><span>&nbsp &nbsp &nbsp &nbsp Nombre Producto</span></li>		
					<li><span>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp Precio</span></li>
					<li><span> &nbsp &nbsp  &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp Status</span></li>
					<li><span> &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp Editar</span></li>
					<li> </li>
					<div class="clearfix"> </div>
				</ul>
		<?php
		include ("Conexion.php");
		$total_x_pagina = 3;  //**Numero de articulos por pagina 
		$iniciar=($_GET['pagina']-1)*$total_x_pagina;  //**Se usa en la consulta para determinar desde el articulo que se va a mostrar	
        $datosAb=$_POST['Pr'];
        if ($datosAb=="") {
        $sqlContar="select count(idProducto) total from producto"; //**Cuenta el total de articulos en la base de datos 
		$ConsultaP="Select * from producto INNER JOIN statusproducto ON STATUSPRODUCTO_idStatusProducto =idStatusProducto order by idProducto DESC limit $iniciar,$total_x_pagina";
		$resultadoconsultaP=mysqli_query($conect,$ConsultaP) or die("error al consultar los datos
		del producto");
		}
		elseif ($datosAb!="") {	
		$sqlContar="select count(idProducto) total from producto where Nombre_Product like '%$datosAb%' "; //**Cuenta el total de articulos en la base de datos 	
			$ConsultaP="Select * from producto INNER JOIN statusproducto ON STATUSPRODUCTO_idStatusProducto =idStatusProducto where Nombre_Product like '%$datosAb%' order by idProducto DESC limit $total_x_pagina";	
		$resultadoconsultaP=mysqli_query($conect,$ConsultaP) or die("error al consultar los datos
		del producto");
		}
		$resultado=mysqli_query($conect,$sqlContar) or die ("error al conectar"); 
		$fila = mysqli_fetch_assoc($resultado); //**Se obtiene el campo del total de la consulta donde se contaron los articulos
		$pagina = $fila ['total']/$total_x_pagina; //**Se obtiene el total de paginas que apareceran
		$pagina = ceil($pagina); //**Redondea el valor anterior
		while ($informacion=mysqli_fetch_array($resultadoconsultaP))
		{
			$idProducto=$informacion['idProducto'];
			$NombreP=$informacion['Nombre_Product'];
			$Precio=$informacion['Precio'];
			$Imagen=$informacion['Imagen'];
			$Status=$informacion['Status'];
			if ($Status==1) {
				$StatusProd="Activado";
			}
			elseif ($Status==0) {
				$StatusProd="Desactivado";
			}
		?>
				<ul class="cart-header">
					<div> </div>
		
						<li class="ring-in"><a><img src="/web/images/<?php echo $Imagen; ?>" class="img-responsive" alt=""></a>
						</li>
						<li><span><?php echo $NombreP; ?></span></li>
						<li><span>$ <?php echo $Precio; ?>MX</span></li>
						<li><span><?php echo $StatusProd; ?></span></li>
						<li><span><button  onclick="location.href='editarProductosAdministrador.php?id=<?php echo $idProducto; ?>'">Modificar</button></span></li>
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
<!-- **Inicio de la paginacion-->
		<div align= "center">
			<ul class="pagination">
				<li class="<?php echo $_GET['pagina']<=1 ? 'disabled':''?>"><a href="IndexAdministrador.php?pagina=<?php echo $_GET['pagina']-1?>">Anterior</a></li>
				<?php
				for ($i=0; $i<$pagina; $i++)
				{
				?>
					<li class="<?php echo $_GET['pagina']==$i+1 ? 'active' : ''?>"><a href="IndexAdministrador.php?pagina=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
				<?php
				}
				?>
				<li class="<?php echo $_GET['pagina']>= $pagina ? 'disabled':'' ?>"><a href="IndexAdministrador.php?pagina=<?php echo $_GET['pagina']+1?>">Siguiente</a></li>
			</ul>
		</div>
		<!-- **Fin de la paginacion-->
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
	<!--end-footer-text-->	
</body>
</html>
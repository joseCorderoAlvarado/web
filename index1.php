<?php 
include ("Conexion.php");
include ("Conexion2.php");
 ?>
<!DOCTYPE html>
<html>
<!--Encabezado-->
<!-------------------------------------------------------------------------------------------------------------------------------->
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
<!--------------------------------------------------------------------------------------------------------------------------->


<body> 
<!---------------------------------------------------------------------------------------------------------------------------->
	<?php	
	error_reporting(E_ALL^E_NOTICE);
		if(!$_GET)
		{
			header('Location:index1.php?pagina=1'); //indicamos el inicio de la pagina mediante el método get 
		}
	   $hombre=$_REQUEST['cate'];
	   $mujer=$_REQUEST['cate'];
	   $nino=$_REQUEST['cate'];
	?>
<!-- ------------------------------------------------------------------------------------------------------------------------->


	<!--inicio de la cabecera de la pagina ------------------------------------------------------------------------------------->

	<div class="top-header">
	<div class="container">
		<div class="top-header-main">
<!--Barra de búsqueda--> <!----------------------------------------------------------------------------------------------------->
			<div class="col-md-4 top-header-left">
				<div class="search-bar">
				<form name ="formulario" method="POST">
					<input type="text" name="Pr" id="Pr" onfocus="this.value = '';" onkeyup="validar();" onblur="if (this.value == '') {this.value = '';}">
					<input type="submit" value="" name="buscar" id="buscar" disabled="disabled"/>
				</form>
				</div>
				</div>
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
<!-- ------------------------------------------------------------------------------------------------------------------------->
			
<!-- logo de la empresa ------------------------------------------------------------------------------------------------------->			
			<div class="col-md-4 top-header-middle">
			
				<a href="index1.php"><img src="images/logo-4.png" alt="" /></a>
			</div>
<!-- ------------------------------------------------------------------------------------------------------------------------->
			<!--Carrito de compras-->
			<div class="col-md-4 top-header-right">
				<form method="POST">
				<div style="float: right;">
					¿De dónde nos vistas?<select name="estado" id="estado">
					
                   <?php
					$ConsultaEstados="select * from estado";
					$ResultadoEstados=mysqli_query($conect2,$ConsultaEstados) or die ("error al consultar");
					while ($ValoresMetodos=mysqli_fetch_array($ResultadoEstados)) {
					echo "<option value='".$ValoresMetodos["idEstado"]."'";
					echo ">".$ValoresMetodos["NombreEstado"]."</option>";
					}


					 ?>

				</select>
				<input type="submit" name="" value="Ver" style="background:#8c2830;color:#fff;font-size:12px;font-weight:400;padding:6px 12px; border: none">
				</div>
			</form>

				<div class="cart box_1">
						<a href="index1.php" onclick="return confirm('Porfavor Iniciar sesión');">
						<h3> <div class="total">
							<span></span> (Productos)</div>
							<!--imagen del carrito  -->
							<img src="images/cart-1.png" alt="" />
						</a>
						<p><a href="index1.php" onclick="return confirm('Porfavor Iniciar sesión');">Mi carrito</a></p>
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
				<ul class="memenu skyblue"><li class="active"><a href="index1.php">Inicio</a></li>
					<li class="grid"><a>Categor&iacute;as</a>
						<div class="mepanel" >
							<div class="row">
								<div class="col1 me-one">
									<ul>
										<li><a href="index1.php?cate=hombre&pagina=1">Hombres</a></li>
										<li><a href="index1.php?cate=mujer&pagina=1">Mujeres</a></li>
										<li><a href="index1.php?cate=nino&pagina=1">Ni&ntilde;os</a></li>
										
									</ul>
								</div>
								
							</div>
						</div>
					</li> 
			
					<li class="grid"><a href="AltaUsuario.php">Registrarse</a>
					</li> 
					
					<li class="grid"><a href="IniciarSesion.php">Iniciar Sesi&oacute;n</a>
					</li> 
					
					<li class="grid"><a href="ayuda1.php">Ayuda</a>
					</li>
				</ul>
			</div> 
			<div class="clearfix"> </div>
		</div>
	</div> 
	<!---->
	<!--bottom-header--> <!--Banner-->
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
		<div class="clearfix"> 
			<br>
			<center>
			<label style="background:#8c2830;
	color:#fff;
	font-size:36px;
	font-weight:400;
	padding:6px 12px; width: 100%; ">Productos en tendencia</label></center>
<?php 
 //$MesSistema="04";
$MesSistema=date("m");
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

			$estado=$_POST['estado'];
			if($estado=="")
			{
				$estado=1;
			}
$ConsultaTendencia="select NombreTendencia, count(*) as Cantidad  from estado inner join estado_has_tendencia on Estado_idEstado=idEstado inner join tendencia on Tendencia_idTendencia=idTendencia where idEstado=$estado and Temporada='$TemporadaSistema' group by NombreTendencia order by count(*) desc limit 1";
$resultadoTendencia=mysqli_query($conect2,$ConsultaTendencia) or die("error al consultar la mayor tendencia");
while ($InformacionT=mysqli_fetch_array($resultadoTendencia))
		{ 
          $TendenciaMayor=$InformacionT['NombreTendencia']; 
		}
		 ///cerramos conexion del dwdicam;
/*Inclumos la segunda conexion a la base de datos de dicam y obtenemos los datos que tengan coincidencias a la tendencia*/
include("Conexion.php");
//$ConsultaProductos="select * from producto where Nombre_Product AGAINST('$TendenciaMayor')"; cosa interesante algun dia investigar 
$ConsultaProductos="select * from producto INNER JOIN categoria ON CATEGORIA_idCategoria=idCategoria INNER JOIN color ON COLOR_idColor=idColor INNER JOIN statusproducto ON STATUSPRODUCTO_idStatusProducto =idStatusProducto INNER JOIN talla ON TALLA_idTalla=idTalla where Nombre_Product like '%$TendenciaMayor%' limit 4";

//poner un limit de 4 y ordernarlos para que salgan los mas nuevos o hacer un carrusel con todas las recomendacion ademas que la tendencia tambien se busque en la descripcion del articulo;
$resultadoProductos=mysqli_query($conect,$ConsultaProductos) or die("error al consultar la lista de productos");
while ($info=mysqli_fetch_array($resultadoProductos)) {
			$NombreP=$info['Nombre_Product'];
			$Color=$info['Color'];
			$Talla=$info['Talla'];
			$Descripcion=$info['Descripcion_Product'];
			$Precio=$info['Precio'];
			$Imagen=$info['Imagen'];
			$Categoria=$info['Descripcion_Cate'];
			?>

		
			<div id="P">
	<div class="p-one simpleCart_shelfItem">							
							<a href="index1.php">
							<ul><li><img src="/web/images/<?php echo $Imagen; ?>"></center></ul>
								<div class="mask">
									<span onclick="return confirm('Porfavor Iniciar sesión');">Vista R&aacute;pida</span>
								</div>
							</a>
						<h4><?php echo $NombreP; ?></h4>
						<p><a  href="#" onclick="return confirm('Porfavor Iniciar sesión');"><i></i> <span class=" item_price">$<?php echo $Precio; ?> MX</span></a></p>
					</div>
	</div>
		
<?php 
}
 ?>



		</div>
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
	<!--start-Vista_Playeras--> 
<center>
			<label style="background:#8c2830;
	color:#fff;
	font-size:36px;
	font-weight:400;
	padding:6px 12px; width: 100%; ">Nuestros Productos</label></center>

	<?php
include ("Conexion.php");
$total_x_pagina = 12;  //**Numero de articulos por pagina 
$iniciar=($_GET['pagina']-1)*$total_x_pagina;  //**Se usa en la consulta para determinar desde el articulo que se va a mostrar
$datosAb=$_POST['Pr'];
if ($datosAb==$_POST['Pr']) {
        if ($datosAb=="") {
        $sqlContar="select count(idProducto) total from producto"; //**Cuenta el total de articulos en la base de datos 
		$consultaDP="select * from producto  INNER JOIN categoria ON CATEGORIA_idCategoria=idCategoria	INNER JOIN color ON COLOR_idColor=idColor INNER JOIN statusproducto ON STATUSPRODUCTO_idStatusProducto =idStatusProducto INNER JOIN talla ON  TALLA_idTalla=idTalla where Status=1 order by idProducto DESC limit $iniciar,$total_x_pagina";
		$resultadoconsultaDP=mysqli_query($conect,$consultaDP) or die("error al consultar los datos
		de los  Productos");
		}
		elseif ($datosAb!="") {	
		$sqlContar="select count(idProducto) total from producto where Nombre_Product like '%$datosAb%' "; //**Cuenta el total de articulos en la base de datos 	
			$consultaDP="select * from producto  INNER JOIN categoria ON CATEGORIA_idCategoria=idCategoria	INNER JOIN color ON COLOR_idColor=idColor INNER JOIN statusproducto ON STATUSPRODUCTO_idStatusProducto =idStatusProducto INNER JOIN talla ON  TALLA_idTalla=idTalla where Status=1 and Nombre_Product like '%$datosAb%' order by idProducto DESC limit $total_x_pagina";
		$resultadoconsultaDP=mysqli_query($conect,$consultaDP) or die("error al consultar los datos
		de los  Productos");
		}
	}{
		if ($hombre=="hombre"){
		$sqlContar="select count(idProducto) total from producto where CATEGORIA_idCategoria='1'";	
			$consultaDP="select * from producto INNER JOIN categoria ON CATEGORIA_idCategoria=idCategoria INNER JOIN color ON COLOR_idColor=idColor INNER JOIN statusproducto ON STATUSPRODUCTO_idStatusProducto =idStatusProducto INNER JOIN talla ON TALLA_idTalla=idTalla where idCategoria='1' order by idProducto DESC limit $total_x_pagina";
		$resultadoconsultaDP=mysqli_query($conect,$consultaDP) or die("error al consultar los datos
		de los  Productos");
		}elseif ($mujer=="mujer"){
		$sqlContar="select count(idProducto) total from producto where CATEGORIA_idCategoria='2'";	
			$consultaDP="select * from producto INNER JOIN categoria ON CATEGORIA_idCategoria=idCategoria INNER JOIN color ON COLOR_idColor=idColor INNER JOIN statusproducto ON STATUSPRODUCTO_idStatusProducto =idStatusProducto INNER JOIN talla ON TALLA_idTalla=idTalla where idCategoria='2' order by idProducto DESC limit $total_x_pagina";
		$resultadoconsultaDP=mysqli_query($conect,$consultaDP) or die("error al consultar los datos
		de los  Productos");
		}elseif ($nino=="nino"){
		$sqlContar="select count(idProducto) total from producto where CATEGORIA_idCategoria='3'";	
			$consultaDP="select * from producto INNER JOIN categoria ON CATEGORIA_idCategoria=idCategoria INNER JOIN color ON COLOR_idColor=idColor INNER JOIN statusproducto ON STATUSPRODUCTO_idStatusProducto =idStatusProducto INNER JOIN talla ON TALLA_idTalla=idTalla where idCategoria='3' order by idProducto DESC limit $total_x_pagina";
		$resultadoconsultaDP=mysqli_query($conect,$consultaDP) or die("error al consultar los datos
		de los  Productos");
		}	
		}
		$resultado=mysqli_query($conect,$sqlContar) or die ("error al conectar"); 
		$fila = mysqli_fetch_assoc($resultado); //**Se obtiene el campo del total de la consulta donde se contaron los articulos
		$pagina = $fila ['total']/$total_x_pagina; //**Se obtiene el total de paginas que apareceran
		$pagina = ceil($pagina); //**Redondea el valor anterior
		while ($informacion=mysqli_fetch_array($resultadoconsultaDP))
		{
			$NombreP=$informacion['Nombre_Product'];
			$Color=$informacion['Color'];
			$Talla=$informacion['Talla'];
			$Descripcion=$informacion['Descripcion_Product'];
			$Precio=$informacion['Precio'];
			$Imagen=$informacion['Imagen'];
			$Categoria=$informacion['Descripcion_Cate'];
	?>
	<div id="P">
	<div class="p-one simpleCart_shelfItem">							
							<a href="index1.php">
							<ul><li><img src="/web/images/<?php echo $Imagen; ?>"></center></ul>
								<div class="mask">
									<span onclick="return confirm('Porfavor Iniciar sesión');">Vista R&aacute;pida</span>
								</div>
							</a>
						<h4><?php echo $NombreP; ?></h4>
						<p><a  href="#" onclick="return confirm('Porfavor Iniciar sesión');"><i></i> <span class=" item_price">$<?php echo $Precio; ?> MX</span></a></p>
					</div>
	</div>
<?php
}
?>	
</li>
</ul>
<!-- **Inicio de la paginacion-->
		<div align= "center">
			<ul class="pagination">
				<li class="<?php echo $_GET['pagina']<=1 ? 'disabled':''?>"><a href="index1.php?pagina=<?php echo $_GET['pagina']-1?>">Anterior</a></li>
				<?php
				for ($i=0; $i<$pagina; $i++)
				{
				?>
					<li class="<?php echo $_GET['pagina']==$i+1 ? 'active' : ''?>"><a href="index1.php?pagina=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
				<?php
				}
				?>
				<li class="<?php echo $_GET['pagina']>= $pagina ? 'disabled':'' ?>"><a href="index1.php?pagina=<?php echo $_GET['pagina']+1?>">Siguiente</a></li>
			</ul>
		</div>
		<!-- **Fin de la paginacion-->

	<!--Fin_Vista_Playeras-->
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
	<!--end-footer-text-->

</body>
</html>
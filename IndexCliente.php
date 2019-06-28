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
	<!--top-header-->	<!--Busqueda, logo, Carrito-->
	<!-- **Inicio de validar si la pagina esta activa-->
	<?php 
	error_reporting(E_ALL^E_NOTICE);
		if(!$_GET)
		{
			header('Location:IndexCliente.php?pagina=1');
		}
		  $hombre=$_REQUEST['cate'];
	   $mujer=$_REQUEST['cate'];
	   $nino=$_REQUEST['cate'];
	
	?>
	<!-- **Fin de validar si la pagina esta activa-->
	
	<div class="top-header">
	<div class="container">
		<div class="top-header-main">
			<div class="col-md-4 top-header-left">
			<!--Barra de búsqueda-->
				<div class="search-bar">
				<form method="POST">
					<input type="text" name="Pr" id="Pr"  onfocus="this.value = '';" onkeyup="validar();" onblur="if (this.value == '') {this.value = '';}">
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
				<a href="IndexCliente.php"><img src="images/logo-4.png" alt="" /></a>
			</div>
			<!--Carrito de compras-->
			<div class="col-md-4 top-header-right">
				<div class="cart box_1">
						<a >
						<h3> <div class="total">
							<span></span><?php $_SESSION["ocarrito"]->enviar_total();?></div>
							<!--imagen del carrito  -->
							<img src="images/cart-1.png" alt="" />
						</a>
						<p><a href="ver_carrito.php">Mi carrito</a></p>
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
		</div>



	<!--MinRIa-->
		<div class="clearfix"> 
<center>
			<label style="background:#8c2830;
	color:#fff;
	font-size:36px;
	font-weight:400;
	padding:6px 12px; width: 100%; ">Productos más vendidos</label></center>
<?php


include ("Conexion.php");
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
$CorreoSesion=$_SESSION['Correo'];
$ConsultaEUsuario="select * from usuario inner join persona on usuario.PERSONA_idPersona=persona.idPersona inner join persona_has_domicilio on persona_has_domicilio.PERSONA_idPersona=persona.idPersona inner join domicilio on
    domicilio.idDomicilio= persona_has_domicilio.DOMICILIO_idDomicilio inner join entidades 
 on entidades.idEntidades=domicilio.ENTIDADES_idEntidades where CorreoElectronico='$CorreoSesion'"; //el correo debe ser el de la sesion
 	$ResEU = mysqli_query ($conect, $ConsultaEUsuario); 
 while ($infoResEU = mysqli_fetch_array($ResEU))
		{
		$EstadoUsuario= $infoResEU['Estado']; //guardamos el estado del usuario conectado a la sesion 
		}
include("Conexion2.php");// conexion del dw
$ConsultaidEU="select idEstado from estado  where NombreEstado='$EstadoUsuario'";
$ResidEU = mysqli_query ($conect2, $ConsultaidEU);  //cadena de conexion del dw
while ($infoResidEU= mysqli_fetch_array($ResidEU))
		{
		$idEstadoUsuario= $infoResidEU['idEstado']; //
		}

$consultaventamayor="select Nombre,Coste, count(*) as CANTIDAD from venta inner join usuario on venta.USUARIO_idUsuario=usuario.idUsuario  inner join productoventa_has_venta on venta.idVenta=Venta_idVenta inner join productoventa  on productoventa_has_venta.ProductoVenta_idProductoVenta=productoventa.idProductoVenta where EstadoUsuario_idEstadoUsuario=$idEstadoUsuario and  Temporada='$TemporadaSistema' group by Nombre,Coste order by count(*) desc limit 4";

	$ResVM = mysqli_query ($conect2, $consultaventamayor) or die("Valio"); /// cadena de conexion del dw
while ($infoResVM= mysqli_fetch_array($ResVM))
		{
		$NombrePM= $infoResVM['Nombre'];
		//echo "$NombrePM";
		$CostePM=$infoResVM['Coste'];
		//echo "$CostePM"; 
        $ConsultaCP="select * from producto where Nombre_Product like '%$NombrePM%'";

        $ResCP= mysqli_query($conect,$ConsultaCP);
        while ($infoResCP= mysqli_fetch_array($ResCP)) {
        $idProductoCP=$infoResCP['idProducto'];
        $NombreCP=$infoResCP['Nombre_Product'];
        $PrecioCP=$infoResCP['Precio'];
        $ImagenCP=$infoResCP['Imagen'];
}

 ?>

<div id="P">
	<div class="p-one simpleCart_shelfItem">							
							<a href="VistaProducto.php?id=<?php echo $idProductoCP;?>&Color=1&Talla=1">
							<ul><li><img src="/web/images/<?php echo $ImagenCP; ?>"></center></li></ul>
								<div class="mask">
									<span>Vista R&aacute;pida</span>
								</div>
							</a>
						<h4><?php echo $NombreCP; ?></h4>
						<p><a  href="#"><i></i> <span class=" item_price">$<?php echo $PrecioCP; ?> MX</span></a></p>
					</div>
	</div>
		
<?php } ?>


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
			  <center>
			<label style="background:#8c2830;
	color:#fff;
	font-size:36px;
	font-weight:400;
	padding:6px 12px; width: 100%; ">Nuestros Productos</label></center>
			<!--End-slider-script-->
	<!--start-Vista_Playeras--> 
	<div class="clearfix"> 
<?php
	
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
			$idProducto=$informacion['idProducto'];
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
							<a href="VistaProducto.php?id=<?php echo $idProducto;?>&Color=1&Talla=1">
							<ul><li><img src="/web/images/<?php echo $Imagen; ?>"></center></li></ul>
								<div class="mask">
									<span>Vista R&aacute;pida</span>
								</div>
							</a>
						<h4><?php echo $NombreP; ?></h4>
						<p><a  href="#"><i></i> <span class=" item_price">$<?php echo $Precio; ?> MX</span></a></p>
					</div>
	</div>
<?php
}
?>	


<!-- **Inicio de la paginacion-->
		<div align= "center">
			<ul class="pagination">
				<li class="<?php echo $_GET['pagina']<=1 ? 'disabled':''?>"><a href="IndexCliente.php?pagina=<?php echo $_GET['pagina']-1?>">Anterior</a></li>
				<?php
				for ($i=0; $i<$pagina; $i++)
				{
				?>
					<li class="<?php echo $_GET['pagina']==$i+1 ? 'active' : ''?>"><a href="IndexCliente.php?pagina=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
				<?php
				}
				?>
				<li class="<?php echo $_GET['pagina']>= $pagina ? 'disabled':'' ?>"><a href="IndexCliente.php?pagina=<?php echo $_GET['pagina']+1?>">Siguiente</a></li>
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
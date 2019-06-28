
<?php
if (isset($_POST['Ingreso']) && ! empty($_POST['Ingreso'])){
	$Correo=$_POST["correo"];
	$contrasena=$_POST["contrasena"];

$cadena="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!#%&'()*+,-./@?[\]^_`{|}~abcdefghijklmnopqrstuvwxyz:;<=>";//cadena de caracteres
$ArrayBase = str_split($cadena);//convertimos en arreglo la cadena de caracteres
include("Conexion.php");
$ConsultaContrasena="Select Contrasena from USUARIO where CorreoElectronico='$Correo'";
$ResultadoConsulta1=mysqli_query($conect,$ConsultaContrasena)  
or die("error al consultar los datos del usuario"); 
$ContrasenaC=mysqli_fetch_array($ResultadoConsulta1);
$ContrasenaCifrada=$ContrasenaC['Contrasena'];
$vectorcontrasena=str_split($ContrasenaCifrada);

//aqui falta consultar en la base de datos y guardarla en una variable distinta de $vectorcontrasena////////////////////////////
$ValorKeyPublic=end($vectorcontrasena);//consultamos el ultimo dato del arreglo de la contrasena cifrada
$ConsultaVector="Select Vector from Claves where Clave_Privada='$ValorKeyPublic'"; ///consultamos el arreglo  especifico de esa configuracion.
$ArrayPrivado=mysqli_query($conect,$ConsultaVector) or die("error al consultar los datos
//del vector");//ejecutamos en un nuevo query
$ArrayKeyPrivado=mysqli_fetch_array($ArrayPrivado);//consultamos las columnas que nos arrojo la consulta
$VectorEspecifico=$ArrayKeyPrivado['Vector'];//el valor del vector especifico lo guardamos en una variable
$ArrayEspecifico=explode(",",$VectorEspecifico);//creamos un arreglo con los valores del campo vector
$LongitudArray=count($vectorcontrasena); //calculamos la longitud de la contrasena cifrada

for ($i=0; $i <$LongitudArray-1 ; $i++) { //mediante este ciclo for buscamos en el arreglo e/specifico es que posicion se encuentran los valores del arreglo de la contrasena cifrada y asignamos al valor de arreglo cifrada el campo del arreglo base con respecto a la busqueda en el arreglo especifico.
    $BusquedaArray=array_search($vectorcontrasena[$i],$ArrayEspecifico);
  $vectorcontrasena[$i]=$ArrayBase[$BusquedaArray];
}
array_pop($vectorcontrasena);
$contrasenadesifrada=implode($vectorcontrasena);
$ConsultaUsuario="Select * from USUARIO where CorreoElectronico='$Correo'";
$ResultadoConsulta=mysqli_query($conect,$ConsultaUsuario)  
or die("error al consultar los datos del usuario"); 
$datos=mysqli_fetch_array($ResultadoConsulta);
$Rol=$datos["ROL_idRol"];
if($datos["CorreoElectronico"]==$Correo && $contrasena==$contrasenadesifrada && $Rol==1){
	session_start();
header("Location:IndexAdministrador.php");
$_SESSION['Correo']=$datos['CorreoElectronico'];
$_SESSION['contrasena']=$fila['contrasena'];	
}
elseif($datos["CorreoElectronico"]==$Correo && $contrasena==$contrasenadesifrada && $Rol==2){
	session_start();
header("Location:IndexEditor.php");
$_SESSION['Correo']=$datos['CorreoElectronico'];
$_SESSION['contrasena']=$fila['contrasena'];	
}
elseif($datos["CorreoElectronico"]==$Correo && $contrasena==$contrasenadesifrada && $Rol==3){
	session_start();
header("Location:IndexCliente.php");
$_SESSION['Correo']=$datos['CorreoElectronico'];
$_SESSION['contrasena']=$fila['contrasena'];	
}
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
			header('Location:IniciarSesion.php?pagina=1'); //indicamos el inicio de la pagina mediante el método get 
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
				<a href="index1.php"><img src="images/logo-4.png" alt="" /></a>
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
	<!--start-contact-->
	<div class="contact">
		<div class="container">
			<div class="contact-top heading"> 
				<h3>Iniciar Sesión</h3>
			</div>
			<div class="contact-bottom"> 
				<div class="col-md-6 contact-left"> 
				<form method='POST'> 
			
					<input type="text" placeholder="Correo Electrónico" required="" id="correo" name="correo" required pattern="[A-Za-z0-9@.]+">
					<input type="password" placeholder="Contraseña" required="" id="contrasena" name="contrasena" required minlength="8" maxlength="20">  
					<input type="submit" name="Ingreso" value="Iniciar Sesión" align="center"> 
				</form>
				</div> 
				<div class="col-md-6 contact-left">
				<img src="\web\images\Usuario.png" style="width: 300px;"> <p></p>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

<p></p>
<div class="footer-text">
		<div class="container">
			<div class="footer-main">
				<p class="footer-class">DICAM Construyendo tu estilo <a  target="_blank">@2019</a> </p>
			</div>
		</div>
</div>
	<!--end-contact--> 
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
<script type="text/javascript">
	function(validaciones){
		Nombre=document.getElementById("Nombre").value;
		Precio=document.getElementById("Precio").value;
		if (Nombre==null|| Nombre.length==0|| /^\s+$/.test(Nombre)) {
			return false;
		}
else if(Precio==null|| Precio.length==0 || /^\s+$/.test(Precio)){
	return false;
}

return true;
	}
</script>	

<style type="text/css">
	#contrasena{
		width: 100%;
	padding: 12px 12px;
	border: 1px solid #242424;
	font-size: 2em;
	margin-bottom: 1.5em;
	color: #242424;
	outline: none;
	font-weight: 400;
	}
</style>
</body>
</html>


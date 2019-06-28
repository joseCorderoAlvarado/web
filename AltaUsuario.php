<?php
ob_start("ob_gzhandler");
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
<?php	
	error_reporting(E_ALL^E_NOTICE);
		if(!$_GET)
		{
			header('Location:AltaUsuario.php?pagina=1'); //indicamos el inicio de la pagina mediante el método get 
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
	<!--start-account-->
	<div class="account">
		<div class="container"> 
			<div class="account-bottom">
				<div class="col-md-6 account-left">
					<form method='POST'>
					<div class="account-top heading">
						<h3>Nuevo Usuario</h3>
					</div>
					<div>
						<h2>Datos Personales</h2>
					</div>
					<div class="address">
						<span>Nombre</span>
						<input type="text" id="Nombre" name="Nombre" required=""  maxlength="20">
					</div>
					<div class="address">
						<span>Apellido Paterno:</span>
						<input type="text" id="ApellidoP" name="ApellidoP" required="" pattern="[A-Za-z]+" maxlength="20">
					</div>
					<div class="address">
						<span>Apellido Materno:</span>
						<input type="text" id="ApellidoM" name="ApellidoM" required=""  pattern="[A-Za-z]+"maxlength="20">
					</div>
					<div class="address">
						Genero: <select name="Genero" id="Genero"  style="height: 40px; width: 50%;" required=""> 
						<p></p>
           <?php
           error_reporting(E_ALL^E_NOTICE);
           include('Conexion.php');
           $ConsultaGenero="Select * FROM genero";
           $RCGenero=mysqli_query($conect,$ConsultaGenero)  or die("error al consultar los datos
del usuario");   
while ($valores=mysqli_fetch_array($RCGenero)){
echo "'<option value= $valores[idGenero]> $valores[Genero] </option>'";
                 }
            ?>
    			 </select>
					</div>
					
					<div class="address">
						Fecha de Nacimiento: <input type="date" id="FechaN" name="FechaN" required="required"> <p></p>
					</div>
					<div>
						<h2>Datos de usuario</h2>
					</div>
					
					<div class="address">
						<span>Correo eletr&oacute;nico:</span>
						<input type="text" name="Correo" id="Correo" required="required"   pattern="[A-Za-z@.]+">
					</div>
					
					<div class="address">
						<span>Contrase&ntilde;a:</span>
						<input type="text" name="Contrasena" id="Contrasena" required=""  minlength="8" maxlength="20">
					</div>
					<div class="address">
					<span>Rol:</span>
						<input type="text" disabled placeholder="Cliente"  value="Cliente" id="Rol" name="Rol" required="">
    			 </div>
				</div>
				<div class="col-md-6 account-left">
					<div>
						<h2>Datos del Domicilio</h2>
					</div>
					<div class="address">
						<span>Calle:</span>
						<input type="text" id="Calle" name="Calle" required="" minlength="5" maxlength="45" >
					</div>
					<div class="address">
						<span>N&uacute;mero:</span>
						<input type="number" id="NumeroI" name="NumeroI" required="" style="width: 540px; height: 45px; border-color: black; border-width: 1px;"   pattern="[A-Za-z0-9]+" maxlength="6">
					</div>
					<div class="address">
						<span>C&oacute;digo Postal:</span>
						<input type="text" id="CodigoPostal" name="CodigoPostal" required=""  pattern="[0-9]+" maxlength="5">
					</div>
					<div class="address">
						<span>N&uacute;mero Exterior:</span>
						<input type="text" name="NumeroE" name="NumeroE" required="" pattern="[0-9]+" maxlength="10">
					</div>
							<div class="address">
						<span>Estado:</span>
						<input type="text" id="Estado" name="Estado" required=""  pattern="[A-Za-z]+" maxlength="20">
					</div>
							<div class="address">
						<span>Municipio:</span>
						<input type="text" id="Municipio" name="Municipio" required=""  maxlength="20">
					</div>
					<div class="address">
						<span>Teléfono:</span>
						<input type="number" id="Telefono" name="Telefono" required="" style="width: 540px; height: 45px; border-color: black; border-width: 1px;" pattern="[1-9]+" maxlength="10">
					</div>
					<div class="address">
						<span>Tipo de domicilio:</span>
						<input type="text" disabled placeholder="De envío" value="De envio" required="">
					</div>
				</div>
			
				<div class="address new">
						<input type="submit" value="Registrarse" id="Registro"  name="Registro" style="margin: 25px;" required="" onclick="return confirm('Tu registro fue exitoso');">
					</div>
						</form>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

<?php
//----------------------------Funcion para obtener la llave publica------------------------------------------------------------------

function generarCodigos($cantidad=1, $longitud=1, $incluyeNum=true){ //funcion ramdom de llaves publicas para la contrasena donde la longitud del ramdom es 1 y la cantidad es 1 
    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; //determinamos los caracteres
    if($incluyeNum) //en este caso no incluye numeros
        $caracteres .= "1234567890"; 
    $arrPassResult=array(); //ese array generado lo guadamos en una variable
    $index=0; //generamos una variable de condicion
   while($index<$cantidad){ //mientras  index sea menor a cantidad metete a un cliclo
        $tmp=""; //se crea una variable vacia
        for($i=0;$i<$longitud;$i++){ //mientras i<1 ramdoniza y guarda en la variable, ademas ve restando un caracter a la ramdonizacion
            $tmp.=$caracteres[rand(0,strlen($caracteres)-1)]; 
        } 
        if(!in_array($tmp, $arrPassResult)){//si no estamos en el array el resultado del ramdom velo guardando en el arreglo 
            $arrPassResult[]=$tmp; 
            $index++; 
        } 
    } 
   return $arrPassResult; //retorna el resultado del arreglo
}  
$codigos=generarCodigos(1,1); //mandamos a llamar la funcion y le decimos que tendra un tamano de uno y un resultado de uno 
$LlavePublica=implode($codigos); //convertimos ese arreglo a un string y lo guardamos en una variable
$contra=$_POST["Contrasena"];
$contra=$contra.=$LlavePublica; //a la contrasena le agregamos la llave publica generada por la funcion ramdom
//-----------------------------------------------------------------------------------------------------------------------------------

//-------------------------------Consultas a la matriz de contrasenas----------------------------------------------------------------

$vectorcontrasena=str_split($contra);//Contrasena se convierte en un arreglo

$cadena="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!#%&'()*+,-./@?[\]^_`{|}~abcdefghijklmnopqrstuvwxyz:;<=>";//cadena de caracteres
$ArrayBase = str_split($cadena);//convertimos en arreglo la cadena de caracteres

$longitudvector=count($vectorcontrasena);//LONGITUD DE LA CONTRASENA
$clavePublica=end($vectorcontrasena); //SAVER EL ULTIMO VALOR DE LA CONTRASENA "LLAVE PUBLICA"
include("Conexion.php");//se incluye la conexion a la base de datos
$consultarLLavePrivada="Select Vector from Claves where Clave_Privada='$clavePublica'";//se crea la consulta para saber el vector
$VectorPrivado=mysqli_query($conect,$consultarLLavePrivada)  or die("error al consultar los datos
del vector"); //creamos la consulta en un nuevo query
$ConvertVectorPrivado=mysqli_fetch_array($VectorPrivado);//convertimos el resultado a un arreglo de columnas
$RamdomPublico=$ConvertVectorPrivado['Vector'];//el resultado del vector en la posicion vector la guardamos en una variable como string
$VectorPublico =explode(",",$RamdomPublico);//se convierte el valor del ramdom de la consulta a un arreglo.
$LlavePrivada=end($VectorPublico);


//----------------------------------------------------------------------------------------------------------------------------------

//----------------------------------------------Encriptador--------------------------------------------------------------------------

if ($clavePublica==$LlavePrivada) {
for ($i=0; $i <$longitudvector-1 ; $i++) { 
$resultadoBusqueda=array_search($vectorcontrasena[$i],$ArrayBase);
$vectorcontrasena[$i]=$VectorPublico[$resultadoBusqueda];
}
}
$NuevaContrasena=implode($vectorcontrasena);


//-----------------------------------------------------------------------------------------------------------------------------------

     if (isset($_POST['Registro']) && ! empty($_POST['Registro']))
     {
 $Nombre=$_POST["Nombre"];
   $ApellidoP=$_POST["ApellidoP"];     $ApellidoM=$_POST["ApellidoM"];
$Genero=$_POST["Genero"];   $Estado=$_POST["Estado"];
$Municipio=$_POST["Municipio"];     $Calle=$_POST["Calle"];
$CodigoPostal=$_POST["CodigoPostal"];
$NumeroE=$_POST["NumeroE"];     $Telefono=$_POST["Telefono"];
$NumeroI=$_POST["NumeroI"];
$Correo=$_POST["Correo"];     $Contrasena=$NuevaContrasena;
$FechaN=$_POST["FechaN"];     $FechaNB= date("Y-m-d", strtotime($FechaN));
$proc="call InsertUser($Genero,'$Nombre','$ApellidoP', '$ApellidoM','$FechaNB',NULL,'$Estado','$Municipio',NULL,'$Calle', 
'$NumeroI',$CodigoPostal,'$NumeroE',1,NULL,NULL, '$Telefono','$Correo','$Contrasena',3)";
mysqli_query($conect,$proc)  or die("error al insertar los datos
del usuario");  
header("location:AltaUsuario.php");
    
 }
?>

	<!--end-account-->
	<!--end-footer-text-->
	<div class="footer-text">
		<div class="container">
			<div class="footer-main">
				<p class="footer-class">DICAM Construyendo tu estilo <a href="http://w3layouts.com/" target="_blank">@2019</a> </p>
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

				<script type="text/javascript">
						$('#Cantidad').change(function(){
							var CantidadProduc=$(this).val();
							document.getElementById('resultadoCantidad').innerHTML=CantidadProduc;
							
						});

					</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
	<!--end-footer-text-->	
</body>
</html>
<?php  
ob_end_flush();
?>
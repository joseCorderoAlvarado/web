<?php
ob_start("ob_gzhandler");
?>
<?php
include("lib_carrito.php");
include("Conexion.php");
 $_SESSION["Correo"];
$Correo1=$_SESSION['Correo'];
$ConsultaUsuario="select idpersona,CorreoElectronico,Contrasena,Nombre_P,Apellido_Pat,Apellido_Mat,Fecha_Nac,Genero,GENERO_idGenero from usuario INNER JOIN persona ON Persona_idPersona=idPersona INNER JOIN Rol ON ROL_idRol=idRol INNER JOIN genero ON GENERO_idGenero=idGenero where CorreoElectronico='$Correo1'";
$ResultadoConsulta1=mysqli_query($conect,$ConsultaUsuario)  
or die("error al consultar los datos del usuario"); 
$Datos=mysqli_fetch_array($ResultadoConsulta1);
$idpe=$Datos['idpersona'];
$idGenero=$Datos['GENERO_idGenero'];



$cadena="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!#%&'()*+,-./@?[\]^_`{|}~abcdefghijklmnopqrstuvwxyz:;<=>";//cadena de caracteres
$ArrayBase = str_split($cadena);
$ContrasenaCifrada=$Datos['Contrasena'];
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

$usuario=$Datos['Nombre_P'];
$consultaDomicilio="select idDomicilio,calle,numero,codigopostal,numeroext,estado,municipio,identidades from persona INNER JOIN persona_has_domicilio on idPersona=PERSONA_idPersona INNER JOIN domicilio on iddomicilio=DOMICILIO_idDomicilio INNER JOIN entidades on entidades_identidades=identidades INNER JOIN tipodomicilio on tipodomicilio_idtipodomicilio=idtipodomicilio WHERE idpersona='$idpe'";
$ResultadoConsulta2=mysqli_query($conect,$consultaDomicilio)  
or die("error al consultar los datos del usuario");
 $DatosDom=mysqli_fetch_array($ResultadoConsulta2);
$Iddom=$DatosDom['idDomicilio'];
$ident=$DatosDom['identidades'];

$consultatelefono="select telefono_idtelefono,numero from persona INNER JOIN telefono_has_persona on idPersona=PERSONA_idPersona INNER JOIN telefono on idtelefono=telefono_idtelefono WHERE Nombre_P='$usuario'";

$ResultadoConsulta3=mysqli_query($conect,$consultatelefono) 
or die("error al consultar los datos del usuario"); 
$Datostel=mysqli_fetch_array($ResultadoConsulta3);
$idtelper=$Datostel['telefono_idtelefono'];



?>
<?php 
$ConsultaUsu="select ROL_idRol from usuario INNER JOIN Rol ON ROL_idRol=idRol where CorreoElectronico='$Correo1'";
	$ResultadoConsu=mysqli_query($conect,$ConsultaUsu)  
     or die("error al consultar los datos del usuario"); 
    $Dato=mysqli_fetch_array($ResultadoConsu);
    if($Dato["ROL_idRol"]==1){
$D="IndexAdministrador.php";
    }elseif ($Dato["ROL_idRol"]==2){
    $D="IndexEditor.php";
    }else{
    	$D="IndexCliente.php";
    }
 ?>
<!DOCTYPE html>
<html>
<head>

<title>DICAM</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />



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
			header('Location:Mi_PerfilCliente.php?pagina=1');
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
					<form method='POST'">
					<div class="account-top heading">
						<h3>Mis datos</h3>
					</div>
					<div>
						<h2>Datos Personales</h2>
					</div>
					<div class="address">
						<span>Nombre</span>
						<input type="text" id="Nombre" name="Nombre" value="<?php echo $usuario;?>" required="" disabled="disabled" pattern="[A-Za-z]+" maxlength="20">
					</div>
					<div class="address">
						<span>Apellido Paterno:</span>
						<input type="text" id="ApellidoP" name="ApellidoP" value="<?php echo $Datos['Apellido_Pat'];?>" required=""  disabled="disabled" pattern="[A-Za-z]+" maxlength="20">
					</div>
					<div class="address">
						<span>Apellido Materno:</span>
						<input type="text" id="ApellidoM" name="ApellidoM"  value="<?php echo $Datos['Apellido_Mat'];?>" required=""  disabled="disabled" pattern="[A-Za-z]+" maxlength="20">
					</div>
					<div class="address">
						Genero: <select name="Genero" id="Genero" value="<?php echo $Datos['Genero'];?>"  style="height: 40px; width: 50%;" required="" onchange="validar_select();"  disabled="disabled"> 
						<p></p>
           <?php
           include('Conexion.php');
           $ConsultaGenero="Select * FROM genero ";
           $RCGenero=mysqli_query($conect,$ConsultaGenero)  or die("error al consultar los datos
del usuario");   
while ($valores=mysqli_fetch_array($RCGenero)){
echo "'<option value='".$valores["idGenero"]."'"; if($valores['idGenero']==$idGenero){
echo "selected";}
echo ">".$valores["Genero"]."</option>";
                 }
            ?>
    			 </select>
					</div>
					
					<div class="address">
						Fecha de Nacimiento: <input type="date" id="FechaN" name="FechaN" value="<?php echo $Datos['Fecha_Nac'];?>" required="" disabled="disabled"> <p></p>
					</div>
					<div>
						<h2>Datos de usuario</h2>
					</div>
					
					<div class="address">
						<span>Correo eletr&oacute;nico:</span>
						<input type="text" name="Correo" id="Correo" value="<?php echo $Datos['CorreoElectronico'];?>" required="" disabled="disabled" >
					</div>
					
					<div class="address">
						<span>Contrase&ntilde;a:</span>
						<input type="text" name="Contrasena" id="Contrasena" value="<?php echo$contrasenadesifrada;?>"" required="" disabled="disabled"
						minlength="8" maxlength="20" >
					</div>
					
				</div>
				<div class="col-md-6 account-left">
					<div>
						<h2>Datos del Domicilio</h2>
					</div>
					<div class="address">
						<span>Calle:</span>
						<input type="text" id="Calle" name="Calle" value="<?php echo $DatosDom['calle'];?>" required="" disabled="disabled" minlength="5" maxlength="45">
					</div>
					<div class="address">
						<span>N&uacute;mero:</span>
						<input type="number" id="NumeroI" name="NumeroI" value="<?php echo $DatosDom['numero'];?>" required="" style="width: 540px; height: 45px; border-color: black; border-width: 1px;" disabled="disabled" pattern="[0-9-A-Z-a-z]+" maxlength="6">
					</div>
					<div class="address">
						<span>C&oacute;digo Postal:</span>
						<input type="text" id="CodigoPostal" name="CodigoPostal" value="<?php echo $DatosDom['codigopostal'];?>"required="" disabled="disabled"  pattern="[0-9]+" maxlength="5">
					</div>
					<div class="address">
						<span>N&uacute;mero Exterior:</span>
						<input type="text" name="Num" id="Num" name="Num" value="<?php echo $DatosDom['numeroext'];?>" required="" disabled="disabled" 
						pattern="[0-9-A-Z-a-z]+" maxlength="6">
					</div>
							<div class="address">
						<span>Estado:</span>
						<input type="text" id="Estado" name="Estado" value="<?php echo $DatosDom['estado'];?>"required="" disabled="disabled" 
						pattern="[A-Za-z]+" maxlength="20">
					</div>
							<div class="address">
						<span>Municipio:</span>
						<input type="text" id="Municipio" name="Municipio" value="<?php echo $DatosDom['municipio'];?>" required="" disabled="disabled"
						 pattern="[A-Za-z]+" maxlength="20">
					</div>
					<div class="address">
						<span>Teléfono:</span>
						<input type="number" id="Telefono" name="Telefono" value="<?php echo $Datostel['numero'];?>" required="" style="width: 540px; height: 45px; border-color: black; border-width: 1px;" maxlength="10" disabled="disabled" pattern="[1-9]+" maxlength="10">
					</div>
					<div class="address">
						<span>Tipo de domicilio:</span>
						<input type="text" disabled placeholder="De envío" value="De envio" required="" visible="visible">
					</div>
				</div>
			<div class="address new">
			        	<input type="button" value="Activar" id="Activar" onclick="activar()" name="Activar" style="" required="" >
						<input type="submit" value="Modificar" id="Registro" name="Registro" style="margin: 25px;" required="" disabled="disabled">
			</div>
			
					
						</form>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
function activar(){
  document.getElementById("Nombre").disabled = false;
  document.getElementById("ApellidoP").disabled = false;
  document.getElementById("ApellidoM").disabled = false;
  document.getElementById("Genero").disabled = false;
  document.getElementById("FechaN").disabled = false;
  document.getElementById("Contrasena").disabled = false;
  document.getElementById("Calle").disabled = false;
  document.getElementById("NumeroI").disabled = false;
  document.getElementById("CodigoPostal").disabled = false;
  document.getElementById("Num").disabled = false;
  document.getElementById("Estado").disabled = false;
  document.getElementById("Municipio").disabled = false;
  document.getElementById("Telefono").disabled = false;
  document.getElementById("Registro").disabled=false;
}
</script>

<?php
//----------------------------Funcion para obtener la llave publica-----------------------------------------------------------------


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
error_reporting(E_ALL^E_NOTICE);
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
$NumeroE=$_POST["Num"];     $Telefono=$_POST["Telefono"];
$NumeroI=$_POST["NumeroI"];
$Correo=$_POST["Correo"];     $Contrasena=$NuevaContrasena;
$FechaN=$_POST["FechaN"];     $FechaNB= date("Y-m-d", strtotime($FechaN));
$modper="update persona set Nombre_P='$Nombre',Apellido_Pat='$ApellidoP',Apellido_Mat='$ApellidoM', Fecha_Nac='$FechaNB',GENERO_idGenero='$Genero' where idpersona='$idpe'";
mysqli_query($conect,$modper)  or die("error al Actualizar"); 
$moddom="update Domicilio set calle='$Calle',numero='$NumeroI',codigopostal='$CodigoPostal',numeroext='$NumeroE' WHERE idDomicilio='$Iddom'" ;
mysqli_query($conect,$moddom)  or die("error al Actualizar");

$modtel="update Telefono set numero='$Telefono' WHERE idtelefono='$idtelper'";
mysqli_query($conect,$modtel)  or die("error al Actualizar");

$modent="update Entidades set Estado='$Estado', Municipio='$Municipio' WHERE identidades='$ident'";
mysqli_query($conect,$modent)  or die("error al Actualizar");
header("location:Mi_Perfil.php");

$modus="update usuario set Contrasena='$Contrasena' WHERE CorreoElectronico='$Correo1'";

mysqli_query($conect,$modus)  or die("error al Actualizar");
header("location:Mi_Perfil.php");
     }


?>

	<!--end-account-->
	<!--end-footer-text-->
	<div class="footer-text">
		<div class="container">
			<div class="footer-main">
				<p class="footer-class">© 2015 Free Style All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
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
<style type="text/css">
	#Activar{
	border:2px solid #8c2830;
	background:#8c2830;
	color:#ffffff;
	text-decoration:none;
	transition: 0.5s all;
	-webkit-transition: 0.5s all;
	-o-transition: 0.5s all;
	-moz-transition: 0.5s all;
	-ms-transition: 0.5s all;
	width: 100px;
	height: 35px;
}
	
</style>
	<!--end-footer-text-->	
</body>
</html>
<?php  
ob_end_flush();
?>
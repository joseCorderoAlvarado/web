
<?php  
include("lib_carrito.php");
include("Conexion.php");
 $_SESSION["Correo"];
$Correo=$_SESSION['Correo'];

?>
<!DOCTYPE html>
<html>
<style type="text/css">
div#general{
	
	margin:auto;
	background-color: #8c2830;
	height:900px; 
	width:1000px;
	margin-bottom:50px; 
}
div#oferta{
	float:left; 
	width:340px; 
	height:550px; 
	background-color:white; 
	border:1px solid #8c2830;
	
}
div#oferta2{
	float:left; 
	width:340px; 
	height:350px; 
	background-color:white; 
	border:1px solid #8c2830; 
}
div#registro{
	float:right; 
	width:320px; 
	height:550px; 
	background-color:white; 
	border:1px solid #8c2830;
}
div#pago{
	float:left; 
	width:340px; 
	height:200px;
	background-color:white; 
	border:1px solid #8c2830; 
}
div#perfil{
	float:left; 
	width:680px; 
	height:360px; 
	background-color:white; 
	border:1px solid #8c2830;
}
div#seg{
	float:right; 
	width:320px;
	height:360px; 
	background-color:white; 
	border:1px solid #8c2830; 
}
div#mi{
	float:left; 
	margin-top:50px; 
}
</style>
<?php
if (isset($_POST['Ingreso']) && ! empty($_POST['Ingreso'])){
	$Correo=$_POST["correo"];
	$ConsultaUsuario="Select * from USUARIO where CorreoElectronico='$Correo'";
	$ResultadoConsulta=mysqli_query($conect,$ConsultaUsuario)  
	or die("error al consultar los datos del usuario"); 
	$datos=mysqli_fetch_array($ResultadoConsulta);
	$Rol=$datos["ROL_idRol"];
	if($datos["CorreoElectronico"]==$Correo && $Rol==1){
	header("Location:IndexAdministrador.php");
	$_SESSION['Correo']=$datos['CorreoElectronico'];
	$_SESSION['contrasena']=$fila['contrasena'];	
	}
	elseif($datos["CorreoElectronico"]==$Correo && $Rol==2){
	header("Location:IndexEditor.php");
	$_SESSION['Correo']=$datos['CorreoElectronico'];
	$_SESSION['contrasena']=$fila['contrasena'];	
	}
	elseif($datos["CorreoElectronico"]==$Correo && $Rol==3){
	header("Location:IndexCliente.php");
	$_SESSION['Correo']=$datos['CorreoElectronico'];
	$_SESSION['contrasena']=$fila['contrasena'];	
}
	}
?> 
<?php 
$ConsultaUsu="select ROL_idRol from usuario INNER JOIN Rol ON ROL_idRol=idRol where CorreoElectronico='$Correo'";
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
<?php 
	error_reporting(E_ALL^E_NOTICE);
		if(!$_GET)
		{
			header('Location:ayuda.php?pagina=1');
		}
		  $hombre=$_REQUEST['cate'];
	   $mujer=$_REQUEST['cate'];
	   $nino=$_REQUEST['cate'];
	
	?>
<body> 
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
	<div class="header-bottom">
		<div class="container">
			<div class="top-nav">
				<ul class="memenu skyblue"><li class="active"><a href=<?php  echo $D;;?>>Inicio</a></li>
					
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
	
	<div id="general">
		<div id="oferta">
			<center><label align="center">
			<img src="/web/Imagenes/compra.png" width="150px" height="100px" align="center">
			</label>
			<label>Realizar Compra</label>
			</center>
			<div >
				<p align="center">Para realizar la compra siga los siguientes pasos: </p>
				<p align="center">1. Seleccione el producto que más le guste de nuestra p&aacute;gina principal.</p>
				<p align="center">2. Seleccione el color que m&aacute;s sea de su agrado. </p>
				<p align="center">3. Elija la talla que sea de su preferencia. </p>
				<p align="center">4. Si desea llevar m&aacute;s de un producto, seleccione la cantidad de productos que desea comprar.</p>
				<p align="center">5. Haga clic en agregar al carrito. </p>
				<p align="center">6. Una vez elegidos los productos, haga clic en "Ver Carrito". </p>
				<p align="center">7. En el carrito, haga clic en comprar. </p>
				<p align="center">8. LLene el formulario con los datos que se le solicitan (Dirección de envío, m&eacute;todo de pago, etc.)</p>
				<p align="center">9. Finalice la compra dando un &uacute;ltimo clic en el bot&oacute;n comprar. </p>
				<p align="center"><b>¡RECUERDA!</b> Debes haber iniciado sesi&oacute;n para realizar una compra.</p>
				
				
			</div>
		</div> 
		<div id="oferta2">
			<center><label>
			<img src="/web/Imagenes/iniciar.png" width="270px" height="135px" align="center">
			</label>
			<div >
				<p align="center">Existe un motivo por el que usted debe iniciar sesi&oacute;n, el cual es: <b>comprar productos</b>.</p>
				<p></p>
				<p align="center">Para iniciar sesi&oacute;n siga los siguientes pasos: </p>
				<p align="center">1. Haga clic en la secci&oacute;n de iniciar sesión del men&uacute;</p>
				<p align="center">2. Ingrese su correo electr&oacute;nico de usuario. </p>
				<p align="center">3. Ingrese su contraseña </p>
				<p align="center">4. Haga clic en el bot&oacute;n "Iniciar Sesi&oacute;n. </p>
			</div>
		</div>
		<div id="registro">
			<div>
			<center>
				<label> <img src="/web/Imagenes/registro.png" width="200px" height="150" align="center"> </label> 
				<label>¡Registrate!</label> 
			</center> 
			</div>
			<div>
				<p></p><p></p><p></p>
				<p align="center"><b>¿Aun no eres usuario DICAM?</b> Corre y registrate siguendo una serie de pasos sencillos.</p>
				<p></p>
				
				<p align="center">1. Haga clic en la secci&oacute;n de registrarse del men&uacute;</p>
				<p align="center">2. Ingrese sus datos personales (Nombre, apellidos, fecha nacimiento, etc.)</p>
				<p align="center">3. Ingrese sus datos de usuario, como correo y contraseña. </p>
				<p align="center">4. Ingrese sus datos de domicilio (calle, estado, municipio, etc.) </p>
				<p align="center">5. Asegurese de que sus datos sean los correctos. </p>
				<p align="center">6. Haga clic en el bot&oacute;n "Registrarse". </p>
				<p align="center">Ahora si, estas listo para realizar todas tus compras.
			</div>
		</div> 
		<div id="pago">
			<center>
			<label>M&eacute;todo de Pago</label>
			<img src="/web/Imagenes/paypal.png" width="200px" height="100px">
			<p align="center">El m&eacute;todo de pago solicitado por DICAM es Paypal, por lo que es necesario una cuenta de Paypal para poder realizar el pago de tus compras. </p>
			</center>
		</div>
		<div id="perfil">
			<div id="mi">
			<label ><img src="/web/Imagenes/perfil.png" width="300px" height="250px" align="left"></label>
			</div>
			<div>
			<label >Configurar "Mi Perfil"</label>
			</div>
			<div>
				<p><b>¡Recuerda! </b>Debes de tener una cuenta como usuario DICAM.</p>
				<p>Para configurar y personalizar tu perfil de usuario sigue los pasos siguientes: </p>
				<p>1. En el apartado de inicio, ingresar en "Mi Perfil". </p>
				<p>2. Se mostraran los campos habilitados para su edici&oacute;n. </p>
				<p>3. Ingrese sus nuevos datos, en los campos que desea modificar. </p>
				<p>4. Asegurese de que los datos que ha ingresado sean los correctos. </p>
				<p>5. Haga clic en el bot&oacute;n "Modificar". </p>
				
			</div>
			
		</div>
		<div id="seg">
			<center>
			<label><img src="/web/Imagenes/seguro.png" width="150px" height="150px"></label>
			<label>Seguridad</label>
			</center>
			<div>
				<p></p>
				<p align="center">Con la finalidad de evitar cualquier tipo de hackeo, se hace la siguiente sugerencia:  </p>
				<p align="center">1. Actualizar su contraseña por lo menos una vez cada dos meses. </p>
				<p></p><p></p>
				<p align="center">DICAM cuida de tus datos. </p>
				<p align="center">Es por ello, que DICAM cifra sus contraseñas para mayor seguridad
			</div>
		</div>
		
	</div> 
	
</body> 
</html>
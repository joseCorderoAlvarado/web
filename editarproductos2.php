<?php
include("lib_carrito.php");
$_SESSION["Correo"];
$Correo1=$_SESSION['Correo'];
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
$idProducto=$_GET["id"];
include ("Conexion.php");
$consulta = "select * from producto inner join categoria on CATEGORIA_idCategoria = idCategoria inner join statusproducto on STATUSPRODUCTO_idStatusProducto=idStatusProducto where idProducto=$idProducto"; 
	$resultadoConsulta= mysqli_query($conect,$consulta) or die ("error al consultar"); 
	while ($informacion =mysqli_fetch_array($resultadoConsulta))
	{
		$idStatusProducto=$informacion['STATUSPRODUCTO_idStatusProducto'];
		$NombreP=$informacion['Nombre_Product'];
		$Descripcion=$informacion['Descripcion_Product'];
		$Precio=$informacion['Precio'];
		$Imagen=$informacion['Imagen'];
		$Categoria=$informacion['Descripcion_Cate']; 
		$idCategoriaobt=$informacion['CATEGORIA_idCategoria']; 
	}

	
 ?>
 <?php 
$ConsultaUsu="select ROL_idRol from usuario INNER JOIN Rol ON ROL_idRol=idRol where CorreoElectronico='$Correo1'";
	$ResultadoConsu=mysqli_query($conect,$ConsultaUsu)  
     or die("error al consultar los datos del usuario"); 
    $Dato=mysqli_fetch_array($ResultadoConsu);
    if($Dato["ROL_idRol"]==1){
$D="IndexAdministrador.php";
    }else{
    $D="IndexEditor.php";
    }
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
				<ul class="memenu skyblue"><li class="active"><a href="IndexEditor.php">Inicio</a></li>
					
				
					
					<li class="grid"><a href="Mi_PerfilEditor.php">Mi perfil</a></li>
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
	<!--start-contact-->
	<div class="contact">
		<div class="container">
			<div class="contact-top heading"> 
				<h3>Modificar productos</h3>
			</div>
			<div class="contact-bottom"> 
				<div class="col-md-6 contact-left"> 
				<form method='POST' enctype='multipart/form-data' id="uploadForm" name="uploadForm" onsubmit="return validaciones()"> 
			
					<input type="text" placeholder="Nombre del producto" required="" id="Nombre" name="Nombre" value="<?php echo $NombreP;?>"
					 pattern="[a-z1-9]{1,23}+">
					<input type="Number" placeholder="Precio" required="" id="Precio" name="Precio" value="<?php echo $Precio; ?>" pattern="[1-9]{3,20}+">
					Status del producto:<select name="StatusProd" id="StatusProd" style="height: 40px; width: 50%;">
           <?php
          
           $ConsultaStatus="Select * FROM statusproducto";
           
           $RCStatus=mysqli_query($conect,$ConsultaStatus)  or die("error al consultar los datos del status");   
           while ($valores=mysqli_fetch_array($RCStatus)){
			if ($valores["Status"]<=1)
			{
				if ($valores["idStatusProducto"]==1)
				{
					$Val = "Activado"; 
					
				}
				else 
				{
					$Val ="Desactivado"; 
				}
			}
            echo "'<option value='". $valores["idStatusProducto"]."'";
			if($valores["idStatusProducto"]==$idStatusProducto)
			{
				echo " selected "; 
			}
			if ($valores["Status"]<=1)
			{
				echo ">".$Val."</option>"; 
			}
			
                 }
            ?>
    			 </select> 
    			 <p></p>
                    Categoria:<select   name="Categoria" id="Categoria" style="height: 40px; width: 50%;">
           <?php
         
           $ConsultaCategoria="Select * FROM categoria";
           $RCCategoria=mysqli_query($conect,$ConsultaCategoria)  or die("error al consultar los datos de la categoria");   
           while ($valoresCat=mysqli_fetch_array($RCCategoria)){
			
            echo "<option value='".$valoresCat["idCategoria"]."'";
			if($valoresCat["idCategoria"]== $idCategoriaobt)
			{
				echo " selected "; 
			}
			echo ">".$valoresCat["Descripcion_Cate"]."</option>";
                 }
				 
				
            ?>
    			 </select>
				 
				 
   <p></p>
		<div class="photo">
		Introduce la imagén del producto: 
		<input type="file" name="foto" id="foto">
	
		
	   <div >
			 <div class="prevPhoto" style=" float: left!important" >
				<span class="delPhoto notBlock">X</span>
				<label  for="foto"  >
				
				</label>
			</div>
			<div class="prevPhoto2" style=" float: right!important;" >
				<label for="foto">
					<img src="/web/images/<?php echo $Imagen; ?>">
				</label>
			</div>
		</div>
        
        <div id="form_alert"></div>
</div>
<p></p>

<script type="text/javascript">
	$(document).ready(function(){
    //--------------------- SELECCIONAR FOTO PRODUCTO ---------------------
    $("#foto").on("change",function(){
    	var uploadFoto = document.getElementById("foto").value;
        var foto       = document.getElementById("foto").files;
        var nav = window.URL || window.webkitURL;
        var contactAlert = document.getElementById('form_alert');
       
            if(uploadFoto !='')
            {	
                var type = foto[0].type;
                var name = foto[0].name;
               
                        contactAlert.innerHTML='';
                        $("#img").remove();
                        $(".delPhoto").removeClass('notBlock');
                        var objeto_url = nav.createObjectURL(this.files[0]);
                        $(".prevPhoto").append("<img id='img' src="+objeto_url+">");
                        $(".upimg label").remove();
                        
                    
              }else{
              	alert("No selecciono foto");
                $("#img").remove();
              }              
    });

    $('.delPhoto').click(function(){
    	$('#foto').val('');
    	$(".delPhoto").addClass('notBlock');
    	$("#img").remove();

    });

});
</script>
<style type="text/css">
	.prevPhoto {
    display: flex; 
    justify-content: space-between;
    width: 270px;
    height: 250px;
    border: 1px solid #CCC;
    position: relative;
    cursor: pointer;
    background: url(C:\xampp\htdocs\web\images\logo-4.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    margin: auto;
}
	.prevPhoto2 {
    display: flex; 
    justify-content: space-between;
    width: 270px;
    height: 250px;
    border: 1px solid #CCC;
    position: relative;
    cursor: pointer;
    background: url(C:\xampp\htdocs\web\images\logo-4.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    margin: auto;
}
	.prev{
    width: 500px;
    height: 250px;
	border: 5px solid ;
  
}
.index {
	font-family: Tahoma, Verdana, Arial;
	font-size: 11px;
	color: #707070;
	background-color: #FFFFFF;
	border-width:0;
}
.prevPhoto img{
	 
	width: 100%;
	height: 100%;
}
.prevPhoto2 img{
	 
	width: 100%;
	height: 100%;
}
.upimg, .notBlock{
	display: none !important;
}
.errorArchivo{
	font-size: 16px;
	font-family: arial;
	color: #cc0000;
	text-align: center;
	font-weight: bold; 
	margin-top: 10px;
}
.delPhoto{
	color: #FFF;
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius: 50%;
	width: 25px;
	height: 25px;
	background: red;
	position: absolute;
	right: -10px;
	top: -10px;
	z-index: 10;
}
#tbl_list_productos img{
	width: 50px;
}
.imgProductoDelete{
	width: 175px;
}
</style>		
</div>
				<div class="col-md-6 contact-left">
					<textarea placeholder="Descripción del producto" name="DescripcionProduct" id="DescripcionProduct" required="" maxlength="100" ><?php echo "$Descripcion"; ?></textarea> 
					<input type="submit" name="Registro" value="Modificar producto"  style="background-color: #cd3d3d; border-style: none; color: white; padding: 10px;" onclick="return confirm('Producto Modificado Con Exito');">
				</form>
					
<?php

error_reporting(E_ALL^E_NOTICE);
     if (isset($_POST['Registro']) && ! empty($_POST['Registro']))
     {   
$Foto=$_FILES["foto"];
$NFoto=$Foto['name'];
$type =$Foto['type'];
$url_temp=$Foto['tmp_name'];
$imgProducto='img_producto.png';
if($NFoto !=''){
  $destino='C:/xampp/htdocs/web/images/';
  $imgnombre='img_'.md5(date('d-m-Y H:m:s'));
  $imgProducto=$imgnombre.'.jpg';
  $src =$destino.$imgProducto;
}
else{
 $destino='C:/xampp/htdocs/web/images/';
 $imgProducto=$Imagen;
 $src =$destino.$imgnombre; 
}     
$Nombre=$_POST["Nombre"];  $Descripcion=$_POST["DescripcionProduct"];
 $Categoria=$_POST["Categoria"];
 $Precio=$_POST["Precio"];

$proc=" update producto set Nombre_Product='$Nombre', Descripcion_Product='$Descripcion',Precio=$Precio, CATEGORIA_idCategoria='$Categoria', Imagen='$imgProducto' where idProducto=$idProducto";
mysqli_query($conect,$proc) or die("error al insertar los datos
del Producto");

    if ($Foto!='') {
      move_uploaded_file($url_temp,$src);
    } 
     } 

     ?>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<div class="footer-text">
		<div class="container">
			<div class="footer-main">
				<p class="footer-class">DICAM Construyendo tu estilo <a href="http://w3layouts.com/" target="_blank">@2019</a> </p>
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
</body>
</html>
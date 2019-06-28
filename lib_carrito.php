
<?php
class carrito {
	//atributos de la clase
   	var $num_productos;
   	var $array_id_prod;
   	var $array_nombre_prod;
   	var $array_precio_prod;
    var $array_cantidad_prod;
	//constructor. Realiza las tareas de inicializar los objetos cuando se instancian
	//inicializa el numero de productos a 0
	
	function carrito () {
   		$this->num_productos=0;
	}
	
	//Introduce un producto en el carrito. Recibe los datos del producto
	//Se encarga de introducir los datos en los arrays del objeto carrito
	//luego aumenta en 1 el numero de productos
	function introduce_producto($id_prod,$nombre_prod,$precio_prod,$Cant_Product){
		$this->array_id_prod[$this->num_productos]=$id_prod;
		$this->array_nombre_prod[$this->num_productos]=$nombre_prod;
		$this->array_precio_prod[$this->num_productos]=$precio_prod*$Cant_Product;
		$this->array_cantidad_prod[$this->num_productos]=$Cant_Product;
		$this->num_productos++;
	}

	//Muestra el contenido del carrito de la compra
	//ademas pone los enlaces para eliminar un producto del carrito
	function imprime_carrito(){
		$suma = 0;
		echo "<div class='ckeckout'>
		<div class='container'>
		<div class='ckeckout-top'>
		<div class='cart-items heading'>
		<h3>Mi Carrito compras</h3>";

		echo '<table cellpadding="2" width="100%" height="50%" style="border-spacing=1px; border=10px solid #FFF; ">
			  <tr >
				<td style="font-size:20px;text-align: center; background: #020F1A; color:white; "><b>Producto</b></td>
				<td style="font-size:20px;text-align: center; background: #020F1A; color:white; "><b>Precio Total</b></td>
				<td style="font-size:20px; text-align: center; color:white; background: #020F1A;"><b>Eliminar</b></td>
			  </tr>';
		for ($i=0;$i<$this->num_productos;$i++){
			if($this->array_id_prod[$i]!=0){
				echo '<tr>';
				echo "<td style='font-size:19px; padding: 1em; background: #F4F6F6;'>" . $this->array_nombre_prod[$i] . "</td>";
				echo "<td style='font-size:19px; padding: 3em; background: #F4F6F6;'>$" . $this->array_precio_prod[$i] . "</td>";
				echo "<td style= 'background:#F4F6F6 ;'> <a href='eliminar_producto.php?linea=$i' style='color:white; text-decoration: none;font-size: 20px;'><center><<img  width='60px' height='60px' src='Imagenes/Papelera.png'></center></a></td>";
				echo '</tr>';
				$suma += $this->array_precio_prod[$i];

			}
		}

		//muestro el total
		echo "<tr><td style='padding: 0.3em 1em; background: #020F1A; color: white;'><b>TOTAL :</b></td><td style='padding: 0.3em 3em; background: #020F1A; color:white;'> <b>$$suma</b></td><td style='background: #020F1A;'>&nbsp;</td></tr>";
		//total más IVA
		if($suma>=1000){
		$iva=$suma*0.1;
		$total=$suma - $iva;	
		echo "<tr><td style='padding: 0.3em 1em; background: #020F1A; color:white;'><b>Descuento(10%):</b></td><td style='padding: 0.3em 2em; background: #020F1A; color:white;'> <b> $$total</b></td><td>&nbsp;</td></tr>";
		echo "</table>";
		}
		else{
		$total=$suma;	
		echo "<tr><td style='padding: 0.3em 1em; background: #020F1A; color:white;'><b>Sin Descuento:</b></td><td style='padding: 0.3em 3em; background: #020F1A; color:white;'> <b> $$total</b></td><td style='background: #020F1A;'>&nbsp;</td></tr>";
		echo "</table>";
		}
		
	}
	
	//elimina un producto del carrito. recibe la linea del carrito que debe eliminar
	//no lo elimina realmente, simplemente pone a cero el id, para saber que esta en estado retirado
	function elimina_producto($linea){
		$this->array_id_prod[$linea]=0;
	}
	function enviar_total(){
		$suma = 0;
		for ($i=0;$i<$this->num_productos;$i++){
			if($this->array_id_prod[$i]!=0){
				$suma += $this->array_precio_prod[$i];

			}
		}
	if($suma>=1000){
		$iva=$suma*0.1;
		$total=$suma - $iva;	
		}
		else{
		$total=$suma;	
		}	
	echo "$".$total;	
	$_SESSION['suma']=$suma;
	}


function envio($idPersona,$idDireccion,$Metodo,$Envio,$Fecha_Compra){		
	include("Conexion.php");
	$suma = 0;
		for ($i=0;$i<$this->num_productos;$i++){
			if($this->array_id_prod[$i]!=0){
				$suma += $this->array_precio_prod[$i];
			
			}

		}
	if($suma>=1000){
		$iva=$suma*0.1;
		$total=$suma - $iva;	
		}
		else{
		$total=$suma;
		$iva=0;	
		}
		  $Procedimiento="call InsertVenta('$Fecha_Compra',$suma,$iva,$total,$idDireccion,$Envio,$Metodo,$idPersona,null,'$Fecha_Compra')";
    mysqli_query($conect,$Procedimiento)  or die("error al insertar la venta");
		
		for ($i=0;$i<$this->num_productos;$i++){
			if($this->array_id_prod[$i]!=0){
				          $idpr=$this->array_id_prod[$i];
			             $descr=$this->array_nombre_prod[$i];
				         $pre=$this->array_precio_prod[$i];
				         $cant=$this->array_cantidad_prod[$i];
				$Ventaproducto="insert into ventaproducto values(null,$cant,$pre,'$descr',$idpr)";
				mysqli_query($conect,$Ventaproducto)or die("error al insertar la Venta de productos");
				$consultaVenta="select max(idVenta) as idVenta from venta";
	$ResultadoVenta=mysqli_query($conect,$consultaVenta) or die ("error al consultar la ultima venta");
	while ($informacion=mysqli_fetch_array($ResultadoVenta)) {
		$idVenta=$informacion['idVenta'];
	}
		$consultaVentaProducto="select max(idVentaProducto) as idVentaProducto from ventaproducto";
	$ResultadoVentaProducto=mysqli_query($conect,$consultaVentaProducto) or die ("error al consultar la ultima venta del producto");
	while ($informacion2=mysqli_fetch_array($ResultadoVentaProducto)) {
		$idVentaProducto=$informacion2['idVentaProducto'];
	}
	$DetalleProductoVenta="insert into venta_has_ventaproducto values($idVenta,$idVentaProducto)";
	mysqli_query($conect,$DetalleProductoVenta)or die("error al insertar el detalle de la venta");
			}
		}
		for ($i=0;$i<$this->num_productos;$i++){
			if($this->array_id_prod[$i]!=0){
			$this->array_id_prod[$i]=0;
			}
		}	
	}
function ventapaypal()
{
for ($i=0;$i<$this->num_productos;$i++){
			if($this->array_id_prod[$i]!=0){
$cart[$i+1] = array(
	array("product_name"=>$this->array_nombre_prod[$i],"product_quantity"=>$this->array_cantidad_prod[$i],"product_price"=>$this->array_precio_prod[$i]),
	);
				}
			}
			$cart=array_values($cart);
$paypal_business = "juantony9606-facilitator@outlook.es";
	$paypal_currency = "MXN";
	$paypal_cursymbol = "&mxn";
	$paypal_location = "MX";
	$paypal_returnurl = "http://localhost:/web/DatosVentaU.php";
	$paypal_returntxt = "Pago Realizado Exitosamente!";
	$paypal_cancelurl = "http://localhost:/web/ver_carrito.php";
$ppurl = "https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_cart";
	$ppurl .= "&business=".$paypal_business;
	$ppurl .= "&no_note=1";
	$ppurl .= "&currency_code=".$paypal_currency;
	$ppurl .= "&charset=utf-8&rm=1&upload=1";
	$ppurl .= "&business=".$paypal_business;
	$ppurl .= "&return=".urlencode($paypal_returnurl);
	$ppurl .= "&cancel_return=".urlencode($paypal_cancelurl);
$x=count($cart);
for ($z=0; $z <=$x ; $z++) { 
	foreach ($cart[$z] as $c) {
		$q = $c["product_quantity"];
		$s=$z+1;
		$ppurl.="&item_name_$s=".urlencode($c["product_name"])."&quantity_$z-1=$q&amount_$s=".$c["product_price"]."&item_number_$s=";
	}
}


	$ppurl.= "&tax_cart=0.00";
header("Location: $ppurl");
}
//inicio la sesión
}
session_start();
//si no esta creado el objeto carrito en la sesion, lo creo
if(isset($_SESSION["Correo"])){
  if($_SESSION["Correo"]==""){
    header("Location: IniciarSesion.php");
  }
}
else{
  header("Location:IniciarSesion.php");
}
if (!isset($_SESSION["ocarrito"])){
	$_SESSION["ocarrito"] = new carrito();
}
?>
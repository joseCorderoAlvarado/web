<?php
include("lib_carrito.php");
$_SESSION["ocarrito"]->elimina_producto($_GET["linea"]);
header("Location:ver_carrito.php");
?>

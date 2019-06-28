<?php
$host="localhost:3307";
$usuariobd="root";
$clave="root";
$basededatos="dicam";
$conect=mysqli_connect($host,$usuariobd,$clave,$basededatos)
or die ("No se pudo conectar con el servidor.");
?>
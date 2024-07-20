<?php
	require_once "conexion.php";	 
	$band=false;
	$sql="UPDATE pacientes SET estatus = 'A' WHERE email='$_GET[email]' AND keycode = '$_GET[keycode]'"; 	
	$resul=mysqli_query($conn,$sql);	
	if(mysqli_affected_rows($conn)>0) $band=true; 
	if ($band) echo "Registro activado con exito!"; else echo "El Registro no se pudo activar";						 				
	echo '<br>Regresando....<meta http-equiv="refresh" content="3; url=index.php">';
?>
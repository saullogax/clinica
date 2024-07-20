<?php
session_start();
?>
<html>
<head>  
 <title>Sistema CEESDENT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="js/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  
  <link rel="stylesheet" href="css/estiloclinica.css">   
<style>	
body, html{
	margin:0;
	padding:0;
	width:100%;
	height:100%;
	position:relative;	
}
.frm{
	border:1px solid #E1E1E1;
	border-radius:5px;
	padding:17px;
	width:380px;
	background-color:lightblue;	 
	position:absolute;
	top:50%;
	left:50%;
	transform:translate(-50%,-30%);
}
@media(max-width:400px){
	 .frm
	 {
		 width:90%;		 
	 }
}
.boton_personalizado{
    text-decoration: none;
    padding: 12px;
	padding-left: 10px;
    padding-right: 10px;
	display: inline-block; 
	height: 60px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
  }  
</style>
</head>
<body> 
<?php 
require_once "conexion.php";	
echo "<center>Hola ".$_SESSION["user"].", Bienvenido a:</center>";	
?>
 
<div class="container-fluid">
<center> <img src="img/logo.png" alt="" width="330" height="90" /> </center>
			  <center><h3>Opciones del Sistema</h3>			 
			  <form class="frm" > 
					<label><a class="boton_personalizado" href="citas.php">Agendar una Cita</a></label><br/>
					
					<label>  <a class="boton_personalizado" href="citas.php">Mi Expediente</a></label><br/>
					
					<label>  <a class="boton_personalizado" href="citas.php">Mis Pagos</a></label><br/>
					
					<label> <a class="boton_personalizado" href="citas.php">Logout</a></label><br/>
					  
				</form>
				</center>
			</div>

</html>